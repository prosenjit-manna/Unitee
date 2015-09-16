<!-- INICIO CONTENIDO -->
<div class="page-content-wrapper">
    <!-- INICIO CONTENIDO -->
    <div class="page-content">
        <!-- INICIO TITULO DE LA PAGINA -->
        <h3 class="page-title">
            Unitee - Ver Compras
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
                    <a href="#">Ver Compras</a>
                </li>
            </ul>
        </div>
        <!-- FINAL BREADCUMBS -->
        <!-- INICIO DASHBOARD STATS -->
        <div class="page-content-wrapper">
            <!-- INICIO PAGE CONTENT-->
            <!-- INICIO Portlet PORTLET-->
            <div class="portlet scroller" style="height:430px" data-rail-visible="1">  
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="portlet-title caption font-green-sharp">
                            <i class="icon-speech font-green-sharp"></i>
                            <span class="caption-subject bold uppercase">Ver Compras</span>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-4">
                            <div class="portlet light bordered col-md-12"><br>
                                <label class="control-label col-md-4">Ver por</label>
                                <div class="dropdown col-md-8">
                                    <select required="required" id="select_country" onchange="get_depto(this.value);" name="txt_pais" class="form-control input-circle">
                                        <option value="-1">Seleccionar</option>
                                        <option value="1">P.O.</option>
                                        <option value="2">Factura</option>
                                        <option value="3">Producto</option>                     
                                    </select>
                                </div><br><br>
                                <label class="control-label col-md-5">Valor</label>
                                <div class="input-group col-md-7">
                                    <input class="form-control input-circle-left" placeholder="Busqueda" type="text">
                                    <span class="input-group-addon input-circle-right">
                                        <a href="#"><i class="icon-search"></i></a>
                                    </span>
                                </div><br>
                            </div>
                            <div class="portlet light bordered col-md-12">
                                <div align="center">
                                    <div class="input-group input-medium date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                        <input type="text" class="form-control" name="from">
                                        <span class="input-group-addon">
                                            Hasta</span>
                                        <input type="text" class="form-control" name="to">
                                    </div>
                                    <!-- /input-group -->
                                    <span class="help-block">
                                        Seleccione el rango de fecha </span>
                                </div>
                                <div class="col-md-12" align="center">
                                    <div class="date-picker" data-date-format="mm/dd/yyyy">
                                    </div>
                                </div>
                            </div>
                            <div class="portlet light bordered col-md-12">
                                <li class="list-group-item">
                                    <a href="#" style="text-decoration:none; color:black;">Compra de tela</a><span class="badge badge-margine">
                                        1/09/2015 </span>
                                </li>
                                <li class="list-group-item">
                                    <a href="#" style="text-decoration:none; color:black;">Compra de botones</a><span class="badge badge-margine">
                                        10/09/2015 </span>
                                </li>
                                <li class="list-group-item">
                                    <a href="#" style="text-decoration:none; color:black;">Compra de pellum</a><span class="badge badge-margine">
                                        20/20/2015 </span>
                                </li>
                                <li class="list-group-item">
                                    <a href="#" style="text-decoration:none; color:black;">Compra de Elastico</a><span class="badge badge-margine">
                                        20/20/2015 </span>
                                </li>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="portlet light bordered col-md-12">
                                <h4 class="block">Reportes</h4>
                                <div align="center">
                                    <a href="#" class="btn btn-success glyphicon glyphicon-file"> PDF</a>
                                    <a href="#" class="btn btn-success glyphicon glyphicon-print"> Imprimir</a>
                                    <a href="#" class="btn btn-success glyphicon glyphicon-list-alt"> Excel</a>
                                </div><br>
                            </div><br><br>
                                <div class="portlet light bordered col-md-12">
                                    <ul class="list-group col-md-12">
                                        <li class="list-group-item">
                                            <p class="col-md-4">Número de compra</p>     
                                            <p class="col-md-3">FACT-1212-12</p>
                                            <p class="col-md-4">Fecha de ´compra</p>     
                                            <p class="col-md-1">12/12/12</p><br>
                                        </li>
                                    </ul>
                                    <table class="table table-striped table-hover table-bordered" id="compras_table">
                                        <thead>
                                            <tr>
                                                <th>
                                        <p align="center">Nombre</p>
                                        </th>
                                        <th >
                                        <p align="center">Cantidad</p>
                                        </th>
                                        <th >
                                        <p align="center">Precio</p>
                                        </th>
                                        <th>
                                        <p align="center">Color</p>
                                        </th>
                                        <th>
                                        <p align="center">Operaciones</p>
                                        </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p align="center">Tela</p>
                                                </td>
                                                <td>
                                                    <p align="center">199 yds</p>
                                                </td>
                                                <td>
                                                    <p align="center">$21.12</p>
                                                </td>
                                                <td>
                                                    <p align="center">Rojo</p>
                                                </td>
                                                <td>
                                                    <p align="center">
                                                        <a class=""   data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 16px;"></i></i></a>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p align="center">Tela</p>
                                                </td>
                                                <td>
                                                    <p align="center">199 yds</p>
                                                </td>
                                                <td>
                                                    <p align="center">$21.12</p>
                                                </td>
                                                <td>
                                                    <p align="center">Rojo</p>
                                                </td>
                                                <td>
                                                    <p align="center">
                                                        <a class=""   data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 16px;"></i></i></a>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p align="center">Tela</p>
                                                </td>
                                                <td>
                                                    <p align="center">199 yds</p>
                                                </td>
                                                <td>
                                                    <p align="center">$21.12</p>
                                                </td>
                                                <td>
                                                    <p align="center">Rojo</p>
                                                </td>
                                                <td>
                                                    <p align="center">
                                                        <a class=""   data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 16px;"></i></i></a>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table><br>
                                    <ul class="list-group col-md-12">
                                        <li class="list-group-item">
                                            <p class="col-md-5">Precio total de la compra</p>     
                                            <p class="col-md-3">$250.00</p>
                                            <p class="col-md-2">P.O.</p>     
                                            <p class="col-md-2">$250.00</p><br>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <ul class="list-group col-md-12">
                                        <li  class="list-group-item">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse_1">
                                                        Archivos adjuntos </a>
                                                </h6>
                                            </div>
                                            <div id="collapse_1" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p class="col-md-12 col-md-offset-3">
                                                        <i class="icon-folder-open" style="font-size:50px;"></i>
                                                        <i class="icon-film" style="font-size:50px;"></i>
                                                        <i class="icon-envelope" style="font-size:50px;"></i>
                                                        <i class="icon-edit" style="font-size:50px;"></i>
                                                        <i class="icon-folder-open" style="font-size:50px;"></i>
                                                        <i class="icon-film" style="font-size:50px;"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="responsive_delete" class="modal fade" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Eliminar Compra</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="scroller" style="height:30px" data-always-visible="1" data-rail-visible1="1">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4>¿Deseas eliminar  esta compra de tu lista?</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                                <button type="button" data-dismiss="modal" class="btn green">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var $id = null;

    var table_loader = function () {

        var table = $('#compras_table');

        var oTable = table.dataTable({
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

        var tableWrapper = $('#compras_table_wrapper');
        tableWrapper.find('.dataTables_length select').select2();


    };

    var the_id = function (i) {
        $id = i;
    };

</script>