<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		$this->load->model('Graph_model');
		$this->load->model('Currencies_model');
		$this->load->library('grocery_CRUD');
		
	}
	
	
	public function index() {
		

		
	}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('usernamereg', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('emailreg', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('passwordreg', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[passwordreg]');

		$this->form_validation->set_error_delimiters('<span style="color: red;">&nbsp;&nbsp;', '</span>');
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('templates/header1');
			$this->load->view('pages/index', $data);
			$this->load->view('templates/footer');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('usernamereg');
			$email    = $this->input->post('emailreg');
			$password = $this->input->post('passwordreg');
			
			if ($this->user_model->create_user($username, $email, $password)) {
                
                echo("<script> alert('Registration Successful ! Please Login'); </script>");
				// user creation ok
				$this->load->view('templates/header1');
				$this->load->view('pages/index', $data);
				$this->load->view('templates/footer');
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('templates/header1');
			    $this->load->view('pages/index', $data);
			    $this->load->view('templates/footer');
				
			}
			
		}
		
	}
		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<span style="color: red;">&nbsp;&nbsp;', '</span>');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('templates/header1', $data);
			$this->load->view('pages/index');
			$this->load->view('templates/footer');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->user_model->resolve_user_login($username, $password)) {
				
				$user_id = $this->user_model->get_user_id_from_username($username);
				$user    = $this->user_model->get_user($user_id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['username']     = (string)$user->username;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
				$_SESSION['is_admin']     = (bool)$user->is_admin;
				
				// user login ok
				redirect('pages/homepage');
				
			} else {
				
				// login failed
				$data1->error = 'Wrong username or password.';
				
				// send error to the view
				$this->load->view('templates/header1', $data1);
				$this->load->view('pages/index');
				$this->load->view('templates/footer');
				
			}
			
		}
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			$this->load->view('templates/header1');
			$this->load->view('pages/index', $data);
			$this->load->view('templates/footer');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}
		
	}


	public function users(){
		$crud = new grocery_CRUD();
		$crud->set_table('users');
		$output = $this->grocery_crud->render();
		$this->load->view('templates/header');
		$this->load->view('pages/admin_dashboard',$output);
		$this->load->view('templates/footer');

	}

	public function categories(){
		$crud = new grocery_CRUD();
		$crud->set_table('categories');
		$output = $this->grocery_crud->render();
		$this->load->view('templates/header');
		$this->load->view('pages/admin_dashboard',$output);
		$this->load->view('templates/footer');

	}

	public function items(){
		$crud = new grocery_CRUD();
		$crud->set_table('items');
		$output = $this->grocery_crud->render();
		$this->load->view('templates/header');
		$this->load->view('pages/admin_dashboard',$output);
		$this->load->view('templates/footer');

	}

	public function currency(){
		$crud = new grocery_CRUD();
		$crud->set_table('currency');
		$crud->unset_jquery();
		$output = $this->grocery_crud->render();
		$this->load->view('templates/header');
		$this->load->view('pages/admin_dashboard',$output);
		$this->load->view('templates/footer');

	}

	public function add_currency(){
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->dbforge();
		
		// set validation rules
		$name = $this->input->post('sym');
		$this->form_validation->set_rules('sym', 'Symbol', 'required');

		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			redirect('User/currency');
			
		} else {
			
			// set variables from the form
			

		$fields = array(
        $name => array('type' => 'decimal(10,2)')
            );
            $this->dbforge->add_column('currency', $fields);
			
			redirect('User/currency');
			
	
		}
	
	}

	public function remove_currency(){
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->dbforge();
		
		// set validation rules
		$name = $this->input->post('sym_rem');
		$this->form_validation->set_rules('sym_rem', 'Symbol', 'required');

		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			redirect('User/currency');
			
		} else {
			
			// set variables from the form
			

		
            $this->dbforge->drop_column('currency',$name);
			
			redirect('User/currency');
			
	
		}
	
	}


	public function graph(){
		$this->load->helper('form');
		
		$data['selected_currency'] = $this->input->post('select_graph_currency');
		$data['selected_currency2'] = $this->input->post('select_graph_currency2');
		$data['graph_row'] = $this->Graph_model->get_graph();
		$data['currency_col'] = $this->Graph_model->get_currency_col();

		$this->load->view('templates/header');
		$this->load->view('pages/graphs',$data);
		$this->load->view('templates/footer');

	}


	public function currencies(){
		$this->load->helper('form');

		$data['selected_date'] = $this->input->post('selected_date');
		$data['selected_rate'] = $this->Currencies_model->get_currencies_by_dates();
		$data['currency_col'] = $this->Graph_model->get_currency_col();
		// print_r($data['selected_rate']);
		$this->load->view('templates/header');
		$this->load->view('pages/currencies',$data);
		$this->load->view('templates/footer');


	}

}