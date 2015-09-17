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

class View_compra extends CI_Model implements PInterface {

    use PluginConfig;

    protected $model        = "view_compra";
    var $route              = null;

    public function __construct() {
        parent::__construct();

        $this->load->database();

        $this->_config = array(
            "version" => 1.0,
            "author" => "Lieison S.A de C.V",
            "type" => "plugin",
            "name" => "Ver Compras",
            "description" => "Modulo para ver compras",
            "id_model" => "003",
            "id_update" => "005",
            "update" => "",
            "license" => "",
            "controller" => "",
            "view" => "compra/compra_view"
        );

        $this->load->library("base_url");
        $this->route = base_url();
    }

    public function _css() {
        return array(
            $this->route . "assert/plugins/select2/select2.css",
            $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css",
            $this->route . "assert/plugins/clockface/css/clockface.css",
            $this->route . "assert/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css",
            $this->route . "assert/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css",
            $this->route . "assert/plugins/bootstrap-colorpicker/css/colorpicker.css",
            $this->route . "assert/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css",
            $this->route . "assert/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"
        );
    }

    public function _init() {
      $this->load->view("compra/compra_view");
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
        return array(
            $this->route . "assert/plugins/select2/select2.min.js",
            $this->route . "assert/plugins/datatables/media/js/jquery.dataTables.js",
            $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js",
            $this->route . "assert/system/table-managed.js",
            $this->route . "assert/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js",
            $this->route . "assert/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js",
            $this->route . "assert/plugins/clockface/js/clockface.js",
            $this->route . "assert/plugins/bootstrap-daterangepicker/moment.min.js",
            $this->route . "assert/plugins/bootstrap-daterangepicker/daterangepicker.js",
            $this->route . "assert/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js",
            $this->route . "assert/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js",
            $this->route . "assert/plugins/components-pickers.js"
        );
    }

    public function _jsLoader() {
        return array("buy_loader();","ComponentsPickers.init();");
    }

    public function _rols() {
        $this->load->model("system/permission_engine");
        $data = $this->permission_engine->_get(
                $this->model, MODEL, INT
        );
        return $data;
    }

    public function _title() {
        return "Unitee | Ver Compras";
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
    
    public function  Find($option , $value ){
          $query = "SELECT 
                        compras.id_compras as 'id',
                        compras.ref_factura as 'factura',
                        compras.PO as 'po',
                        compras.date as 'fecha',
                        concat(user.nombres , ' ' , user.apellidos) as 'user',
                        proveedor.nombre as 'proveedor',
                        adjunto.adjunto as 'adjunto'
                        FROM compras 
                        INNER JOIN proveedor ON proveedor.id_proveedor=compras.id_proveedor
                        INNER JOIN user on user.id_user=compras.id_user
                        INNER JOIN adjunto ON adjunto.id_adjunto=compras.id_adjunto
                   ";
                  
    }

}
