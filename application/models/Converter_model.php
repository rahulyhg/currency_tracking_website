<?php
    class Converter_model extends CI_Model {

        public function __construct(){
        $this->load->database();
        }

        public function conversion(){
            $input_currency = $this->input->post('input_currency');
            $input_amount = $this->input->post('input_amount');
            $output_currency = $this->input->post('output_currency');
            if(empty($input_currency)){
                $input_currency = "INR";
            }
            $sql = "select $input_currency from currency order by date desc limit 1";
            $query = $this->db->query($sql);
            $input_currency_sql = $query->row_array();
            $input_currency_rate = $input_currency_sql[$input_currency];
            if(empty($output_currency)){
                $output_currency = "INR";
            }
            $sql1 = "select $output_currency from currency order by date desc limit 1";
            $query1 = $this->db->query($sql1);
            $output_currency_sql = $query1->row_array();
            $output_currency_rate = $output_currency_sql[$output_currency];
            // print_r($output_currency_rate);
            $output1 = floatval($input_amount)/floatval($input_currency_rate);
            // print_r($output1);
            $final_output = floatval($output1) * floatval($output_currency_rate);
            return $final_output;
            
        }
    }