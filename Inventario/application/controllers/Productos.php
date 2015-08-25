<?php


class Productos extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    
        $this->load->model("productos/New_producto");
     
    }
    
    public function get_colors(){
     
     $colores   = $this->New_producto->get_colors();  
     echo json_encode($colores);
           
    }
    
    public function get_unidad(){
     
     $unidades   = $this->New_producto->get_unidad();  
     echo json_encode($unidades);
           
    }
    
    public function delete_product(){
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;
        
        if(is_null($id)){
            echo FALSE;
            exit();
        }
        $this->load->model("productos/view_producto");
        echo $this->view_producto->delete_product($id);
        exit();
    }
}
