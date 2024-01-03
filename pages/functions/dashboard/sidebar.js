
// THIS IS FOR BOARD BUTTON (SIDEBAR)..
$(document).ready(function () {
    showBoard();
    getPinned_Projects();
    $(document).on("click","#navboard",function (e) { 
        e.preventDefault();
        selectedButton ("B");
        showBoard();
        getPinned_Projects();
    });
 
});

//show board contents
function showBoard()
{
    $("#content-show").load("../contents/dist/board.php", {isboard: "yes"}, function(){
        $("#board").fadeOut(0).fadeIn(500);
    });
}


// THIS IS FOR MEMBER BUTTON (SIDEBAR)..
$(document).ready(function () {
    $("#navmember").click(function (e) { 
        e.preventDefault();
        selectedButton ("M");
        showMember();
        getPinned_Projects();;
    });
});

//show member contents
function showMember()
{
    $("#content-show").load("../contents/dist/member.php", {ismember: "yes"}, function(){
        $("#member").fadeOut(0).fadeIn(500);
    });
}


// THIS IS FOR CALENDAR BUTTON (SIDEBAR)..
$(document).ready(function () {
    $("#navcalendar").click(function (e) { 
        e.preventDefault();
        selectedButton ("C");
        showCalendar();
        getPinned_Projects();;
    });
});

//show calendar contents
function showCalendar()
{
    $("#content-show").load("../contents/dist/calendar.php", {iscalendar: "yes"}, function(){
        $(" #calendar").fadeIn(500);
    })
}



// INDICATOR FOR SELECTED BUTTON FOR SIDEBAR
function selectedButton (btnID)
{   
    if(btnID == "B"){
        $("#sb-menu button").removeClass("selected");
        $("#sb-menu #navboard").addClass("selected");
        
    }else 
    if(btnID == "M"){
        $("#sb-menu button").removeClass("selected");
        $("#sb-menu #navmember").addClass("selected");
    }else 
    if(btnID == "C"){
        $("#sb-menu button").removeClass("selected");
        $("#sb-menu #navcalendar").addClass("selected");
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
