<?php

/**
   @@author: Lieison S.A de C.V
   @@version: 1.5
 * @@type: plugin
 * @@name: Controlador de Shop unitee
 * @@description : controlador de la tienda unitee en web services con wp 
 * @@id : _web_services_001
 */

class NockupShop  extends CI_Controller{
    
    
    protected $key  = "LieisoftApi";

    public function encrypt($enc)
    {
         $this->load->library("encryption");
         echo "<br>";
         $data =  $this->encryption->encrypt($enc);
         echo $data;
         echo "<br>";
         echo $this->encryption->decrypt($data);
         
    }

    public function __construct() {
        parent::__construct();
        $this->load->model("tshop/Unitee_plugin" , "unitee");
        $this->key = $this->unitee->get_privatekey();
    }
    
    public function index(){
        echo "Nothing do here ....";
        return null;
    }
    
    
    
    public function NonArticulos($private_key , $c = null){
        
         //CREAMOS UN HEADER AL MOMENTO DE HACER EL WEB SERVICES
         $this->output->set_header("Access-Control-Allow-Origin: *");
         
         //SI LA LLAVE PRIVADA NO ES IGUAL ENTONCES SALU
         if(!$this->get_key($private_key)) return NULL;
         
          //OBTENEMOS LOS ARTICULOS 
          $r = $this->unitee
             ->get_non_articulos();
        
          print json_encode($r);
    }
    
    public function Articulos($private_key , $id_articulo ,  $c = null){
        
        //CREAMOS UN HEADER AL MOMENTO DE HACER EL WEB SERVICES
        $this->output->set_header("Access-Control-Allow-Origin: *");
       
        //SI LA LLAVE PRIVADA NO ES IGUAL ENTONCES SALU
        if(!$this->get_key($private_key)) return NULL;
        
        //OBTENEMOS LOS ARTICULOS Y SUS VARIACIONES
        $r =  $this->unitee
             ->get_articulos($id_articulo);
        
       print json_encode($r);
        
    }
    
    
    public function GetSizes($private_key , $id_articulo , $id_variacion , $user_price , $c = NULL )
    {
        //CREAMOS UN HEADER AL MOMENTO DE HACER EL WEB SERVICES
        $this->output->set_header("Access-Control-Allow-Origin: *");
       
        //SI LA LLAVE PRIVADA NO ES IGUAL ENTONCES SALU
        if(!$this->get_key($private_key)) return NULL;
        
        //VERIFICAREMOS EL ARTICULO SELECCIONADO 
        
        $this->load->database();
        
        //QUERY ARTICULOS 
        $query = "SELECT talla , precio , referencia FROM articulos WHERE id_articulos LIKE ?";
        
        
        //QUERY ... RESULTADO
        $art   = $this->db
                ->query($query , array($id_articulo))
                ->result();
        
        
        
        //SI EL ARTICULO DEVUELVE NADA ....
        if(count($art) === 0) return NULL;
        
        
        $price      = $art[0]->precio;
        $tallas     = explode("-", $art[0]->talla);
        $ref        = $art[0]->referencia;
        
        
        //SEGUNDA SENTENCIA VERIFICAMOS LOS PRODUCTOS RELACIONADOS CON LOS ARTICULOS 
        $query = "SELECT
                    producto.nombre , 
                    producto.id_producto,
                    producto.descripcion,
                    producto.precio , 
                    producto.precio_est_unidad,
                    color.nombre as 'color',
                    color.id_color as 'id_color'
                    FROM producto 
                    LEFT JOIN color ON color.id_color=producto.id_color
                    WHERE producto.nombre LIKE '%$ref%';";
        
        
        
        //OBTENEMOS LA DATA 
        $prod       =  $this->db
                            ->query($query)
                            ->result(); 
        
        

        
       
        
        if(count($prod) === 0) return NULL;
        
        
        //PRECIO MINIMO DEL PRODUCTO A ENCONTRAR
      /*  $query     = "SELECT min(producto.precio) as 'minimo_precio' , "
                   . " min(producto.precio_est_unidad) as 'minimo_estimado'"
                   . " FROM producto  WHERE producto.nombre LIKE '%$ref%';";
        
        
        //PRECIO MINIMO ARREGLO 
        $min_price = $this->db
                        ->query($query)
                        ->result()[0];
        
        //OBTENCION DEL PRECIO MINIMO VS ESTIMADO ...
        $min_price  = $min_price->minimo_precio != 0 ? $min_price->minimo_precio 
                                                    : $min_price->minimo_estimado; 
        
       *
       */
        
        
        //QUERY PARA EL COLOR POR MEDIO DE LA TABLA VARIACION
        $query = "SELECT id_color as 'color' "
                . " FROM art_variaciones WHERE id_variacion LIKE ? ";
        
        
        //COLOR QUERY
        $color = $this->db
                ->query($query , array($id_variacion))
                ->result()[0]->color;
        
        
        
        
        //ARREGLO DE SALIDA 
        $new_array = [];
       
        

        //BUCLE ....  =)
        for($i = 0 ; $i < count($prod) ; $i++)
        {
           
            if($color === $prod[$i]->id_color)
            {
                
                $p_price    = $prod[$i]->precio != 0 ? $prod[$i]->precio : $prod[$i]->precio_est_unidad;
                $p_size     = $prod[$i]->descripcion;
                $p_id       = $prod[$i]->id_producto;
                $total      = 0;
                
                foreach($tallas as $s){
                    if($s === $p_size){
                        
                        $total = ($p_price - $price) + $user_price ;
                        
                          $data = array(  
                                    "price"     => $total,
                                    "size"      => $p_size,
                                    "id_art"    => $id_articulo,
                                    "id_var"    => $id_variacion,
                                    "id_prod"   => $p_id
                            );
                
                        $new_array[] = $data;
                    }
                }

            }
        }
        
        
       
        $this->output->set_output(json_encode($new_array));
        
    }
    
    public function GetImages($image , $c = NULL){
        $this->output->set_header("Access-Control-Allow-Origin: *");
        $this->load->library("base_url");
        print $this->base_url->GetBaseUrl("/images/articulos") . "/" . $image;
    }
    
    public function generate_key($old_key , $c = NULL){
           if(!$this->get_key($old_key)) return;
           print $this->unitee->change_private_key();
    }
    
    private function  get_key($private_key){
         if ($this->key != $private_key) {
            return false;
        }else{
            return true;
        }
    }
    
    
}
