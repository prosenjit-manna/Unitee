
<?php

get_instance()->load->interfaces("Interface");

class Plugin_system extends CI_Model implements PInterface {

    var $count = 0;
    var $data = array();
    var $route = NULL;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("base_url");
        $this->route = $this->base_url->GetBaseUrl();
    }

    public function _css() {
        return array(
            $this->route . "assert/plugins/bootstrap-gtreetable/bootstrap-gtreetable.min.css"
        );
    }

    public function _init() {

        $data = array(
            "data"      => $this->data,
            "count"     => $this->count
        );

        $this->load->helper("form");
        $this->load->view("plugins/plugin_view", $data);
    }

    public function _js() {
        return array(
            $this->route . "assert/plugins/bootstrap-gtreetable/bootstrap-gtreetable.min.js",
            $this->route . "assert/system/table-tree.js"
        );
    }

    public function _jsLoader() {
        return array('TableTree.init();');
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

}

