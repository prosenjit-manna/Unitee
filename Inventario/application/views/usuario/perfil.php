<style>
    .class_tr {
        width: 100%;
        display: inline-table;
    }
    .class_tbody
    {
        overflow-y: scroll;
        overflow-wrap: scroll;
        height: 380px;
        width: 100%;
        position: relative;
    }


</style>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <?php
                    if (isset($_REQUEST['opps'])):
                        switch ($_REQUEST['opps']):
                            case 0:
                                echo '<div class="alert alert-success" role="alert">
                                                <button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"></button><p>Contraseña Cambiada con exito</p></div>';

                                break;
                            case 1:
                                echo '<div class="alert alert-warning" role="alert">
                                                <button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"></button><p>Lo sentimos , Tu contraseña actual es incorrecta .</p></div>';
                                break;
                            case 2:
                                echo '<div class="alert alert-warning" role="alert">
                                                <button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"></button><p>Lo sentimos , Hubo un error intente mas tarde</p></div>';
                                break;
                            case 3:
                                echo '<div class="alert alert-success" role="alert">
                                                <button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"></button><p>Avatar cambiado con exito</p></div>';
                                break;
                            case 4:
                                echo '<div class="alert alert-warning" role="alert">
                                                <button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"></button><p>Hubo un error al momento de guardar la imagen</p></div>';
                                break;
                            case 5:
                                echo '<div class="alert alert-warning" role="alert">
                                                <button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"></button><p>Lo sentimos la image debe de ser menor a un (1Mb)</p></div>';
                                break;
                        endswitch;
                    endif;
                 ?>
        <h3 class="page-title">
            Unitee - Perfil 
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?php echo site_url("Dashboard/index"); ?>">Home</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo site_url("Dashboard/index/user=user_profile"); ?>">Perfil</a>
                </li>
            </ul>
            <div class="page-toolbar">

            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS -->
        <div class="page-content-wrapper">

            <!-- BEGIN PAGE HEADER-->
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-3">

                    <!-- PORTLET MAIN -->
                    <div class="portlet light profile-sidebar-portlet">
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-userpic">
                            <?php if (is_null($user_data['avatar'])): ?>
                                <img src="<?php echo $route; ?>images/dashboard/avatar.png" class="img-responsive" alt="">
                            <?php else: ?>
                                <img src="<?php echo $route; ?>images/dashboard/users/<?php echo $user_data['avatar']; ?>" class="img-responsive" alt="">
                            <?php endif; ?>
                        </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                <?php
                                echo strtoupper($user_data['user']);
                                ?>
                            </div>
                            <div class="profile-usertitle-job">
                                <?php
                                echo strtoupper($user_data['rol_name']);
                                ?>
                            </div>
                        </div>
                        <!-- END SIDEBAR USER TITLE -->
                    </div>
                    <div>
                        <ul class="ver-inline-menu tabbable margin-bottom-10">
                            <li class="active">
                                <a data-toggle="tab" href="#tab_1-1">
                                    <i class="icon-cog"></i> Información Personal</a>
                                <span class="after">
                                </span>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_2-2">
                                    <i class="icon-picture"></i> Cambiar Imagen</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_3-3">
                                    <i class="icon-lock"></i> Cambiar Contraseña</a>
                            </li>
                        </ul>

                    </div>

                </div>
                <div class="col-md-9 ">
                    <div class="tab-content class_tbody ">
                        <div id="tab_1-1" class="tab-pane active">
                            <form role="form">
                                <div class="form-group">
                                    <label class="control-label">Nombres</label>
                                    <input disabled="disabled" type="text" class="form-control" value="<?php echo $user_data['name']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Privilegios</label>
                                    <input disabled="disabled"  type="text" class="form-control" value="<?php echo $user_data['rol_name']; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Correo</label>
                                    <input disabled="disabled"  type="text" class="form-control" value="<?php echo $user_data['email']; ?>"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Usuario</label>
                                    <input disabled="disabled"  type="text" class="form-control" value="<?php echo $user_data['user']; ?>"/>
                                </div>
                            </form>
                        </div>

                        <div id="tab_2-2" class="tab-pane">
<?php echo form_open_multipart("avatar"); ?>
                            <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                    </div>
                                    <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new">
                                                Seleccionar Imagen </span>
                                            <span class="fileinput-exists">
                                                Cambiar </span>
                                            <input type="file" name="avatar_img">
                                        </span>
                                        <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
                                            Eliminar </a>
                                    </div>
                                </div>
                            </div>
                            <div class="margin-top-10">
                                <button type="submit" class="btn green" name="cmd_avatar">
                                    Guardar </button>

                            </div>
<?php echo form_close(); ?>
                        </div>
                        <div id="tab_3-3" class="tab-pane">
<?php echo form_open("User/password/change/user=user_profile") ?>
                            <div class="form-group">
                                <label class="control-label">Contraseña Actual</label>
                                <input required="" onkeyup="check_();" name="txt_actual_pass" type="password" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nueva Contraseña</label>
                                <input required="" onkeyup="pass_compare();" id="txt_new_pass" name="txt_new_pass" type="password" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label  class="control-label">Repetir Contraseña</label>
                                <input required=""  onkeyup="pass_compare();" id="txt_repeat_pass" name="txt_repeat_pass" type="password" class="form-control"/>
                            </div>
                            <div class="margin-top-10">
                                <button type="submit" disabled="disabled" id="cmd_cambiar" name="cmd_cambiar" class="btn green"> Cambiar</button>
                                <a href="javascript:reset();" class="btn default">
                                    Cancelar </a>
                            </div>
<?php echo form_close(); ?>
                        </div>
                    </div>



                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
</div>

<!-- END CONTENT -->

<script>

    var check_ = function () {
        var p2 = $("#txt_repeat_pass").val();
        if (p2 === "" || p2 == "undefined") {
            document.getElementById("cmd_cambiar").disabled = true;
        }
    };

    var pass_compare = function () {


        var p1 = $("#txt_new_pass").val();
        var p2 = $("#txt_repeat_pass").val();

        if (p1 === "undefined"
                || p2 === "undefined"
                || p1 === null
                || p2 === null
                || p1 == ""
                || p2 == "") {
            document.getElementById("cmd_cambiar").disabled = true;
        }

        if (p1 === p2) {
            document.getElementById("cmd_cambiar").disabled = false;
        } else {
            document.getElementById("cmd_cambiar").disabled = true;
        }

    };

</script>

