<?php

class Currencies_model extends CI_Model {

public function __construct()
{
        $this->load->database();
        
}

public function get_currencies_by_dates()
{   
    date_default_timezone_set('US/Central');
    $selected_date = $this->input->post('selected_date');
    if(empty($selected_date)){
        $sql = "SELECT * FROM currency order by date desc";
        $query = $this->db->query($sql);
        // print_r($query->row_array());
        // print_r($this->db->last_query());
        return $query->row_array();
    }else{
        $sql = "SELECT * FROM currency where date='$selected_date'";
        $query = $this->db->query($sql);
        // print_r($query->row_array());
        // print_r($this->db->last_query());
        return $query->row_array();
    }
    
        // $selected_date = date('Y-m-d');
        
    
    
        

}


}