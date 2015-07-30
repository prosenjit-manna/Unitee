<?php


/**
 * @version 1.0
 * @author Rolando Arriaza
 * @copyright (c) 2015, Lieison
 * @todo Controlador del dashboard en general 
 * **/

class Dashboard extends CI_Controller {
    
    
    public function __construct() {
        parent::__construct();
        
        $this->load->library("session");
        $this->load->library("base_url");
        
       //$this->session->unset_userdata('user');  
        
        
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
    
    
    public function index( $model = NULL , $location = NULL){
           
        $this->load->view("dashboard/header");
        
        if($model === NULL){
             $this->load->view("dashboard/main");
        }
        else
        {
            if($location === NULL)
            {
                $this->load->model($model);
            }
            else
            {
                $this->load->model("$location/$model");
            }
            
            $this->$model->_init();
        }
        
        $this->load->view("dashboard/footer");
        
        
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
    
    
    public function modulos(){
        
        $this->load->library("plugin");
        $re = $this->plugin->_install("pruebas" , "prueba_controller");
        if($re){
            echo "INSTALACION REALIZADA";
        }
      

    }
    
}
