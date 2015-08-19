<?php


class Country_engine extends CI_Model {
    
    protected  $query = NULL;

    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function get_country(){
        $this->query = "SELECT iso as 'id' , nombre as 'name' FROM paises";
        return $this->db->query($this->query)
                        ->result_array();
    }
    
    public function get_depto($iso){
        
        $this->query = "SELECT codigo_depto_pais as 'id' , nombre as 'name' FROM depto_pais "
                . " WHERE iso LIKE ?";
        return $this->db->query($this->query , array($iso))
                        ->result_array();
    }
    
     public function get_muni($id){
        
        $this->query = "SELECT codigo_municipio_depto as 'id' , nombre as 'name' FROM municipio_depto "
                . " WHERE codigo_depto_pais LIKE ?";
        return $this->db->query($this->query , array($id))
                        ->result_array();
    }
    
  

    
}
