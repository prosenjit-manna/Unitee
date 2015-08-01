<?php


/**
 * @version 1.0
 * @author Rolando Arriaza
 * @copyright (c) 2015, Lieison
 * @todo Controlador del dashboard en general 
 * **/


/**
 * Variables reservadas en la vista en general 
 * 
 * $style       = array(array(...) , array(...)) , array("link" => the_link , "stylessheet" => "stylessheet")
 * $js          = array(array(...) , array(...)) , array("link" => the_link );
 * $jquery_init = array("function1()" , "function2()" , ...);
 * $route       = String the_route
 * 
 * 
 */



class Dashboard extends CI_Controller {
    
    
    protected $route = NULL;


    public function __construct() {
        parent::__construct();
        
        $this->load->library("session");
        $this->load->library("base_url");
        $this->route = $this->base_url->GetBaseUrl();
        
        /**
         * Verifica si el usuario tiene una sesion 
         * en dado caso no exista tal sesion , debe ser retornado
         * al login
         * **/
        
        if(!is_array($this->session->user))
        {
            redirect("Login/");
            return;
        }
        
    }
    
    
    public function index( $model = NULL){
           
     
        
        if($model === NULL){
            
            
             $vars =  array(   
               "route" =>$this->base_url->GetBaseUrl()
             );
            
             $this->load->view("dashboard/header" , $vars );
             $this->load->view("dashboard/main" , $vars);
             $this->load->view("dashboard/footer" , $vars);
        }
        else
        {
            $parts = explode("=", $model);
             
            
            if(sizeof($parts) == 0){
                $this->load->model($parts[0]);
                $model = $parts[0];
            }
            else if(sizeof($parts) >= 1){
                $location = $parts[0] . "/" . $parts[1];
                $this->load->model("$location");
                $model = $parts[1];
            }
            
            $this->$model->_init();
        }
        
        
        
        
    }
    
    
    public function session($close = true)
    {
        
        /**
         * Elimina la sesion de forma general 
         * destruye la variable de session "user"
         */
        
        if($close){
              $this->session->unset_userdata("user");
              redirect("Login/");
              return;
        }

    }
    
    
    public function modulos($type = "install" ){
        
        if($type = "install"){
            $this->load->library("plugin");
            
        }
        
        
        $re = $this->plugin->Is_install("pruebas" , "prueba_controller");
        if($re){
            echo "INSTALACION REALIZADA";
        }
      

    }
    
}
