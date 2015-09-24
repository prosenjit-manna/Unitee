<?php


class Client extends CI_Controller{
    
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function index(){
        //CLIENTE SIN INDEX ...
    }
    
    public function Add(){
        
        $name   = isset($_REQUEST['txt1']) ? $_REQUEST['txt1'] : NULL;
        
        
    }
    
    
}
