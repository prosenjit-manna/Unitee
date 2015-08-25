<!DOCTYPE html>


<html lang="es" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>

<meta charset="utf-8"/>
<title><?php echo isset($title) ? $title : "Unitee | Dashboard" ; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>


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

<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="page-header-fixed page-footer-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<?php echo $open_container; ?>
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<img src="<?php echo $route; ?>images/dashboard/logo.png" alt="logo" class="logo-default"/>
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
					<span class="badge badge-default">
					7 </span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<p>
								 You have 14 new notifications
							</p>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 250px;">
								<li>
									<a href="#">
									<span class="label label-sm label-icon label-success">
									<i class="icon-plus"></i>
									</span>
									New user registered. <span class="time">
									Just now </span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="label label-sm label-icon label-danger">
									<i class="icon-bolt"></i>
									</span>
									Server #12 overloaded. <span class="time">
									15 mins </span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="label label-sm label-icon label-warning">
									<i class="icon-bell"></i>
									</span>
									Server #2 not responding. <span class="time">
									22 mins </span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="label label-sm label-icon label-info">
									<i class="icon-bullhorn"></i>
									</span>
									Application error. <span class="time">
									40 mins </span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="label label-sm label-icon label-danger">
									<i class="icon-bolt"></i>
									</span>
									Database overloaded 68%. <span class="time">
									2 hrs </span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="label label-sm label-icon label-danger">
									<i class="icon-bolt"></i>
									</span>
									2 user IP blocked. <span class="time">
									5 hrs </span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="label label-sm label-icon label-warning">
									<i class="icon-bell-o"></i>
									</span>
									Storage Server #4 not responding. <span class="time">
									45 mins </span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="label label-sm label-icon label-info">
									<i class="icon-bullhorn"></i>
									</span>
									System Error. <span class="time">
									55 mins </span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="label label-sm label-icon label-danger">
									<i class="icon-bolt"></i>
									</span>
									Database overloaded 68%. <span class="time">
									2 hrs </span>
									</a>
								</li>
							</ul>
						</li>
						<li class="external">
							<a href="#">
							See all notifications <i class="m-icon-swapright"></i>
							</a>
						</li>
					</ul>
				</li>
				<!-- END NOTIFICATION DROPDOWN -->
				<!-- BEGIN INBOX DROPDOWN -->
				<!-- END INBOX DROPDOWN -->
				<!-- BEGIN TODO DROPDOWN -->
				<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-calendar"></i>
					<span class="badge badge-default">
					3 </span>
					</a>
					<ul class="dropdown-menu extended tasks">
						<li>
							<p>
								 You have 12 pending tasks
							</p>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 250px;">
								<li>
									<a href="page_todo.html">
									<span class="task">
									<span class="desc">
									New release v1.2 </span>
									<span class="percent">
									30% </span>
									</span>
									<div class="progress">
										<div style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
											<div class="sr-only">
												 40% Complete
											</div>
										</div>
									</div>
									</a>
								</li>
								<li>
									<a href="page_todo.html">
									<span class="task">
									<span class="desc">
									Application deployment </span>
									<span class="percent">
									65% </span>
									</span>
									<div class="progress progress-striped">
										<div style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
											<div class="sr-only">
												 65% Complete
											</div>
										</div>
									</div>
									</a>
								</li>
								<li>
									<a href="page_todo.html">
									<span class="task">
									<span class="desc">
									Mobile app release </span>
									<span class="percent">
									98% </span>
									</span>
									<div class="progress">
										<div style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
											<div class="sr-only">
												 98% Complete
											</div>
										</div>
									</div>
									</a>
								</li>
								<li>
									<a href="page_todo.html">
									<span class="task">
									<span class="desc">
									Database migration </span>
									<span class="percent">
									10% </span>
									</span>
									<div class="progress progress-striped">
										<div style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
											<div class="sr-only">
												 10% Complete
											</div>
										</div>
									</div>
									</a>
								</li>
								<li>
									<a href="page_todo.html">
									<span class="task">
									<span class="desc">
									Web server upgrade </span>
									<span class="percent">
									58% </span>
									</span>
									<div class="progress progress-striped">
										<div style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
											<div class="sr-only">
												 58% Complete
											</div>
										</div>
									</div>
									</a>
								</li>
								<li>
									<a href="page_todo.html">
									<span class="task">
									<span class="desc">
									Mobile development </span>
									<span class="percent">
									85% </span>
									</span>
									<div class="progress progress-striped">
										<div style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
											<div class="sr-only">
												 85% Complete
											</div>
										</div>
									</div>
									</a>
								</li>
								<li>
									<a href="page_todo.html">
									<span class="task">
									<span class="desc">
									New UI release </span>
									<span class="percent">
									18% </span>
									</span>
									<div class="progress progress-striped">
										<div style="width: 18%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
											<div class="sr-only">
												 18% Complete
											</div>
										</div>
									</div>
									</a>
								</li>
							</ul>
						</li>
						<li class="external">
							<a href="page_todo.html">
							See all tasks <i class="icon-arrow-right"></i>
							</a>
						</li>
					</ul>
				</li>
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
                                                    <a href="<?php echo site_url("0/user=user_profile"); ?>">
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

