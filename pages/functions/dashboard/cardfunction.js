$(document).ready(function () {
    $(document).on("click", ".projget",function () {
       var projid =  $(this).val();
       $.post("../contents/dist/gotoProject.php", {gotoProject: projid},
       function(){
            window.location.href="../dist/project.php";
       });
    });
});