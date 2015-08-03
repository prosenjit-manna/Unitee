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
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<h3 class="page-title">
			Unitee - Dashboard <small>Opcion elegida</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
				<div class="page-toolbar">
                                    
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
                       <div class="page-content-wrapper">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
		
			<!-- BEGIN PAGE HEADER-->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-3">
                                
						<!-- PORTLET MAIN -->
						<div class="portlet light profile-sidebar-portlet">
							<!-- SIDEBAR USERPIC -->
							<div class="profile-userpic">
								<img src="<?php echo $route; ?>images/dashboard/avatar.png" class="img-responsive" alt="">
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									Marcus Doe
								</div>
								<div class="profile-usertitle-job">
									Developer
								</div>
							</div>
							<!-- END SIDEBAR USER TITLE -->
						</div>
						<div>
							<ul class="ver-inline-menu tabbable margin-bottom-10">
											<li class="active">
												<a data-toggle="tab" href="#tab_1-1">
												<i class="fa fa-cog"></i> Información Personal</a>
												<span class="after">
												</span>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_2-2">
												<i class="fa fa-picture-o"></i> Cambiar Imagen</a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_3-3">
												<i class="fa fa-lock"></i> Cambiar Contraseña</a>
											</li>
										</ul>

						</div>
						
				</div>
                             <div class="col-md-9 ">
						<div class="tab-content class_tbody ">
											<div id="tab_1-1" class="tab-pane active">
												<form role="form" action="#">
													<div class="form-group">
														<label class="control-label">Nombres</label>
														<input type="text" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Apellidos</label>
														<input type="text" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Privilegios</label>
														<input type="text" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Correo</label>
														<input type="text" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Usuario</label>
														<input type="text" class="form-control"/>
													</div>
												</form>
											</div>
											<div id="tab_2-2" class="tab-pane">
												<form action="#" role="form">
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
																<div align="center"class="fileinput-new thumbnail col-md-6" style="width: 200px; height: 150px;">
																<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
																</div>
																<div align="center"class="fileinput-preview fileinput-exists thumbnail col-md-6" style="max-width: 200px; max-height: 150px;">
																</div>
															<div class="col-md-12">
																<span class="btn default btn-file">
																<span class="fileinput-new">
																Seleccionar Imagen </span>
																<span class="fileinput-exists">
																Cambiar </span>
																<input type="file" name="...">
																</span>
																<a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
																Eliminar </a>
															</div>
														</div>
													</div>
													<div class="margin-top-10 col-md-12">
														<a href="#" class="btn green">
														Guardar </a>
														<a href="#" class="btn default">
														Cancelar </a>
													</div>
												</form>
											</div>
											<div id="tab_3-3" class="tab-pane">
												<form action="#">
													<div class="form-group">
														<label class="control-label">Contraseña Actual</label>
														<input type="password" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Nueva Contraseña</label>
														<input type="password" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Repetir Contraseña</label>
														<input type="password" class="form-control"/>
													</div>
													<div class="margin-top-10">
														<a href="#" class="btn green">
														Cambiar </a>
														<a href="#" class="btn default">
														Cancelar </a>
													</div>
												</form>
											</div>
										</div>
									
                </div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
		</div>
	</div>

	<!-- END CONTENT -->

