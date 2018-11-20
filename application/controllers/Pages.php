<?php
	class Pages extends CI_Controller{
		public function __construct() {
		
			parent::__construct();
			$this->load->library(array('session'));
		}
		public function view($page = 'index'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('templates/header1');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}

		public function view2($page = 'index'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('templates/header');
			$this->load->view('pages/user_dashboard');
			$this->load->view('templates/footer');
		}
		public function view3($page = 'index'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}

		public function homepage($page = 'homepage'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}