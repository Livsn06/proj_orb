
// THIS IS FOR BOARD BUTTON (SIDEBAR)..
$(document).ready(function () {
    showDetails();
    $(document).on("click","#navpdetails",function (e) { 
        e.preventDefault();
        selectedButton ("D");
        showDetails();
    });
 
});

//show board contents
function showDetails()
{
    $("#content-show").load("../contents/dist/projectdata.php", {getDetails: "yes"}, function(){
        $("#p-settings").fadeOut(0).fadeIn(500);
    });
}


// THIS IS FOR MEMBER BUTTON (SIDEBAR)..
$(document).ready(function () {
    $("#navpmember").click(function (e) { 
        e.preventDefault();
        selectedButton ("M");
        showMember();
    });
});

//show member contents
function showMember()
{
    $("#content-show").load("../contents/dist/projectmember.php", {getMembers: "yes"}, function(){
        $("#p-member").fadeOut(0).fadeIn(500);
    });
}


// THIS IS FOR CALENDAR BUTTON (SIDEBAR)..
$(document).ready(function () {
    $("#navpfiles").click(function (e) { 
        e.preventDefault();
        selectedButton ("F");
        showFiles();
    });
});

//show calendar contents
function showFiles()
{
    $("#content-show").load("../contents/dist/projectfiles.php", {getFiles: "yes"}, function(){
        $(" #p-files").fadeIn(500);
    })
}



// THIS IS FOR GRADES BUTTON (SIDEBAR)..
$(document).ready(function () {
    $("#navpgrades").click(function (e) { 
        e.preventDefault();
        selectedButton ("G");
        showGrades();
        getPinned_Projects();;
    });
});

//show calendar contents
function showGrades()
{
    $("#content-show").load("../contents/dist/grades.php", {isgrades: "yes"}, function(){
        
    })
}


// BACK BUTTON (SIDEBAR)..
$(document).ready(function () {
    $(document).on("click","#back-projs",function (e) { 
        e.preventDefault();
        $.post("../contents/dist/gotoProject.php", {exitProject: "set"},
        function(data){
            location.reload();
        });
    });
});



// INDICATOR FOR SELECTED BUTTON FOR SIDEBAR
function selectedButton (btnID)
{   
    if(btnID == "D"){
        $("#sb-menu button").removeClass("selected");
        $("#sb-menu #navpdetails").addClass("selected");
        
    }else 
    if(btnID == "M"){
        $("#sb-menu button").removeClass("selected");
        $("#sb-menu #navpmember").addClass("selected");
    }else 
    if(btnID == "F"){
        $("#sb-menu button").removeClass("selected");
        $("#sb-menu #navpfiles").addClass("selected");
    }else 
    if(btnID == "G"){
        $("#sb-menu button").removeClass("selected");
        $("#sb-menu #navpgrades").addClass("selected");
    }

}



// ACTION FOR CHANGING PINNED PROJECT WHEN TAPPED
$(document).ready(function () {
    $(document).on("click",".star",function (e) { 
        e.preventDefault();
        var id = $(this).attr('id')
        changePinned(id);

    });
});


// CHANGE THE PIN STATUS
function changePinned(id)
{
    $("#" + id).parent().load("../contents/dist/pinned_proj.php", {changePin: "yes", projid: id}, function(){
       getPinned_Projects();
    })
}



// LOAD PINNED PROJECT SIDBAR
function getPinned_Projects()
{
    $("#pinned").load("../contents/dist/pinned_proj.php", {getPinned: "yes"})
}
