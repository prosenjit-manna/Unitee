<?php


class Test_Model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function _init(){
        $this->load->view("test_view/index");
    }
    
    public function _install(){
       
        $this->load->database();
        $query = "";

    }
    
}
