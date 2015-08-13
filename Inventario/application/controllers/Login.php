<?php

/**
   @@author: Lieison S.A de C.V
   @@version: 1.5
 * @@type: system
 * @@name: Controlador del login 
 * @@description : 
 * @@id : system
 */


class Login extends CI_Controller {
    
    
    private $route   = NULL;
    
    
    
    public function __construct() {
        parent::__construct();
        
        
        /**Carga de las librerias que utilizaremos para logueo*/
        
        $this->load->library("base_url");
        $this->load->helper("form");
        $this->load->library('base_url');
        $this->load->library("session");
        
        $this->route = $this->base_url->GetBaseUrl();
        
        
        /***
         * Verificamos si existe una sesion 
         * activa para llamar el dashboard
         */
        
        if(is_array($this->session->user))
        {
            redirect("/0/");
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

        /*
         * Esta funcion controla el logueo desde la entrada de datos 
         * hasta la salida de ella misma
         */
        
        
        $this->load->helper("setup"); // funciones de instalacion
    
        $user       = $_REQUEST['username']; 
        $password   = $_REQUEST['password'];
        
        $type       = "email"; // tipo inicial de datos email
    
        
        //si el usuario no es un correo se cambiara el tipo a user
        if(filter_var($user, FILTER_VALIDATE_EMAIL) == FALSE)
        {
            $type = "user";
        }
        
        //cargando el modelo de auth
        $this->load
             ->model("user/user_auth");
        
        $request =  $this->user_auth
                         ->Auth($user , $password , $type);
        
        
        //si el request existe entonces cargamos el dashboard
        if($request){
            redirect("/0/");
        }else
        {
            redirect("Login/index/1");
        }
        
        return;
        
    }
    
 

}
