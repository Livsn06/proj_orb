<!-- FOR INSTRUCTOR -->

<?php
session_start();
// if not log in ung session ng instructor page babalik sa landing page
if(isset($_SESSION['instrLogin'])){
    header("Location: dashboard.php");
}
// if not log in as instructor pero naka log in as student babalik sya sa student homepage
if(!isset($_SESSION['studLogin'])){
    header("Location: landing.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

       <!-- J QUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="../functions/dashboard/sidebar.js"></script>
    <script src="../functions/dashboard/create_project.js"></script>
    <script src="../functions/dashboard/nav_function.js"></script>
    <script src="../functions/dashboard/cardfunction.js"></script>
    <script src="../functions/dashboard/for_board.js"></script>
    <script src="../../modals/functions/createvalidation.js"></script>
        <!-- Include DataTables CSS and JS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- Include Bootstrap CSS and JS -->

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>



    <link rel="stylesheet" href="../styles/dashboard.css">

    <script src="https://kit.fontawesome.com/a3ac451aad.js" crossorigin="anonymous"></script>
    <title>Project Orbit | Dashboard</title>
</head>
<body>

    <section class="outer-body">
        
    <!-- main content -->
       <main class="right-sec">
       
                <header class="pd-header">
                
                        <div class="full-notif" id="full-notif">
                            <button class="pd-notif" id="notif-btn"><i class="fa-solid fa-bell fa-2xl notif-icon"></i></button>
                        </div>

                        <div class="full-user" id="full-user">
                            <button class="pd-prof" id="user-btn">
                                <img src="../images/default_Userprofile.png" alt="">
                                <h6><?php echo getSelected_Data()?></h6>
                                <i class="fa fa-caret-down user-icon" aria-hidden="true"></i>
                            </button>
                        </div>
                </header>

            <section class="inner-contents" id="content-show">
      
            <!-- !CONTENTS SHOW -->
       
            </section>
        </main>

        <!-- SIDEBAR -->
        <main class="left-sec"> 
                  
            <aside class="sidebar">
                <a href="studentside.php"><button class="logo">
                    <img src="../images/logo_2.png" alt="">
                </button></a>
                
                
                <div class="menu" id="sb-menu">
                   <small> Main menu</small>

                   <!-- JQUERY WHEN CLICKED ADD "selected" class name -->
                   <button class="selected" id="navboard" value="showboard">
                   <i class="fa-solid fa-folder-closed fa-lg icon"></i>
                        Board
                   </button>
                   <!-- <button class="" id="navmember" value="showmember">
                   <i class="fa-solid fa-user-group fa-lg icon "></i>
                        Student
                   </button> -->

                   <!-- GRADE BUTTON -->
                   <a href="showcalendar.php" target="_blank" class="linkcal">
                        <button class="" id="" value="showcalendar">
                        <i class="fa-solid fa-calendar-days fa-lg icon"></i>
                                Calendar
                        </button>
                   </a>
                </div>
                
                <hr class="line">
                
                <div class="starred">
                    <small>Starred project</small>
                    <div class="pin-card" id="pinned">
                        <!-- AJAX GET ALL PINNED PROJECTS -->
                     
                    </div>                
                </div>
            </aside>
        </main>

    </section>

    <section id="modal-sect"></section>
</body>
</html>


<?php

    function getSelected_Data()
    {

        require "../../config/config.php";
       
        $email = $_SESSION['studLogin'];
        $sntx = "SELECT allstudlname  AS lname FROM studentreg r INNER JOIN overallstudent o ON o.allstudid=r.studid
        WHERE r.studemail = '$email'";

        $result = $conn -> query($sntx);
        if($result -> num_rows > 0){
            while($data = $result -> fetch_assoc()){
                $result->free();
                $conn -> close();
                return $data['lname'];
            }
        }
        $result->free();
        $conn -> close();
        return "Username";
    }
?>

