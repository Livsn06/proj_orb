$(document).ready(function () {
    $(document).on("click","#addmember", function () {
        modaladdpmember();
    });

    $(document).on("click","#s-btn", function () {
        var val = $("#s-member").val();
        seachID(val);
    });

    $(document).on("click",".addedstud", function () {
        var val = $(this).val();
        addvalproj(val);
    });
    
});

function modaladdpmember()
{
    $("#modal-sect").load("../contents/dist/projectmember.php", {getmodal: 'set'}, function (data) {
    });

    $(document).on("click","#paddclose", function () {
        $("#paddmember").fadeOut(250, function(){
            $("#modal-sect").html('');
        });
    });
}

function seachID(id)
{
    $("#result").load("../contents/dist/projectmember.php", {getvalue: 'set', id: id}, function (data) {
    });
}

function addvalproj(id)
{
    $.post("../contents/dist/projectmember.php", {addstud: 'set', id: id}, function (data) {
        location.reload();
    });
}



