<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author Yo
 */
class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->library("session");
        $this->load->library("base_url");
        
       //$this->session->unset_userdata('user');  
        if(!is_array($this->session->user))
        {
            redirect("Login/");
            return;
        }
        

    }
    
    
    public function index(){
  
        
        echo "<pre>" , print_r($this->session->user) , "</pre>";
    }
    
    public function session($close = true)
    {
        if($close){
              $this->session->unset_userdata("user");
              redirect("Login/");
              return;
        }
    }
    
}
