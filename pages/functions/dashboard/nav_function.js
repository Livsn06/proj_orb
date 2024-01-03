$(document).ready(function () {
    $(document).on("click","#notif-btn",function (e) { 
        e.preventDefault();
        notifFunctions();
    });

});

var fullnotif = false;
function notifFunctions()
{   
    fullnotif = !fullnotif;
    if(fullnotif){
        $.post("../contents/dist/notif.php", {getNotif: "set"}, function(data){
            $("#full-notif").append(data);
        });
      
    }else{
        $("#show-notification").remove();
    }
}