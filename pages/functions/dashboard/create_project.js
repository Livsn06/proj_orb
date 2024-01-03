//CREATE PROJECT  

$(document).ready(function () {
    createModal_Functionality();
    display_preview_image();
});


////CREATE PROJECT MODAL FUNCTIONALITY
function createModal_Functionality() 
{
    $(document).on("click", "#newproj",function () { 
        $("#modal-sect").load("../../modals/dist/createmodal.php", {getCreate: "set"},function(){
            $("#createBoardmodal").hide(0, function(){
                $("#createBoardmodal").fadeIn(250);
            });
           
        });
    });

    $(document).on("click","#exit-button",function () { 
        $("#createBoardmodal").fadeOut(250, function(){
            $("#createBoardmodal").remove();
        });
    });
    $(document).on("click", "#exit-outside",function () { 
        $("#createBoardmodal").fadeOut(250, function(){
            $("#createBoardmodal").remove();
        });
    });


}

////CREATE PROJECT MODAL IMAGE HANDLE FUCTINALITY
function display_preview_image()
{
    $(document).on("change","#image-select-btn",function(){
        getURL(this);
    });
}

function getURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#display-image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


