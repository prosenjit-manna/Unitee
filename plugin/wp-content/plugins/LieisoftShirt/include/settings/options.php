<?php

   if(isset($_POST['cmd_send'])){
       global $ls_tshirt;
       $return = $ls_tshirt->set_webservices(array(
           "color"  => $_POST['txt_color'],
           "style"  => $_POST['txt_style'],
           "key"  => $_POST['txt_key']
       ));

   }
   
   $w_color = get_option("color_web_services");
   $w_style = get_option("style_web_services");
   $w_key   = get_option("key_web_services");


?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<br><br><br>
<div class="panel panel-default">
  <div class="panel-heading">Configuracion de T-shirt (Web services)</div>
  <div class="panel-body">
    <form role="form" action="" method="post">
     <div class="form-group">
                <label for="exampleInputEmail1">Shortcodes []</label>
                <input type="text" value="[ls_tshirt width='' height='']" name="txt_color" id="txt_color" class="form-control" id="exampleInputEmail1" placeholder="webservices del color">
    </div>
    <div class="form-group">
                <label for="exampleInputEmail1"> Webservices</label>
                <input type="text" value="<?php echo $w_color; ?>" name="txt_color" id="txt_color" class="form-control" id="exampleInputEmail1" placeholder="webservices del color">
     </div>
     <div class="form-group">
            <label for="exampleInputPassword1">Articles Webservices</label>
            <input type="text" value="<?php echo $w_style; ?>" name="txt_style" id="txt_style" class="form-control" id="exampleInputPassword1" placeholder="webservices del estilo">
     </div>
      <div class="form-group">
            <label for="exampleInputPassword1">Key Webservices</label>
            <input type="text" value="<?php echo $w_key; ?>" name="txt_key" id="txt_key" class="form-control" id="exampleInputPassword1" placeholder="key">
     </div> 
        <input type="submit" name="cmd_send" id="cmd_send" class="btn btn-primary" value="Guardar" />
      </form>
      
      
      <?php
      
            if(isset($return)){
                echo '<br><div class="alert alert-success" role="alert">' . $return . '</div>';
            }
      
      ?>
      
  </div>
</div>