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
                <div class="portlet">
                    <!-- INICIO Portlet PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-sharp">
                                <i class="icon-speech font-green-sharp"></i>
                                <span class="caption-subject bold uppercase">Configuración de Productos</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="portlet-body form">
                                <!-- INICIO FORM-->
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                    </div>
                                        <h5 lass="form-section">Los campos con * son Requeridos
                                        </h5>
                                        <div class="col-md-6">
                                            <h3 lass="form-section">Agregar Colores
                                                <button  id="send" name="send"  type="submit" class="btn blue col-md-offset-4"><i class="icon-save" style="font-size:16px;"></i>&nbsp;&nbsp;Guardar Color</button>
                                            </h3><br>
                                            <label class="control-label col-md-2">* Color</label>
                                            <div class="form-group col-md-4">
                                                <input required="" type="text" id="" name="txt_color" class="form-control input-circle" placeholder="Nombre del color">
                                            </div>
                                            <div class="form-group col-md-4">
                                                 <input type="text" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161">
                                            </div>
                                             <div class="form-group col-md-12">
                                               <table class="table table-striped table-hover table-bordered" id="products_color">
                                                    <thead>
                                                    <tr>
                                                    <th>
                                                    <p align="center">Nombre</p>
                                                    </th>
                                                    <th >
                                                    <p align="center">Color</p>
                                                    </th>
                                                    <th >
                                                    <p align="center">Operaciones</p>
                                                    </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                       <tr align="center">
                                                           <td>Rojo</td>
                                                           <td>#FFFFFF</td>
                                                           <td><a class="" onclick="the_id(9);" data-toggle="modal" href="#responsive_delete_color"><i class="icon-trash" style="font-size: 20px;"></i></a></td>
                                                       </tr>
                                                       <tr align="center">
                                                          <td>Amarillo</td>
                                                           <td>#FFFFFF</td>
                                                           <td><a class="" onclick="the_id(9);" data-toggle="modal" href="#responsive_delete_color"><i class="icon-trash" style="font-size: 20px;"></i></a></td>
                                                       </tr>
                                                        <tr align="center">
                                                          <td>Azul</td>
                                                           <td>#FFFFFF</td>
                                                          <td><a class="" onclick="the_id(9);" data-toggle="modal" href="#responsive_delete_color"><i class="icon-trash" style="font-size: 20px;"></i></a></td>
                                                       </tr>
                                                    </tbody>
                                                </table>
                                            </div> 
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                             <h3 lass="form-section">Agregar Unidades
                                                <button  id="send" name="send"  type="submit" class="btn blue col-md-offset-3"><i class="icon-save" style="font-size:16px;"></i>&nbsp;&nbsp;Guardar Unidad</button>
                                            </h3><br>
                                            <label class="control-label col-md-3">* Unidad</label>
                                            <div class="form-group col-md-9">
                                                <input type="text" id="" name="txt_precio" class="form-control input-circle" placeholder="Unidad de productos">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <table class="table table-striped table-hover table-bordered" id="products_unidad">
                                                    <thead>
                                                    <tr>
                                                    <th>
                                                    <p align="center">Unidad</p>
                                                    </th>
                                                    <th >
                                                    <p align="center">Operaciones</p>
                                                    </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                       <tr align="center">
                                                           <td>Metros</td>
                                                           <td><a class="" onclick="the_id(9);" data-toggle="modal" href="#responsive_delete_unidad"><i class="icon-trash" style="font-size: 20px;"></i></a></td>
                                                       </tr>
                                                        <tr align="center">
                                                          <td>AYardas</td>
                                                          <td><a class="" onclick="the_id(9);" data-toggle="modal" href="#responsive_delete_unidad"><i class="icon-trash" style="font-size: 20px;"></i></a></td>
                                                       </tr>
                                                        <tr align="center">
                                                           <td>Centimetros</td>
                                                           <td><a class="" onclick="the_id(9);" data-toggle="modal" href="#responsive_delete_unidad"><i class="icon-trash" style="font-size: 20px;"></i></a></td>
                                                       </tr>
                                                    </tbody>
                                                </table>
                                            </div> 
                                            <!--/span-->
                                        </div>
                                        <div id="responsive_delete_color" class="modal fade" tabindex="-1" aria-hidden="true">
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
                                                                    <h4>¿Deseas eliminar $name_color de tu lista de colores?</h4>
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
                                        <div id="responsive_delete_unidad" class="modal fade" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Eliminar Unidad</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="scroller" style="height:30px" data-always-visible="1" data-rail-visible1="1">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4>¿Deseas eliminar $name_unidad de tu lista de unidades?</h4>
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
    </div>
</div>
<script>
        var $id = null;

        var table_loader = function () {

            var table = $('#products_color');

            var oTable = table.dataTable({
                "lengthMenu": [
                    [5, 15 , 30 , -1],
                    [5, 10 , 30 , "Todos" ] 
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

           var tableWrapper = $('#products_color_wrapper'); 
           tableWrapper.find('.dataTables_length select').select2(); 
                     

        };

        var the_id = function (i) {
            $id = i;
        };

        var delete_product = function () {

            var tasking = new jtask();
            tasking.url = "<?php echo site_url("/Productos/delete_product"); ?>";
            tasking.data = {"id": $id};
            tasking.success_callback(function (d) {
                console.log(d);
                $("#prod_" + $id).remove();
            });
            tasking.do_task();
        };
</script>
<script>
        var $id = null;

        var table_loader = function () {

            var table = $('#products_unidad');

            var oTable = table.dataTable({
                "lengthMenu": [
                    [5, 15 , 30 , -1],
                    [5, 10 , 30 , "Todos" ] 
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

           var tableWrapper = $('#products_unidad_wrapper'); 
           tableWrapper.find('.dataTables_length select').select2(); 
                     

        };

        var the_id = function (i) {
            $id = i;
        };

        var delete_product = function () {

            var tasking = new jtask();
            tasking.url = "<?php echo site_url("/Productos/delete_product"); ?>";
            tasking.data = {"id": $id};
            tasking.success_callback(function (d) {
                console.log(d);
                $("#prod_" + $id).remove();
            });
            tasking.do_task();
        };
</script>