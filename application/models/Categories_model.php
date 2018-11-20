<?php

class Categories_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_categories(){    
        $sql = "SELECT * FROM categories";
        $query = $this->db->query($sql);
        // print_r($query->result_array());
        // print_r($this->db->last_query());
        return $query->result_array();
    }

    public function get_products(){
        $category_id = $this->input->post('categoryid');
        $sql = "SELECT * FROM items WHERE categoryid=$category_id";
        $query = $this->db->query($sql);
        return $query->result_array();   
    }

    public function convert_price(){
        $selected_currency = $this->input->post('select_graph_currency');
        $sql = "SELECT $selected_currency FROM currency order by date desc LIMIT 1";
        $query = $this->db->query($sql);
        // print_r($query->result_array());
        return $query->row_array();   
    }

    public function get_saledays(){
        $sql = "SELECT * FROM sale";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}