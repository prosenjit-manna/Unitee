
<!-- INICIO CONTENIDO -->
<div class="page-content-wrapper">

    <!-- INICIO CONTENIDO -->
    <div class="page-content">
        <!-- INICIO TITULO DE LA PAGINA -->

        <h3 class="page-title">
            Unitee - Ver Proveedor
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
                    <a href="#">Ver Proveedor</a>
                </li>
            </ul>
        </div>
        <div class="portlet">
            <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption font-green-sharp">
                            <i class="icon-speech font-green-sharp"></i>
                            <span class="caption-subject bold uppercase"> Lista de Proveedores</span>
                    </div>
                    <div class="portlet-body">
                            <table class="table table-striped table-hover table-bordered scrille" id="compras_table">
                                <thead>
                                    <tr>
                                        <th>
                                <p align="center">Codigo</p>
                                </th>
                                <th >
                                <p align="center">Empresa</p>
                                </th>
                                <th >
                                <p align="center">Departamento</p>
                                </th>
                                <th>
                                <p align="center">Nombre del Contacto</p>
                                </th>
                                <th>
                                <p align="center">Números de Telefono</p>
                                </th>
                                <th>
                                <p align="center">Descripción</p>
                                </th>
                                <th>
                                <p align="center">Operaciones</p>
                                </th>
                                </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                    foreach ($data as $provider) {

                                        echo '<tr id="' . $provider->id_prov . '">';
                                        echo '<td><p align="center">' . $provider->codigo . '</p></td>';
                                        echo '<td><p align="center">' . $provider->empresa . '</td>';
                                        echo '<td><p align="center">' . $provider->departamento . '</p></td>';
                                        echo '<td><p align="center">' . $provider->contacto . '</p></td>';
                                        echo '<td><p align="center">' . $provider->telefono . '</p></td>';
                                        echo '<td><p align="center">' . $provider->descripcion . '</p></td>';

                                        echo '<td>
                                            <p align="center">
                                                <a class="" onclick="view_provider(' . $provider->id_prov . ');" data-toggle="modal" href="#responsive_view"><i class="icon-eye-open" style="font-size: 20px;"></i></i></a>&nbsp;&nbsp;
                                                <a href="' . site_url("/0/proveedor=edit_proveedor?id=" . $provider->id_prov) . '"><i class="icon-pencil" style="font-size: 20px;"></i></i></a>&nbsp;&nbsp;
                                                <a class="" onclick="the_id(' . $provider->id_prov . ');"  data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 20px;"></i></i></a>
                                            </p>
                                        </td>';

                                        echo '</tr>';
                                    }
                                    ?>

                                </tbody>
                            </table>
                            <div class="modal fade bs-modal-lg" id="responsive_view" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Información de Proveedor</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row" data-always-visible="1" data-rail-visible1="1">
                                                <div class="col-md-6">
                                                    <h3 lass="form-section">Información deContacto</h3><br>
                                                    <label class="control-label col-md-3">Empresa</label>
                                                    <div class="form-group col-md-9">
                                                        <input disabled="disabled" type="text" id="txt_empresa" name="txt_empresa" class="form-control input-circle" placeholder="Nombre de la Empresa">
                                                    </div>
                                                    <label class="control-label col-md-3">Contacto</label>
                                                    <div class="form-group col-md-9">
                                                        <input disabled="disabled" type="text" id="txt_contacto" name="txt_contacto" class="form-control input-circle" placeholder="Nombre de Contacto">
                                                    </div>
                                                    <label class="control-label col-md-3">Teléfono</label>
                                                    <div class="form-group col-md-9">
                                                        <input disabled="disabled" type="text" id="txt_tel" name="txt_telefono" class="form-control input-circle" placeholder="Numero de Telefono">
                                                    </div>
                                                    <label class="control-label col-md-3">Celular</label>
                                                    <div class="form-group col-md-9">
                                                        <input disabled="disabled" type="text" id="txt_cel" name="txt_celular" class="form-control input-circle" placeholder="Numero de Celular">
                                                    </div>
                                                    <label class="control-label col-md-3">Fax</label>
                                                    <div class="form-group col-md-9">
                                                        <input disabled="disabled" type="text" id="txt_fax" name="txt_fax" class="form-control input-circle" placeholder="Numero de FAX">
                                                    </div>
                                                    <label class="control-label col-md-3">Correo</label>
                                                    <div class="form-group col-md-9">
                                                        <input disabled="disabled" type="text" id="txt_corre" name="txt_correo" class="form-control input-circle" placeholder="Correo Electronico">
                                                    </div>
                                                    <label class="control-label col-md-3">Ultima Actualización</label>
                                                    <div class="form-group col-md-9">
                                                        <input disabled="disabled" type="text" id="txt_ul" name="txt_ul" class="form-control input-circle" placeholder="Fecha -> 12/12/12">
                                                    </div>                                                     
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <h3 lass="form-section">Dirección</h3><br>
                                                    <label class="control-label col-md-4">Local</label>
                                                    <div class="form-group col-md-8">
                                                        <input disabled="disabled" type="text" id="txt_local" name="txt_local" class="form-control input-circle" placeholder="Nombre del Local">
                                                    </div>
                                                    <label class="control-label col-md-4">Dirección 1</label>
                                                    <div class="form-group col-md-8">
                                                        <input disabled="disabled" type="text" id="txt_dir1" name="txt_direccion1" class="form-control input-circle" placeholder="Nombre de la Direccion 1">
                                                    </div>
                                                    <label class="control-label col-md-4">Dirección 2</label>
                                                    <div class="form-group col-md-8">
                                                        <input disabled="disabled" type="text" id="txt_dir2" name="txt_direccion2" class="form-control input-circle" placeholder="Nombre de la Direccion 2">
                                                    </div>
                                                    <label class="control-label col-md-4">Pais</label>
                                                    <div class="form-group col-md-8">
                                                        <input disabled="disabled"  type="text" id="txt_pais" name="txt_pais" class="form-control input-circle" placeholder="Pais">
                                                    </div>
                                                    <label class="control-label col-md-4">Departamento</label>
                                                    <div class="form-group col-md-8">
                                                        <input disabled="disabled" type="text" id="txt_depto" name="txt_depto" class="form-control input-circle" placeholder="Departamento">
                                                    </div>
                                                    <label class="control-label col-md-4">Ciudad</label>
                                                    <div class="form-group col-md-8">
                                                        <input disabled="disabled" type="text" id="txt_ciu" name="txt_ciudad" class="form-control input-circle" placeholder="Ciudad">
                                                    </div>

                                                    <!--/span-->
                                                </div>
                                                <div class="col-md-12">
                                                    <h3 lass="form-section">Descripci&oacute;n</h3><br>
                                                </div>
                                                <label class="control-label col-md-3">Descripci&oacute;n de la Empresa</label>
                                                <div class="form-group col-md-9">
                                                    <textarea disabled="disabled" name="txt_descripcion" id="txt_desc" class="form-control input-circle" rows="4" placeholder="Descripción del cliente">
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-dismiss="modal" class="btn default">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="responsive_delete" class="modal fade" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Eliminar Proveedor</h4>
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
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                    <div>
                    </div>
            </div>
        </div>
    </div>
    <script>
        var $id = null;

        var view_provider = function (id) {

            var tasking = new jtask();
            tasking.url = "<?php echo site_url("/TheProvider/ViewProvider"); ?>";
            tasking.data = {"id": id};
            tasking.success_callback(function (data) {
                var c = JSON.parse(data);
                $("#txt_empresa").val(c.empresa);
                $("#txt_contacto").val(c.contacto_nombre);
                $("#txt_tel").val(c.contacto_tel1);
                $("#txt_cel").val(c.contacto_tel2);
                $("#txt_fax").val(c.contacto_fax);
                $("#txt_corre").val(c.contacto_correo);
                $("#txt_ul").val(c.fecha);
                $("#txt_local").val(c.local);
                $("#txt_dir1").val(c.dir1);
                $("#txt_dir2").val(c.dir2);
                $("#txt_pais").val(c.pais_nombre);
                $("#txt_depto").val(c.depto_nombre);
                $("#txt_ciu").val(c.municipio_nombre);
                $("#txt_desc").val(c.descripcion);
            });
            tasking.do_task();

        };

        var the_id = function (id) {
            $id = id;
        };

        var delete_provider = function () {
            var tasking = new jtask();
            tasking.url = "<?php echo site_url("/TheProvider/DelProvider"); ?>";
            tasking.data = {"id": $id};
            tasking.success_callback(function (d) {
                $("#" + $id).remove();
            });
            tasking.do_task();
        };


        var table_loader = function () {

            var table = $('#compras_table');

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
                    "info": "Mostrando _START_ a _END_ en total de _TOTAL_ proveedores",
                    "infoEmpty": "No se ha encontrado proveedores ...",
                    "infoFiltered": "(filtered1 from _MAX_ total records)",
                    "lengthMenu": "Mostar _MENU_ Proveedores",
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