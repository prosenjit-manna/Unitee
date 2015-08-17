<?php


class Country_engine extends CI_Model {
    
    protected  $query = NULL;

    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function get_country(){
        $this->query = "SELECT id_paises as 'id' , nombre as 'name' FROM paises";
        return $this->db->query($this->query)
                        ->result_array();
    }
    
}
