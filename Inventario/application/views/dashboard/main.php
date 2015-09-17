
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div id="request">
            <!-- Peticiones del sistema -->
        </div>
        <div>
            <?php
            $type_message = array(
                "prov" => " Proveedor"
            );

            $err_message = array(
                0 => "agregado con éxito", /* <a href='" . site_url("/0/proveedor=new_proveedor") .  "' class='btn default input-circle'>Agregar Nuevo Proveedor</a> */
                1 => " No se pudo guardar los cambios ,  favor intentar de nuevo."
            );


            if (isset($_REQUEST['msj'])) {
                echo '<div class="alert alert-block alert-success fade in"><button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"></button><p>'
                . $type_message[$_REQUEST['msj']]
                . $err_message[$_REQUEST['err']] ? : NULL . '</p></div>';
            }
            ?>
        </div>
        <h3 class="page-title">
            Unitee - Dashboard<small></small>
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
        <div class="portlet">  
            <br>
            <div class="portlet-body col-md-5 col-sm-6">
                <span class="caption-subject font-blue-steel bold uppercase">Notificaciones Recientes</span><br><br>
                <div id="noti" class="scroller" style="height: 130px;" data-always-visible="1" data-rail-visible="0" id="notificacion">
                   
                </div>
                <div class="scroller-footer">
                    <div class="btn-arrow-link pull-right">
                        <a href="<?php echo site_url("/0/notifications=view_notifications"); ?>">Ver todas las notificaciones</a>
                        <i class="icon-arrow-right"></i>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue-madison">
                    <div>
                        <h3 class="col-lg-offset-1 col-md-offset-1 col-xs-offset-1" style="color:white;">Productos</h3>
                    </div>
                    <div class="visual">
                        <i class="icon-bar-chart"></i>
                    </div>
                    <div class="details">
                        <div class="number" id="npro">

                        </div>
                        <div class="desc">
                            Productos en total 
                        </div>
                    </div>
                    <a class="more" href="<?php echo site_url("/0/productos=view_producto"); ?>">
                        Ver Mas <i class="icon-eye"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-intense">
                    <div>
                        <h3 class="col-lg-offset-1 col-md-offset-1 col-xs-offset-1" style="color:white;">Productos</h3>
                    </div>
                    <div class="visual">
                        <i class="icon-warning-sign"></i>
                    </div>
                    <div class="details">
                        <div class="number" id="nprob">

                        </div>
                        <div class="desc">
                            Productos bajos en existencia
                        </div>
                    </div>
                    <a class="more" href="<?php echo site_url("/0/productos=view_producto"); ?>">
                        Ver Mas <i class="icon-eye"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>        

<!-- END CONTENT -->
<script>
    var dashboard_loader = function () {

        this.load = function () {
            var task = new jtask();
            task.url = "<?php echo site_url("jsloader"); ?>";
            task.success_callback(function (r) {
                //EJECUCION DE SEGUNDO PLANO PARA MODULOS 
                console.log(r);
            });
            task.do_task();

        };
    };
</script>

<script>

    var widget_notification = function () {
        var task = new jtask();
        task.url = "<?php echo site_url("dashboard/get_notification/TRUE"); ?>";
        task.beforesend = true;
        task.config_before(function () {
            $("#noti").html('<center><img src="' + "<?php echo $route; ?>images/dashboard/loading.gif" + '" align="center" width="100px" height="100px"/></center>');
        });
        task.success_callback(function (r) {
            $("#noti").html('');
            var obj = JSON.parse(r);
            var c = obj.count;
            var d = obj.data;
            if (c == 0) {
            $("#noti").append('<center><img src="<?php echo $route; ?>images/dashboard/no.png" height="75px"><br><p>No hay notificaciones recientes</p></center>');
            }else{
                $.map(d, function (k) {
                    $("#noti").append('<ul class="feeds"><li><div class="col1"><div class="cont"><div class="cont-col1"><div class="label label-sm label-info"><i class="' + k.icon + '"></i></div></div><div class="cont-col2"><div class="desc" id="noti2">' + k.description.substring(0, 40) + "..." + '</div></div></div></div><div class="col2"><div class="date">' + k.date + '</div></div></li></ul>');
                });
            }
        });
        task.do_task();
    };

    var widget_count_product = function () {
        //   productos/count_product
        var task = new jtask();
        task.url = "<?php echo site_url("productos/count_product"); ?>";
        task.beforesend = true;
        task.config_before(function () {
            $("#npro").html('<center><img src="' + "<?php echo $route; ?>images/dashboard/loading.gif" + '" align="center" width="70px" height="70px"/></center>');

        });
        task.success_callback(function (r) {
            $("#npro").html('');
            var obj = JSON.parse(r);
            $("#npro").append('<div class="numbre">' + obj.count + '</div>');
        });
        task.do_task();

        var task2 = new jtask();
        task2.url = "<?php echo site_url("productos/get_low_product"); ?>";
        task2.beforesend = true;
        task2.config_before(function () {
            $("#nprob").html('<center><img src="' + "<?php echo $route; ?>images/dashboard/loading.gif" + '" align="center" width="70px" height="70px"/></center>');
        });
        task2.success_callback(function (r) {
            $("#nprob").html('');
            var obj = JSON.parse(r);
            $("#nprob").append('<div class="numbre">' + obj.count + '</div>');
        });
        task2.do_task();
    };
</script>