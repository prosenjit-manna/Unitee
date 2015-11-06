<?php


/***
 *
 * WC response
 * version 0.5
 * Dev by Rolando Arriaza
 * Lieison Working T.
 *
 * Modulo en el cual guarda la informaciond e la campaña de la camisa
 * por medio de parametros especificos , en el cua varian de acuerdo
 * al diseño del elemento
 *
 * **/


//Necesitamos las librerias de wordpress ya que se esta enviando por medio AJAX
require_once( $_REQUEST['path'] . "wp-config.php" );


global $current_user;  // obtiene el usuario actual logado  tipo array
global $wpdb; // obtenemos la clase de bases de datos wordpress


/*
 * Esta funcion desarrolla el proceso en el cual sube la imagen pero antes
 * de subirla pasa por una serie de filtros incluyendo el factor de
 * conversion base 64 a cadena o string
 *
 */


if(!function_exists("upload_base64")){

    function upload_base64($encode , $filename , $coord , $e ){



        $upload_dir             = wp_upload_dir();
        $upload_path            = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;
        $decoded                = base64_decode($encode);
        $hashed_filename        = md5($filename . microtime()) . '_' . $filename;



        header('Content-Type: image/png'); //header png data sistem

        $img = imagecreatefromstring($decoded); //imagen string
        list($w , $h) = getimagesizefromstring($decoded); //obtenemos el tamaño real de la imagen


        $w_m = 800; // estandar
        $h_m = 600; // estandar


        $wm = $h * ($w_m / $h_m);  //calculo para obtener el width general
        $hm = $w * ($h_m / $w_m);  // calculo para obtener el height general

        $i = imagecreatetruecolor($w_m, $h_m); // aplicamos el rectangulo 800x600


        imagealphablending($i , FALSE); // obtenemos las transparencias
        imagesavealpha($i , TRUE); // se guarda las transparencias

        imagecopyresampled($i,
                $img,
                0,
                0,
                $coord->x ,
                $coord->y - 27 ,
                $wm ,
                $hm ,
                $wm  ,
                $hm  ); // corta la imagen

        imagepng($i, $upload_path . $hashed_filename );
        imagedestroy($img);


       // file_put_contents($upload_path . $hashed_filename, $decoded );

        if( !function_exists( 'wp_handle_sideload' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
        }
        if(!function_exists( 'wp_get_current_user' ) ) {
            require_once( ABSPATH . 'wp-includes/pluggable.php' );
        }

        if(!function_exists("wp_generate_attachment_metadata")){
            require_once  ( ABSPATH . 'wp-admin/includes/image.php' );
        }
         if(!function_exists("wp_get_image_editor")){
            require_once  ( ABSPATH . 'wp-includes/media.php' );
        }



        $file             = array();
        $file['error']    = '';
        $file['tmp_name'] = $upload_path . $hashed_filename;
        $file['name']     = $hashed_filename;
        $file['type']     = 'image/png';
        $file['size']     = filesize($upload_path . $hashed_filename );

        $file_            = wp_handle_sideload( $file, array( 'test_form' => false ) );



        $attachment = array(
                'post_mime_type'        => $file_['type'],
                'post_title'            => basename($filename),
                'post_content'          => '',
                'post_status'           => 'inherit'
        );

        $attach_id      = wp_insert_attachment( $attachment, $file_['file']);
        $attach_data    = wp_generate_attachment_metadata( $attach_id, $file_['file'] );

        wp_update_attachment_metadata( $attach_id,  $attach_data );

      //  $edit = wp_get_image_editor( $upload_path . $hashed_filename);
       // print_r($edit);

        return $attach_id;

    }

}




if($current_user->ID == NULL || empty($current_user->ID)){
    return null;
}


$user_id        = $current_user->ID;

$iformat        =  stripslashes($_REQUEST['images']);
$images         =  json_decode($iformat);

$camisas        = $_REQUEST['txt_camisas'];
$precio         = $_REQUEST['txt_precio'];
$duracion       = $_REQUEST['txt_duracion'];
$descripcion    = $_REQUEST['txt_descripcion'];
$tags           = $_REQUEST['txt_tags'];
$title          = $_REQUEST['titulo'];
$categoria      = $_REQUEST['camisas_cat'];
$coordF         = json_decode(stripslashes($_REQUEST['coordf']));
$coordB         = json_decode(stripslashes($_REQUEST['coordb']));
$id             = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
$atrib          = isset($_REQUEST['attr']) ? json_decode(stripslashes($_REQUEST['attr'])) : null;



$images_id = array();

$post = array(
        'post_author'       => $user_id,
        'post_content'      => $descripcion,
        'post_status'       => "publish",
        'post_title'        => $title,
        'post_parent'       => '',
        'post_type'         => "product",
        'post_excerpt'      => "[ls_endtime]"
 );



$sku = "PROD" . floor(pi() * (int) $camisas * rand(100, 4000));

$post_id = wp_insert_post( $post, $wp_error );

wp_update_post(array(
    "ID"                => $post_id,
    'post_excerpt'      => "[ls_endtime id='$post_id']"
));

if($post_id){
     $attach_id = get_post_meta($product->parent_id, "_thumbnail_id", true);
     add_post_meta($post_id, '_thumbnail_id', $attach_id);
}


wp_set_object_terms( $post_id, $categoria, 'product_cat' );
wp_set_object_terms($post_id, explode(",", $tags), 'product_tag');
wp_set_object_terms ($post_id,'variable','product_type'); //PRODUCTO VARIABLE DESDE HOY

update_post_meta( $post_id, '_visibility', 'visible' );
update_post_meta( $post_id, '_stock_status', 'instock');


update_post_meta( $post_id, 'total_sales', '0');
update_post_meta( $post_id, '_downloadable', 'no');
update_post_meta( $post_id, '_virtual', 'no');


update_post_meta( $post_id, '_regular_price', $precio );
update_post_meta( $post_id, '_sale_price', "" );

update_post_meta( $post_id, '_purchase_note', "" );
update_post_meta( $post_id, '_featured', "no" );


update_post_meta( $post_id, '_weight', "" );
update_post_meta( $post_id, '_length', "" );
update_post_meta( $post_id, '_width', "" );
update_post_meta( $post_id, '_height', "" );


update_post_meta( $post_id, '_sku', $sku);

update_post_meta( $post_id, '_product_attributes', array());

update_post_meta( $post_id, '_sale_price_dates_from', "" );
update_post_meta( $post_id, '_sale_price_dates_to', "" );


update_post_meta( $post_id, '_price',  $precio );
update_post_meta( $post_id, '_sold_individually', "" );
update_post_meta( $post_id, '_manage_stock', "no" );

update_post_meta( $post_id, '_backorders', "no" );
update_post_meta( $post_id, '_stock', "" );


/****************************
 * 
 * ALGORITMO PARA ACTUALIZAR Y AGREGAR IMAGENES
 * 
 * ********************************/
$n  = 0 ;
foreach ($images as $k=>$i){
    $co = $coordF;
    $e = FALSE;
    $base = explode(",", $i);
    $filename = $title . "_" . rand(0, 4000) . ".png";
    if($n == 1){
        $co = $coordB;
        $e = TRUE;
    }
    $images_id[] = upload_base64(end($base), $filename , $co , $e );
    $n++;
}

update_post_meta( $post_id, '_thumbnail_id', current($images_id) );
update_post_meta( $post_id, '_product_image_gallery' , end($images_id));


/**    FIN             **/


/*********
 * 
 * ALGORITMO PARA AGREGAR ALA BASE DE DATOS DE WP_SHIRT
 * 
 * ***************/


$date_ = new DateTime($duracion);

$ls_tshirt_db = array(
    "id_user"       => $user_id,
    "id_wc"         => $post_id,
    "camisa_obj"    => $camisas,
    "precio"        => $precio,
    "deadline"      => $date_->format("Y-m-d H:i:s"),
    "tags"          => $tags,
    "id_product"    => $id ,
    "attr"          => json_encode($atrib)
);


$wpdb->insert( "wp_shirt" , $ls_tshirt_db);


$guid = get_post_field("guid", $post_id );


/*****************************************************************
 * 
 * ALGORITMO DE VARIACIONES :
 * 
 * **************************************************************/

 

$ATTR = $wpdb->get_results("SELECT * FROM " .  $wpdb->prefix . "woocommerce_attribute_taxonomies WHERE attribute_label LIKE '%TALLAS' ");


if(count($ATTR) >= 1){

    if(count($ATTR) == 0){
        $wpdb->insert($wpd->prefix  . "woocommerce_attribute_taxonomies" , array(
            "attribute_name"    => "tallas",
            "attribute_label"   => "TALLAS",
            "attribute_type"    => "select",
            "attribute_orderby" => "menu_order",
            "attribute_public"  => 1
        ));
    }

 

    $size_tax = wc_attribute_taxonomy_name( 'tallas' );

    if(!empty($size_tax))
    {


           //AGREGAMOS LAS TALLAS ....
        
           $data_atrib     = $atrib;
           
           $sizes          = array();
           $price          = array();
           
           foreach ($data_atrib as $d){
               $sizes[] = $d->size;
               $price[] = $d->price;
           }
           
           //ID DEL POST PRODUCTO PRINCIPAL 
           //$post_id        = 13;

           //AGREGAMOS LOS ATRIBUTOS AL POST DEL PRODUCTO ESPECIFICO
           wp_set_object_terms($post_id, $sizes, $size_tax );
           

            //DATA A AGREGAR DEL ATRIBUTO
            $object_data = Array(
                $size_tax=>Array(
                    'name'              =>$size_tax,
                    'value'             =>'',
                    'is_visible'        => '1',
                    'is_variation'      => '1',
                    'is_taxonomy'       => '1'
            ));

             //ACTUALIZAMOS LOS DATOS DEL PRODUCTO ATTR
             update_post_meta( $post_id,'_product_attributes',$object_data);
             
             //ATRIBUTO POR DEFECTO 
            /* update_post_meta($post_id, "_default_attributes", 
             array(
                 $size_tax => $sizes[0]
             ));*/

             //?
             wp_set_object_terms( $post_id, $sizes , $size_tax );
             
             
             //EL ID POST SERA EL PADRE DE LOS DEMAS POST
             $parent_id = $post_id;
             
             
             $i =1;
             $k =0;
            foreach($sizes as $s){
                 
                 //VARIACIONES DEL PRODUCTO EN EL POST NUEVO 
                    $variation = array(
                        'post_title'   => 'Product #' . $parent_id + $i . ' Variation',
                        'post_content' => '',
                        'post_status'  => 'publish',
                        'post_parent'  => $parent_id,
                        'post_type'    => 'product_variation'
                    );
                    
                    
                     //AGREGAMOS EL POST
                    $variation_id = wp_insert_post( $variation );

                     //AGEGAMOS LOS PRECIOS VARIABLES
                     update_post_meta( $variation_id, '_regular_price', $price[$k] );
                     update_post_meta( $variation_id, '_price', $price[$k] );
                     update_post_meta($variation_id, "_stock_status", "instock");
                     update_post_meta($variation_id, "_manage_stock", "no");
                     update_post_meta($variation_id, "_sku", $s . "-" . rand(0, 1000) . "-" . rand(1000, 50000));
                     update_post_meta( $variation_id, '_thumbnail_id' , 0 );
                     update_post_meta( $variation_id, '_virtual' , "no");
                     update_post_meta( $variation_id, '_downloadable' , "no"  );
                     update_post_meta( $variation_id, '_weight' , ""  );
                     update_post_meta( $variation_id, '_length' , ""  );
                     update_post_meta( $variation_id, '_width' , ""  );
                     update_post_meta( $variation_id, '_height' , ""  );
                     update_post_meta( $variation_id, '_sale_price' , ""  );
                     update_post_meta( $variation_id, '_sale_price_dates_from' , ""  );
                     update_post_meta( $variation_id, '_sale_price_dates_to' , ""  );
                     update_post_meta( $variation_id, '_download_limit' , ""  );
                     update_post_meta( $variation_id, '_download_expiry' , ""  );
                     update_post_meta( $variation_id, '_downloadable_files' , ""  );
                     update_post_meta( $variation_id, '_variation_description' , ""  );

                     $i++;
                     $k++;
                     
                     $wpdb->update( $wpdb->posts, 
                              array( 
                                        'post_status'   => 'publish',
                                        'post_title'    => 'Variación #' . $variation_id .' de ' . $title,
                                        'menu_order'    => $i
                             ), 
                             array( 'ID' => $variation_id ) 
                      );
                     
                     delete_post_meta( $variation_id, '_backorders' );
		     delete_post_meta( $variation_id, '_stock' );
                     
                     
                     update_post_meta( $variation_id, '_sale_price_dates_from', '' );
		     update_post_meta( $variation_id, '_sale_price_dates_to',  '' );
                     
                     
                     do_action( 'woocommerce_save_product_variation', $variation_id );
                     do_action( 'woocommerce_update_product_variation', $variation_id );
                 
             }
    }
    
     WC_Product_Variable::sync( $post_id );
    
  
}


/*****************************************************************************/



echo $guid;
exit(); 