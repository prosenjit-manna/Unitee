<?php

get_instance()->load->interfaces("Interface");


class User extends CI_Model implements PInterface {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function _footer() {
        return array();
    }

    public function _header() {
        return array(
            APPPATH ."/model/user/css/buscar.css" ,
            APPPATH ."/model/user/css/nombre.css" );
    }

    public function _init() {
          
       // $this->load->view("usuario/user");
    }

    public function _install() {
        
    }

    public function _update() {
        
    }

    public function _jsLoader() {
        
    }

}
