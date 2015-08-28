
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

class Conf_producto extends CI_Model implements PInterface{
    
    use PluginConfig;
    
    protected $model   = "conf_producto";

    var $route          = NULL;

    public function __construct() {

        
        $this->load->library("base_url");

        $this->route= base_url();

       parent::__construct();
       
       $this->_config = array(
                "version"       => 1.0,
                "author"        => "Lieison S.A de C.V",
                "type"          => "plugin",
                "name"          => "Configurar Producto",
                "description"   => "Modulo para editar producto",
                "id_model"      => "003",
                "id_update"     => "004",
                "update"        => "",
                "license"       => "",
                "controller"    => "",
                "view"          => "producto/producto_edit"
        );
       
       $this->load->database();

    }
    
    public function _css() {
       return array(
           $this->route . "assert/plugins/select2/select2.css",
           $this->route . "assert/plugins/bootstrap-colorpicker/css/colorpicker.css",
           $this->route . "assert/plugins/jquery-minicolors/jquery.minicolors.css",
           $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"

       );
    }

    public function _init() {
        $this->load->helper("form");
        
        $this->load->model("productos/new_producto");
        
        $colors         = $this->new_producto->get_colors();
        $unidad         = $this->new_producto->get_unidad();
        
        $data           = array(
              "colors"  => $colors,
              "unidad"  => $unidad
        );
        
        $this->load->view("producto/producto_conf" , $data);
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
        //ACA IRAN TODOS LOS JAVASCRIPT 
         return array(
            $this->route . "assert/plugins/select2/select2.min.js",
            $this->route . "assert/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js",
            $this->route . "assert/plugins/jquery-minicolors/jquery.minicolors.min.js",
            $this->route . "assert/plugins/components-form-tools.js",
            $this->route . "assert/plugins/components-form-tools2.js",
            $this->route . "assert/plugins/datatables/media/js/jquery.dataTables.js",
            $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"
       );
    }

    public function _jsLoader() {
         return array("ComponentsFormTools2.init();table_loader();");
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
        return "Unitee | Configuración de productos";
        
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
    
    public function save_( array $data , $type = "color"){
        
        switch ($type){
            case "color":
                $this->db->insert("color" , $data);
                return $this->db->insert_id();
            case "unit":
                $this->db->insert("unidad" , $data);
                return $this->db->insert_id();
        }
        
    }
    
    public function delete_($id , $type="color"){
        switch ($type){
            case "color":
                $this->db->delete("color" , array("id_color" => $id));
                break;
            case "unit":
                $this->db->delete("unidad" , array("id_unidad" => $id));
                break;
        }
    }
   

}

