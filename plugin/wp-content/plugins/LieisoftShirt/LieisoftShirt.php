<?php

/*
Plugin Name: Lieisoft Unitee
Plugin URI: http://soft.lieison.com/plugins/
Description: Plugin para desarrollo camisas  Unitee
Version: 1.5
Author: Lieison Company 2015
Author URI: http://lieison.com/
License: EULA
*/

defined("LS_NAME") or define("LS_NAME", "LieisoftShirt");


/***
 * 
 * DEFINIMOS EL PATH INICIAL
 * 
 */

if (!defined( 'ABSPATH' ) ) {
        exit; 
}


/***
 * CLASE LS_TSHIRT
 * ESTA CLASE AYUDA A CONSTRUIR LA DATA DE ACUERDO LO DEMANDADO
 */


class LS_TSHIRT {
    
    public static $instance ;

    public function __construct() {
         $this->instance = $this;
    }

    public function install(){
       
        include plugin_dir_path( __FILE__ ) . 'include/menu.php';
        include plugin_dir_path( __FILE__ ) . 'include/database/create.php';
         
        //add_action('admin_init', 'register_script');
         add_action('admin_menu', 'Ls_menu');
  
         
         if(get_option("color_web_services") == null){
             add_option("color_web_services" , "http://");
         }
         if(get_option("style_web_services") == null){
             add_option("style_web_services" , "http://");
         }
         if(get_option("key_web_services") == null){
             add_option("key_web_services" , "No Key");
         }
         
             
        if(get_option("ls_stock_") == NULL)
        {
            add_option("ls_stock_", "In stock");
        }
        
        if(get_option("ls_outstock_") == NULL)
        {
            add_option("ls_outstock_", "Out Of Stock");
        }
        
        if(get_option("ls_campain_") == NULL)
        {
            add_option("ls_campain_", "End Campain");
        }
        
         
         
        
         ls_create_db();
         
    }
    
    
    
    
    public function set_webservices(array $data){
        
          if(!empty($data['color'])){
               update_option("color_web_services" , $data['color']);
          }
          if(!empty($data['style'])){
               update_option("style_web_services" , $data['style']);
          }
          if(!empty($data['key'])){
               update_option("key_web_services" , $data['key']);
          }
          
          return "Se han cambiado los datos con exito";
          
    }
   
  
}

function register_script() {
    wp_register_script('shirt', plugins_url('/js/roli.js', __FILE__));
}


if(!function_exists("ls_options")){

    function ls_options(){
         include 'include/settings/options.php';
    }
    
}

/**
 * Menu preview del tshirt
 */

if(!function_exists("ls_preview")){
    
    
    function ls_preview(){
       include 'front_design.php';
       $design->render(LS_CREATE);
    }
    
}


if(!function_exists("ls_user_preview")){
    
    function ls_user_preview(){
       include 'front_design.php';
       $design->update_render();
    }
    
}


/**
 * Menu preview wocommerce design
 */


if(!function_exists("woocommerce_design")){
    
    
    function woocommerce_design(){
       include 'front_design.php';
       $design->show_woocomerce_designs();
    }
    
}



/**
 * creando la funcion para shoertcode de tshirt  
 * en la cual mostrara el diseño y por ende el renderizado del canvas
 */

if(!function_exists("ls_short_code")){
    
    function ls_short_code($attr ){
       include 'front_design.php';
       $data = shortcode_atts(array(
           "width" => 800,
           "heigth" => 600
       ), $attr);
       
       $design->render( $data['width'] , $data['height']);
    }
    
}


if(!function_exists("ls_endtime_product")){
    
    
    function ls_endtime_product($attr ){
        
       include 'LieisoftProduct.php';

       $data = shortcode_atts(array(
           "id" => NULL
       ), $attr);

       $product = new ls_product();
       $product->get_deadline_byId($data['id']);
    }
    
}


if(!function_exists("ls_labels")){
    
    function ls_labels(){
        
     
        
        wp_register_script("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" );
        
        
        wp_enqueue_script("jquery");
        wp_enqueue_script("bootstrap");
        
             
        wp_register_style("bt1","//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" );
        wp_register_style("bt2","//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" );
       
        
        wp_enqueue_style("bt1");
        wp_enqueue_style("bt2");
     
        include plugin_dir_path( __FILE__ ) . "include/settings/labels.php";
    
    }
}



/***
 * -------------------------------------------------
 * Aca se agregaran los shortcodes 
 * -------------------------------------------------
 */


add_shortcode( 'ls_tshirt', 'ls_short_code' );
add_shortcode("ls_endtime", 'ls_endtime_product');


/*
 * Iniciando el constructor de la clase 
 * aplicando globales  para tshirt
 */


LS_TSHIRT::$instance = new LS_TSHIRT();
$GLOBALS['ls_tshirt'] = LS_TSHIRT::$instance;
LS_TSHIRT::install();
