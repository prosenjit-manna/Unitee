
var notifications = function(uri){
    
    this.head        = null;
    
    this.body        = null;
    
    this.footer      = null;
    
    this.ncount      = null;
    
    this.show = function(){
        
         var h , b, f , c;
         
         if(this.head != null)
            h = $("#" + this.head);
         if(this.body != null)
            b = $("#" + this.body);
         if(this.footer != null)
            f = $("#" + this.footer);
         if(this.ncount != null)
            c = $("#" + this.ncount);
        
        var tasking = new jtask();
        tasking.url = uri + "notifications";
        tasking.success_callback(function(d){
              var parse         = JSON.parse(d);
              var count         = parse.count;
              var data          = parse.data;
              h.html("<p>" + count  +" Notificaciones Pendientes</p>");
              c.html(count);
              if(count == 0){
                     b.html('<li><a href="#"><span class="label label-sm label-icon label-success"><i class="icon-thumbs-up"></i></span>No hay notificaciones<span class="time"> Ahora</span></a></li>');
              }else{
                $.map(data , function(da){
                    var data = '';
                        data += '<li>'
                             +  '<a href="' + uri + 'notify?id=' + da.id + "&redirect=" + da.redirect + '">'
                             +  '<span class="label label-sm label-icon ' + da.alert + '">'
                             +  '<i class="' + da.icon + '"></i>'
                             +  '</span>' 
                             +  da.description.substring(0,20) + "..."
                             +  '<span class="time">&nbsp;'
                             +  da.date
                             +  '</span>'
                             +  '</a>'
                             +  '</li>';
                     b.append(data);
                });
              }
        });
        tasking.do_task();
        console.log("Terminando las notificaciones ...");
    };
    
};