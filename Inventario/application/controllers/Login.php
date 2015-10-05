<?php

/**
   @@author: Lieison S.A de C.V
   @@version: 1.1
 * @@type: system
 * @@name: Controlador del login 
 * @@description : 
 * @@id : system
 */


class Login extends CI_Controller {
    
    
    private $route   = NULL;
    
    private $call    = "";
    
    public function __construct() {
        parent::__construct();
        
        
        /**Carga de las librerias que utilizaremos para logueo*/
        
        $this->load->library("base_url");
        $this->load->helper("form");
        $this->load->library('base_url');
        $this->load->library("session");
        $this->load->helper("setup");
        
        $this->route = $this->base_url->GetBaseUrl();
        
        
        /***
         * Verificamos si existe una sesion 
         * activa para llamar el dashboard
         */
        
        $this->call = isset($_REQUEST['call']) 
                                ? $_REQUEST['call'] : NULL;
        
        if(is_array($this->session->user))
        {
            redirect("/0/" . $this->call);
            return;
        }
    }
    
    public function index($error = null ){
        
        
        //EN LA VERSION 1.1 SE AGREGO VERIFICAR LA CONEXION DE INTERNET
        $conection = internet_conection();
        if(!$conection){
            $this->load->view("errors/html/noconnect" , array("route" => site_url()));
            return;
        }

        //verificamos las metas
        $meta = NULL;
        
        //verificamos si existe algun error en el cual nos tenemos que dar cuenta
        if($error != null)
        {
            switch($error)
            {
                case 1:
                    $meta = "Usuario o Contraseña Incorrecta";
                    break;
            }
        }
        
         //cargamos la vista con todo lo necesario ... la ruta o route siempre es necesario
         $this->load->view(
                 "login/index" , 
                 array( 
                     "route" => $this->route,
                     "err"   => $meta,
                     "call"  => $this->call
         ));
        

         
         
    }
    
    public function login()
    {

        $this->call = isset($_REQUEST['call']) 
                                ? $_REQUEST['call'] : NULL;
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
        
        //verificamos si el usuario actual esta activado o no !!!
        if(is_array($request)){
            $request['route'] = $this->route;
            $this->load->view("login/desactivate" , $request);
            return;
        }
        
        //si el request existe entonces cargamos el dashboard
        if($request){
             redirect("/0/" . $this->call);
        }else
        {
            redirect("Login/index/1");
        }
        
        return;
        
    }
    
 

}
