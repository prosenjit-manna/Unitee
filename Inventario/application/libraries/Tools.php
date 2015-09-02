<?php


class Tools {
    
    var $class      = NULL;
    
    public function __construct() {
        if(function_exists("get_instance"))
             $this->class = &get_instance();
        
    }
    
   
    public function __call($name, $arguments) {
        //NO CALLS 
    }
    
    
    /**
     * GET Y SET DE LA LIBRERIA TOOLS 
     * 
     * **/
    
    public function get(){
        return $this;
    }
    
    public function set(){
        return $this;
    }
    
    
   
}
