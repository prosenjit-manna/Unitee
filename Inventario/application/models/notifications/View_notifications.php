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

class View_notifications extends CI_Model implements PInterface {

    use PluginConfig;

    protected $model = "view_notifications";
    
    var $route = null;

    public function __construct() {
        parent::__construct();

        $this->load->database();

        $this->_config = array(
            "version" => 1.0,
            "author" => "Lieison S.A de C.V",
            "type" => "plugin",
            "name" => "Ver Notificaciones",
            "description" => "Modulo para ver notificaciones",
            "id_model" => "003",
            "id_update" => "005",
            "update" => "",
            "license" => "",
            "controller" => "",
            "view" => "notifications/notifications_view"
        );

        $this->load->library("base_url");
        $this->route = base_url();
    }

    public function _css() {
        return array(
            $this->route . "assert/plugins/select2/select2.css",
            $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css",
        );
    }

    public function _init() {
        
      $this->load->library("notifications");
      $notifications        = $this->notifications->GetNofication(0 , TRUE);
      $this->load->view("notifications/notifications_view" , array(
                        "notify"        => $notifications
      ));
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
        );
    }

    public function _jsLoader() {
        return array("table_loader();","TableEditable.init();","FormFileUpload.init();");
    }

    public function _rols() {
       //PARA TODA LA FAMILIA :)
    }

    public function _title() {
        return "Unitee | Ver Notificaciones";
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
        //OHHH NO HAY NADA XD
    }

    public function _operations() {
      //SIN OPERACIONES
    }

    public function _Dashboard() {
        //SIN INICIO EN DASHBOARD
    }

    public function _JSdashboard() {
        //SIN CARGA JS EN DASHBOARD
    }

}
