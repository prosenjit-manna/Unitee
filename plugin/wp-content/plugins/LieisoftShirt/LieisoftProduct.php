<?php

defined("LS_PLUGIN_DIR") or define("LS_PLUGIN_DIR", plugins_url("/" . LS_NAME .  "/"));

class ls_product {
    
    
    function __construct() {
        
    }
    
    function get_deadline_byId($id){
        
       wp_register_script("count", LS_PLUGIN_DIR . "plugins/countdown/jquery.countdown.js" );
       
       wp_enqueue_script('jquery' );
       wp_enqueue_script('count' );
        
       include 'front_deadline_product.php';
        
    }
  
}

