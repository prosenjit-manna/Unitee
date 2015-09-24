<?php

get_instance()->load->interfaces("DInterfaces");

class Main extends CI_Model implements DInterfaces {
    
    protected $HEADER_NAME      = "dashboard/header";
    protected $FOOTER_NAME      = "dashboard/footer";
    
    
    private  $MainObject        = NULL;

    public function __construct() {
       parent::__construct();
       
       $this->MainObject = new stdClass();
       
       $this->MainObject->Header  = $this->HEADER_NAME;
       $this->MainObject->Footer  = $this->FOOTER_NAME;
      
       
    }

   public function Complements($args = NULL) {
         $this->load->view("dashboard/left_sidebar", $args);
   }

    public function Footer($args = NULL) {
         $this->load->view("dashboard/footer" , $args);
    }

    public function Header($args = NULL) {
          $this->load->view("dashboard/header" , $args);
    }

    public function Main($args = NULL) {
         $this->load->view("dashboard/main" , $args);
    }

    public function Route() {
         return "main";
    }

    public function CSS() {
        
    }

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
    

    public function TITLE($title = NULL) {
        return is_null($title) ?  "Unitee | Dashboard" : $title;
    }

    public function _404($args = NULL) {
        $this->load->view("errors/html/404" , $args);
    }

    public function _500($args = NULL) {
        $this->load->view("errors/html/noconnect" , $args);
    }

    public function Priv($args = NULL) {
        $this->load->view("errors/html/error_permissions", $args);
    }

    public function GetObject() {
        return $this->MainObject;
    }

    public function SetObject($name, $data) {
        
        if ($name == null || $data == null) {
            return $this;
        }

        $this->MainObject->$name = $data;
        return $this;
    }

}
