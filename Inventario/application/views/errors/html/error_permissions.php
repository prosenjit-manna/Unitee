<<!DOCTYPE html>
<html>
<head>
	<title>Unitee | Acceso Denegado</title>
<link href="<?php echo $route; ?>assert/error/error.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<h3 class="page-title">
			Unitee - Dashboard <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-home"></i>
                                                <a href="<?php echo site_url("Dashboard/index/"); ?>">Home</a>
						<i class="icon-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("Dashboard/index/"); ?>">Dashboard</a>
					</li>
				</ul>
				<div class="page-toolbar">
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
        		<div class="row">
						<div class="col-md-12 page-404">
							<div class="number">
								 500
							</div>
							<div class="details">
								<h3>Permiso Denegado</h3><br>
								<p>
									 No tienes los Permisos suficientes para acceder a esta Pagina<br/>
									Contacta a tu Administrador<a href="<?php echo site_url("Dashboard/index/"); ?>">
									Regresar al Inicio</a>
								</p>
							</div>
						</div>
					</div>   
		</div>
	</div>

<!-- END CONTENT -->
</body>
</html>