
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
        $("#board").fadeOut(0).fadeIn(500);
        fetch_tableData();
    });
   
}

function fetch_tableData()
{
    
    $('#studentTable').DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "ajax": {
            "url": "../contents/dist/fetch_all_student.php", // Endpoint to fetch data from server
            "dataSrc": "data" // JSON property containing the data array
        },
        "columns": [{
                "data": "assocto"
            }, // Assuming 'studid' is the student ID column name from studentreg
            {
                "data": "full_name",
            }, // Assuming 'allstudFname' is the student name column name from overallstudent
            {
                "data": null,
                "render": function(data, type, row) {
                    return '<button style="background-color: red; padding: 3px 20px; fontsize:medium; color: white; border-radius: 5px;" onclick="deleteStudent(\'' + row.assocto + '\')">Delete</button>';
                }
            },
        ]
    });
    

function deleteStudent(studentId) {
    if (confirm("Are you sure you want to delete this student?")) {
        $.ajax({
            url: '../contents/dist/delete_student.php',
            method: 'POST',
            data: {
                studentId: studentId
            },
            success: function(response) {
                $('#studentTable').DataTable().ajax.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error deleting student:', error);
            }
        });
    }
}
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


