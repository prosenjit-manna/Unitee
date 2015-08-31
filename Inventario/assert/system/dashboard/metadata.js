
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
            $("#system_logo").attr("src" , base + "images/dashboard/" + t.value);
        });
        tasking.do_task();
    };
    
};