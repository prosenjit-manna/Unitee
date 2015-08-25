<?php


class Productos extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
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
    
     public function generate_sku(){
     
             $sku   = $this->New_producto->generate_sku();  
            echo json_encode($sku);
           
    }
    
     public function New_Product(){
        
        
        $nombre        = $_REQUEST['txt_nombre'];
        
        $color         = isset($_REQUEST['txt_color']) ?  $_REQUEST['txt_color'] : NULL;
        $margen        = $_REQUEST['txt_margen'];
        $unidad        = isset($_REQUEST['txt_unidad']) ?  $_REQUEST['txt_unidad'] : NULL;
        $descripcion   = $_REQUEST['txt_descripcion'];
        
        $precio        = $_REQUEST['txt_precio'];
        $cantidad      = $_REQUEST['txt_cantidad'];
        
        $sku           = $_REQUEST['txt_sku'];
        
      
       
       $ok = $this->New_producto->new_product($nombre,$color ,
               $margen,$unidad , $sku ,
               $descripcion , $precio , 
               $cantidad);
       
       if($ok){
           redirect("/0/productos=new_producto?err=0");
           return;
       }else{
           redirect("/0/productos=new_producto?err=1");
           return;
       }
        
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
