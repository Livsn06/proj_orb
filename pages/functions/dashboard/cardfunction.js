$(document).ready(function () {
    $(document).on("click", ".projget",function () {
       var projid =  $(this).val();
       $.post("../contents/dist/gotoProject.php", {gotoProject: projid},
       function(){
            window.location.href="../dist/project.php";
       });
    });
});



$(document).ready(function () {
    $(document).on("keyup","#s-vals",function () { 
        var drpdown = $("#dropdown-sort").val();
        var sval = $("#s-vals").val();
        $("#board #prj-crds").load("../contents/dist/sortboard.php", {sortdata: drpdown , seachval: sval});
        
    });
});