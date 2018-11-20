<?php
	class Categories extends CI_Controller{

		public function __construct() {
			parent::__construct();
			$this->load->library(array('session'));
			$this->load->model('Categories_model');
			$this->load->model('Graph_model');
		}

		public function view($page = 'categories'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			$data['title'] = ucfirst($page);
			$data['categories'] = $this->Categories_model->get_categories();
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}

		public function products($page = 'products'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			$data['title'] = ucfirst($page);
			$data['products'] = $this->Categories_model->get_products();
			$data['currency_col'] = $this->Graph_model->get_currency_col();
			$data['categoryid'] = $this->input->post('categoryid');
			$data['categoryname'] = $this->input->post('categoryname');
			$selected_currency = $this->input->post('select_graph_currency');
			$data['selected_currency'] = $this->input->post('select_graph_currency');
			$data['graph_row'] = $this->Graph_model->get_graph();

			if(empty($selected_currency)){

			}else{
				$data['currency_rate'] = $this->Categories_model->convert_price();
			}
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}

		public function productgraph(){
		$this->load->helper('form');
		
		$data['selected_currency'] = $this->input->post('selected_currency');
		$data['graph_row'] = $this->Graph_model->get_productgraph();
		$data['rowcount'] = $this->Graph_model->get_rowcount();
		$data['currency_col'] = $this->Graph_model->get_currency_col();
		$data['saledays'] = $this->Categories_model->get_saledays();
		// print_r($data['selected_currency']);
		// $this->load->view('templates/header');
		$this->load->view('pages/productgraph',$data);
		// $this->load->view('templates/footer');

	}
	}