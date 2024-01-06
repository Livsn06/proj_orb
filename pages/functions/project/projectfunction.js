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



$(document).ready(function () {

    $(document).on("click", "#g-btn", function () {
        addGrades($("#grade-txt").val());
    });
});

function addGrades(grades)
{
    $("#content-show").load("../contents/dist/grades.php", {addGrades: grades},
        function (data) {
            location.reload();
        },
    );
}



$(document).ready(function () {

    $(document).on("click", "#fb-btn", function () {
        addfeedback($("#feedback-txt").val());
    });
});

function addfeedback(feedback)
{
    $("#content-show").load("../contents/dist/grades.php", {addFeedback: feedback},
        function (data) {
            location.reload();
        },
    );
}

