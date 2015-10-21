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
        </div>
        <!-- FINAL BREADCUMBS -->
        <!-- INICIO DASHBOARD STATS -->
        <div class="page-content-wrapper">
            <!-- INICIO PAGE CONTENT-->
            <div class="portlet scroller" style="height:450px" data-rail-visible="1">
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
                                <h5 lass="form-section">Los campos con * son Requeridos
                                </h5>
                                <div class="col-md-6">
                                    <h3 lass="form-section">Agregar Colores
                                        <button onclick="save_color();"  id="send_color" name="send_color"   type="button" class="btn blue col-md-offset-4">
                                            <i class="icon-save" style="font-size:16px;"></i>&nbsp;&nbsp;Guardar Color</button>
                                    </h3><br>
                                    <label class="control-label col-md-2">* Color</label>
                                    <div class="form-group col-md-4">
                                        <input required="" type="text" id="txt_color" name="txt_color" class="form-control input-circle" placeholder="Nombre del color">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" id="hue-demo" name="hue-demo" class="form-control demo" data-control="hue" value="#ff6161">
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
                                            <tbody id="color_body">
                                                <?php
                                                foreach ($colors as $c) {
                                                    echo ' <tr id="color_' . $c->id . '" align="center">',
                                                    ' <td>' . $c->name . '</td>',
                                                    ' <td>' . '<div class="minicolors minicolors-theme-bootstrap minicolors-position-bottom minicolors-position-left"><input disabled type="text" id="hue-demo" class="form-control demo minicolors-input" data-control="hue" value="#ff6161" size="7"><span class="minicolors-swatch minicolors-sprite"><span class="minicolors-swatch-color" style="background-color:' . $c->ref . ';"></span></span></div>' . '</td>',
                                                    '<td><a class="" onclick="the_id(' . $c->id . ');" data-toggle="modal" href="#responsive_delete_color"><i class="icon-trash" style="font-size: 20px;"></i></a></td>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6" style="height: 447px;">
                                    <h3 lass="form-section">Agregar Unidades
                                        <button  id="send_unit" name="send_unit" onclick="save_unit();"  type="text" class="btn blue col-md-offset-3"><i class="icon-save" style="font-size:16px;"></i>&nbsp;&nbsp;Guardar Unidad</button>
                                    </h3><br>
                                    <label class="control-label col-md-3">* Unidad</label>
                                    <div class="form-group col-md-9">
                                        <input type="text" id="txt_unidad" name="txt_unidad" class="form-control input-circle" placeholder="Unidad de productos">
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
                                            <tbody id="body_unit">
                                                <?php
                                                foreach ($unidad as $u) {
                                                    echo ' <tr id="unit_' . $u->id . '" align="center">',
                                                    ' <td>' . $u->name . '</td>',
                                                    ' <td><a class="" onclick="the_id(' . $u->id . ');" data-toggle="modal" href="#responsive_delete_unidad"><i class="icon-trash" style="font-size: 20px;"></i></a></td>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div> 
                                    <!--/span-->
                                </div>
                                <div class="col-md-6">
                                    <h3 lass="form-section">Agregar Talas
                                        <button  id="send_unit" name="send_unit" onclick="save_unit();"  type="text" class="btn blue col-md-offset-5"><i class="icon-save" style="font-size:16px;"></i> Guardar Talla</button>
                                    </h3><br>
                                    <label class="control-label col-md-3">* Talla</label>
                                    <div class="form-group col-md-9">
                                        <input type="text" id="txt_unidad" name="txt_unidad" class="form-control input-circle" placeholder="Talla del producto">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <table class="table table-striped table-hover table-bordered" id="products_talla">
                                            <thead>
                                                <tr>
                                                    <th>
                                            <p align="center">Nombre</p>
                                            </th>
                                            <th >
                                            <p align="center">Talla</p>
                                            </th>
                                            <th >
                                            <p align="center">Operaciones</p>
                                            </th>
                                            </tr>
                                            </thead>
                                            <tbody id="body_unit">
                                                <tr>
                                                    <td>
                                                        <p align="center">Camiseta blanca</p>
                                                    </td>
                                                    <td>
                                                        <p align="center">XS</p>
                                                    </td>
                                                    <td align="center">
                                                        <a class="" data-toggle="modal" href="#responsive_delete_talla"><i class="icon-trash" style="font-size: 20px;"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p align="center">Camiseta blanca</p>
                                                    </td>
                                                    <td>
                                                        <p align="center">XS</p>
                                                    </td>
                                                    <td align="center">
                                                        <a class="" data-toggle="modal" href="#responsive_delete_talla"><i class="icon-trash" style="font-size: 20px;"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p align="center">Camiseta blanca</p>
                                                    </td>
                                                    <td>
                                                        <p align="center">XS</p>
                                                    </td>
                                                    <td align="center">
                                                        <a class="" data-toggle="modal" href="#responsive_delete_talla"><i class="icon-trash" style="font-size: 20px;"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p align="center">Camiseta blanca</p>
                                                    </td>
                                                    <td>
                                                        <p align="center">XS</p>
                                                    </td>
                                                    <td align="center">
                                                        <a class="" data-toggle="modal" href="#responsive_delete_talla"><i class="icon-trash" style="font-size: 20px;"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
                                                            <h4>¿Deseas eliminar este color de tu lista de colores?</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                                <button type="button" data-dismiss="modal" onclick="delete_color();" class="btn green">Eliminar</button>
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
                                                            <h4>¿Deseas eliminar esta unidad de tu lista de unidades?</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                                <button type="button" data-dismiss="modal" onclick="delete_unit();" class="btn green">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="responsive_delete_talla" class="modal fade" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Eliminar Talla</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="scroller" style="height:30px" data-always-visible="1" data-rail-visible1="1">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4>¿Deseas eliminar esta talla de tu lista de tallas?</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                                <button type="button" data-dismiss="modal" onclick="delete_color();" class="btn green">Eliminar</button>
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
            <!-- FINAL ESTILOS DE LA BARRA -->
        </div>
        <!-- FINAL CONTENIDO -->
    </div>
</div>
<script>
    var $id = null;

    var save_color = function () {
        var d = '<i class="icon-save" style="font-size:16px;"></i>&nbsp;&nbsp;Guardando ...</button>';
        var k = '<i class="icon-save" style="font-size:16px;"></i>&nbsp;&nbsp;Guardar Color</button>';
        var b = $("#send_color");
        var t = $("#txt_color");
        var c = $("#hue-demo");

        if (t.val() == "") {
            alert("el nombre del color debe ser obligatorio");
            return;
        }

        var tasking = new jtask();
        tasking.url = "<?php echo site_url("/Productos/New_Color"); ?>";
        tasking.beforesend = true;
        tasking.data = {
            "name": t.val(),
            "value": c.val()
        };
        tasking.config_before(function () {
            b.html(d);
            t.attr("disabled", true);
            c.attr("disabled", true);
        });
        tasking.success_callback(function (request) {
            b.html(k);
            t.attr("disabled", false);
            c.attr("disabled", false);
            var body_color = $("#color_body");
            var htm = ' <tr id="color_' + $.trim(request) + '" align="center">' +
                    ' <td>'
                    + t.val()
                    + '</td>'
                    + ' <td>'
                    + '<div class="minicolors minicolors-theme-bootstrap minicolors-position-bottom minicolors-position-left"><input disabled type="text" id="hue-demo" class="form-control demo minicolors-input" data-control="hue" value="#ff6161" size="7"><span class="minicolors-swatch minicolors-sprite"><span class="minicolors-swatch-color" style="background-color:'
                    + c.val() + ';"></span></span></div>' + '</td>' +
                    '<td><a class="" onclick="the_id(' + $.trim(request) + ');" data-toggle="modal" href="#responsive_delete_color"><i class="icon-trash" style="font-size: 20px;"></i></a></td>';
            body_color.prepend(htm);
        });
        tasking.do_task();
    };

    var save_unit = function () {
        var d = '<i class="icon-save" style="font-size:16px;"></i>&nbsp;&nbsp;Guardando ...</button>';
        var k = '<i class="icon-save" style="font-size:16px;"></i>&nbsp;&nbsp;Guardar Unidad</button>';
        var b = $("#send_unit");
        var t = $("#txt_unidad");


        if (t.val() == "") {
            alert("el nombre de la unidad debe ser obligatorio");
            return;
        }

        var tasking = new jtask();
        tasking.url = "<?php echo site_url("/Productos/New_Unit"); ?>";
        tasking.beforesend = true;
        tasking.data = {
            "name": t.val()
        };
        tasking.config_before(function () {
            b.html(d);
            t.attr("disabled", true);
        });
        tasking.success_callback(function (request) {
            b.html(k);
            t.attr("disabled", false);
            var unit_color = $("#body_unit");
            var htm = ' <tr id="unit_' + $.trim(request) + '" align="center">' +
                    ' <td>' + t.val() + '</td>' +
                    ' <td><a class="" onclick="the_id(' + $.trim(request) + ');" data-toggle="modal" href="#responsive_delete_unidad"><i class="icon-trash" style="font-size: 20px;"></i></a></td>';
            unit_color.prepend(htm);
        });
        tasking.do_task();
    };
    var table_loader = function () {

        var table = $('#products_color');

        table.dataTable({
            "lengthMenu": [
                [5, 15, 30, -1],
                [5, 10, 30, "Todos"]
            ],
            "pageLength": 3,
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ ",
                "infoEmpty": "No se ha encontrado productos ...",
                "infoFiltered": "(filtered1 from _MAX_ total records)",
                "lengthMenu": "Mostar _MENU_ Productos",
                "search": "Buscar:",
                "zeroRecords": "Ningun color encontrado ..."

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


        var table2 = $('#products_unidad');

        table2.dataTable({
            "lengthMenu": [
                [5, 15, 30, -1],
                [5, 10, 30, "Todos"]
            ],
            "pageLength": 4,
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ ",
                "infoEmpty": "No se ha encontrado productos ...",
                "infoFiltered": "(filtered1 from _MAX_ total records)",
                "lengthMenu": "Mostar _MENU_ Productos",
                "search": "Buscar:",
                "zeroRecords": "Ningun color encontrado ..."

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

        var tableWrapper2 = $('#products_unidad_wrapper');
        tableWrapper2.find('.dataTables_length select').select2();

        var table3 = $('#products_talla');

        table3.dataTable({
            "lengthMenu": [
                [5, 15, 30, -1],
                [5, 10, 30, "Todos"]
            ],
            "pageLength": 3,
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ ",
                "infoEmpty": "No se ha encontrado productos ...",
                "infoFiltered": "(filtered1 from _MAX_ total records)",
                "lengthMenu": "Mostar _MENU_ Productos",
                "search": "Buscar:",
                "zeroRecords": "Ningun color encontrado ..."

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

        var tableWrapper3 = $('#products_talla_wrapper');
        tableWrapper3.find('.dataTables_length select').select2();


    };

    var the_id = function (i) {
        $id = i;
    };

    var delete_color = function () {
        var tasking = new jtask();
        tasking.url = "<?php echo site_url("/Productos/delete_color"); ?>";
        tasking.data = {"id": $id};
        tasking.success_callback(function (d) {
            $("#color_" + $id).remove();
        });
        tasking.do_task();
    };

    var delete_unit = function () {
        var tasking = new jtask();
        tasking.url = "<?php echo site_url("/Productos/delete_unit"); ?>";
        tasking.data = {"id": $id};
        tasking.success_callback(function (d) {
            $("#unit_" + $id).remove();
        });
        tasking.do_task();
    };


</script>
