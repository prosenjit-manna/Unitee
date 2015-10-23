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
            Unitee - Nuevo Articulo Pre-Fabricado
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
                    <a href="#">Nuevo Articulo Pre-Fabricado</a>
                </li>
            </ul>
        </div>
        <!-- FINAL BREADCUMBS -->
        <div class="page-content-wrapper scroller" style="height:430px" data-rail-visible="1" data-rail-visible="1" data-rail-color="white" data-handle-color="black">
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
                            <h3 lass="form-section">General</h3>
                            <div class="col-md-6">
                                <br><label class="control-label col-md-4">* Nombre</label>
                                <div class="form-group col-md-8">
                                    <input autocomplete="off"  required="required" type="text" id="txt1" name="txt_nombre" class="form-control input-circle" placeholder="Nombre del producto">
                                </div>
                                <div style="padding-top: 88px;">
                                    <label class="control-label col-md-4">Descripci&oacute;n</label>
                                    <div class="form-group col-md-8">
                                        <textarea name="txt_desc" class="form-control input-circle" rows="4" placeholder="Descripción del producto"></textarea>
                                    </div>
                                </div>
                                <label class="control-label col-md-4">Ver en tienda</label>
                                <div class="form-group col-md-8">
                                    <input type="checkbox" class="make-switch" data-on-text="SI" data-off-text="No" data-on-color="primary" data-off-color="danger">
                                </div>
                            </div>
                            <div class="col-md-6"><br>
                                <label class="control-label col-md-4">* Productos</label>
                                <div class="form-group col-md-8">
                                    <select required="required" id="select_articulo" name="txt_articulo" class="form-control input-circle">                     
                                        <option value="-1">Seleccione el producto</option>
                                        <?php
                                        foreach ($articles as $a):
                                            ?>
                                            <option value="<?php echo $a->nombre ?>"><?php echo $a->nombre ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span id="article_info" class="help-block" style="font-size:8pt;">
                                      
                                    </span>
                                </div>
                                <label clas="control-label col-md-3" for="">* Seleccione las tallas</label><br>
                                <div class="col-md-offset-1">
                                    <!-- <label clas="control-label col-md-4" for="">
                                         <input type="checkbox" onchange="_check();"  id="_talla_all">Marcar todas
                                     </label> -->
                                </div><br>
                                <div id="talla_check" class="col-md-12">
                                    <div class="col-md-2"><label clas="control-label">XS<input type="checkbox" name="checkboxx" id="checkboxx"></label></div>
                                    <div class="col-md-2"><label clas="control-label">S<input type="checkbox"  name="checkbox" id="checkbox"></label></div>
                                    <div class="col-md-2"><label clas="control-label">M<input type="checkbox"  name="checkbox" id="checkbox"></label></div>
                                    <div class="col-md-2"><label clas="control-label">L<input type="checkbox"  name="checkbox" id="checkbox"></label></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 lass="form-section">Productos</h3><br>
                            <table class="table table-striped table-hover table-bordered" id="products_table">
                                <thead>
                                    <tr>
                                        <th>
                                <p align="center">Tallas</p>
                                </th>
                                <th >
                                <p align="center">Precio</p>
                                </th>
                                <th>
                                <p align="center">Operaciones</p>
                                </th>
                                </tr>
                                </thead>
                                <tbody id="table_prod">
                                    <tr>
                                        <td align="center">XL</td>
                                        <td align="center">
                                            <div class="form-group">
                                                <div class="input-icon right">
                                                    <i name="change_" id="change_precio_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                                    <i name="change_x" id="change_precio" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                                    <input autocomplete="off" maxlength="8" onkeyup="validate_precio();" required="" type="text" id="txt5" name="txt_precio" class="form-control input-circle" placeholder="Escribe el recio de esta talla">
                                                </div>
                                            </div>
                                        </td>
                                        <td align="center">
                                            <a title="editar producto" href="#"><i class="icon-pencil" style="font-size: 20px;"></i></a>
                                            <a title="eliminar producto " class="" data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 20px;"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6" align="center" style="padding-top: 60px;">
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
                    <!--Modals-->
                </div>
            </div>
        </div>
    </div>
    <!-- FINAL Portlet PORTLET-->
</div>
</div>
<script>

    var $ti = [];
    var $ci = null;

    var thei = function(i) {
        $ti.push(i);
    };

    var _load = function() {
        $("#select_articulo").select2();
        $("#select_articulo").on("change", function() {

            $ti = [];
            $ci = $(this).val();
            SizeInfo($ci);
            ArticleInfo($ci);
        });

    };

    var ArticleInfo = function(data) {
        var t = $("#article_info");
        var task = new jtask();
        task.url = "<?php echo site_url("Dashboard/ActionRequest/GetInfo/new_articulopre/articulos"); ?>";
        task.data = {"data": data};
        task.beforesend = true;
        task.config_before(function() {
            t.html("generando informacion ...");
        });
        task.success_callback(function(e) {
            var j = JSON.parse(e);
            t.html(' Hay ' + j.cantidad +  ' de ' + data +  ' su rango de precio es desde $' + j.min + ' hasta $' + j.max);
        });
        task.do_task();
    };


    var SizeInfo = function(data) {

        var t = $("#talla_check");
        var task = new jtask();
        task.url = "<?php echo site_url("Dashboard/ActionRequest/GetSize/new_articulopre/articulos"); ?>";
        task.data = {"data": data};
        task.beforesend = true;
        task.config_before(function() {
            t.html("Buscando tallas ...");
        });
        task.success_callback(function(e) {
            var j = JSON.parse(e);
            t.html('');

            $.map(j, function(k) {
                t.append(' <div class="col-md-2"><label class="control-label">(' + k.talla + ')&nbsp;<input onclick="thei(' + k.id + ');" type="checkbox" value="' + k.id + '" name="articulos_talla" id="articulos_talla"></label></div>');
            });

        });
        task.do_task();
    };


    //DEPRECADO V1
    /*var _check = function(){
     var prop = $("#_talla_all").prop("checked");
     if(prop){
     $("#talla_check")
     .find("checkbox")
     .prop("checked" , true);
     $("#talla_check")
     .find("span")
     .addClass("checked");
     }
     else{
     $("#talla_check")
     .find("checkbox")
     .prop("checked" , false);
     $("#talla_check")
     .find("span")
     .removeClass()("checked");
     }
     };*/

    var validate_precio = function() {
        var change_precio_ok = $("#change_precio_ok");
        var change_precio = $("#change_precio");
        var precio = $("#txt5").val();
        if (isNaN(precio) || precio == "") {
            change_precio_ok.css("display", "none");
            change_precio.css("display", "block");
            return true;
        }
        else {
            change_precio_ok.css("display", "block");
            change_precio.css("display", "none");
            return false;
        }
    };
</script>
