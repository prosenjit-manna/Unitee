<?php


class Login extends CI_Controller {
    
    
    private $route   = NULL;
    
    public function __construct() {
        parent::__construct();
        
        $this->load->library("base_url");
        $this->load->helper("form");
        $this->load->library('base_url');
        
    }
    
    public function index(){
         
         $this->route = $this->base_url->GetBaseUrl();
         $this->load->view("login/index" ,  array( "route" => $this->route));
         
    }
    
    public function login()
    {
        
    
        
        $user       = $_REQUEST['username'];
        $password   = $_REQUEST['password'];
        $type       = "email";
        
        if(filter_var($user, FILTER_VALIDATE_EMAIL) == FALSE)
        {
            $type = "user";
        }
        
        $this->load
             ->model("user/user_auth");
        
        $request =  $this->user_auth
                         ->Auth($user , $password , $type);
        
        if($request){
            redirect("");
            return;
        }else
        {
            $this->load->view("login/index" ,
                    array(
                        "route"     => $this->route ,
                        "err"       => "Usuario o Contraseña incorrectos"
                  ));
            return;
        }
        
    }
    
 

}
