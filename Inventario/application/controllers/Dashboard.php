
<?php

/**
   @@author: Lieison S.A de C.V
   @@version: 1.5
 * @@type: system
 * @@name: Controlador de dashboard
 * @@description : el controlador mas importante del sistema
 * @@id : system
 */



class Dashboard extends CI_Controller {
    
    
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
    
    
    protected $route        = NULL;
    
    var $user_p             = NULL;

    public function __construct() 
    {
        parent::__construct();
        
        $this->load->helper("setup");
        $this->load->library("session");
        $this->load->library("base_url");
        $this->load->library("system");
        $this->route = $this->base_url->GetBaseUrl();
        
        /**
         * Verifica si el usuario tiene una sesion 
         * en dado caso no exista tal sesion , debe ser retornado
         * al login
         * **/
        
        /**
         * USO DE LA VARIABLE ?call=ALGO
         * 
         * obtenemos la URL que se ha colocado ejemplo:
         *          http://localhost/0/notification=view_notification
         * esto lo parte en :
         * 
         *          http://
         *          localhost/
         *          0/
         *          notification=view_notification
         * 
         * donde lo ultimo se tomara en cuenta para la nueva url despues de inicio de sesion
         * **/
        
        if(!is_array($this->session->user))
        {
            $url        = current_url();
            $exp        = explode("/0/", $url);

            redirect("Login/?call=" . end($exp));
            return;
        }
        
        //SESION DEL USUARIO ACTUAL ...
        $this->user_p = $this->session->user;
        
        
        
    }
    
    public function get_sidebar()
    {
         /**
          * Obtiene el sidebar por medio de un modelo 
          * dentro del sistema , ojo el sidebar _echo() 
          * hace un echo general , para peticiones de segundo plano con js
          */
        
         $this->load->model("system/sidebar_engine");
         $this->sidebar_engine->_echo();
    }
   
    /**
     * INDEX PRINCIPAL SU RUTA ES :
     * 
     *    $route['0']  = 'dashboard/index';
     *    $route['0/([a-z_-]+)' 
    .                   system_token() 
    .                   '([a-z_-]+)'] = 'dashboard/index/$1=$2';
     * 
     * 
     * **/
    
    public function index( $model = NULL)
    {
        
        /**
         * Documentacion acerca la logica del sistema dashboard/index 
         * 
         *  Rutas en las cuales se utilizaran: 
         *  $route['0/([a-z_-]+)=([a-z_-]+)']   = 'dashboard/index/$1=$2';
         *  $route['0']                         = 'dashboard/index';
         * 
         *  Esta funcion realiza lo que es el paradigma MVA (modelo vista adaptador)
         *  El controlador que estamos refiriendo lo transformaremos en adaptador
         * 
         *  las instrucciones que pasan por el filtro son las siguientes:
         * 
         *          patron : directorio/model == directorio=model == direcrorio(token)model
         *          patron : model == model 
         *  
         *  el primer patron es el mas importante ya que realiza una jerarquia 
         *          primer nivel : directorio (donde alojas el model)
         *          segundo nivel: model (nombre del modelo) 
         * 
         *   ejemplo : usuario=user_name / usuario = directorio / user_name = model
         * 
         */
        
        //verifica si existe una conexion a internet , 
        //en dado caso no exista tira el error
        $conection = internet_conection();
        if(!$conection){
            $this->load->view("errors/html/404" , array("route" => site_url()));
            return;
        }
        
        
        //verifica si existe un bloqueo de sesion 
        if(isset($_SESSION['block'])){
            if($this->session->block == TRUE){
                redirect("/block");
                return;
            }
        }

        
        /**
         * 
         * Importante 
         * 
         * $vars :
         *          arreglo que contiene datos especificos que cargara 
         *          en todas las vistas , si se agrega un nuevo dato o parametro
         *          la variable de arreglo se encargara de cargarlo a la vista
         * **/
     
        $vars =  array(   
               "route"                  => $this->base_url->GetBaseUrl(),
               "user_data"              => $this->user_p,
               "open_container"         => '<div class="page-container">',
               "close_container"        => '</div>'
        );
      
        /**
         * Condicional :
         * 
         *          si el controlador no envia ningun dato entonces model = NULL
         *          carga el dashboard como por defecto.
         * 
         * **/

        if($model === NULL){
            
             $this->load->view("dashboard/header" , $vars );
             $this->load->view("dashboard/left_sidebar" , $vars);
             
             /**
              * Peticiones generadas por el sistema que se cargaran en el dashboard
              * estas peticiones esta controladas unicamente por el sistema 
              * div de control <div id="request"></div>
              * dependencia de jtask + site_url()
              */
             $js_request        = 'var $peticiones = $("#request");'
                                . "var r = new Request('" . site_url() ."');"
                                . "r.password();"
                                . "";
             
             
             $vars['js_loader'] = array(
                 $js_request,
                 "widget_notification();" //    SOLO PARA UNITEE
             );
             
             $this->load->view("dashboard/main" , $vars);
             $this->load->view("dashboard/footer" , $vars);
        }
        else
        {
            
            //DIVIDIMOS EN PARTES LA RUTA POR MEDIO DEL TOKEN ASIGNADO
            $parts = explode(system_token(), $model);
            
       
            try{
                
                
                if(sizeof($parts) == 1){
                    //SI LAS PARTES SU TAMAÑO ES 1 ENTONCES 
                    $model = $parts[0];
                    
                    //VERIFICAMOS SI ES MODELO SIN UN DIRECTORIO EJEMPLO login.php
                    if(!check_model($model)){
                       $this->load->view("errors/html/404" , $vars);
                       return;
                    }
                    
                    //CARGAMOS EL MODELO SIN DIRECTORIO 
                    $this->load->model($model);
                    
                }
                else if(sizeof($parts) >= 2){
                    
                    
                    //EN DADO CASO EL MODELO CONTIENE UN DIRECTORIO
                    $location = $parts[0] . "/" . $parts[1];
                    
                    //SIEMPRE VERIFICAMOS SI ES UN MODELO ACTIVO 
                    if(!check_model($location)){
                       $this->load->view("errors/html/404" , $vars);
                       return;
                    }
                    
                    //CARGAMOS EL MODELO 
                    $this->load->model("$location");
                    $model = $parts[1];
                }
            
            } 
            catch (Exception $ex){ //CONTROL DE EXCEPCIONES
                trigger_error("Error Critico del sistema : " . $ex->getMessage());
            }
            
            
            //OTRO NIVEL DE SEGURIDAD ... 
            
            /**
             * como cada modelo que se carga necesita de una interfaz 
             * la interfaz esta desarrollada y agregada en interfaces 
             * se genera mediante un loader
             */
            
            //VERIFICAMOS SI SE IMPLEMENTA UNA INTERFAZ
            $class_implement = class_implements($this->$model);
            
            
            if(sizeof($class_implement) == 0 ){
                $this->load->view("errors/html/404" , $vars);
                return;
            }
            
            /**
             * Seguridad en los roles , quien ve el que ?
             *  ok : esta parte del codigo suele ser como que opcional 
             *       si el nivel de seguridad sea como de la udb 
             *  desarrollo:
             *        la interfaz _rols() se desarrolla con el fin 
             *        de limitar los accesos mediante obtencion de la url 
             *        la interfaz se puede programar de forma distinta siguien 
             *        patrones de diseño como un array() , string e incluso un db 
             */
                        
          
             
            
            //VERIFICA LOS PRIVILEGIOS ACTIVOS ... SI DEVUELVE NULL ENTONCES LA URL ES PUBLICA ... 
            
            $privs          = $this->$model->_rols();
            $priv_flag      = $this->system->VerifyPrivs($privs);
            
            //CONTROL DE PERMISOS SI NO EXISTEN ....
            if(!$priv_flag){
                $this->load->view("dashboard/header" , $vars );
                $this->load->view("dashboard/left_sidebar" , $vars);
                $this->load->view("errors/html/error_permissions", $vars);
                $this->load->view("dashboard/footer" , $vars);
                return;
            }
            
            //DEPENDENCIAS DEL CSS
            $header_dependence = $this->$model->_css();
            if(!is_null($header_dependence)){
                 if(is_array($header_dependence)){
                     $vars["styles"] = $header_dependence;
                 }else{
                     $vars["styles"] = array($header_dependence);
                 } 
            }
            
            //TITULO DEL HEADER 
            $vars['title'] = $this->$model->_title();
            
            //CARGA DE LAS VISTAS HEADER , SIDEBAR
            $this->load->view("dashboard/header" , $vars );
            $this->load->view("dashboard/left_sidebar" , $vars);
            
            //DEPENDENCIAS DEL JS
            $footer_dependencies = $this->$model->_js();
            
            
            if(!is_null($footer_dependencies)){
                 if(is_array($footer_dependencies)){
                     $vars["javascript"] = $footer_dependencies ;
                 }else{
                     $vars["javascript"] = array($footer_dependencies);
                 }
            }
            
            //TODO LO QUE CARGARA DENTRO DEL JQUERY.READY ...
            $javascript_loaders    = $this->$model->_jsLoader();
            if(!is_null($javascript_loaders) && is_array($javascript_loaders)){
                $vars["js_loader"] = $javascript_loaders;
            }

            //INICIAMOS EL MODELO 
            $this->$model->_init();
            
            //CARGAMOS EL FOOTER .. SOLO ESO FALTABA YEAH !!
            $this->load->view("dashboard/footer" , $vars );
           
        }
    }
    
    
    /****
     * FUNCION DEL CONTROLADOR QUE REALIZA PROCESOS
     * EN SEGUNDO PLANO DEL METODO INTERFACE
     * 
     * ****/
    public function LoadJs()
    {
        $this->load->library("plugin");
        $models     = $this->plugin->model_;
        
        $executed   = [];
        
        foreach ($models as $m){
            
            /**CARGUEMOS EL MODELO**/
            $this->load->model($m['init']);
            
            /**VERIFICAMOS SI EXISTE UNA INTERFAZ**/
            $interfaz   = class_implements($this->$m['name']);
            
            if(sizeof($interfaz) == 0){
                continue;
            }
            
            /**EJECUTAMOS LA FUNCION DE LA INTERFAZ PARA LAS CARGAS DEL DASHBOARD*/

            $executed[$m['name']] =  $this->$m['name']->_JSdashboard() != NULL ? TRUE : FALSE;
            
        }
        
        echo "<pre>" , print_r($executed) , "</pre>";
        
    }
    
    
    /***
     * CONTROLADOR DE CIERRE DE SESION
     * **/
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
    
    
    /***
     * CONTROLADOR BLOQUEO DE PANTALLA
     * 
     * $route['block'] = "dashboard/blockscreen";
     * 
     * **/
    public function blockscreen()
    {
            $this->session->block = TRUE;
            $this->load->helper("form");
            $this->load->view("lock/lock" ,
                    array(
                        "route"                  => $this->route ,
                        "user_data"              => $this->user_p,
                    ));
    }
    
    
    /***
     * DESBLOQUEO DE PANTALLA 
     * 
     *      $route['unlock'] = "dashboard/unlock";
     * **/
    public function unlock()
   {
        
        
          //VERIFICAR SI EXISTE UN PASSWORD EN EL REQUEST DEL FORM 
           if(!isset($_REQUEST['password'])){
                redirect("/block?err=1");
                return;
           }
           
          
            $this->load->helper("form");
            $pass = $_REQUEST['password'];
            
            if($pass == NULL || $pass == "")
            {
                redirect("/block?err=1");
                return;
            }
            
            //VERIFICAMOS LA ENCRIPTACION 
            $this->load->library("encryption");
            $this->load->helper("setup");
            
            $this->encryption->initialize(
             array(
                'cipher'    => 'aes-256',
                'mode'      => 'cbc',
                'key'       => get_key()
            ));
            
            $current_password   = $this->encryption
                                       ->decrypt
                                (
                                    $this->session
                                         ->user['password']
                                );
            
            
            if(strcmp($current_password, $pass) == 0){
                 $this->session->block = FALSE;
                 redirect("/0/");
                 return;
            }else{
                redirect("/block?err=1");
                return;
            }

    }
    
    
    
    public function modulos(){
        $this->load->library("plugin");
        echo "<pre>" , print_r($this->plugin->_show()) , "</pre>";
    }
    
    public function getsession(){
        echo "<pre>";
        print_r($this->session->user);
        echo "</pre>";
    }

    public function test(){
         //$this->load->library("notifications");
         echo "<pre>" , print_r($result) , "</pre>";
        
    }
    
    
    /**
     * FUNCIONES META DENTRO DEL CONTROLADOR DASHBOARD
     * 
     * LAS FUNCIONES META SON GENERICAS:
     * 
     * ****/
    
    
    /**
     * ESTA FUNCION SOLO DEBE DE UTILIZAR EN UNA PETICION DE TAREA 
     * SEGUNDO PLANO SEA CON JTASK O AJAX 
     * YA QUE SE NECESITA UNA VARIABLE TIPO POST O GET 
     * Y DEVUELVE UN ECHO EN FORMATO JSON.
     */
    public function getmeta(){
        $key = isset($_REQUEST['key']) ? $_REQUEST['key']: NULL;
        if(is_null($key)) echo false;
        $this->load->library("metadata");
        $result = $this->metadata->GetMeta($key);
        echo json_encode($result);
    }
    
    
    /***
     * REGION DE NOTIFICACIONES 
     *  CONTROLADORES NECESARIOS PARA LA NOTIFICACIONES 
     * 
     * ***************/
    
    
    
    public function get_notification($all = FALSE){
        
        
        /*******
         * ESTA FUNCION SOLO SE PUEDE UTILIZAR EN AJAX O JTASK 
         * OBTIENE LAS NOTIFICACIONES POR MEDIO DE LA LIBRERIA 
         * "Notifications"
         * GENERA UN ECHO EN LA CUAL CODIFICA UN JSON 
         * CUYO TIENE DOS OBJETOS 
         * 
         * PRIMER OBJETO : UN CONTEO DE LAS NOTIFICACIONES
         * SEGUNDO OBJETO : UN ARREGLO DE OBJETOS EN LA CUAL TIENE LAS NOTIFICACIONES
         * *********/
       
        $this->load->library("notifications");
        $data   = $this->notifications->GetNofication(0 , $all);
        $count  = sizeof($data);
       
        echo json_encode(array(
            "count"     => $count,
            "data"      => $data
        ));
       
    }
    
    public function verify_notification(){
        
        $id         = isset($_REQUEST['id'] ) ? $_REQUEST['id']:NULL;
        $redirect   = isset($_REQUEST['redirect'] ) ? $_REQUEST['redirect']:NULL;
        
        $this->load->library("notifications");
        $this->load->library("base_url");
        
        $this->notifications->IsRead($id ,TRUE );
        
        redirect("/0/" . $redirect);
        
        return;
        
    }
    
    public function read_notification(){
        $id         = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;
        $state      = isset($_REQUEST['state']) ? $_REQUEST['state'] : NULL;
        $this->load->library("notifications");
        $ok = $this->notifications->IsRead($id , $state);
        if($ok) { echo TRUE ; } else { echo FALSE;}
    }
    

   
    
}




