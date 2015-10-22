<?php

/**
 * @author Rolando Arriaza
 * @version 1.0
 * @todo Nueva interfaz para main o principio de dashboard 
 *        ya que mva no manejaba este principio 
 * 
 * SE CREO UNA INTERFACE EN LA CUAL TIENE FUNCIONES PREDEFINIDAS
 * ******/


get_instance()->load->interfaces("DInterfaces");

class Main extends CI_Model implements DInterfaces {
    
    protected $HEADER_NAME      = "dashboard/header";
    protected $FOOTER_NAME      = "dashboard/footer";
    
    
    private  $MainObject        = NULL;

    
    /**
     * @todo Contructor de la interfaz como model 
     */
    public function __construct() {
       parent::__construct();
       
       $this->MainObject = new stdClass();
       
       $this->MainObject->Header  = $this->HEADER_NAME;
       $this->MainObject->Footer  = $this->FOOTER_NAME;
      
       
    }

   /***
    * Complement es una funcion el la cual args 
    * obtiene los parametros de entorno variable para la vista
    * 
    * OJO COMPLEMENTS SOLO CARGA VISTAS O ALGUN OTRO ALGORITMO 
    * CUYO RESULTADO SIEMPRE SEA CARGAR UNA VISTA 
    * 
    * SE ENCARGA DE CARGAR VISTAS EN MEDIO 
    * EJEMPLO : PRIMERO SE CARGA EL HEADER 
    *                   LUEGO COMPLEMENT 
    *                   LUEGO MAIN 
    *                   LUEGO FOOTER
    * **/
   public function Complements($args = NULL) {
         $this->load->view("dashboard/left_sidebar", $args);
   }

   
    /**
     * FOOTER SE ENCARGA DE CARGAR EL PIE DE PAGINA EN GENERAL 
     * SIEMPRE DEBE SER UNA VISTA NO DEBE DE CARGAR NADA QUE NO SEA 
     * DE ESE AMBITO
     * ****/
    public function Footer($args = NULL) {
         $this->load->view("dashboard/footer" , $args);
    }

     /**
     * FOOTER SE ENCARGA DE CARGAR LA CABECERA DE PAGINA EN GENERAL 
     * SIEMPRE DEBE SER UNA VISTA NO DEBE DE CARGAR NADA QUE NO SEA 
     * DE ESE AMBITO
     * ****/
    public function Header($args = NULL) {
          $this->load->view("dashboard/header" , $args);
    }

     /**
     * FOOTER SE ENCARGA DE CARGAR LA PRINCIPAL O MAIN  DE PAGINA EN GENERAL 
     * SIEMPRE DEBE SER UNA VISTA NO DEBE DE CARGAR NADA QUE NO SEA 
     * DE ESE AMBITO
     * ****/
    public function Main($args = NULL) {
         $this->load->view("dashboard/main" , $args);
    }

     /**
     *NADA MAS QUE UNA RUTA COMO QUIERES QUE SE LLAME EL MAIN 
     * POR DEFECTO ES /0/ O /0/main
     * ****/
    public function Route() {
         return "main";
    }

     /**
      * CARGAMOS CSS
     * ****/
    public function CSS() {
        
    }

    /**
      * CARGAMOS JS DENTRO DEL DOCUMENT.READY FOOTER
     * ****/
    public function JS() {
          /**
              * Peticiones generadas por el sistema que se cargaran en el dashboard
              * estas peticiones esta controladas unicamente por el sistema 
              * div de control <div id="request"></div>
              * dependencia de jtask + site_url()
              */
        
        $system_ = 'var $peticiones = $("#request");'
                                . "var r = new Request('" . site_url() ."');"
                                . "r.password();"
                                . "";
        
        return array(
            $system_,
            "widget_notification();", 
            "widget_count_product();"
        );
    }
    

    /**
     * EL TITULO DENTRO DEL HEADER 
     * ****/
    public function TITLE($title = NULL) {
        return is_null($title) ?  "Unitee | Dashboard" : $title;
    }

    /**
      * CARGAMOS LOS 404
     * ****/
    public function _404($args = NULL) {
        $this->load->view("errors/html/404" , $args);
    }

    /**
      * CARGAMOS LOS ERRORES 500
     * ****/
    public function _500($args = NULL) {
        $this->load->view("errors/html/noconnect" , $args);
    }

    /**
      * CARGAMOS EL ERROR DE PRIVILEGIOS 
     * ****/
    public function Priv($args = NULL) {
        $this->load->view("errors/html/error_permissions", $args);
    }

    /**
      * RETORNAMOS EL STD CLASS OBJECT
     * ****/
    public function GetObject() {
        return $this->MainObject;
    }

    
    /**
      * AGREGAMOS NUEVOS OBJETOS DE CARGA
     * ****/
    public function SetObject($name, $data) {
        
        if ($name == null || $data == null) {
            return $this;
        }

        $this->MainObject->$name = $data;
        return $this;
    }

    public function _JSdashboard() {
        
    }

}
