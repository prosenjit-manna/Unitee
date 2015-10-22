
<?php

/**
   @@author: Rolando Arriaza 
   @@version: 1.5.8
 * @@type: system
 * @@name: Controlador de dashboard
 * @@description : el controlador mas importante del sistema MVA
 * @@id : system
 * 
 * ------------------------------------------------------------------------
 *                  LO NUEVO EN LAS VERSIONES
 * ------------------------------------------------------------------------
 * 
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * 
 * VERSION 1.5.1 : 
 *                  SE AGREGO LA VERIFICACION DE CONEXION A INTERNET 
 *                  SE AGREGO LA VISTA DE CONTROL DE CONEXION INTERNET
 * 
 * VERSION 1.5.2 :
 *                  SE ARREGLARON ERRORES DE SEGURIDAD Y FIABILIDAD
 * 
 * VERSION 1.5.3 :  
 *               
 *                  SE CREARON NUEVAS FUNCIONES , ESTAS FUNCIONES SON 
 *                  PARA NOTIFICACIONES.
 * 
 * VERSION 1.5.4 :
 *                  SE AGREGO EN EL INDEX LA FUNCION DE STOPWATCH 
 *                  ESTO SE PUEDE APRECIAR CON LA VARIABLE $ttl
 * 
 *                  SE ARREGLARON ALGUNOS BUGS
 *                  SE MODIFICO LA EL ALGORITMO DE INDEX EN PRO DE CARGA
 *                  DASHBOARD.
 * 
 *                  SE CREO UNA LIBRERIA QUE CONTROLA LOS PARAMETROS DE 
 *                  JAVASCRIPT , STYLE , TITLE TIPO INTERFAZ PERO SOLO 
 *                  PARA DASHBOARD.
 * VERSION 1.5.5 :
 *                  SE AGREGO EL SISTEMA DE URL ROUTES PARA MVA , 
 *                  SE CREO UNA CLAUSULA EN CODEIGNITER
 *                  DE LA ROUTA A ACEPTAR DADO EN EL PATRON PRETTY ROUTE
 * 
 * VERSION 1.5.6:
 *                - SE DEPRECO LA LIBRERIA dashboard_system
 *                 SE CREO LA INTERFACE DInterface Y SE AGREGO 
 *                 EL MODEL Main El cual es obligatorio para el 
 *                 sistema , este model controla la interface 
 *                 que permite ajustar los inicios constantes
 * 
 *               - NUEVO ALGORITMO DE RESOLUCION MVA
 * 
 * VERSION 1.5.7 :
 * 
 *              -OPERADOR DE RESOLUCION DE OBJETOS 
 *              -MEJORAS DE FIABILIDAD Y ESTABILIDAD
 * 
 * VERSION 1.5.8: 
 *          
 *              - MEJORA DE VELOCIDAD , CAMBIO DE VARIABLES PARTS EN ENTIDADES
 *              - USO DE EXPRESIONES LAMBDA PARA MEJOR COMPATIBILIDAD
 *              - COMPATIBILIDAD PARA SERVIDORES LAMP y XAMPP
 * 
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
    
    
    //RUTA PROTEGIDA VERSION 1.0.0
    protected $route        = NULL;
    
    
    //USUARIO VERSION 1.1.0
    var $user_p             = NULL;

    public function __construct() 
    {
        parent::__construct();
        
        //WELCOME TO MVA  ...
        
        $this->load->helper("setup");
        $this->load->library("session");
        $this->load->library("base_url");
        $this->load->library("system");
        $this->load->library("tools");
        $this->route = $this->base_url->GetBaseUrl();
        
        
        //AGREGAR EL TIMEZONE POR DEFECTO 
        //SE NECESITA PARA SERVIDORES CUYO TIMEZONES SON UTF
        $this->tools->default_timezone();
        
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
        
        
          /**
             * VERSION 1.5.5 SE AGREGO MVA ROUTES
             * LA CLASE MVA ROUTES ESTA DENTRO DE LIBRARY
          */
            
         $this->load->library("Routes"); // LIBRERIA ROUTES DE MVA 
         
         
         /**
          * ACA SE AGREGARAN LAS RUTAS DEL SISTEMA 
          * COMO ES UNA CLASE RECURSIVA PUEDE AGREGAR LOS 
          * "Set que sean necesarios" , SIEMPRE Y CUANDO 
          * SEA UNA MVA ROUTE
          **/
         $this->routes
                 ->Set("user=user_new" , "nuevo_usuario")
                 ->Set("user=user_edit" , "editar_usuario");
        
        
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
     * VERSION 1.5.5
     * 
     *          IMPLEMENTACION DE RUTAS ... O PRETTY ROUTES
     * 
     * 
     * **/
    
    public function index( $model = NULL )
    {
        
        error_reporting(0); //reporte de errores reportar todos los errores
        
        ob_start(); //bufer de salida inicio
        
        
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
        
        $init_time = $this->GetTime();
        
        
        //INTRODUCIDO EN LA VERSION 1.5.6
        $this->load->model("dashboard/main" , "main");
        
        
      
        //verifica si existe una conexion a internet , 
        //en dado caso no exista tira el error
        $conection = internet_conection();
        if(!$conection){
            $this->main->_500(array("route" => site_url()));
            return;
        }
        
        
        //verifica si existe un bloqueo de sesion 
        if(isset($_SESSION['block'])){
            if($this->session->block == TRUE){
                redirect("/block");
                return;
            }
        }
        
        
        /*
         * ESTABLECEMOS LOS NOMBRES DE LOS OBJETOS PARA LAS FUNCIONES 
         * DENTRO DEL HEADER , FOOTER ETC...
         * 
         * HAY QUE RECORDAR QUE EL MVA NECESITA UNAS VARAIBLES PREDEFINIDAS
         * LA VENTAJA QUE HOY SE PODRA ESTABLECER UN NOMBRE DISTINTA A ESAS VARIABLES
         * 
         * VERSION 1.5.7
         * **/
        
        //OBJETOS PREDEFINIDOS
        //SI LAS VARIABLES CAMBIAN SU NOMBRE CAMBIAR SU VALOR
        $this->main
                ->SetObject("route" , "route")
                ->SetObject("styles" , "styles")
                ->SetObject("user" , "user_data")
                ->SetObject("ajax" , "js_loader")
                ->SetObject("javascript" , "javascript")
                ->SetObject("title" , "title")
                ->SetObject("stopwatch" , "ttl");
        
        
        /***
         *  objetos que no son del todo necesario
         *  por ejemplo son objetos que dependen del view y del template
         * ****/
        
         $this->main->SetObject("copen", "open_container");
         $this->main->SetObject("cclose", "close_container");
         

        /**
         * 
         * Importante 
         * 
         * $vars :
         *          arreglo que contiene datos especificos que cargara 
         *          en todas las vistas , si se agrega un nuevo dato o parametro
         *          la variable de arreglo se encargara de cargarlo a la vista
         * **/
        
        $object                                     = $this->main->GetObject();
        
   
        $vars =  array(   
               $object->route                       => $this->base_url->GetBaseUrl(),
               $object->user                        => $this->user_p,
               $object->copen                       => '<div class="page-container">',
               $object->cclose                      => '</div>'
        );
      
        /**
         * Condicional :
         * 
         *          si el controlador no envia ningun dato entonces model = NULL
         *          carga el dashboard como por defecto.
         * 
         * **/
        
       

        if($model === NULL || $model == $this->main->Route()){
            
             //Libreria agregada en version 1.5.4 
             //DEPRECADA 1.5.6
             //$this->load->library("dashboard_system");
            
             /**
              * DASHBOARD SE HA TRANSFORMADO TIPO INTERFAZ PERO 
              * CON CIERTAS LIMITACIONES EN ELLA. SE AGREGO LA FUNCIONES 
              * QUE PERMITE AGREGAR MAS CSS , TITULO Y CARGA EN JAVASCRIPT 
              * ***/
             
             
             
             //VERSION 1.5.6 
             $vars[$object->styles]        = $this->main->CSS();
             $vars[$object->title]         = $this->main->TITLE();
             
             //INICIAMOS EL HEADER VERSION 1.5.6
             $this->main->Header($vars);
             
             //INICIAMOS LOS COMPLEMENTOS ANTES DEL MAIN EJEMPLO UN SIDEBAR 
             $this->main->Complements($vars);
             
             //$(document).ready() JAVASCRIPT CARGAS
             $vars[$object->ajax]     = $this->main->JS();
             
             //MAIN DEL DASHBOARD
             $this->main->Main($vars);
             
                //TTL O CRONOMETRO
                $ttl                             = round(($this->GetTime() - $init_time) , 6);
                $vars[$object->stopwatch]        = $ttl;
             
              //VISTA DEL FOOTER
             $this->main->Footer($vars);
             
             
        }
        else
        {
            
            //DIVIDIMOS EN PARTES LA RUTA POR MEDIO DEL TOKEN ASIGNADO

            //OBTENEMOS LA RUTA SEGUN EL VALOR DEL MODEL
            //VERSION 1.5.5
            $MVA_ROUTES     = $this->routes->Get($model); 
            
            
            
            // DECLARAMOS PARTS COMO NULL
            $parts          = NULL;  
            
            /***
             * PEQUEÑO CODIGO QUE VERIFICA SI EXISTE LA 
             * RUTA EN DADO CASO NO ES UNA RUTA Y ES UN MVA
             * VERSION 1.5.5
             * **/
            
            
            $cluser   = function() use (&$MVA_ROUTES , &$model , &$parts){
                $parts = !is_null($MVA_ROUTES) 
                        ? explode(system_token(), $MVA_ROUTES[$model]) 
                        : explode(system_token(), $model);
            };
            
            $cluser();

       
            try{
                
                //AGREGAMOS EL NOMBRE DEL MODEL ACTUAL
                $model = sizeof($parts) == 1 ? $parts[0] : $parts[1];
                
               
                //ALGORITMO CAMBIADO DESDE LA VERSION 1.5.7
                //BUG FIXED VERSION 1.5.8
                if(!check_model(sizeof($parts) == 1 
                        ? array($parts[0]) 
                        : array($parts[0] , $parts[1])))
                {
                        $this->main->_404($vars);
                        return;
                }
            
                //DEVUELVE EL MODEL CARGADO SIENDO UN DIRECTORIO O NO 
                $load_  = function () use (&$parts){
                      $this->load->model(
                              count($parts) == 1 ? $parts[0] 
                              : $parts[0] . "/" . $parts[1] 
                      );
                };
                
                //CARGAMOS LA FUNCION
                $load_();
                
               
               
 
            
            } 
            catch (Exception $ex){ //CONTROL DE EXCEPCIONES
                trigger_error("Error Critico del sistema : " . $ex->getMessage());
                $this->main->_404($vars);
                return;
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
                $this->main->_404($vars);
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
                $this->main->Header($vars );
                $this->main->Complements($vars);
                $this->main->Priv($vars);
                $this->main->Footer($vars);
                return;
            }
            
            //DEPENDENCIAS DEL CSS
            $header_dependence = $this->$model->_css();
            if(!is_null($header_dependence)){
                 if(is_array($header_dependence)){
                     $vars[$object->styles] = $header_dependence;
                 }else{
                     $vars[$object->styles] = array($header_dependence);
                 } 
            }
            
            //TITULO DEL HEADER 
            $vars[$object->title] = $this->$model->_title();
            
            //CARGA DE LAS VISTAS HEADER , SIDEBAR
            $this->main->Header($vars );
            $this->main->Complements($vars);
            
            //DEPENDENCIAS DEL JS
            $footer_dependencies = $this->$model->_js();
            
            
            //VERSION 1.1.0 -> 1.5.6
            if(!is_null($footer_dependencies)){
                 if(is_array($footer_dependencies)){
                     $vars[$object->javascript] = $footer_dependencies ;
                 }else{
                     $vars[$object->javascript] = array($footer_dependencies);
                 }
            }
            
            //TODO LO QUE CARGARA DENTRO DEL JQUERY.READY ...
            $javascript_loaders             = $this->$model->_jsLoader();
            
            if(!is_null($javascript_loaders) && is_array($javascript_loaders)){
                $vars[$object->ajax]        = $javascript_loaders;
            }

            //INICIAMOS EL MODELO 
            $this->$model->_init();
            
            //CARGAMOS EL FOOTER .. SOLO ESO FALTABA YEAH !!
            $ttl                                = round(($this->GetTime() - $init_time) , 6);
            $vars[$object->stopwatch]           = $ttl;
            
            //EJECUTANDO LA VISTA DEL FOOTER
            $this->main->Footer($vars);
           
        }
        
        ob_end_flush(); //bufer de salida
    }
    
    
    /****
     * @version 1.0
     * 
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
  
            if(sizeof($interfaz) >= 1){
                  /**EJECUTAMOS LA FUNCION DE LA INTERFAZ PARA LAS CARGAS DEL DASHBOARD*/
                try{
                    $executed[$m['name']] =  $this->$m['name']->_JSdashboard() != NULL ? TRUE : FALSE;
                }
                catch (Exception $ex){
                    trigger_error($ex->getMessage());
                }
                 
            }
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
    
    
    
    /***
     * VERSION 1.5.6
     * AGREGA UNA RUTA DEL MVA
     * **/
    public function PushRoutes($name , $model)
    {
        if($this->user_p == NULL) {
            return NULL;
        }
        
        $this->load->library("Routes");
        $this->routes->Push($model , $name);
        
        return TRUE;
        
    }
    
    
    /**
     * Controlador de descarga de archivos 
     * VERSION 1.5.8
     * 
     * INPUTS 
     *
     * GET METHOD :
     *          -variables mediantes el metodo get
     *          - nombres:
     * 
     *                      dir  = string
     *                      file = string
     *                      name = string
     *                      ext  = string
     *           ejemplo:  ?dir=files/location/directory
     *                     ?file=xhrgrd
     *                     ?name=hello.png
     *                     ?ext=png
     *      SI ?name conlleva la extension no es necesario utilizar la variable ext
     *          en el input get
     * 
     * CONTROLLER METHOD:
     * 
     *          similar al metodo get sus variables se representan dentro de los 
     *          parametros de la funcion Download    
     * 
     *          Obtencion de parametros mediante Url
     *          
     *          http://domain.com/Dashboard/Download/$dir/$file/$name/$extend
     * 
     *          $dir = directorio donde se aloja el archivo 
     *                  
     *                  por terminos de seguridad en url parse 
     *                  el caracter "/" se remplazara por "="
     *                  entonces como quedara la ruta del archivo 
     * 
     *                  ruta normal files/data/provider/
     *                      
     *                       nueva ruta files=data=provider
     */
    
    public function Download(
            $directory = NULL , 
            $file = NULL , 
            $name = NULL , 
            $extend = NULL)
    {
         
         $_dir      = isset($_REQUEST['dir']) ? $_REQUEST['dir'] : $directory;
         $_file     = isset($_REQUEST['file']) ? $_REQUEST['file'] : $file;
         $_name     = isset($_REQUEST['name']) ? $_REQUEST['name'] : $name;
         $_extend   = isset($_REQUEST['ext']) ? $_REQUEST['ext'] : $extend;
         
         if(is_null($_dir) && is_null($_file)) { return null; }
         
         $token     = "=";
         $_dir      = explode($token, $_dir);
         
         if(is_array($_dir)){
             if(count($_dir) == 1){
                 $_dir = $_dir[0];
             }
             else{
                 $_dir = implode("/", $_dir);
             }
         }
         
         $name_flag     = FALSE;
         
         if(!$_name == NULL){
             $name_flag = TRUE;
         }
         
         if(is_null($_extend)){
             
             $e = explode(".", $_file);
             if(is_array($e) && count($e) > 1 ){
                 $_extend   = $e[1];
                 $_file     = $e[0];
                 
             }
             else if($name_flag)
             {
                $e          = explode(".", $_name);
                if(is_array($e) && count($e) > 1){
                    $_extend = $e[1];
                    $_name   = $e[0];
                } 
             }
         }
         
         if($extend == NULL){
             $this->output
                     ->set_output(FALSE);
             return;
         }
         
        
        $this->load->helper("url");
         
        $uri    = base_url("$_dir/$_file.$extend");
        
        header("Content-disposition: attachment; filename=" .
                $name_flag == TRUE ? $name .  "." . $extend : $file . "." . $extend );
        header("Content-type: application/octet-stream");
        readfile($uri);
        
    }
    
    
    public function plugins(){
        $this->load->library("plugin");
        echo "<pre>" , print_r($this->plugin->_show()) , "</pre>";
    }
    
   

    /**
     * @version 1.0.0
     * @todo esta funcion controla todos los test del sistema 
     *        en pocas palabras sirve para testear pequeños codigos 
     * 
     * valor :   http://domain/Dashboard/test       ->SIMPLE
     *           http://domain/test                 ->ROUTE  
     * 
     * **/
    public function test(){
       
         
    }
    
    
     
    public function getsession(){
        echo "<pre>";
        print_r($this->session->user);
        echo "</pre>";
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
       
        $this->output->set_output(
                json_encode(array(
                    "count"     => $count,
                    "data"      => $data
            )));
     
       
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
    
    
    
    
   /**
    * --------------------------------------------------------------------------
    * 
    * FUNCIONES PRIVADAS DENTRO DEL CONTROLADOR 
    * ESTAS FUNCIONES SE ACTIVAN EN LAGUNA PARTE DE LAS FUNCIONES 
    * PUBLICAS DENTRO DEL CONTROLADOR , ELIMINARLAS SIN CONSENTIMIENTO 
    * DEL ARQUITECTO DE SOFTWARE PUEDE PROBOCAR SEVEROS DAÑOS AL SISTEMA
    * 
    * 
    * @version 1
    * @author Rolando Arriaza
    * 
    * --------------------------------------------------------------------------
    * **/
    
    
   /**
    * @author Rolando Arriaza 
    * @todo devuelve un valor predeterminado de tiempo en nanosegundos
    * @test pi*3
    */
   private function GetTime(){
        list($usec, $sec) = explode(" ",microtime()); 
        return ((float)$usec + (float)$sec); 
   }
    

   
    
}




