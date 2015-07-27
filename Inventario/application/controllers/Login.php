<?php


class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->library("base_url");
        $this->load->helper("form");
        
    }
    
    public function index(){
         
         $r = $this->base_url->GetBaseUrl();
         $this->load->view("login/index" ,  array( "route" => $r));
        
    }
    
 

}
