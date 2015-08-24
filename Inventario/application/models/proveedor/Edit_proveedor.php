<?php

/**
   @@author: Lieison S.A de C.V
   @@version: 1.2
 * @@update : lieison.com/unitee/update
 * @@type: plugin
 * @@name: nuevo_producto
 * @@parent: producto
 * @@description : modulo en el cual se encarga de crear un nuevo producto
 * @@id : _provider_001
 */


get_instance()->load->interfaces("Interface");
get_instance()->load->interfaces("PluginConfig");

class Edit_proveedor extends CI_Model implements PInterface{
    
    use PluginConfig;
    
    protected $model   = "edit_proveedor";


    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        
         $this->_config = array(
                "version"       => 1.0,
                "author"        => "Lieison S.A de C.V",
                "type"          => "plugin",
                "name"          => "Editar Proveedor",
                "description"   => "Modulo para editar proveedor",
                "id_model"      => "001",
                "id_update"     => "004",
                "update"        => "",
                "license"       => "",
                "controller"    => "",
                "view"          => "proveedor/proveedor_edit"
        );
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
        $this->load->model("system/permission_engine");
        $data = $this->permission_engine->_get(
                $this->model, 
                MODEL , 
                INT
         );
        return $data;
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

    public function _Getconfig() {
        return $this->_config;
    }

    public function _widgets() {
        
    }

}
