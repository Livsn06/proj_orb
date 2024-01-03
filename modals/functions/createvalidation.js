$(document).ready(function () {
    $(document).on("click", "#create-board-btn",function () {
        var title = $("#title-input").val();
        var due = $("#date-input").val();
        var cover = $("#image-select-btn")[0].files[0];

        if(!is_hasEmpty(title, due, cover))
        {
            var formData = new FormData();
            formData.append('insertProject', "set");
            formData.append('file', cover);
            formData.append('ptitle', title);
            formData.append('pdue', due);

            $.ajax({
                url : '../../modals/dist/createmodal.php',
                type : 'post',
                data : formData,
                processData: false, 
                contentType: false,  
                success : function() {
                    exitCreate_Modal();
                    showBoard();
                }
            });

        }
        else{
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Empty field",
                text: "Please fill all required form",
                showConfirmButton: false,
                timer: 1500
              });
        }
    });
});



function is_hasEmpty(title, due, cover) {
    return (title === "" || due === "" || cover === undefined);
  }


function showBoard()
{
    $("#content-show").load("../contents/dist/board.php", {isboard: "yes"}, function(){
        $("#board").fadeOut(0).fadeIn(500);
    });
}
function exitCreate_Modal()
{
    $("#createBoardmodal").fadeOut(250, function(){
        $("#createBoardmodal").remove();
    });
}
