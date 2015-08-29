<?php

/**
   @@author: Lieison S.A de C.V
   @@version: 1.2
 * @@update : lieison.com/unitee/update
 * @@type: plugin
 * @@name: nuevo usuario
 * @@parent: user
 * @@description : modulo en el cual se encarga de crear un nuevo usuario 
 * @@id : _producto_001
 */


get_instance()->load->interfaces("Interface");
get_instance()->load->interfaces("PluginConfig");

class Edit_producto extends CI_Model implements PInterface{
    
    use PluginConfig;
    
    protected $model   = "edit_producto";

    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        
         $this->_config = array(
                "version"       => 1.0,
                "author"        => "Lieison S.A de C.V",
                "type"          => "plugin",
                "name"          => "Editar Producto",
                "description"   => "Modulo para editar producto",
                "id_model"      => "003",
                "id_update"     => "004",
                "update"        => "",
                "license"       => "",
                "controller"    => "",
                "view"          => "producto/producto_edit"
        );
    }
    
    public function _css() {
        //ACA IRAN TODOS LOS CSS 
    }

    public function _init() {
        $this->load->helper("form");
       
        $this->load->model("productos/View_producto");
        
        $id         = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;
        
        if(is_null($id)){
             $this->load->view("dashboard/main");
             return;
        }
        $data       = $this->View_producto->get_product($id);
        
        $this->load->view("producto/producto_edit" , array("data" => $data));
        
       
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
        //ACA IRAN TODOS LOS JAVASCRIPT
    }

    public function _jsLoader() {
      return array("load_colors();","load_unidad();","validate_price();"
             ,"validate_cantidad();","validate_margen();");
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
        return "Unitee | Editar productos";
        
    }

    public function _update() {
        //ACTUALIZACION DEL MODULO UPDATE
    }


    public function _unistall() {
        //DESISTALACION 
    }

    public function _Getconfig() {
        return $this->_config;
    }

    public function _widgets() {
        
    }
    
    public function update_product($id ,
               $nombre , $color , $margen , $unidad,
               $descripcion , $precio , $cantidad , $sku){
               $this->db->where(array("	id_producto" => $id ));
                  return $this->db->update(
                "producto" , 
                array("id_unidad"  => $unidad , 
                      "descripcion" => $descripcion,
                      "cantidad" => $cantidad,"sku" => $sku,
                      "margen" => $margen, "nombre" => $nombre ,
                      "id_color" => $color, "precio_est_unidad" => $precio ));
    }

    public function _operations() {
        
    }

}
   