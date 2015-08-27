
var Request = function(directory){
    
    this.password = function(){
        var tasking = new jtask();
        tasking.url = directory  + "/User/password/verify/";
        tasking.success_callback(function (request) {
            var t = $.trim(request);
            var $peticiones = $("#request");
            if (t == 0 || t == '0') {
                 $peticiones.append('<div class="alert alert-block alert-warning fade in alert-dismissable"><button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"></button><p>Tienes que cambiar tu contraseña</p></div>');/*<a href="<?php echo site_url("/0/user=user_profile"); ?>" class="btn default input-circle">Cambiar Contraseña</a>*/
            }
        });
        tasking.do_task();
    };
    
};
