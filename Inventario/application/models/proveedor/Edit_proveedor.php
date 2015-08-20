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

class Edit_proveedor extends CI_Model implements PInterface{
    
    
    protected $model   = "edit_proveedor";


    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function _css() {
        //ACA IRAN TODOS LOS CSS 
    }

    public function _init() {
        $this->load->helper("form");
        
        $id         = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;
        
        if(is_null($id)){
             $this->load->view("dashboard/main");
             return;
        }
        
        $this->load->model("proveedor/view_proveedor");
        
        $data       = $this->view_proveedor->get_provider($id);
        
        $this->load->view("proveedor/proveedor_edit" , array("data" => $data));
       
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
        //ACA IRAN TODOS LOS JAVASCRIPT
    }

    public function _jsLoader() {
        return array("load_paises();");
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
    
    public function update_provider( $id  ,$nombre , $descripcion ){
       $this->db->where(array("id_proveedor" => $id ));
       return $this->db->update(
                "proveedor" , 
                array("nombre"  => $nombre , "descripcion" => $descripcion));
    }
  
    

}
