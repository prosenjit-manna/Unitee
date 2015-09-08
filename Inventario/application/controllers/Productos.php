<?php


class Productos extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("productos/New_producto");
        $this->load->model("productos/Edit_producto");
     
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
    
    public function EditProduct(){
        
        $id            = $_REQUEST['the_id'];
        
        $nombre        = $_REQUEST['txt_nombre'];
        
        $color         = isset($_REQUEST['txt_color']) ?  $_REQUEST['txt_color'] : NULL;
        $margen        = $_REQUEST['txt_margen'];
        $unidad        = isset($_REQUEST['txt_unidad']) ?  $_REQUEST['txt_unidad'] : NULL;
        $descripcion   = $_REQUEST['txt_descripcion'];
        
        $precio        = $_REQUEST['txt_precio'];
        $cantidad      = $_REQUEST['txt_cantidad'];
        
        $sku           = $_REQUEST['txt_sku'];
        
       
       $ok = $this->Edit_producto->update_product($id ,
               $nombre , $color , $margen , $unidad,
               $descripcion , $precio , $cantidad , $sku);
   
        
       
        if($ok){
           redirect("/0/productos=view_producto?err=0");
           return;
       }else{
           redirect("/0/productos=view_producto?err=1");
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
    
    public function New_Color(){
        
        $name           = isset($_REQUEST['name']) ? $_REQUEST['name'] : NULL;
        $value          = isset($_REQUEST['value']) ? $_REQUEST['value'] : NULL;
        
        $this->load->model("productos/conf_producto" , 'conf');
        $id =  $this->conf->save_(array(
            "nombre"            => $name,
            "referencia"        => $value
        ));
        
        echo $id;
        exit();
        
    }
    
    public function New_Unit(){
        
        $name           = isset($_REQUEST['name']) ? $_REQUEST['name'] : NULL;
        
        $this->load->model("productos/conf_producto" , 'conf');
        $id =  $this->conf->save_(array(
            "nombre"            => $name,
        ), "unit");
        
        echo $id;
        exit();
        
    }
    
    public function delete_color(){
        $id           = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;
        
        $this->load->model("productos/conf_producto" , 'conf');
        $this->conf->delete_($id);
        exit();
    }
    
    public function delete_unit(){
        $id           = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;
        
        $this->load->model("productos/conf_producto" , 'conf');
        $this->conf->delete_($id , "unit");
        exit();
    }
    
    public function count_product(){
        $this->load->model("productos/view_producto" , "prod");
        $count = $this->prod->count_products();
        echo json_encode($count);
    }
    
    public function get_color_byName(){
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : NULL;
        if(is_null($name)){ echo NULL; }
        $this->load->model("productos/view_producto" , "prod");
        $data = $this->prod->get_colorByName($name);
        echo json_encode($data);
    }

    
}
