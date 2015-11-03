
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
                        <?php echo form_open_multipart("Dashboard/ActionForm/" , array("method" => "post" )); ?>
                       
                        <input type="hidden" name="size_vars" id="size_vars" value="" />
                        <input type="hidden" name="colors" id="colors"  value="" />
                        <input type="hidden" name="action"  value="Push" />
                        <input type="hidden" name="model"  value="new_articulopre" />
                        <input type="hidden" name="dir"  value="articulos" />
                        
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
                                    <input name="shop" type="checkbox" class="make-switch" data-on-text="SI" data-off-text="No" data-on-color="primary" data-off-color="danger">
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
                        <!--
                        
                        POR SI SE NECESITA DESPUES  =)
                        
                        <div class="col-md-6">
                            <h3 lass="form-section">Productos</h3><br>
                            <table class="table table-striped table-hover table-bordered" >
                                <thead>
                                    <tr>
                                        <th>
                                <p align="center">Tallas</p>
                                </th>
                                <th >
                                <p align="center">Precio</p>
                                </th>
   
                                </tr>
                                </thead>
                                <tbody id="table_size">
                                    
                                </tbody>
                            </table>
                        </div> -->
                        <div class="col-md-6">
                            <div  style="padding: 88px;">
                            <div class="col-md-4">
                                <label>Precio :</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-circle" value="" id="txt_price" name="txt_price" />
                                <span id="price_note" class="help-block" style="font-size:8pt;">
                                     
                                  </span>
                            </div>
                              
                           </div>
                            
                        </div>
                        <div class="col-md-6" align="center" style="padding-top: 60px;">
                            <h4>Selecciona la imagen frontal y trasera de la camisa</h4>
                             <div class="col-md-6">
                            <table class="table table-striped table-hover table-bordered" >
                                <thead>
                                <tr>
                                    <th>
                                        <p align="center">Colores</p>
                                    </th>
                                    <th>
                                        <p align="center">Imagen (Frente/Trasera)</p>
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="table_color">
                                    
                                </tbody>
                            </table>
                        </div>
                        </div>

                    </div><br>
                    <!--/span-->
                    <div class="col-md-12">
                        <div class="form-actions col-md-offset-9">
                            <a href="<?php echo site_url("/0/"); ?>" class="btn default">Cancelar</a>
                            <button  id="send" name="send"  type="submit" class="btn blue"><i class="fa fa-check"></i>Guardar</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
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
        
        var tt = [];
        for(var n in $ti){
            tt.push($("#Csize_" + $ti[n]).val());
        }
        
        $("#size_vars").val(tt.join());
    };

    var _load = function() {
        
        
        //LOAD BABY
        $("#select_articulo").select2();
        
        $("#select_articulo").on("change", function() {
            
            //LLAMADA DE LA TABLA
            var Tsize = $("#table_size");
            
            //REMOVER NODOS SI EXISTEN DENTRO DE LA TABLA 
            if(Tsize.find("tr").length >= 1)
            {
                Tsize.find("tr").each(function(){
                     $(this).remove();
                });
            }
            
            //LIMPIAR ARREGLO
            $ti = [];
            
            $ci = $(this).val();
            
            
            //LLAMAR RUTINAS
            SizeInfo($ci);
            ArticleInfo($ci);
            ColorTable($ci); 
            
            
         
            
            
        });
        
        
        setInterval(function(){
                
                
                
                var name = $("#txt1").val();
                
                
                if(name === "" || name === null){
                    button_enabled(false);
                    return;
                }
                
                var table = $("#table_color");
                var count = 0;
                
                table.find("tr").each(function(){
                      count++;
                });
                
                
                if(count === 0){
                    button_enabled(false);
                    return;
                }
                
                
                if($ti.length === 0)
                {
                     button_enabled(false);
                    return;
                }
                
                button_enabled(true);
                
        } , 500);
        
        /*$(":checkbox").on("click" , function(){
            alert($(this).val());
        });*/
        
        //VERIFICA SI SE HA AGREGADO UN VALOR EN EL ARREGLO GLOBAL
       /* setInterval(function(){
            
            if($ti.length >= 1){
                SizePush();
            }
            
        } , 1000);*/

    };
    
    var button_enabled = function(enabled){
        
        var btn = $("#send");
        switch(enabled){
            case true:
                btn.attr("disabled" , false);
                break;
            case false:
                 btn.attr("disabled" , true);
                break;
        }
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
            if(parseFloat(j.min) === 0)
            {
                $("#txt_price").val(j.estimado);
                $("#price_note").html("Se ha tomado el precio estimado ya que no se ha efectuado ninguna compra.");
            }
            else
            {
                $("#txt_price").val(j.min);
                 $("#price_note").html();
            }
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
                t.append(' <div class="col-md-2"><label class="control-label">(' + k.talla + ')&nbsp;<input onclick="thei(' + k.id + ');" type="checkbox" value="' + k.talla + '" name="articulos_talla" id="Csize_' + k.id + '"></label></div>');
            });

        });
        task.do_task();
    };
    
    var ColorTable = function(data)
    {
        var t = $("#table_color");
        var cc = $("#colors");
        var task = new jtask();
        task.url = "<?php echo site_url("Dashboard/ActionRequest/GetColor/new_articulopre/articulos"); ?>";
        task.data = {"data": data};
        task.success_callback(function(e) {
            var j = JSON.parse(e);
            var d = '';
            var c = [];
            $.map(j , function(k){
                d += '<tr><td>' + k.color + '</td>';
                d += '<td>';
                d += '<div class="form-group col-md-6">';
                d += '<div class="fileinput fileinput-new" data-provides="fileinput">';
                d += '<input type="file" class="btn btn-default" name="file[]" />';
                d += '<input type="file" class="btn btn-default" name="file[]" />';
                d += '</div>';
                d += '</td>';
                d += "</tr>";
                c.push(k.id_color);
            });
            cc.val(c.join());
            t.html(d);
        });
        task.do_task();
    };
    
    
    //DEPRECADO , YA NOS E EJECUTARA ESTE PROCESO
    var SizePush = function(){
        
         var Tsize = $("#table_size");
         
         for(var i in $ti)
         {
            var n   = $ti[i]; 
            var d   = '<tr id="Tsize_' + n + '"><td align="center">' + $("#Csize_" + n).val() + '</td>';
                d  += '<td align="center">';
                d  += '<div class="form-group">';
                d  += '<div class="input-icon right">';
                d  += '<i name="change_" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>';
                d  += '<i name="change_x"style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>';
                d  += '<input autocomplete="off" required="" type="text" class="form-control " placeholder="Nuevo precio">';
                d  += '</div></div></tr>';
            
            if($("#Csize_" + n).prop("checked") === false)
            {
                Tsize.find("tr#" + "Tsize_" + n ).remove();
            }
            else if(Tsize.find("tr").length === 0)
            {
                Tsize.append(d);
            }
            else if (Tsize.find("tr#" + "Tsize_" + n ).length === 0)
            {
                Tsize.append(d);
            }
         }
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
