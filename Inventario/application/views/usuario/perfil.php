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
			Unitee - Perfil 
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
                                                <a href="<?php echo site_url("Dashboard/index"); ?>">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("Dashboard/index/user=user_profile"); ?>">Perfil</a>
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
				<div class="col-md-3">
                                
						<!-- PORTLET MAIN -->
						<div class="portlet light profile-sidebar-portlet">
							<!-- SIDEBAR USERPIC -->
							<div class="profile-userpic">
                                                            <?php if(is_null($user_data['avatar'])):  ?>
								<img src="<?php echo $route; ?>images/dashboard/avatar.png" class="img-responsive" alt="">
                                                            <?php else: ?>
                                                                <img src="<?php echo $route; ?>images/dashboard/users/<?php echo $user_data['avatar']; ?>" class="img-responsive" alt="">
                                                            <?php endif; ?>
                                                        </div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
								    <?php
                                                                        echo  strtoupper( $user_data['user']);
                                                                    ?>
								</div>
								<div class="profile-usertitle-job">
                                                                    <?php 
                                                                        echo strtoupper( $user_data['rol_name']);
                                                                    ?>
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
												<form role="form">
													<div class="form-group">
														<label class="control-label">Nombres</label>
                                                                                                                <input disabled="disabled" type="text" class="form-control" value="<?php echo $user_data['name']; ?>" />
													</div>
										
													<div class="form-group">
														<label class="control-label">Privilegios</label>
														<input disabled="disabled"  type="text" class="form-control" value="<?php echo $user_data['rol_name']; ?>"/>
													</div>
													<div class="form-group">
														<label class="control-label">Correo</label>
														<input disabled="disabled"  type="text" class="form-control" value="<?php echo $user_data['email']; ?>"/>
													</div>
													<div class="form-group">
														<label class="control-label">Usuario</label>
														<input disabled="disabled"  type="text" class="form-control" value="<?php echo $user_data['user']; ?>"/>
													</div>
												</form>
											</div>
											
											<div id="tab_2-2" class="tab-pane">
												<form action="#" role="form">
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
															</div>
															<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
															</div>
															<div>
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
													<div class="margin-top-10">
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

