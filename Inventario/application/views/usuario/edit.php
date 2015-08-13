<?php 
    /**
     * @@ name : edit
     * @@ version : 1.2
     * @@ id: _user_001
     */    
?>

<style>
  .class_tr {
        width: 100%;
        display: inline-table;
  }
  .class_tbody
  {
    overflow-y: scroll;
    overflow-wrap: scroll;
    height: 380px;
    width: 100%;
    position: relative;
  }
  
  
</style>

<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<h3 class="page-title">
			Unitee - Editar Usuario 
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-home"></i>
                                                <a href="">Home</a>
						<i class="icon-angle-right"></i>
					</li>
					<li>
						<a href="">Editar Usuario</a>
					</li>
				</ul>
				<div class="page-toolbar">
                                    
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="page-content-wrapper">

				<!-- BEGIN PAGE HEADER-->
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
						<div align="center">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_0" data-toggle="tab">
									Editar Usuario</a>
								</li>
								<li>
									<a href="#tab_1" data-toggle="tab">
									Editar Roles</a>
								</li>
							</ul>
						</div>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_0">
									<div class="caption font-green-sharp col-md-12">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-speech font-green-sharp"></i>
										<span class="caption-subject">Información Usuario</span>
									</div><br>
									<div class="portlet light">
										<div class="portlet-body form">
													<form action="#" class="horizontal-form">
															<div class="col-md-6">
															   <label class="control-label col-md-2">Nombres</label>
																<div class="form-group col-md-10">
																	<input type="text" id="firstName" class="form-control input-circle" placeholder="Nombres">
																</div>
																<label class="control-label col-md-2">Apellidos</label>
																<div class="form-group col-md-10">
																	<input type="text" id="firstName" class="form-control input-circle" placeholder="Apellidos">
																</div>
																<label class="control-label col-md-2">Correo</label>
																<div class="form-group col-md-10">
																		<input type="email" class="form-control input-circle" placeholder="Email Address">
																</div>
															</div>
															<!--/span-->
															<div class="col-md-6">
																<label class="control-label col-md-2">Usuario</label>
																<div class="form-group col-md-10">
																	<input type="text" id="firstName" class="form-control input-circle" placeholder="Nombre de Usuario required">
																</div>
																<label class="control-label col-md-2">Contraseña</label>
																<div class="form-group col-md-10">
																	<input type="password" id="firstName" class="form-control input-circle" placeholder="Contraseña">
																</div>
																<label class="control-label col-md-2">Repetir</label>
																<div class="form-group col-md-10">
																	<input type="password" id="firstName" class="form-control input-circle" placeholder="Repetir Contraseña">
																</div>
																<label class="control-label col-md-2">Autogenerar</label>
																<div class="form-group col-md-10">
																	<div class="radio-list">
																		<input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="SI" data-off-color="default" data-off-text="NO">
																	</div>
																</div>
															</div>
															<div class="form-actions right">
																<button type="button" class="btn default">Cancelar</button>
																<button type="submit" class="btn blue"><i class="fa fa-check"></i>Guardar</button>
															</div>
													</form>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab_1">
								<div class="caption font-green-sharp col-md-12">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-speech font-green-sharp"></i>
										<span class="caption-subject">Roles</span>
								</div><br>
									<div class="portlet light">
										<div class="portlet-body form">
												<form action="#" class="horizontal-form">
														<div class="col-md-6">
														   <label class="control-label col-md-6">Dar acceso al Rol #1</label>
															<div class="form-group col-md-6">
																<input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="SI" data-off-color="default" data-off-text="NO">
															</div>
															<label class="control-label col-md-6">Dar acceso al Rol #2</label>
															<div class="form-group col-md-6">
																<input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="SI" data-off-color="default" data-off-text="NO">
															</div>
															<label class="control-label col-md-6">Dar acceso al Rol #3</label>
															<div class="form-group col-md-6">
																<input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="SI" data-off-color="default" data-off-text="NO">
															</div>
														</div>
														<!--/span-->
														<div class="col-md-6">
															<label class="control-label col-md-6">Dar acceso al Rol #4</label>
															<div class="form-group col-md-6">
																	<input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="SI" data-off-color="default" data-off-text="NO">
															</div>
															<label class="control-label col-md-6">Dar acceso al Rol #5</label>
															<div class="form-group col-md-6">
																	<input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="SI" data-off-color="default" data-off-text="NO">
															</div>
															<label class="control-label col-md-6">Dar acceso al Rol #6</label>
															<div class="form-group col-md-6">
																	<input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="SI" data-off-color="default" data-off-text="NO">
															</div>
														</div>
														<br><br><br><br><br><br><br>
														<div class="form-actions right">
															<button type="button" class="btn default">Cancelar</button>
															<button type="submit" class="btn blue"><i class="fa fa-check"></i>Guardar</button>
														</div>
												</form>
										</div>
									</div>
								</div>
							</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
		</div>
	</div>

	<!-- END CONTENT -->
        

