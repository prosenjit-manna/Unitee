
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div id="peticiones">
            <!-- Peticiones del sistema -->
        </div>
        <div>
            <?php
            $type_message = array(
                "prov" => " Proveedor"
            );

            $err_message = array(
                0 => "  Agregado con Exito", /* <a href='" . site_url("/0/proveedor=new_proveedor") .  "' class='btn default input-circle'>Agregar Nuevo Proveedor</a> */
                1 => "  No se pudo guardar los cambios ,  favor intentar de nuevo."
            );


            if (isset($_REQUEST['msj'])) {
                echo '<div class="alert alert-block alert-success fade in"><button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"></button><p>'
                . $type_message[$_REQUEST['msj']]
                . $err_message[$_REQUEST['err']] ? : NULL . '</p></div>';
            }
            ?>
        </div>
        <h3 class="page-title">
            Unitee - Dashboard <small></small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?php echo site_url("Dashboard/index/"); ?>">Home</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo site_url("Dashboard/index/"); ?>">Dashboard</a>
                </li>
            </ul>
            <div class="page-toolbar">

            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS -->

    </div>
</div>

<!-- END CONTENT -->
<script>

    var pass_request = function () {

        var tasking = new jtask();
        tasking.url = "<?php echo site_url("/User/password/verify/"); ?>";
        tasking.success_callback(function (request) {
            var t = $.trim(request);
            var $peticiones = $("#peticiones");
            if (t == 0 || t == '0') {
                $peticiones.append('<div class="alert alert-block alert-warning fade in alert-dismissable"><button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"></button><p>Tienes que cambiar tu contraseña</p></div>');/*<a href="<?php echo site_url("/0/user=user_profile"); ?>" class="btn default input-circle">Cambiar Contraseña</a>*/
            }
        });
        tasking.do_task();
    };


</script>

