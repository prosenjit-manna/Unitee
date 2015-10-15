<style type="text/css" media="screen">
    div.upload {
        width: 37px;
        height: 35px;
        background: url(<?php echo $route; ?>images/dashboard/plus.png);
        overflow: hidden;
    }

    div.upload input {
        display: block !important;
        width: 57px !important;
        height: 35px !important;
        opacity: 0 !important;
        overflow: hidden !important;
    }
</style>
<div class="page-content-wrapper">
    <!-- INICIO CONTENIDO -->
    <div class="page-content">
        <?php
        $response = isset($_REQUEST['s']) ? $_REQUEST['s'] : -1;
        if ($response != -1) {
            switch ($response) {
                case TRUE:
                    echo '<div class="alert alert-block alert-success fade in">
                       <button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"></button><p>Articulo creado con exito</p>
                                          </div>';
                    break;
                case FALSE:
                    echo ' <div class="alert alert-block alert-danger fade in">
                              <button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"> </button><p>No se pudo crear el articulo,  favor intentar de nuevo.</p>
                                        </div>';
                    break;
            }
        }
        ?>
        <h3 class="page-title">
            Unitee - Nuevo Articulo
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
                    <a href="#">Nuevo Articulo</a>
                </li>
            </ul>
        </div>
        <!-- FINAL BREADCUMBS -->
        <div class="page-content-wrapper scroller" style="height:430px" data-rail-visible="1">
            <!-- INICIO Portlet PORTLET-->
            <div class="portlet">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption font-green-sharp">
                            <i class="icon-speech font-green-sharp"></i>
                            <span class="caption-subject bold uppercase">Nuevo Articulo</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- INICIO FORM-->
                        <h5 lass="form-section">Los campos con * son Requeridos</h5>
                        <div class="col-md-12">
                            <h3 lass="form-section">General</h3><br>
                            <div class="col-md-6">
                                <br><label class="control-label col-md-4">* Nombre</label>
                                <div class="form-group col-md-8">
                                    <input autocomplete="off"  required="required" type="text" id="txt1" name="txt_nombre" class="form-control input-circle" placeholder="Nombre del producto">
                                </div>
                                <br><br><br><br><label class="control-label col-md-4">Descripci&oacute;n</label>
                                <div class="form-group col-md-8">
                                    <textarea name="txt_desc" class="form-control input-circle" rows="3" placeholder="Descripción del producto"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6"><br>
                                <label clas="control-label col-md-3" for="">Tallas</label>
                                <label clas="control-label col-md-4" for=""><input type="checkbox" onchange="marcarTodas();" name="checkaa" id="checkaa">Marcar todas</label><br>
                                <div class="col-md-12" id="diasHabilitados">
                                    <div class="col-md-2"><label clas="control-label">XS<input type="checkbox" checked="" name="checkboxx" id="checkboxx"></label></div>
                                    <div class="col-md-2"><label clas="control-label">S<input type="checkbox" checked="" name="checkbox" id="checkbox"></label></div>
                                    <div class="col-md-2"><label clas="control-label">M<input type="checkbox" checked="" name="checkbox" id="checkbox"></label></div>
                                    <div class="col-md-2"><label clas="control-label">L<input type="checkbox" checked="" name="checkbox" id="checkbox"></label></div>
                                    <div class="col-md-2"><label clas="control-label">G<input type="checkbox" checked="" name="checkbox" id="checkbox"></label></div>
                                    <div class="col-md-2"><label clas="control-label">XL<input type="checkbox" checked="" name="checkbox" id="checkbox"></label></div>
                                </div><br><br>
                                <label class="control-label col-md-4">Ver en tienda</label>
                                <div class="form-group col-md-8">
                                    <input type="checkbox" class="make-switch" data-on-text="SI" data-off-text="No" data-on-color="primary" data-off-color="danger">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3 lass="form-section">Productos</h3><br>
                            <a class="btn btn-success"   data-toggle="modal" href="#responsive_add"><i class="icon-plus"> Añadir</i></a><br><br>
                            <table class="table table-striped table-hover table-bordered" >
                                <thead>
                                    <tr>
                                        <th>
                                <p align="center">Nombre</p>
                                </th>
                                <th >
                                <p align="center">Colores</p>
                                </th>
                                <th >
                                <p align="center">Tallas</p>
                                </th>
                                <th>
                                <p align="center">Operaciones</p>
                                </th>
                                </tr>
                                </thead>
                                <tbody id="table_prod">
                                    <tr>
                                        <td align="center">Sincatex</td>
                                        <td align="center">
                                            <a data-toggle="modal" href="#stack2"><span class="badge badge-danger">Rojo</span></a>
                                            <a data-toggle="modal" href="#stack2"><span class="badge badge-info">Azul</span></a>
                                        </td>
                                        <td align="center">
                                            <p class="col-md-4">XS<input type="checkbox" name="" id="6" checked="checked"></p>
                                            <p class="col-md-4">S<input type="checkbox" name="" id="6" checked="checked"></p>
                                            <p class="col-md-4">M<input type="checkbox" name="" id="6" checked="checked"></p>
                                        <td align="center">
                                            <a title="editar producto" href="#"><i class="icon-pencil" style="font-size: 20px;"></i></a>
                                            <a title="eliminar producto " class="" data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 20px;"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">Latex Bond</td>
                                        <td align="center">
                                            <a data-toggle="modal" href="#stack2"><span class="badge badge-danger">Rojo</span></a>
                                            <a data-toggle="modal" href="#stack2"><span class="badge badge-warning">Amarillo</span></a>
                                            <a data-toggle="modal" href="#stack2"><span class="badge badge-info">Azul</span></a>
                                        </td>
                                        <td align="center">
                                            <p class="col-md-12">Todas<input type="checkbox" name="" id="6" checked="checked"></p>
                                        <td align="center">
                                            <a title="editar producto" href="#"><i class="icon-pencil" style="font-size: 20px;"></i></a>
                                            <a title="eliminar producto " class="" data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 20px;"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">Sincatex</td>
                                        <td align="center">
                                            <a data-toggle="modal" href="#stack2"><span class="badge badge-danger">Rojo</span></a>
                                            <a data-toggle="modal" href="#stack2"><span class="badge badge-warning">Amarillo</span></a>
                                            <a data-toggle="modal" href="#stack2"><span class="badge badge-success">Verde</span></a>
                                            <a data-toggle="modal" href="#stack2"><span class="badge badge-info">Azul</span></a>
                                        </td>
                                        <td align="center">
                                            <p class="col-md-4">XS<input type="checkbox" name="" id="6" checked="checked"></p>
                                            <p class="col-md-4">S<input type="checkbox" name="" id="6" checked="checked"></p>
                                            <p class="col-md-4">M<input type="checkbox" name="" id="6" checked="checked"></p><br>
                                            <p class="col-md-4">L<input type="checkbox" name="" id="6" checked="checked"></p>
                                            <p class="col-md-4"> G<input type="checkbox" name="" id="6" checked="checked"></p>
                                        <td align="center">
                                            <a title="editar producto" href="#"><i class="icon-pencil" style="font-size: 20px;"></i></a>
                                            <a title="eliminar producto " class="" data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 20px;"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><br>
                    <!--/span-->
                    <div class="col-md-12">
                        <div class="form-actions col-md-offset-9">
                            <a href="<?php echo site_url("/0/"); ?>" class="btn default">Cancelar</a>
                            <button disabled="disabled" id="send" name="send"  type="submit" class="btn blue"><i class="fa fa-check"></i>Guardar</button>
                        </div>
                    </div>
                    <!--Modals-->
                    <div id="responsive_delete" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Eliminar Producto</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="scroller" style="height:30px" data-always-visible="1" data-rail-visible1="1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>¿Deseas eliminar este producto de tu lista?</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                    <button type="button" data-dismiss="modal" onclick="delete_product();" class="btn green">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade bs-modal-lg" id="responsive_add" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Agregar productos</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 row scroller" style="height:325px" data-always-visible="1" data-rail-visible1="1">
                                        <br>
                                        <div class="col-md-8">
                                            <label class="control-label col-md-4">* Nombre</label>
                                            <div class="form-group col-md-8">
                                                <select onchange="select_color(this.value);" required="required" id="select_nombre" name="txt_pombre" class="form-control input-circle">                     
                                                    <option value="-1">Seleccione el producto</option>
                                                    <option value="">Tela</option>
                                                    <option value="">Botones</option>
                                                </select>
                                            </div>
                                            <label class="control-label col-md-4">* Color</label>
                                            <div class="form-group col-md-8">
                                                <select id="color_prod" required="required" id="select_color" name="txt_color" class="form-control input-circle">                     
                                                    <option value="-1">Seleccione el color</option>
                                                    <option value="">Rojo</option>
                                                    <option value="">Azul</option>
                                                </select>
                                            </div>

                                            <a class="btn btn-success"   data-toggle="modal" href="#"><i class="icon-plus"> Añadir</i></a><br><br>
                                            <table class="table table-striped table-hover table-bordered" >
                                                <thead>
                                                    <tr>
                                                        <th>
                                                <p align="center">Nombre</p>
                                                </th>
                                                <th >
                                                <p align="center">Subir imagen</p>
                                                </th>
                                                <th >
                                                <p align="center">Operaciones</p>
                                                </th>
                                                </tr>
                                                </thead>
                                                <tbody id="table_prod">
                                                    <tr>
                                                        <td align="center">Sincatex</td>
                                                        <td align="center">
                                                            <a class="btn default" data-toggle="modal" href="#stack2">
                                                                Subir..
                                                            </a>
                                                        </td>
                                                        <td align="center">
                                                            <a title="eliminar" href="#"><i class="icon-close" style="font-size: 20px; color:red;"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label col-md-4">* Tallas</label><br>
                                            <p class="col-md-4">12<input type="checkbox" name="" id="6" checked="checked"></p>
                                            <p class="col-md-4">14<input type="checkbox" name="" id="6" checked="checked"></p>
                                            <p class="col-md-4">XS<input type="checkbox" name="" id="6" checked="checked"></p>
                                            <p class="col-md-4">S<input type="checkbox" name="" id="6" checked="checked"></p>
                                            <p class="col-md-4">M<input type="checkbox" name="" id="6" checked="checked"></p><br>
                                            <p class="col-md-4">L<input type="checkbox" name="" id="6" checked="checked"></p>
                                            <p class="col-md-4">G<input type="checkbox" name="" id="6" checked="checked"></p>
                                            <p class="col-md-4">XL<input type="checkbox" name="" id="6" checked="checked"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                    <button type="button" id="send" data-dismiss="modal" class="btn green" disabled="disabled">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="stack2" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Stack Two</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12" align="center">
                                            <h4>Selecciona la imagen frontal y trasera de la camisa</h4>
                                            <div class="form-group col-md-6">
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
                                                            <input type="file" name="avatar_img">
                                                        </span>
                                                        <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
                                                            Eliminar </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
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
                                                            <input type="file" name="avatar_img">
                                                        </span>
                                                        <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
                                                            Eliminar </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn">Cerrar</button>
                                    <button type="button" class="btn green" disabled="disabled">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modals-->
                </div>
            </div>
        </div>
    </div>
    <!-- FINAL Portlet PORTLET-->
</div>
</div>
<script>
    var marcarTodas = function () {
            var marcall = $("#checkaa").val();
            var mar = $("#checkboxx").val();
            mar.prop("checked",false);
</script>