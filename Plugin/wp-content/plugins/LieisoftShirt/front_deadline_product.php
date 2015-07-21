<?php

global $wpdb;

$query      = "SELECT deadline FROM wp_shirt WHERE id_wc LIKE $id";
$resultset  = $wpdb->get_results($query); 
$resultset  = $resultset[0];

$stock      = get_post_meta($id, "_stock_status");
$date_      = new DateTime($resultset->deadline);
$now_       = new DateTime("NOW");
$in_        = $date_->diff($now_);
$s          = FALSE;

if($now_ > $date_ ){
    if($stock != "outofstock"){
        $stock = $stock[0];
        update_post_meta($id, "_stock_status", "outofstock");
    }
    $s = TRUE;
}
        

?>
<input type="hidden" id="count_ls" value="<?php echo $resultset->deadline; ?>" />
<input type="hidden" id="page_ls" value="<?php echo get_page_link(); ?>" />

<?php if(!$s) : ?>
    <div id="getting-started"></div>   
    <br>
<?php else: ?>
    <div><p><b>Campaña Finalizada</b></p></div>
<?php endif; ?>

<script type="text/javascript">
    
    jQuery(document).ready(function($){
          $("#getting-started").countdown($("#count_ls").val() , function(event) 
          {
                $(this).text(event.strftime('%D dias  %H:%M:%S Horas'));
          }).on('finish.countdown', function(){
                window.location.href = $("#page_ls").val();
          });
    });

 </script>

