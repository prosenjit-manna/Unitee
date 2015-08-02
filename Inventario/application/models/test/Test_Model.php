<?php



get_instance()->load->interfaces("PluginInterface");


class Test_Model extends CI_Model implements PluginInterface {
    
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
