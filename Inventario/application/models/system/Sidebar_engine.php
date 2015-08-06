<?php

class Sidebar_engine extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->model("user/user_auth");
    }
    
    public function _init(){
         $section = $this->get_seccion();
    }
    
    private function get_seccion(){
        
      
        $roles      = $this->user_auth->roles;
        $id         = $this->user_auth->get_id;
        $usr        = $this->user_auth->get_usr;
        
        if($roles === NULL){
            return FALSE;
        }
        
        
        
        
    }
    
    
  
}
