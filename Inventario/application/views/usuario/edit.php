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
<!--FINAL ESTILOS DE LA BARRA-->

<!-- INICIO CONTENIDO -->
	<div class="page-content-wrapper">
	<!-- INICIO CONTENIDO -->
		<div class="page-content">
			<!-- INICIO TITULO DE LA PAGINA ACRUAL-->
			<h3 class="page-title">
			Unitee - Editar Usuario 
			</h3>
			<!-- FINAL TITULO DE LA PAGINA ACRUAL-->

			<!-- INICIO TITULO PAGE BAR BREADCUMBS-->
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
			<!-- FINAL TITULO PAGE BAR BREADCUMBS-->

			<!-- INICIO DEL MAIN CONTENIDO-->
			<div class="page-content-wrapper">
				<!-- INICIO FILA DEL CONTENIDO -->
				<div class="row">
					<!-- INICIO PORTLET DEL CONTENIDO-->
					<div class="col-md-12 ">
					<!-- INICIO PORTLET LIGHT-->
					<div class="portlet light">
						<!-- INICIO PORTLET TABS-->
						<div class="portlet-title tabbable-line">
							<div class="caption font-green-sharp">
								<i class="icon-speech font-green-sharp"></i>
								<span class="caption-subject">Editar Roles e Informacion de USuario</span>
							</div>
							<ul class="nav nav-tabs">
								<li>
								<select class="btn btn-default dropdown-toggle input-circle">
									<option value="square" selected="selected">Seleccione el Usuario</option>
									<option value="rounded">Usuario 1</option>
									<option value="rounded">Usuario 2</option>
									<option value="rounded">Usuario 3</option>
									<option value="rounded">Usuario 4</option>
								</select>
								</li>
								<li class="active">
									<a href="#portlet_tab1" data-toggle="tab">
									Editar Usuario</a>
								</li>
								<li>
									<a href="#portlet_tab2" data-toggle="tab">
									Editar Roles</a>
								</li>
							</ul>
						</div>
						<!-- FINAL PORTLET TABS-->

						<!-- INICIO PORTLET NODY-->
						<div class="portlet-body">
							<!-- INICIO PORTLET TAB CONTENT-->
							<div class="tab-content">
								<!-- INICIO DEL PRIMER TAB PANE-->
								<div class="tab-pane " id="portlet_tab2">
									<!-- INICIO DEL DIV DEL SCROLLER-->
									<div class="scroller" style="height: 250px;">
												<!--INICIO FORMULARIO ROLES-->
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
														<br><br><br><br><br><br><br><br>
														<div class="form-actions" align="right">
															<button type="button" class="btn default">Cancelar</button>
															<button type="submit" class="btn blue"><i class="fa fa-check"></i>Guardar</button>
														</div>
												</form>
												<!--FINAL FORMULARIO ROLES-->

									</div>
									<!-- FINAL DEL DIV DEL SCROLLER-->

								</div>
								<!-- FINAL DEL PRIMER TAB PANE-->

								<!-- INICIO DEL SEGUNDO TAB PANE-->
								<div class="tab-pane active" id="portlet_tab1">
									<!-- INICIO DEL DIV DEL SCROLLER-->
									<div class="scroller" style="height: 250px;">
													<!--INICIO FORMULARIO INFO USUARIO-->
													<form action="#" class="horizontal-form">
															<div class="col-md-6">
															   <label class="control-label col-md-2">Nombres</label>
																<div class="form-group col-md-10">
																	<input type="text" id="firstName" class="form-control input-circle" placeholder="Nombres" required>
																</div>
																<label class="control-label col-md-2">Apellidos</label>
																<div class="form-group col-md-10">
																	<input type="text" id="firstName" class="form-control input-circle" placeholder="Apellidos" required>
																</div>
																<label class="control-label col-md-2">Correo</label>
																<div class="form-group col-md-10">
																		<input type="email" class="form-control input-circle" placeholder="Email Address" required>
																</div>
															</div>
															<!--/span-->
															<div class="col-md-6">
																<label class="control-label col-md-2">Usuario</label>
																<div class="form-group col-md-10">
																	<input type="text" id="firstName" class="form-control input-circle" placeholder="Nombre de Usuario required" required>
																</div>
																<label class="control-label col-md-2">Contraseña</label>
																<div class="form-group col-md-10">
																	<input type="password" id="firstName" class="form-control input-circle" placeholder="Contraseña" required>
																</div>
																<label class="control-label col-md-2">Repetir</label>
																<div class="form-group col-md-10">
																	<input type="password" id="firstName" class="form-control input-circle" placeholder="Repetir Contraseña" required>
																</div>
																<label class="control-label col-md-2">Autogenerar</label>
																<div class="form-group col-md-10">
																	<div class="radio-list">
																		<input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="SI" data-off-color="default" data-off-text="NO">
																	</div>
																</div>
															</div>
															<br><br><br>
															<div class="form-actions" align="right">
																<button type="button" class="btn default">Cancelar</button>
																<button type="submit" class="btn blue" id="showtoast"><i class="fa fa-check"></i>Guardar</button>
															</div>
													</form>
													<!--FINAL FORMULARIO INFO USUARIO-->

									</div>
									<!-- FINAL DEL DIV DEL SCROLLER-->

								</div>
								<!-- FINAL DEL SEGUNDO TAB PANE-->

							</div>
							<!-- FINAL PORTLET TAB CONTENT-->

						</div>
						<!-- FINAL PORTLET NODY-->

					</div>
					<!-- INICIO PORTLET LIGHT-->

				</div>
				<!-- FINAL PORTLET DEL CONTENIDO-->

				</div>
				<!-- FINAL FILA DEL CONTENIDO -->

			</div>
			<!-- FINAL DEL MAIN CONTENIDO-->

		</div>
		<!-- FINAL CONTENIDO -->

	</div>
	<!-- FINAL CONTENIDO -->