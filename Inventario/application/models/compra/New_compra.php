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

class New_compra extends CI_Model implements PInterface {

    use PluginConfig;

    protected $model = "new_compra";
    var $route = null;

    public function __construct() {
        parent::__construct();

        $this->load->database();

        $this->_config = array(
            "version" => 1.0,
            "author" => "Lieison S.A de C.V",
            "type" => "plugin",
            "name" => "Nueva Compra",
            "description" => "Modulo para agregar nuevas compras",
            "id_model" => "003",
            "id_update" => "005",
            "update" => "",
            "license" => "",
            "controller" => "",
            "view" => "compra/compra_new"
        );

        $this->load->library("base_url");
        $this->route = base_url();
    }

    public function _css() {
        return array(
            $this->route . "assert/plugins/select2/select2.css",
            $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css",
            $this->route . "assert/plugins/fileinput/css/fileinput.css",
        );
    }

    public function _init() {
            
         $this->load->model("proveedor/view_proveedor" , "prov");
         $this->load->model("productos/view_producto" , "prod");
         $this->load->view("compra/compra_new" , array(
             "prov"     => $this->prov->get_Allproviders(),
             "prod"     => $this->prod->get_products()
         ));
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
        return array(
            $this->route . "assert/plugins/select2/select2.min.js",
            $this->route . "assert/plugins/datatables/media/js/jquery.dataTables.min.js",
            $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js",
            $this->route . "assert/plugins/table-editable.js",
            $this->route . "assert/plugins/fileinput/js/fileinput.js",
        );
    }

    public function _jsLoader() {
        return array("table_loader();","TableEditable.init();" ,"FormFileUpload.init();" );
    }

    public function _rols() {
        $this->load->model("system/permission_engine");
        $data = $this->permission_engine->_get(
                $this->model, MODEL, INT
        );
        return $data;
    }

    public function _title() {
        return "Unitee | Nueva Compra";
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

    public function _operations() {
        $this->load->model("system/permission_engine", 'engine');
        $data = $this->engine->GetOperationRoles($this->model);
        return $data;
    }

    public function _Dashboard() {
        
    }

    public function _JSdashboard() {
        
    }

}
