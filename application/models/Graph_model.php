<?php

class Graph_model extends CI_Model {

public function __construct()
{
        $this->load->database();
        
        
}

public function get_graph()
{
    $select_currency = $this->input->post('select_graph_currency');
    $select_currency2 = $this->input->post('select_graph_currency2');
    if(empty($select_currency)){
        $select_currency = 'INR';
        $select_currency2 = 'EUR';
    }
    if(empty($select_currency2)){
        $select_currency = 'INR';
        $select_currency2 = 'EUR';
    }
    
        $sql = "SELECT Date,$select_currency,$select_currency2 FROM currency";
        $query = $this->db->query($sql);
        
        return $query->result_array();

}

public function get_productgraph()
{
    $select_currency = $this->input->post('selected_currency');
    if(empty($select_currency)){
        $select_currency = 'INR';
    }
    
        $sql = "SELECT Date,$select_currency FROM currency";
        $query = $this->db->query($sql);
        
        return $query->result_array();

}

public function get_currency_col()
{
        $sql = "SHOW COLUMNS FROM currency.currency";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    


}
public function get_rowcount(){
    $sql = "SELECT COUNT(*) FROM currency";
        $query = $this->db->query($sql);
        
        return $query->row_array();

}
}