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

class view_producto extends CI_Model implements PInterface {

    use PluginConfig;

    protected $model = "view_producto";
    var $route = null;

    public function __construct() {
        parent::__construct();

        $this->load->database();

        $this->_config = array(
            "version" => 1.0,
            "author" => "Lieison S.A de C.V",
            "type" => "plugin",
            "name" => "Ver Producto",
            "description" => "Modulo para editar producto",
            "id_model" => "003",
            "id_update" => "005",
            "update" => "",
            "license" => "",
            "controller" => "",
            "view" => "producto/producto_view"
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
        $this->load->helper("form");

        $op = array(
            "operations" => $this->_operations()
        );

        $this->load->view("producto/producto_view", $op);
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
        return array(
            $this->route . "assert/plugins/select2/select2.min.js",
            $this->route . "assert/plugins/datatables/media/js/jquery.dataTables.js",
            $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js",
            $this->route . "assert/system/table-managed.js"
        );
    }

    public function _jsLoader() {
        return array("table_loader();");
    }

    public function _rols() {
        $this->load->model("system/permission_engine");
        $data = $this->permission_engine->_get(
                $this->model, MODEL, INT
        );
        return $data;
    }

    public function _title() {
        return "Unitee | Ver productos";
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
    
    public function GetProductById($id){
        $query = "SELECT
                  producto.id_producto as 'id' , 
                  producto.sku as 'sku',
                  producto.nombre as 'nombre' , 
                  color.nombre as 'color',
                  concat(producto.margen , ' ' , unidad.nombre ) as 'margen',
                  producto.cantidad as 'cantidad',
                  producto.descripcion as 'descripcion',
                  producto.precio as 'precio' ,
                  producto.precio_est_unidad as 'estimado'
                  FROM producto 
                  LEFT JOIN color ON color.id_color=producto.id_color
                  LEFT JOIN unidad ON unidad.id_unidad=producto.id_unidad
                  WHERE id_producto LIKE ? ";
        return $this->db
                ->query($query , array($id))
                ->result()[0];
    }
    
    public function count_products(){
        return $this->db
                ->query("SELECT COUNT(*) as 'count' FROM producto")
                ->result()[0];
    }
    
    public function get_colorByName($name){
        $query = "  SELECT 
                    producto.id_producto as 'id',
                    producto.nombre as 'name',
                    color.nombre as 'color_name',
                    color.referencia as 'color_ref'
                    FROM producto 
                    INNER JOIN color ON  color.id_color=producto.id_color
                    WHERE producto.nombre LIKE '%$name'";
        return $this->db
                        ->query($query)
                        ->result();
    }

    public function get_products($factory = null) {
        
        if($factory == NULL){
             $query = "  SELECT 
                    producto.nombre as 'nombre',
                    producto.id_producto as 'id',
                    producto.fabricado as 'fabricado'
                    FROM producto 
                    GROUP BY producto.nombre
                    HAVING count(*) >= 1
                    ORDER BY producto.date DESC; ";
        }
        else{
            $query = "  SELECT
                    producto.nombre as 'nombre',
                    producto.id_producto as 'id',
                    producto.fabricado as 'fabricado'
                    FROM producto WHERE producto.fabricado LIKE $factory
                    GROUP BY producto.nombre
                    HAVING count(*) >= 1
                    ORDER BY producto.date DESC; ";
        }
        

        return $this->db
                        ->query($query)
                        ->result();
    }
    
    
  

    public function show_products() {
        $query = "SELECT
                  producto.id_producto as 'id' , 
                  producto.sku as 'sku',
                  producto.nombre as 'nombre' , 
                  color.nombre as 'color',
                  concat(producto.margen , ' ' , unidad.nombre ) as 'margen',
                  producto.cantidad as 'cantidad',
                  producto.descripcion as 'descripcion',
                  producto.precio as 'precio' ,
                  producto.precio_est_unidad as 'estimado'
                  FROM producto 
                  LEFT JOIN color ON color.id_color=producto.id_color
                  LEFT JOIN unidad ON unidad.id_unidad=producto.id_unidad
                  ORDER BY producto.date DESC; ";

        return $this->db
                        ->query($query)
                        ->result();
    }
    
    public function get_count_low_product(){
        return $this->db->query("SELECT 
                                    COUNT(*) as 'count'
                                    FROM producto 
                                    WHERE 
                                    TRUNCATE((producto.margen * 0.20) + producto.margen , 2) >= producto.cantidad;")
                ->result()[0];
    }

    public function delete_product($id) {
        return $this
                        ->db
                        ->delete("producto", array("id_producto" => $id));
    }

    public function get_product($id) {
        $this->query = "SELECT  * from producto where id_producto LIKE  ?  ";

        return $this->db
                        ->query($this->query, array($id))
                        ->result()[0];
    }

    public function _operations() {
        $this->load->model("system/permission_engine", 'engine');
        $data = $this->engine->GetOperationRoles($this->model);
        return $data;
    }

    public function _Dashboard() {
        
    }

    public function _JSdashboard() {
        $this->InProduct(); //Verifica si la cantidad es mayor que el margen 
        $this->OutProduct(); // Verifica si el margen es mayor que la cantidad
        return true;
    }
    
    
    public function GetByBuy($id_buy){
        $query = "SELECT 
                producto.nombre as 'nombre',
                concat(historial_compra.cant , ' ' , unidad.nombre) as 'cantidad',
                historial_compra.price as 'precio',
                color.nombre as 'color'
                FROM historial_compra
                INNER JOIN producto ON producto.id_producto=historial_compra.id_producto
                INNER JOIN compras ON compras.id_compras=historial_compra.id_compra
                INNER JOIN color ON color.id_color=producto.id_color
                INNER JOIN unidad on unidad.id_unidad=producto.id_unidad
                WHERE compras.id_compras=?";
        
        return $this->db
                ->query($query, array($id_buy))
                ->result();
    }

    private function OutProduct() {
        $query = "SELECT
                  producto.id_producto as 'id' , 
                  producto.nombre as 'nombre' , 
                  producto.margen 'margen',
                  producto.cantidad as 'cantidad',
                  producto.descripcion as 'descripcion',
                  unidad.nombre as 'u_name',
                  color.nombre as 'color_name'
                  FROM producto  
                  INNER JOIN unidad ON unidad.id_unidad=producto.id_unidad
                  INNER JOIN color ON color.id_color=producto.id_color
                  WHERE producto.cantidad < producto.margen 
                  ORDER BY producto.date ASC;  ";

        $result = $this->db
                ->query($query)
                ->result();

        foreach ($result as $r) {

            $query = "SELECT id_notification as 'id' , status as 'status' FROM notification "
                    . " WHERE table_object LIKE 'producto' AND id_object LIKE ?";
            $exist = $this->db
                    ->query($query, array($r->id))
                    ->result();

            $this->load->library("notifications");

            $msj = "Producto " . $r->nombre . " Terminado  , [Color: " . $r->color_name . '][Cantidad en inventario : ' . $r->cantidad . ']';


            $cant = $r->cantidad . " " . $r->u_name;
            $m = $this->load->templates("producto");
            $m = str_replace("{{cant}}", $cant, $m);
            $m = str_replace("{{prod}}", $r->nombre, $m);
            $m = str_replace("{{prov}}", site_url("/0/proveedor=view_proveedor"), $m);
            $m = str_replace("{{compra}}", site_url("/0/compra=new_compra?i=" . $r->id . "&n=" . $r->nombre . "&c=" . $r->color_name), $m);
            $m = str_replace("{{color}}", " " . $r->color_name , $m);

            if (count($exist) >= 1) {
                if ($exist[0]->status == 0) {
                    $this->notifications->UpdateNotification($exist[0]->id, 1, $msj);
                    $this->Message($m , $r->nombre );
                }
            } else {

                $this->notifications->AddNotification("producto", 
                        $r->id, 
                        $msj, 
                        "compra=new_compra?i=" . $r->id . "&n=" . $r->nombre . "&c=" . $r->color_name, 
                        "icon-file", 
                        "label-warning", 1
                );


                $this->Message($m , $r->nombre );
            }
        }
    }

    private function Message($message , $prod_name) {

        $this->load->library("messages");
        $this->load->library("metadata");
        $email = $this->metadata->GetMeta("email");

        return $this->messages
                        ->emailFrom()
                        ->email_subject("Unitee | Producto $prod_name por terminar")
                        ->email_to($email->value)
                        ->email_body($message)
                        ->email_send();
    }

    private function InProduct() {

        $query = "SELECT notification.id_notification as 'id'
                  FROM producto
                  INNER JOIN notification ON notification.id_object = producto.id_producto
                  WHERE producto.cantidad > producto.margen AND notification.table_object LIKE 'producto' 
                  AND notification.`status` = 1
                  ORDER BY producto.date ASC; ";

        $result = $this->db->query($query)->result();
        if (count($result) >= 1) {

            $this->load->library("notifications");

            foreach ($result as $n) {
                $this->notifications->UpdateNotification($n->id, 0);
            }
        }
    }

}
