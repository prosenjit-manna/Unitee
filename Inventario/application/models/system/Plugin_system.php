
<?php

get_instance()->load->interfaces("Interface");

class Plugin_system extends CI_Model implements PInterface {

    var $route      = NULL;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        
        $this->load->library("base_url");
        $this->load->library("plugin");
        
        $this->route = $this->base_url->GetBaseUrl();
       
    }

    public function _css() {
        return array(
            $this->route . "assert/plugins/select2/select2.css",
            $this->route . "assert/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css",
            $this->route . "assert/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css",
            $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"
        );
    }

    public function _init() {

        $data = array(
            "data"      => $this->plugin->_show(),
        );

        $this->load->helper("form");
        $this->load->view("plugins/plugin_view", $data);
    }

    public function _js() {
        return array(          
            $this->route . "assert/plugins/select2/select2.min.js",
            $this->route . "assert/plugins/datatables/media/js/jquery.dataTables.min.js",
            $this->route . "assert/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js",
            $this->route . "assert/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js",
            $this->route . "assert/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js",
            $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"
        );
    }

    public function _jsLoader() {
        return array('InitPlugin();');
    }

    public function _rols() {
        
    }

    public function _title() {
        
    }

    public function _unistall() {
        //SISTEMA
    }

    public function _update() {
        
    }

    public function _install() {
        
    }

    public function _widgets() {
        
    }

    public function _operations() {
        
    }

    public function _Dashboard() {
        
    }

    public function _JSdashboard() {
        
    }

}

