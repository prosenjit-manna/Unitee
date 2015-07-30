<?php


class Login extends CI_Controller {
    
    
    private $route   = NULL;
    
    public function __construct() {
        parent::__construct();
        
        $this->load->library("base_url");
        $this->load->helper("form");
        $this->load->library('base_url');
        $this->load->library("session");
        
        $this->route = $this->base_url->GetBaseUrl();
        
        if(is_array($this->session->user))
        {
            redirect("Dashboard/");
            return;
        }
    }
    
    public function index($error = null ){
        
        $meta = NULL;
        
        if($error != null)
        {
            switch($error)
            {
                case 1:
                    $meta = "Usuario o Contraseña Incorrecta";
                    break;
            }
        }
        
       
         
         $this->load->view(
                 "login/index" , 
                 array( 
                     "route" => $this->route,
                     "err"   => $meta
         ));
         
    }
    
    public function login()
    {

        $this->load->helper("setup");
   
        
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
            redirect("Dashboard/");
        }else
        {
            redirect("Login/index/1");
        }
        
        return;
        
    }
    
 

}
