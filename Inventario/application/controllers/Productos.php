<?php


class Productos extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_colors(){
     $this->load->model("productos/New_producto");
     $colores = $this->New_producto->get_colors();
        echo json_encode($colores);
        exit();   
    }
    
}
