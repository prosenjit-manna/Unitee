<?php


defined("T_NAME") or define("T_NAME", "Lieisoft Design");
defined("T_SLUG") or define("T_SLUG", "ls-menu");
defined("T_ICON") or define("T_ICON",   
        get_site_url() . "/wp-content/plugins/" 
        . LS_NAME . "/img/kiwi.png");
/**
 * Funcion de creacion del menu en sidebar
 * como requerimiento se necesitan las definiciones 
 * que se encuentran arriba
 **/
if(!function_exists("Ls_menu")){
    function Ls_menu(){
    
        add_menu_page(
             T_NAME, 
             T_NAME,
             "manage_options", 
             T_SLUG, 
             "ls_options",
             T_ICON
        );
    
        add_submenu_page(T_SLUG, "Options", "Options", "manage_options", "ls-sub-options", "ls_options");
        add_submenu_page(T_SLUG, "Preview", "Preview", "manage_options", "ls-sub-preview", "ls_preview");
       // add_submenu_page(T_SLUG, "User Preview", "User Preview", "manage_options", "ls-sub-upreview", "ls_user_preview");
       // add_submenu_page(T_SLUG, "WC styles", "WC styles", "manage_options", "ls-sub-woocommerce", "woocommerce_design");
        
        
    }
}

