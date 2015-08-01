<?php

class Plugin {
    
    
    var $class = NULL;
    
    public function __construct() {
        $this->class = &get_instance();
        $this->class->load
                ->model("plugin/plugin_model");
    }
    
    public function Is_install($name , $controller  = NULL , $status = NULL){
            
        $ok = $this->class
                 ->plugin_model
                 ->search_plugin($name , $controller);
        
        if($ok){
            return TRUE;
        }

        return FALSE;

    }
    
    public function _descompress(){
        
        
        
    }
    
}