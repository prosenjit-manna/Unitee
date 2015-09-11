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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label ">Fecha</label>
                                    <div class="">
                                        <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value=""/>
                                        <span class="help-block">
                                        Selecciona la fecha</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                              <div class="col-md-12" align="center">
                                  <a href="#" class="btn btn-success">Generar PDF</a>
                                  <a href="#" class="btn btn-success">Generar PDF</a>
                                  <a href="#" class="btn btn-success">Generar PDF</a>
                              </div><br><br><br>
                               <div class="col-md-12">
                                    <table class="table table-striped table-hover table-bordered" id="compras_table">
                                        <thead>
                                            <tr>
                                                <th>
                                        <p align="center">Fecha</p>
                                        </th>
                                        <th >
                                        <p align="center">Factura</p>
                                        </th>
                                        <th >
                                        <p align="center">P.O.</p>
                                        </th>
                                        <th>
                                        <p align="center">Proveedor</p>
                                        </th>
                                        <th>
                                        <p align="center">Precio Total</p>
                                        </td>
                                        <th>
                                        <p align="center">Operaciones</p>
                                        </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p align="center">12/12/12</p>
                                                </td>
                                                <td>
                                                    <p align="center">123123</p>
                                                </td>
                                                <td>
                                                    <p align="center">456456</p>
                                                </td>
                                                <td>
                                                    <p align="center">Google</p>
                                                </td>
                                                <td>
                                                    <p align="center">$ 120.00</p>
                                                </td>
                                                <td>
                                                    <p align="center">
                                                        <a class="" data-toggle="modal" href="#responsive_view"><i class="icon-eye-open" style="font-size: 16px;"></i></i></a>&nbsp;&nbsp;
                                                        <a href="#"><i class="icon-pencil" style="font-size: 16px;"></i></i></a>&nbsp;&nbsp;
                                                        <a class=""   data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 16px;"></i></i></a>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p align="center">12/12/12</p>
                                                </td>
                                                <td>
                                                    <p align="center">123123</p>
                                                </td>
                                                <td>
                                                    <p align="center">456456</p>
                                                </td>
                                                <td>
                                                    <p align="center">Google</p>
                                                </td>
                                                <td>
                                                    <p align="center">$ 120.00</p>
                                                </td>
                                                <td>
                                                    <p align="center">
                                                        <a class="" data-toggle="modal" href="#responsive_view"><i class="icon-eye-open" style="font-size: 16px;"></i></i></a>&nbsp;&nbsp;
                                                        <a href="#"><i class="icon-pencil" style="font-size: 16px;"></i></i></a>&nbsp;&nbsp;
                                                        <a class=""   data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 16px;"></i></i></a>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
</div>
<script>
        var $id = null;

    var table_loader = function() {

        var table = $('#compras_table');

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
                "info": "Mostrando _START_ a _END_ en total de _TOTAL_ compras",
                "infoEmpty": "No se ha encontrado Compras ...",
                "infoFiltered": "(filtered1 from _MAX_ total records)",
                "lengthMenu": "Mostar _MENU_ Compras",
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

    var the_id = function(i) {
        $id = i;
    };

</script>