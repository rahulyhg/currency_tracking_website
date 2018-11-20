<?php
	class Converter extends CI_Controller{

		public function __construct() {
			parent::__construct();
			$this->load->library(array('session'));
			$this->load->model('Categories_model');
			$this->load->model('Graph_model');
			$this->load->model('Converter_model');
		}

		public function view($page = 'converter'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			$data['title'] = ucfirst($page);
			$data['graph_row'] = $this->Graph_model->get_graph();
			$data['currency_col'] = $this->Graph_model->get_currency_col();
			$data['input_amount'] = $this->input->post('input_amount');
			$data['input_currency'] = $this->input->post('input_currency');
            $data['output_currency'] = $this->input->post('output_currency');
			$data['converter_data'] = $this->Converter_model->conversion();

			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}