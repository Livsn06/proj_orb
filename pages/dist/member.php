<!-- FOR INSTRUCTOR -->
<!-- 
<?php
// session_start();

// if not log in ung session ng instructor page babalik sa landing page
// if(!isset($_SESSION['instrLogin'])){
//     header("Location: index.php");
// }
// if not log in as instructor pero naka log in as student babalik sya sa student homepage
// if(isset($_SESSION['studLogin'])){
//     header("Location: home.php");
// }

?> -->


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
    <script src="../functions/dashboard/for_board.js"></script>
    <script src="../../modals/functions/createvalidation.js"></script>



    <link rel="stylesheet" href="../styles/landing.css">

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
                        <button class="pd-prof">
                            <img src="../images/default_Userprofile.png" alt="">
                            <h6>Username</h6>
                            <i class="fa fa-caret-down user-icon" aria-hidden="true"></i>
                        </button>
                </header>


            <section class="inner-contents" id="content-show">
      
            <!-- !CONTENTS SHOW -->

                
            </section>
        </main>

        <!-- SIDEBAR -->
        <main class="left-sec"> 
                  
            <aside class="sidebar">
                <a href="dashboard.html"><button class="logo">
                    <img src="../images/logo_2.png" alt="">
                </button></a>
                
                
                <div class="menu" id="sb-menu">
                   <small> Main menu</small>

                   <!-- JQUERY WHEN CLICKED ADD "selected" class name -->
                   <button class="selected" id="navboard" value="showboard">
                   <i class="fa-solid fa-folder-closed fa-lg icon"></i>
                        Board
                   </button>
                   <button class="" id="navmember" value="showmember">
                   <i class="fa-solid fa-user-group fa-lg icon "></i>
                        Members
                   </button>
                   <button class="" id="navcalendar" value="showcalendar">
                   <i class="fa-solid fa-calendar-days fa-lg icon"></i>
                        Calendar
                   </button>
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


