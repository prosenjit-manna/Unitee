<!-- INICIO CONTENIDO -->
<div class="page-content-wrapper">

    <!-- INICIO CONTENIDO -->
    <div class="page-content">
        <!-- INICIO TITULO DE LA PAGINA -->
        <h3 class="page-title">
            Unitee - Ver Productos
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
                    <a href="#">Ver Productos</a>
                </li>
            </ul>
            <div class="page-toolbar">

            </div>
        </div>
        <!-- FINAL BREADCUMBS -->

        <!-- INICIO DASHBOARD STATS -->
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption font-green-sharp">
                                <i class="icon-speech font-green-sharp"></i>
                                <span class="caption-subject bold uppercase"> Lista de Productos</span>
                            </div>                       
                        </div>
                        <div class="portlet-body">
                            <div class="">
                                <table class="table table-striped table-hover table-bordered" id="products_table">
                                    <thead>
                                        <tr>
                                            <th>
                                    <p align="center">SKU</p>
                                    </th>
                                    <th >
                                    <p align="center">Nombre</p>
                                    </th>
                                    <th >
                                    <p align="center">Color</p>
                                    </th>
                                    <th>
                                    <p align="center">Margen</p>
                                    </th>
                                    <th>
                                    <p align="center">Cantidad</p>
                                    </th>
                                    <th>
                                    <p align="center">Descripción</p>
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
                                        <?php
                                        $class = get_instance();
                                        $class->load->model("productos/view_producto");
                                        $productos = $class->view_producto->show_products();
                                        foreach ($productos as $prod) {
                                            echo "<tr id='prod_" . $prod->id . "'>";
                                            echo '<td align="center">
												<p>' . $prod->sku . '</p>
                                                                                            </td>'
                                            , '<td align="center">
												<p>' . $prod->nombre . '</p>
                                                                                             </td>'
                                            , '<td align="center">
												<p>' . $prod->color . '</p>
                                                                                             </td>'
                                            , '<td align="center">
												<p>' . $prod->margen . '</p>
                                                                                             </td>'
                                            , '<td align="center">
												<p>' . $prod->cantidad . '</p>
                                                                                             </td>'
                                            , '<td align="center">
												<p>' . $prod->descripcion . '</p>
                                                                                             </td>';

                                            if ($prod->precio == NULL) {
                                                echo '<td align="center">
												<p>$' . $prod->estimado . '</p>
                                                                                             </td>';
                                            } else {
                                                echo '<td align="center">
												<p>$' . $prod->precio . '</p>
                                                                                             </td>';
                                            }

                                            echo '<td align="center">
												<a title="editar producto" href="' . site_url("/0/productos=edit_producto?id=" . $prod->id) . '"><i class="icon-pencil" style="font-size: 20px;"></i></a>
												<a title="eliminar producto " class="" onclick="the_id(' . $prod->id . ');" data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 20px;"></i></a>
                                                                                             </td>';
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
                                                            <h4>¿Deseas eliminar  de tu lista de productos?</h4>
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
                            </div>
                        </div>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                    <div>
                    </div>
                </div>	
            </div>
            <!-- FINAL ESTILOS DE LA BARRA -->

        </div>
    </div>
</div>
    <script>

        var $id = null;

        var table_loader = function () {

            var table = $('#products_table');

            var oTable = table.dataTable({
                "lengthMenu": [
                    [5, 15],
                    [5, 10] // change per page values here
                ],
                "pageLength": 5,
                "language": {
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                    "emptyTable": "No data available in table",
                    "info": "Mostrando _START_ a _END_ de un _TOTAL_ productos",
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
                ] // set first column as a default sort by asc
            });



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
