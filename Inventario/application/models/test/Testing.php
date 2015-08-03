<?php

get_instance()->load->interfaces("Interface");


class Testing extends CI_Model implements PInterface {
    
    public function __construct() {
        parent::__construct();
        $this->load->library("base_url");
    }
    
    public function _init(){
        $this->load->view("test_view/index");
    }
    
    public function _install(){
       
        $this->load->database();
        $query = "";

    }
    
   
    public function  _update(){}

    public function _footer() {
        
    }

    public function _header() {
        return array("../prueba/1.css" , ".../prueaba/2.css");
    }

}