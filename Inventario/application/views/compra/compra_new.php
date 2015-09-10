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
            <input type="hidden" id="providers" value='<?php echo json_encode($prov, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); ?>' />
            <input type="hidden" id="products" value='<?php echo json_encode($prod, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); ?>' />
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
                                    <select onchange="provider_selected(this.value);" required="" id="select_provider" name="select_provider" class="form-control input-circle">
                                        <option value="-1">Seleccione un proveedor</option>
                                        <?php foreach ($prov as $v): ?>
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
                            <table class="table table-striped table-hover table-bordered" >
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
                                <tbody id="table_prod">
                                    <?php
                                    $prod_id = isset($_REQUEST['i']) ? $_REQUEST['i'] : NULL;
                                    if (!is_null($prod_id)) {
                                        
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row col-md-12">
                            <form  class="col-md-7" id="fileupload" action="../../assets/global/plugins/jquery-file-upload/server/php/" method="POST" enctype="multipart/form-data">
                                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                <div class="row fileupload-buttonbar">
                                    <br><br>
                                    <div class="col-md-4">
                                        <h4>Adjuntar archivos</h4>
                                    </div>
                                    <div>
                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                        <span class="btn green fileinput-button">
                                            <i class="icon-search"></i>
                                            <span>
                                                Buscar...</span>
                                            <input type="file" name="files[]" multiple="">
                                        </span>
                                        <button type="submit" class="btn blue start">
                                            <i class="icon-upload"></i>
                                            <span>
                                                Subir</span>
                                        </button>
                                    </div>
                                    <!-- The global progress information -->
                                    <div class=" fileupload-progress fade">
                                        <!-- The global progress bar -->
                                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar progress-bar-success" style="width:0%;">
                                            </div>
                                        </div>
                                        <!-- The extended global progress information -->
                                        <div class="progress-extended">
                                            &nbsp;
                                        </div>
                                    </div>
                                </div>
                                <!-- The table listing the files available for upload/download -->
                                <table role="presentation" class="table table-striped clearfix">
                                    <tbody class="files">
                                    </tbody>
                                </table>
                            </form>
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
                                        <input id="total_price_prod" onkeyup="" required="" type="text" id="txt_ptotal" name="txt_ptotal" disabled="disabled" class="form-control input-circle" placeholder="Numero de ptotal">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br><br>
                <div class="form-actions right col-md-offset-9">
                    <a href="<?php echo site_url("/0/"); ?>" class="btn default">Cancelar</a>
                    <button onclick="save_buy();"  disabled="disabled" id="send_buy" name="send_buy"  type="button" class="btn blue"><i class="fa fa-check"></i>Guardar</button>
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
                        <button type="button" data-dismiss="modal" onclick="delete_node();" class="btn green">Eliminar</button>
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
                                <select onchange="select_color(this.value);" required="required" id="select_nombre" name="txt_pombre" class="form-control input-circle">                     
                                    <option value="">Seleccione el producto</option>
                                    <?php foreach ($prod as $v): ?>
                                        <option value="<?php echo $v->nombre; ?>"><?php echo $v->nombre; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label class="control-label col-md-2">* Color</label>
                            <div class="form-group col-md-4">
                                <select id="color_prod" required="required" id="select_color" name="txt_color" class="form-control input-circle">                     
                                    <option value="">Seleccione el color</option>
                                </select>
                            </div>
                            <label class="control-label col-md-2">Cantidad</label>
                            <div class="form-group col-md-4">
                                <div class="input-icon right">
                                    <i name="change_" id="change_pcantidad_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                    <i name="change_x" id="change_pcantidad" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                    <input onkeyup="validarModal();validate_pcant();" id="cant_prod" required="" type="number" id="txt_pcantidad" name="txt_pcantidad" class="form-control input-circle" placeholder="Cantidad del producto">
                                </div>
                            </div>
                            <label class="control-label col-md-2">Precio</label>
                            <div class="form-group col-md-4">
                                <div class="input-icon right">
                                    <i name="change_" id="change_precio_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                    <i name="change_x" id="change_precio" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                    <input onkeyup="validarModal();validate_pre();" id="price_prod" required="" type="number" name="txt_precio" class="form-control input-circle" placeholder="Precio del producto">
                                </div>
                            </div> <br><br><br> <br><br><br>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                <button type="button" id="send" data-dismiss="modal" onclick="save_product(); " class="btn green" disabled="disabled">Guardar</button>
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
<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade col-md-12">
    <td>
    <span class="preview"></span>
    </td>
    <td>
    <p class="name">{%=file.name%}</p>
    <strong class="error text-danger label label-danger"></strong>
    </td>
    <td>
    <p class="size">Processing...</p>
    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
    </div>
    </td>
    <td>
    {% if (!i && !o.options.autoUpload) { %}

    {% } %}
    {% if (!i) { %}
    <button class="btn red cancel">
    <i class="icon-remove-sign"></i>
    <span>Eliminar</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade col-md-6">
    <td>
    <span class="preview">
    {% if (file.thumbnailUrl) { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
    {% } %}
    </span>
    </td>
    <td>
    <p class="name">
    {% if (file.url) { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
    {% } else { %}
    <span>{%=file.name%}</span>
    {% } %}
    </p>
    {% if (file.error) { %}
    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
    {% } %}
    </td>
    <td>
    <span class="size">{%=o.formatFileSize(file.size)%}</span>
    </td>
    <td>
    {% if (file.deleteUrl) { %}
    <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
    <i class="fa fa-trash-o"></i>
    <span>Delete</span>
    </button>
    <input type="checkbox" name="delete" value="1" class="toggle">
    {% } else { %}
    <button class="btn yellow cancel btn-sm">
    <i class="fa fa-ban"></i>
    <span>Cancel</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
</script>
<script>

    var $pid = null;
    var $node_table = null;

    function validar() {

        var factura = $("#txt_factura").val();

        if (factura == "") {
            $("#send_buy").attr("disabled", true);
        }
        else {
            $("#send_buy").attr("disabled", false);
        }
    }
    ;

     function validarModal() {
        var cantidad = $("#cant_prod").val();
        var precio = $("#price_prod").val();
        if (cantidad == "" || precio == "") {
            $("#send").attr("disabled", true);
        }
        else {
            $("#send").attr("disabled", false);
        }
    }
    ;

        var validate_pcant = function () {
                var change_pcantidad_ok = $("#change_pcantidad_ok");
                var change_pcantidad = $("#change_pcantidad");
                var pcantidad = $("#cant_prod").val();
                if (pcantidad === "") {
                change_pcantidad_ok.css("display", "none");
               change_pcantidad.css("display", "block");
                return false ;
                }
                else {
                change_pcantidad_ok.css("display", "block");
                change_pcantidad.css("display", "none");
                 return false ;
                }
            };

             var validate_pre = function () {
                var change_precio_ok = $("#change_precio_ok");
                var change_precio = $("#change_precio");
                var precio = $("#price_prod").val();
                if (precio === "") {
                change_precio_ok.css("display", "none");
               change_precio.css("display", "block");
                return false ;
                }
                else {
                change_precio_ok.css("display", "block");
                change_precio.css("display", "none");
                 return false ;
                }
            };

    var provider_selected = function (id) {
        $pid = id;
        var prov = JSON.parse($("#providers").val());
        var dir = $("#prov_dir");
        var name = $("#prov_name");
        var num = $("#prov_num");
        $("#prov_data").addClass("well");
        $.map(prov, function (j) {
            if ($pid == j.id_prov) {
                dir.html(
                        '<h4 class="col-md-12">Dirección</h4>' +
                        '<p class="col-md-12">' +
                        j.direccion +
                        '</p>'
                        );

                name.html(
                        '<h4 class="col-md-12">Empresa</h4>' +
                        '<p class="col-md-12">' +
                        j.empresa +
                        '</p>'
                        );


                num.html(
                        '<h4 class="col-md-12">Telefono</h4>' +
                        '<p class="col-md-12">' +
                        j.telefono +
                        '</p>'
                        );

            }
        });
    };

            

    var table_loader = function () {

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

    var select_color = function (i) {
        var task = new jtask();
        var select = $("#color_prod");
        task.url = "<?php echo site_url("productos/get_color_byName"); ?>";
        task.beforesend = true;
        task.data = {
            "name": i
        };
        task.config_before(function () {
            select.html('<option value="">Buscando Colores ..</option>');
        });
        task.success_callback(function (j) {
            select.html('');
            select.append('<option value="-1">Seleccione un color</option>');
            $.map(JSON.parse(j), function (k) {
                select.append('<option value="' + k.id + ',' + k.color_name + ',' + k.name + '">' + k.color_name + '</option>');
            });
        });
        task.do_task();
    };

    var save_product = function () {
        var color_prod = $("#color_prod").val().split(",");
        var id = color_prod[0];
        var color = color_prod[1];
        var name = color_prod[2];
        var price = $("#price_prod").val();
        var cant = $("#cant_prod").val();
        var body = $("#table_prod");

        var data = '<tr id="table_' + id + '">'
                + '<td>' + '<p align="center">' + name + '</p>' + '</td>'
                + '<td>' + '<p align="center">' + color + '</p>' + '</td>'
                + '<td>' + '<p align="center">' + cant + '</p>' + '</td>'
                + '<td>' + '<p align="center">' + price + '</p>' + '</td>'
                + '<td>' + '<p align="center">'
                + '<p align="center">'
                + '<a class="" onclick="table_node(' + id + ');" data-toggle="modal" href="#responsive_delete"><i class="icon-remove-circle" style="font-size: 25px; color:#FA5858;"></i></i></a>'
                + '</p>'
                + '</td></tr>';
        body.prepend(data);
        total_price();

    };

    var table_node = function (i) {
        $node_table = i;
    };

    var delete_node = function () {
        $("#table_" + $node_table).remove();
        total_price();
    };

    var total_price = function () {
        var total_price = 0.0;

        $("#table_prod tr").each(function () {
            total_price += parseFloat($(this).find("td")
                    .eq(3).find("p")
                    .eq(0).html());
        });

        $("#total_price_prod").val(total_price);

    };

    var save_buy = function () {
        var id_, name, color, cant, price;

        var data = new Array();

        var po = $("#txt_po").val();
        var fac = $("#txt_factura").val();
        var total = $("#total_price_prod").val();

        $("#table_prod tr").each(function () {
            id_ = $(this).attr("id").split("table_")[1];

            name = $(this).find("td")
                    .eq(0).find("p")
                    .eq(0).html();
            color = $(this).find("td")
                    .eq(1).find("p")
                    .eq(0).html();
            cant = parseFloat($(this).find("td")
                    .eq(2).find("p")
                    .eq(0).html());
            price = parseFloat($(this).find("td")
                    .eq(3).find("p")
                    .eq(0).html());

            var o = new Object();
            o.id = id_;
            o.name = name;
            o.color = color;
            o.cant = cant;
            o.price = price;

            data.push(o);
        });

        var task = new jtask();
        task.url = "<?php echo site_url("Buy/SaveBuy/"); ?>";
        task.beforesend = true;
        task.data = {
            "products": JSON.stringify(data),
            "po": po,
            "fac": fac,
            "total": total,
            "prov": $pid
        };
        task.config_before(function () {
            $("#send_buy").html("Guardando espere ...");
            $("#send_buy").attr("disabled", true);
        });
        task.success_callback(function (r) {
            $("#send_buy").html("Guardar");
            $("#send_buy").attr("disabled", false);
            console.log(r);
        });
        task.do_task();


    };



</script>