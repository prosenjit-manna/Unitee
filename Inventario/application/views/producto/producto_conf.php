<!-- INICIO CONTENIDO -->
	<div class="page-content-wrapper">
	<!-- INICIO CONTENIDO -->
		<div class="page-content">
			<!-- INICIO TITULO DE LA PAGINA -->
			<h3 class="page-title">
			Unitee - Configuración de Productos
			</h3>
			<!-- FINAL TITULO DE LA PAGINA -->
			<!-- INICIO BREADCUMBS -->
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-home"></i>
                <a href="<?php echo site_url("/0/"); ?>">Home</a>
						<i class="icon-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo site_url("/0/productos=conf_producto"); ?>">Configuración de Productos</a>
					</li>
				</ul>
				<div class="page-toolbar">               
				</div>
			</div>
			<!-- FINAL BREADCUMBS -->
			<!-- INICIO DASHBOARD STATS -->
           <div class="page-content-wrapper">
			<!-- INICIO PAGE CONTENT-->
			<div class="row scroller" style="height:450px" data-rail-visible="1" >
				<div class="col-md-12">
					<!-- INICIO Portlet PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption font-green-sharp">
								<i class="icon-speech font-green-sharp"></i>
								<span class="caption-subject">Configuración de Productos</span>
							</div>
						</div>
						<div class="portlet-body">
							<div class="portlet-body form">
										<!-- INICIO FORM-->
											<div class="form-body">
												<div class="row">
                           <h5 lass="form-section">Los campos con * son Requeridos</h5>
													<div class="col-md-6">
                             <h3 lass="form-section">Agregar Colores y Unidades</h3><br>
													   <label class="control-label col-md-3">* Color</label>
														<div class="form-group col-md-9">
                                     <input required="" type="text" id="" name="txt_color" class="form-control input-circle" placeholder="Nombre del color">
                                                                                                                </div> 
                                                                                                           <div class="form-group col-md-12">
                                                                                                              <table class="table table-striped table-bordered table-advance table-hover">
                                                                                                                <thead>
                                                                                                                <tr>
                                                                                                                        <th>
                                                                                                                                <p align="center">Nombre</p>
                                                                                                                        </th>
                                                                                                                        <th >
                                                                                                                                <p align="center">Color</p>
                                                                                                                        </th>
                                                                                                                        <th>
                                                                                                                                <p align="center">Operaciones</p>
                                                                                                                        </th>
                                                                                                                </tr>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                        <tr>
                                                                                                                                <td align="center">
                                                                                                                                        Rojo</p>
                                                                                                                                </td>
                                                                                                                                <td class="danger" align="center">
                                                                                                                                        <p>#FFFFFF;</p>
                                                                                                                                </td>
                                                                                                                                <td align="center">
                                                                                                                                       
                                                                                                                                        <a class="" onclick="the_id(9);" data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 20px;"></i></a>
                                                                                                                                </td>
                                                                                                                        </tr>
                                                                                                                </tbody>
                                                                                                                </table>
                                                                                                            </div> 
													</div>
													<!--/span-->
													<div class="col-md-6">
                            <br><br><br><br>
                                <label class="control-label col-md-3">* Unidad</label>
														<div class="form-group col-md-9">
                                    <input type="text" id="" name="txt_precio" class="form-control input-circle" placeholder="Unidad de productos">
														</div>
                                                                                                            <div class="form-group col-md-12">
                                                                                                               <table class="table table-striped table-bordered table-advance table-hover">
                                                                                                                <thead>
                                                                                                                <tr>
                                                                                                                        <th>
                                                                                                                                <p align="center">Unidad</p>
                                                                                                                        </th>
                                                                                                                        <th>
                                                                                                                                <p align="center">Operaciones</p>
                                                                                                                        </th>
                                                                                                                </tr>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                        <tr>
                                                                                                                                <td align="center">
                                                                                                                                        <p>Yardas</p>
                                                                                                                                </td>
                                                                                                                                <td align="center">
                                                                                                                                     
                                                                                                                                        <a class="" onclick="the_id(9);" data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 20px;"></i></a>
                                                                                                                                </td>
                                                                                                                        </tr>
                                                                                                                </tbody>
                                                                                                                </table>
                                                                                                            </div> 
													<!--/span-->
												    </div>
                                                                                                     <div id="responsive_delete" class="modal fade" tabindex="-1" aria-hidden="true">
                                                                                                        <div class="modal-dialog">
                                                                                                                <div class="modal-content">
                                                                                                                        <div class="modal-header">
                                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                                                                                <h4 class="modal-title">Eliminar Color</h4>
                                                                                                                        </div>
                                                                                                                        <div class="modal-body">
                                                                                                                                <div class="scroller" style="height:30px" data-always-visible="1" data-rail-visible1="1">
                                                                                                                                        <div class="row">
                                                                                                                                                <div class="col-md-12">
                                                                                                                                                    <h4>¿Deseas eliminar $name_producto de tu lista de productos?</h4>
                                                                                                                                                </div>
                                                                                                                                        </div>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="modal-footer">
                                                                                                                                <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                                                                                                                <button type="button" data-dismiss="modal" onclick="delete_provider();" class="btn green">Eliminar</button>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
									</div>
                        </div>
											<div class="form-actions right">
                          <a href="<?php echo site_url("/0/"); ?>" class="btn default">Cancelar</a>
                          <button  id="send" name="send"  type="submit" class="btn blue"><i class="fa fa-check"></i>Guardar</button>
											</div>
										<!-- FINAL FORM-->
									</div>
						</div>
					</div>
					<!-- FINAL Portlet PORTLET-->
				</div>
			</div>
			<!-- FINAL PAGE CONTENTENIDO-->
		</div>
		<!-- FINAL ESTILOS DE LA BARRA -->
	</div>
	<!-- FINAL CONTENIDO -->