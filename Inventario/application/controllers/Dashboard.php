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
 * implementacion del controlador en dashboard 
 * 
 * la implementacion es realmente sencilla 
 *      
 *      al momento de generar la ruta  del modelo seria de esta forma
 *      para el modelo directo :  seria index/nombre_carpeta=nombre_model
 * 
 *      este tipo de enrutaje es unico al momento de procesar 
 * 
 *      EL MODEL DEL SISTEMA SE IMPLEMENTA CON UNA INTERFAZ 
 *      ESTO SERVIRA PARA ACTUALIZAR LOS MODULOS Y/O CREAR NUEVOS 
 * 
 *      
 *       
 * 
 */



class Dashboard extends CI_Controller {
    
    
    protected $route        = NULL;
    
    var $user_p             = NULL;


    public function __construct() {
        parent::__construct();
        
        $this->load->library("session");
        $this->load->library("base_url");
        $this->load->helper("setup");
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
        
        if(isset($this->session->block)){
            if($this->session->block === TRUE){
                redirect("Dashboard/blockscreen");
                return;
            }
        }
        
        $this->user_p = $this->session->user;
        
    }
    
    public function get_sidebar()
    {
         $this->load->model("system/sidebar_engine");
         $this->sidebar_engine->_echo();
         
    }
   
    
    public function index( $model = NULL){
      
     
        $vars =  array(   
               "route"                  => $this->base_url->GetBaseUrl(),
               "user_data"              => $this->user_p,
               "open_container"         => $this->OpenContainer(),
               "close_container"        => $this->CloseContainer()
        );
      

        if($model === NULL){
            
             $this->load->view("dashboard/header" , $vars );
             $this->load->view("dashboard/left_sidebar" , $vars);
             $this->load->view("dashboard/main" , $vars);
             $this->load->view("dashboard/footer" , $vars);
        }
        else
        {
            $parts = explode("=", $model);
            
            
            try{
                        
                if(sizeof($parts) == 1){
                    $model = $parts[0];
                    
                    if(!check_model($model)){
                       $this->load->view("errors/html/error_404" , $vars);
                       return;
                    }
                    
                    $this->load->model($model);
                    
                }
                else if(sizeof($parts) >= 2){
                    
                    $location = $parts[0] . "/" . $parts[1];
                    
                    if(!check_model($location)){
                       $this->load->view("errors/html/error_404" , $vars);
                       return;
                    }
                    
                    $this->load->model("$location");
                    $model = $parts[1];
                }
            
            } 
            catch (Exception $ex){
                trigger_error("Error Critico del sistema : " . $ex->getMessage());
            }
            
            
          
            
            $class_implement = class_implements($this->$model);
            
            if(sizeof($class_implement) == 0 ){
                $this->load->view("errors/html/error_404" , $vars);
                return;
            }
            
            $privs          = $this->$model->_rols();
            $priv_flag      = FALSE;
            if($privs != NULL){
                if(is_array($privs)){
                    foreach ($privs as $p){
                        if(strcmp($this->session->user['rol_name'], $p) === 0){
                           $priv_flag = TRUE;
                        }
                        else if($this->session->user['rol_nivel'] == $p){
                           $priv_flag = TRUE;
                        }
                    } 
                }else if(is_string($privs)){
                    $parts  = explode(",", $privs);
                    foreach ($parts as $p){
                        if(strcmp($this->session->user['rol_name'], $p) === 0){
                           $priv_flag = TRUE;
                        }
                        else if($this->session->user['rol_nivel'] == $p){
                           $priv_flag = TRUE;
                        }
                    }
                }
            }else if($privs === NULL){ $priv_flag = TRUE; }
            
            if(!$priv_flag){
                $this->load->view("errors/html/error_permissions");
                return;
            }
            
            $header_dependence = $this->$model->_css();
            if(!is_null($header_dependence)){
                 if(is_array($header_dependence)){
                     $vars["styles"] = $header_dependence;
                 }else{
                     $vars["styles"] = array($header_dependence);
                 } 
            }
            
            $vars['title'] = $this->$model->_title();
            
            $this->load->view("dashboard/header" , $vars );
            $this->load->view("dashboard/left_sidebar" , $vars);
            
            $footer_dependencies = $this->$model->_js();
            
            if(!is_null($footer_dependencies)){
                 if(is_array($footer_dependencies)){
                     $vars["javascript"] = $footer_dependencies ;
                 }else{
                     $vars["javascript"] = array($footer_dependencies);
                 }
            }
            
            $javascript_loaders    = $this->$model->_jsLoader();
            if(!is_null($javascript_loaders) && is_array($javascript_loaders)){
                $vars["js_loader"] = $javascript_loaders;
            }

            $this->$model->_init();
            
            $this->load->view("dashboard/footer" , $vars );
           
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
    
    public function blockscreen($block = true ){
        if($block){
            echo "VISTA DEL BLOQUEO ... COMMING SOON";
            return;
        }
        else
        {
            $pass = isset($_REQUEST['password']) ? : NULL;
            if($pass === NULL)
            {
                echo "view please";
            }
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
    
    public function getsession(){
        echo "<pre>";
        print_r($this->session->user);
        echo "</pre>";
    }
    
    
    private function OpenContainer(){
        return '<div class="page-container">';
    }
    
    private function CloseContainer(){
        return  "</div>";
    }
    
}
