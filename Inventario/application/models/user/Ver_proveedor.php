<?php

/**
   @@author: Lieison S.A de C.V
   @@version: 1.2
 * @@update : lieison.com/unitee/update
 * @@type: plugin
 * @@name: nuevo usuario
 * @@parent: user
 * @@description : modulo en el cual se encarga de crear un nuevo usuario 
 * @@id : _provider_001
 */


get_instance()->load->interfaces("Interface");

class Ver_proveedor extends CI_Model implements PInterface{
    
    
    protected $model   = "ver_proveedor";


    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function _css() {
        //ACA IRAN TODOS LOS CSS 
    }

    public function _init() {
        $this->load->helper("form");
        $this->load->view("proveedor/proveedor_ver");
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
        //ACA IRAN TODOS LOS JAVASCRIPT
    }

    public function _jsLoader() {
        
    }

    public function _rols() {
       
    }

    public function _title() {
        return "Unitee | Ver Proveedor";
        
    }

    public function _update() {
        //ACTUALIZACION DEL MODULO UPDATE
    }


    public function _unistall() {
        //DESISTALACION 
    }
    
   