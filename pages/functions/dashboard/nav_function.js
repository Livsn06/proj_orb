$(document).ready(function () {
    $(document).on("click","#notif-btn",function (e) { 
        e.preventDefault();
        notifFunctions();
    });
    $(document).on("click","#user-btn",function (e) { 
        e.preventDefault();
        userNavFunctions();
    });
    $(document).on("click","#logout-btn",function (e) { 
        e.preventDefault();
        logoutUser();
    });

});




var fullnotif = false;
function notifFunctions()
{   
  
    fullnotif = !fullnotif;
    changeStatusindicator("notif", fullnotif);

    if(fullnotif){

        fullusernav = false;
        $("#show-user").remove();
        changeStatusindicator("user", fullusernav);

        $.post("../contents/dist/notif.php", {getNotif: "set"}, function(data){
            $("#full-notif").append(data);
        });
      
    }else{
        $("#show-notification").remove();
    }
}



var fullusernav = false;
function userNavFunctions()
{   
    fullusernav = !fullusernav;

    changeStatusindicator("user", fullusernav);

    if(fullusernav){
        
        fullnotif = false;
        $("#show-notification").remove();
        changeStatusindicator("notif", fullnotif);

        $.post("../contents/dist/usersetting.php", {getUsersettings: "set"}, function(data){
            $("#full-user").append(data);
        });
      
    }else{
        $("#show-user").remove();
    }
}


function changeStatusindicator(type, active)
{
    if(active){
        if(type == "user"){
            $("#user-btn").addClass('pd-prof-selected');
        }
        if(type == "notif"){
            $("#notif-btn").addClass('pd-notif-selected');
        }
    }else{
        if(type == "user"){
            $("#user-btn").removeClass('pd-prof-selected');
        }
        if(type == "notif"){
            $("#notif-btn").removeClass('pd-notif-selected');
        }
    }

}


function logoutUser()
{
    $.post("../contents/dist/usersetting.php", {logoutUser: "set"},
        function () {
            location.reload(true);
        },
    );
}