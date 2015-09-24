<!-- INICIO CONTENIDO -->
<div class="page-content-wrapper">
    <!-- INICIO CONTENIDO -->
    <div class="page-content">
        <!-- INICIO TITULO DE LA PAGINA -->
        <h3 class="page-title">
            Unitee - Ver Clientes
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
                    <a href="#">Ver Clientes</a>
                </li>
            </ul>
        </div>
        <!-- FINAL BREADCUMBS -->
        <!-- INICIO DASHBOARD STATS -->
        <div class="page-content-wrapper">
            <!-- INICIO PAGE CONTENT-->
            <div class="row scroller" style="height:430px" data-rail-visible="1" >
                <!-- INICIO Portlet PORTLET-->
                <div class="portlet">  
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-sharp">
                                <i class="icon-speech font-green-sharp"></i>
                                <span class="caption-subject bold uppercase">ver Cliente</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-hover table-bordered scrille" id="clientes_table">
                                <thead>
                                    <tr>
                                        <th>
                                            <p align="center">Nombre</p>
                                        </th>
                                        <th >
                                            <p align="center">Empresa</p>
                                        </th>
                                        <th >
                                            <p align="center">Números de telefono</p>
                                        </th>
                                        <th>
                                            <p align="center">Correo</p>
                                        </th>
                                        <th>
                                            <p align="center">Operaciones</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                      <p align="center">Carleto Ancelotti</p>  
                                    </td>
                                    <td>
                                        <p align="center">Facebook</p>
                                    </td>
                                    <td>
                                        <p align="center">7777-2154 / 2154-4578</p>
                                    </td>
                                    <td>
                                        <p align="center">nesulises777@gmail.com</p>
                                    </td>
                                    <td>
                                        <p align="center">
                                            <a class="" onclick="" data-toggle="modal" href="#responsive_view"><i class="icon-eye-open" style="font-size: 20px;"></i></i></a>&nbsp;&nbsp;
                                            <a href="#"><i class="icon-pencil" style="font-size: 20px;"></i></i></a>&nbsp;&nbsp;
                                            <a class="" onclick=""  data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 20px;"></i></i></a>
                                        </p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- FINAL FORM-->
                        </div>
                        <div id="responsive_delete" class="modal fade" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Eliminar Cliente</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="scroller" style="height:30px" data-always-visible="1" data-rail-visible1="1">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>¿Deseas eliminar  de tu lista de proveedores?</h4>
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
                        <!-- FINAL Portlet PORTLET-->
                    </div>

                    <!-- FINAL PAGE CONTENTENIDO-->
                </div>
            </div>
            <!-- FINAL ESTILOS DE LA BARRA -->
        </div>
    </div>
</div>
<script>
      var table_loader = function () {

            var table = $('#clientes_table');

            table.dataTable({
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
                    "info": "Mostrando _START_ a _END_ en total de _TOTAL_ clientes",
                    "infoEmpty": "No se ha encontrado clientes ...",
                    "infoFiltered": "(filtered1 from _MAX_ total records)",
                    "lengthMenu": "Mostar _MENU_ Clientes",
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

            var tableWrapper = $('#clientes_table_wrapper');
            tableWrapper.find('.dataTables_length select').select2();


        };
</script>
