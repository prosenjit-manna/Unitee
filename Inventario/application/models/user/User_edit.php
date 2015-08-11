<?php

get_instance()->load->interfaces("Interface");

class User_edit extends CI_Model implements PInterface{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function _css() {
        
    }

    public function _init() {
        
    }

    public function _install() {
        $this->load->view("usuario/edit");
    }

    public function _js() {
        
    }

    public function _jsLoader() {
        
    }

    public function _rols() {
        
    }

    public function _title() {
        
    }

    public function _update() {
        
    }

}
