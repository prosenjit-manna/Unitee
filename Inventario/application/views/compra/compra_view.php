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
            <div class="page-toolbar">
            </div>
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
                                <span class="caption-subject bold uppercase">Ver Compras</span>
                            </div>
                        </div>
                        <div class="row col-md-12">
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
                                                <a class="" data-toggle="modal" href="#"><i class="icon-eye-open" style="font-size: 16px;"></i></i></a>&nbsp;&nbsp;
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
                                        <button type="button" data-dismiss="modal" onclick="¿" class="btn green">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade bs-modal-lg" id="responsive_view" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Información de la Compra</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                                            <div class="col-md-12">
                                               <div class="well col-md-12">
                                                    <div class="col-md-6">
                                                        <h4 class="col-md-12">Dirección</h4>
                                                        <p class="col-md-12">
                                                                San Salvador, Calle San Salvador, Calle San Salvador, Calle
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h4 class="col-md-6">Nombre</h4>
                                                        <p class="col-md-12">
                                                                Juan Pedro Pablo Leon
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h4 class="col-md-6">Telefono</h4>
                                                        <p class="col-md-12">
                                                                777-5698
                                                        </p>
                                                    </div>
                                                    
                                               </div>
                                               <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                             <p align="center">Nombre</p>
                                                        </th>
                                                        <th>
                                                             <p align="center">Color</p>
                                                        </th>
                                                        <th>
                                                             <p align="center">Cantidad</p>
                                                        </th>
                                                        <th>
                                                             <p align="center">Precio</p>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td align="center">
                                                             alex
                                                        </td>
                                                        <td align="center">
                                                             Alex Nilson
                                                        </td>
                                                        <td align="center">
                                                             1234
                                                        </td>
                                                        <td align="center" class="center">
                                                             power user
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">
                                                             lisa
                                                        </td>
                                                        <td align="center">
                                                             Lisa Wong
                                                        </td>
                                                        <td align="center">
                                                             434
                                                        </td>
                                                        <td align="center" class="center">
                                                             new user
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                    <div class="well col-md-6">
                                                        <div class="col-md-12">
                                                            <h4 class="col-md-12">Archivos Adjuntos</h4><br><br><br><br>
                                                            <p class="col-md-12">
                                                                <i class="icon-folder-open" style="font-size:50px;"></i>
                                                                <i class="icon-film" style="font-size:50px;"></i>
                                                                <i class="icon-envelope" style="font-size:50px;"></i>
                                                                <i class="icon-edit" style="font-size:50px;"></i>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <label class="control-label col-md-3"> P.O </label>
                                                           <div class="form-group col-md-9">
                                                                <input disabled="disabled" type="text" name="txt_po" id="txt_po" value="" class="form-control input-circle" placeholder="Orden de compra">
                                                           </div>
                                                            <label class="control-label col-md-3">* Factura</label>
                                                           <div class="form-group col-md-9">
                                                                <input disabled="disabled" type="text" name="txt_factura" id="txt_factura" value="" class="form-control input-circle" placeholder="Factura">
                                                           </div>
                                                           <label class="control-label col-md-3">* Precio</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="input-icon right">
                                                                    <i name="change_" id="change_ptotal_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                                                    <i name="change_x" id="change_ptotal" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                                                    <input required="" type="text" id="txt_ptotal" name="txt_ptotal" disabled="disabled" class="form-control input-circle" placeholder="Numero de ptotal">
                                                                </div>
                                                            </div>
                                                    </div>
                                                 <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn default">Cerrar</button>
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