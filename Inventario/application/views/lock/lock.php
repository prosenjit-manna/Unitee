<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>
<title>Unitee | Bloqueado</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="Lieison"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo $route;?>assert/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/login/css/login-soft.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/lock/lock.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo $route;?>assert/login/css/components.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/login/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/login/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?php echo $route;?>assert/login/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/login/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body>
<div class="page-lock">
    <div class="page-logo">
        <a class="brand" href="index.html">
    <img src="<?php echo $route;?>images/login/logo.png" style="width:175px;"/>
        </a>
    </div>
    
    
    <?php
         $user_name = explode(" ", $user_data['name']);
         $count = sizeof($user_name);
         $u = NULL;
         if($count >= 2 && $count <= 3){
                   $u = current($user_name) . " ". end($user_name);
         }
         else if($count > 3 ){
                $u = current($user_name);
                $u .= " ";
                $u .= substr($user_name[1], 0 , 1);
                $u .= ". " . end($user_name);
         }
      ?>
    
    
    <div class="page-body">
        <img class="page-lock-img" src="<?php echo $route;?>images/dashboard/users/<?php echo $user_data['avatar'] ?>" alt="">
        <div class="page-lock-info">
            <h1><?php echo $u; ?></h1>
            <span class="email">
            <?php echo $user_data['email']; ?> </span>
            <span class="locked">
              <?php
               if(isset($_REQUEST['err'])){
                    echo "Sigues bloqueado ...";
               }else{
                   echo "Bloqueado";
               }
              ?>
            </span>
            <?php echo form_open("/unlock" , array("class" => "form-inline")); ?>
                <div class="input-group input-medium">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <span class="input-group-btn">
                    <button type="submit" class="btn blue icn-only"><i class="m-icon-swapright icon-arrow-right"></i></button>
                    </span>
                </div>
                <!-- /input-group -->
                <div class="relogin">
                    <a href="<?php echo site_url("/logout"); ?>">
                    No eres <?php echo $u; ?></a>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <div class="page-footer-custom">
        <?php 
           $date  = new DateTime("now");
           $d = $date->format("Y");
        ?>
 <?php echo $d; ?> All Rights reserved &copy; Powered By <a href="http://lieison.com/" style="color:white;" target="_blank">Lieison Working Together</a>.    </div>
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<script src="<?php echo $route;?>/assert/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>/assert/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo $route;?>assert/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $route;?>assert/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo $route;?>assert/login/js/metronic.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/login/js//layout.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/lock/lock.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/login/js//quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/login/js/demo.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/login/js/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    QuickSidebar.init(); // init quick sidebar
    Demo.init(); // init demo features
    Login.init();
     Lock.init();
       // init background slide images
       $.backstretch([
        "<?php echo $route;?>images/login/bg/1.jpg",
        "<?php echo $route;?>images/login/bg/2.jpg",
        "<?php echo $route;?>images/login/bg/3.jpg",
        "<?php echo $route;?>images/login/bg/4.jpg"
        ], {
          fade: 1000,
          duration: 8000
    });
    
    
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>