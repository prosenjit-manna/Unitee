<!-- INICIO CONTENIDO -->
<div class="page-content-wrapper">

    <!-- INICIO CONTENIDO -->
    <div class="page-content">
        <!-- INICIO TITULO DE LA PAGINA -->
        <h3 class="page-title">
            Unitee - Nueva Compra
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
                    <a href="#">Nueva Compra</a>
                </li>
            </ul>
            <div class="page-toolbar">

            </div>
        </div>
        <!-- FINAL BREADCUMBS -->

        <!-- INICIO DASHBOARD STATS -->
        <div class="page-content-wrapper">
            <input type="hidden" id="providers" value='<?php echo json_encode($prov ,  JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); ?>' />
            <!-- INICIO PAGE CONTENT-->
            <div class="row scroller" style="height:430px" data-rail-visible="1" >
                <!-- INICIO Portlet PORTLET-->
                <div class="portlet">  
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-sharp">
                                <i class="icon-speech font-green-sharp"></i>
                                <span class="caption-subject bold uppercase">Nueva Compra</span>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label class="control-label col-md-3">* Proveedor</label>
                                <div class="form-group col-md-7">
                                    <select onchange="provider_selected(this.value);" required="" id="select_colors" name="txt_color" class="form-control input-circle">
                                        <option value="-1">Seleccione un proveedor</option>
                                        <?php  foreach ($prov as $v): ?>
                                            <option value="<?php echo $v->id_prov; ?>"><?php echo $v->empresa; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <a href="<?php echo site_url("/0/proveedor=new_proveedor"); ?>" class="col-md-1 btn btn-default"><span style="font-size:14px;" class="glyphicon glyphicon-plus-sign"></span></a>
                            </div>
                            <div id="prov_data" class="col-md-12">
                                <div id="prov_dir" class="col-md-6">
                                   
                                </div>
                                <div id="prov_name" class="col-md-3">
                                   
                                </div>
                                <div id="prov_num" class="col-md-3">
                                  
                                </div>

                            </div>
                        </div>
                        <a class="btn btn-success"   data-toggle="modal" href="#responsive_add"><i class="icon-plus"> Añadir</i></a>
                        <div class="portlet-body">
                             <br>
                             <table class="table table-striped table-hover table-bordered" id="productos_table">
                                <thead>
                                    <tr>
                                        <th>
                                            <p align="center">Nombre</p>
                                        </th>
                                        <th >
                                            <p align="center">Color</p>
                                        </th>
                                        <th >
                                            <p align="center">Cantidad</p>
                                        </th>
                                        <th>
                                            <p align="center">Precio</p>
                                        </th>
                                        <th>
                                            <p align="center">Operaciones</p>
                                        </th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p align="center">Telaa</p>
                                        </td>
                                        <td>
                                            <p align="center">Rojo</p>
                                        </td>
                                        <td>
                                            <p align="center">46</p>
                                        </td>
                                        <td>
                                            <p align="center">$100.52</p>
                                        </td>
                                        <td>
                                            <p align="center">
                                                <a class=""   data-toggle="modal" href="#responsive_delete"><i class="icon-remove-circle" style="font-size: 25px; color:#FA5858;"></i></i></a>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p align="center">Telaa</p>
                                        </td>
                                        <td>
                                            <p align="center">Rojo</p>
                                        </td>
                                        <td>
                                            <p align="center">46</p>
                                        </td>
                                        <td>
                                            <p align="center">$100.52</p>
                                        </td>
                                        <td>
                                            <p align="center">
                                                <a class=""   data-toggle="modal" href="#responsive_delete"><i class="icon-remove-circle" style="font-size: 25px; color:#FA5858;"></i></i></a>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p align="center">Telaa</p>
                                        </td>
                                        <td>
                                            <p align="center">Rojo</p>
                                        </td>
                                        <td>
                                            <p align="center">46</p>
                                        </td>
                                        <td>
                                            <p align="center">$100.52</p>
                                        </td>
                                        <td>
                                            <p align="center">
                                                <a class=""   data-toggle="modal" href="#responsive_delete"><i class="icon-remove-circle" style="font-size: 25px; color:#FA5858;"></i></i></a>
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-7">
                                <h4>Adjuntar</h4>
                                <form action="generados/index.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input id="archivo" name="archivo" type="file" class="file" multiple=true data-preview-file-type="any" class="form-group"required>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-5"><br><br>
                                <label class="control-label col-md-3"> P.O </label>
                                <div class="form-group col-md-9">
                                    <input onkeyup="validar();" type="text" name="txt_po" id="txt_po" value="" class="form-control input-circle" placeholder="Orden de compra">
                                </div>
                                <label class="control-label col-md-3">* Factura</label>
                                <div class="form-group col-md-9">
                                    <input onkeyup="validar();" type="text" name="txt_factura" id="txt_factura" value="" class="form-control input-circle" placeholder="Factura">
                                </div>
                                <label class="control-label col-md-3">* Precio</label>
                                <div class="form-group col-md-9">
                                    <div class="input-icon right">
                                        <i name="change_" id="change_ptotal_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                        <i name="change_x" id="change_ptotal" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                        <input onkeyup="" required="" type="text" id="txt_ptotal" name="txt_ptotal" disabled="disabled" class="form-control input-circle" placeholder="Numero de ptotal">
                                    </div>
                                </div>
                            </div>

                        </div><br><br>
                        <div class="form-actions right col-md-offset-10">
                            <a href="<?php echo site_url("/0/"); ?>" class="btn default">Cancelar</a>
                            <button disabled="disabled" id="send" name="send"  type="submit" class="btn blue"><i class="fa fa-check"></i>Guardar</button>
                        </div>
                        <!-- FINAL Portlet PORTLET-->
                    </div>

                    <!-- FINAL PAGE CONTENTENIDO-->
                </div>
                <div id="responsive_delete" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Eliminar Compras</h4>
                            </div>
                            <div class="modal-body">
                                <div class="scroller" style="height:30px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>¿Deseas eliminar  esta compra?</h4>
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
                 <div class="modal fade bs-modal-lg" id="responsive_add" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Ingrese la información del producto</h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 row scroller" style="height:190px" data-always-visible="1" data-rail-visible1="1">
                                        <br>
                                        <label class="control-label col-md-2">* Nombre</label>
                                       <div class="form-group col-md-4">
                                           <select required="required" id="select_nombre" name="txt_pombre" class="form-control input-circle">                     
                                                <option value="">Seleccione el producto</option>
                                            </select>
                                       </div>
                                        <label class="control-label col-md-2">* Color</label>
                                       <div class="form-group col-md-4">
                                            <select required="required" id="select_color" name="txt_color" class="form-control input-circle">                     
                                                <option value="">Seleccione el color</option>
                                            </select>
                                       </div>
                                       <label class="control-label col-md-2">Cantidad</label>
                                        <div class="form-group col-md-4">
                                            <div class="input-icon right">
                                                <i name="change_" id="change_pcantidad_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                                <i name="change_x" id="change_pcantidad" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                                <input required="" type="text" id="txt_pcantidad" name="txt_pcantidad" class="form-control input-circle" placeholder="Cantidad del producto">
                                            </div>
                                        </div>
                                         <label class="control-label col-md-2">Precio</label>
                                        <div class="form-group col-md-4">
                                            <div class="input-icon right">
                                                <i name="change_" id="change_precio_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                                <i name="change_x" id="change_precio" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                                <input required="" type="text" id="txt_precio" name="txt_precio" class="form-control input-circle" placeholder="Precio ......">
                                            </div>
                                        </div> <br><br><br> <br><br><br>
                                        <div class="modal-footer">
                                            <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                            <button type="button" data-dismiss="modal" onclick="delete_provider();" class="btn green">Guardar</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
            <!-- FINAL ESTILOS DE LA BARRA -->
        </div>
    </div>
</div>
<!--FIN DEL CONTENIDO-->
<!--Validaciones-->
<script>

    var $pid    = null;

    function validar() {

        var factura = $("#txt_factura").val();

        if (factura == "") {
            document.getElementById("send").disabled = true;
        }
        else {
            document.getElementById("send").disabled = false;
        }
    };
    
    
    var provider_selected = function(id){
          $pid      = id; 
          var prov  = JSON.parse($("#providers").val());
          var dir   = $("#prov_dir");
          var name  = $("#prov_name");
          var num   = $("#prov_num");
          $("#prov_data").addClass("well");
          $.map(prov , function(j){
              if($pid == j.id_prov){
                  dir.html(
                          '<h4 class="col-md-12">Dirección</h4>' +
                          '<p class="col-md-12">'+
                            j.direccion +
                          '</p>'
                  );
          
                  name.html(
                          '<h4 class="col-md-12">Empresa</h4>' +
                          '<p class="col-md-12">'+
                            j.empresa +
                          '</p>'
                  );
          
                  
                num.html(
                          '<h4 class="col-md-12">Telefono</h4>' +
                          '<p class="col-md-12">'+
                            j.telefono +
                          '</p>'
                  );
          
              }
          });
    };
          var $id = null;

    var table_loader = function() {

        var table = $('#productos_table');

        var oTable = table.dataTable({
            "lengthMenu": [
                [5, 15, 30, -1],
                [5, 10, 30, "Todos"]
            ],
            "pageLength": 5,
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Mostrando _START_ a _END_ en total de _TOTAL_ productos",
                "infoEmpty": "No se ha encontrado productos ...",
                "infoFiltered": "(filtered1 from _MAX_ total records)",
                "lengthMenu": "Mostar _MENU_ Productos",
                "search": "Buscar:",
                "zeroRecords": "Ningun producto encontrado ..."

            },
            "columnDefs": [{// set default column settings
                    'orderable': true,
                    'targets': [0]
                }, {
                    "searchable": true,
                    "targets": [0]
                }],
            "order": [
                [0, "asc"]
            ]
        });

        var tableWrapper = $('#productos_table_wrapper');
        tableWrapper.find('.dataTables_length select').select2();


    };
</script>