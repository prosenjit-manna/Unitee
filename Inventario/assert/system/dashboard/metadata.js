
/**
 * @author Rolando Arriaza
 * @version 1.0
 * @type js
 * 
 * Libreria de metadata para multiples funciones , esta libreria
 * favor de ver el manual de uso.
 * 
 * Dependencias : jtask , base_url , system_logo
 * 
 * **/

var metadata = function(uri){
    
    var tasking;
    
    var base    = $("#base_url").val();
    
    this.get_logo = function(){
        tasking = new jtask();
        tasking.url = uri + "Dashboard/getmeta/";
        tasking.data = {
            "key" : "logo"
        };
        tasking.success_callback(function(r){
            var t = JSON.parse(r);
        });
        tasking.do_task();
    };
    
};