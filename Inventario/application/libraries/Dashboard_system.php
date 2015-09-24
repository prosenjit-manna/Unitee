<?php

/**
 * @deprecated since version 1.5.6
 * @todo dashboard system 
 * @version 0.1
 * 
 * **/
class Dashboard_system {
    
    public function __construct() {
        
    }
    
    public function _javascript(){
        
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
    
    public function _css(){
        
    }
    
    public function  _title(){
        return "Unitee | Dashboard";
    }
    
}
