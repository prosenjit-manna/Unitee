<?php



get_instance()->load->interfaces("PluginInterface");


class Test_Model extends CI_Model implements PluginInterface {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function _init(){
        $this->load->library("base_url");
        
        $this->load->view("dashboard/header" , array(   
               "route" =>$this->base_url->GetBaseUrl()
        ));
        $this->load->view("test_view/index");
        $this->load->view("dashboard/footer");
    }
    
    public function _install(){
       
        $this->load->database();
        $query = "";

    }
    
    public function  _update(){}
    
}
