<!DOCTYPE html>

<!-- 
        
`hyo/.                                                                                                                                               
  -sddss/`            ``                                                                                                                              
    .+s/+ss:`    `/shhhhhhyo/.                                                                                                                        
      `/oo/+sso+so+:.`````.-/sy+`           `::                                                                                                       
         ./sys::`    ::       .oh/          /dd`              -ss.                     `::                                                            
            -y+     `ss`        /d+         ydd`              :yy.                     `--                                                            
             `y/                 hd`        hdd`               ``                                                                                     
              .ho`               yd-       `ddd                ..    ```````````              .----------.`       `.--.`                   ```````    
               .yy-              oh`       `ddd               .dh.  .://////////:      .:.   .hddhhhyyyyyy+     -ohs/-`   :+y/`    :s+ `+yhhhhhhhhs   
                `oho.            `.        `ddh               :dd-  -//..````.://`     -/:   :dh...````````   `ody-`      .+hdy-   hdh `/++//:-:ydh   
                  -sh+.                    `ddy               +dd-  -//`      `//-     -/:   /dh              ody`          .sdh-  hdy          /dh   
                   .yh:      `.            `dds               +dd.  ://.      `//-     ./-   /dh             -dd:            `sdh  ydy          -dy   
                 `+ho`       +hyo-         `ddo               +dd`  ://:-------//-     ./:   :dd:----:://:-. +dd`             `dd- sdh          .dy   
                .ys-       ``.+yhh+        .dd+               +dd   ://:--.......`     .//   `syssoosssssdd+ +dd-              sd: sdd          `dy   
               -h+`       :yys/....        -dd/               +dy   ://.               `//`              ydo -dds              sd. odd`         `dy   
              .ho         .shddy`          :dd:               ody   ://`                :/.              +ds  sddo`           .do  odd`         `dh   
              sy`          `-//-`          :dd:               ydy   -//`                :/-              .dd  `sddy:`      `.+ho`  sdd`         `dd`  
             -d:       -+ssso.             .dd.-/++++++ooss/  hdy   .//-````````````````//:   -++++++osso hd-  `:yddys+//+syhs:    sdh           hd:  
             +d       .shhys+.              :- oyyyyyyyyyys+  +y:   `--:::::::::::::::::::.   ossoooooos+ oy-     -/osyyyso/.      :y/           +h:  
             sy        ``...`                   ````                                                                                              `   
             sy        `:shh-                                                                                                                         
             +h        +hho- `                                                                                                                        
             -d:       ``  .oys        `                    -   -`  -`        ..   -`              -`                   .` -                          
              oh.         .hdd+  `++` -yo.              `   // .y+ .y `:::``::// -.+`.::- `-//-    o/.`:::. `-//-  -::-`++-y::-` -::-`-:-             
              `sh:        /dho`  +ddh -ydd/        .:/oo/    y`s.s.o:`s. .s:y`/+o/ s:s``+/o: `/+   o- y- `o:s: `/++s:-+s+:`h.`:o/s:-+so/    `.-::     
                /hs-`     `.`    +ddh  :sdh          `       :yo -ys `s-`.s:o /y/+`s/o  :++/..+s   +: s:`.o-+/`.+s/o-.//+/`y  `s/o-.//o.   .:/:-`     
                 `/yy+-`         `++.   `-:.                  :`  -`  `-:-``. .. .--..  `..o/:++   `-. -::` -o/:o+ .::. `-.-   - .::. .`              
                    ./shs+/:.``    ``.:+sho.                                               .--.              .--.                                     
                        .-/+osyyyyyyss+/-`                                                                                                            
                                                  


-->


<html lang="es" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>

<meta charset="utf-8"/>
<title id="dashboard_title"><?php echo isset($title) ? $title : "Unitee | Dashboard" ; ?></title>
<meta content="<?php echo isset($title) ? $title : "Unitee | Dashboard" ; ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="lieison"/>




<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?php echo $route;?>assert/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>


<?php

  
    if(isset($styles)){
         if(is_array($styles)){
             foreach ( $styles as $v){
                 echo "<link href='" , 
                         $v ,"' rel='stylesheet' type='text/css' />" ;
             }
         }
    }

?>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<link rel='shortcut icon' type='image/x-icon' href='<?php echo $route; ?>images/dashboard/icon.ico' />

<!-- BEGIN PAGE STYLES -->
<link href="<?php echo $route;?>assert/dashboard/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->

<!-- BEGIN THEME STYLES -->
<link href="<?php echo $route;?>assert/dashboard/css/components.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/dashboard/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/dashboard/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $route;?>assert/dashboard/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo $route;?>assert/dashboard/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->



</head>
<body class="page-header-fixed page-footer-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<input type="hidden" id="base_url" value="<?php echo $route; ?>" />

<?php echo $open_container; ?>
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html" class="col-md-offset-2 col-xs-offset-4">
                            <img id="system_logo" src="<?php echo $route; ?>images/dashboard/logo.png" alt="logo" title="logo" width="130px" class="logo-default"/>
			</a>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-bell"></i>
                                        <span id="notification_count" class="badge badge-default">
					...</span>
					</a>
                                    <ul  class="dropdown-menu">
						<li id="notification_header">
							<p>
								 Cargando notificaciones...
							</p>
						</li>
						<li>
                                                    <ul id="notification_body" class="dropdown-menu-list scroller" style="height: 250px;">
								...
                                                    </ul>
						</li>
                                                <li id="notification_footer" class="external">
                                                    <a href="<?php echo site_url("notification"); ?>">
							 Ver todas las notificaciones
							</a>
						</li>
					</ul>
				</li>
				<!-- END NOTIFICATION DROPDOWN -->
				<!-- END TODO DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<?php 
                                                if(is_null($user_data['avatar'])){
                                                    echo '<img alt="" class="img-circle hide1" src=" ' , $route , 'images/dashboard/avatar.png"/>';
                                                }
                                                else{
                                                    echo '<img alt="" class="img-circle hide1" src="' , $route , "images/dashboard/users/" , $user_data['avatar']  , '"/>';
                                                }
                                        ?>
					<span class="username username-hide-on-mobile">
                                            <?php 
                                                    $user_name = explode(" ", $user_data['name']);
                                                    $count = sizeof($user_name);
                                                    if($count >= 2 && $count <= 3){
                                                         echo current($user_name) , " " , end($user_name);
                                                    }
                                                    else if($count > 3 ){
                                                         echo current($user_name);
                                                         echo " ";
                                                         echo substr($user_name[1], 0 , 1);
                                                         echo ". " , end($user_name);
                                                    }
                                            ?>
					</span>
					<i class="icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
                                                    <a href="<?php echo site_url("profile"); ?>">
							<i class="icon-user"></i> Mi Perfil </a>
						</li>
						<li>
							<a href="<?php echo site_url("block"); ?>">
							<i class="icon-wallet"></i> Bloquear </a>
						</li>
						</li>
						<li>
							<a href="<?php echo site_url("logout"); ?>">
							<i class="icon-key"></i> Cerrar Sesión </a>
						</li>
					</ul>
				</li>
				
			</ul>
		</div>
	</div>
	<!-- END HEADER INNER -->
</div>

