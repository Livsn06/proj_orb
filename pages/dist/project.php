<?php
session_start();
if(empty($_SESSION['setProject'])){
    header("Location: dashboard.php");
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


    <script src="../functions/project/taskpercent.js"></script>
    <script src="../functions/project/projectfunction.js"></script>
    <script src="../functions/dashboard/nav_function.js"></script>
    <script src="../functions/project/sidebar.js"></script>

    <link rel="stylesheet" href="../styles/project.css">

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
                                <h6><?php echo getSelected_Data("instrlname")?></h6>
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

          
                    <button class="back-to-proj" id="back-projs">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>back to projects</span>
                    </button>
          
                <a href="project.php"><button class="logo">
                    <img src="<?php echo get_Projectdata('projectcover');?>" alt="">
                </button></a>
                
                
                <div class="menu" id="sb-menu">
                   <small> Main menu</small>

                   <!-- JQUERY WHEN CLICKED ADD "selected" class name -->
                   <button class="selected" id="navpdetails" value="showboard">
                   <i class="fa-solid fa-folder-closed fa-lg icon"></i>
                       Project Details
                   </button>
                   <button class="" id="navpmember" value="showmember">
                   <i class="fa-solid fa-user-group fa-lg icon "></i>
                        Members
                   </button>
                   <button class="" id="navpfiles" value="showcalendar">
                   <i class="fa-solid fa-calendar-days fa-lg icon"></i>
                        Files
                   </button>
                   <button class="" id="navpgrades" value="showcalendar">
                   <i class="fa-solid fa-receipt fa-lg icon"></i>
                        Grades
                   </button>
                </div>
                
            </aside>
        </main>

    </section>

    <section id="modal-sect"></section>
</body>
</html>



<?php

    function getSelected_Data($column)
    {
        require "../../config/config.php";
       
        $email = $_SESSION['instrLogin'];
        $syntax = "SELECT $column FROM instructorreg WHERE instremail = '$email'";

        $result = $conn -> query($syntax);
        if($result -> num_rows > 0){
            while($data = $result -> fetch_assoc()){
                $result->free();
                $conn -> close();
                return $data[$column];
            }
        }
        $result->free();
        $conn -> close();
        return "Username";
    }



    function get_Projectdata($column)
    {
        require "../../config/config.php";

        $projid = $_SESSION['setProject'];
        $sntx = "SELECT $column FROM project WHERE projectid = '$projid'";
        $result = $conn -> query($sntx);

        if($result -> num_rows > 0){
            while($data = $result -> fetch_assoc()){
                $result->free();
                $conn -> close();
                return $data[$column];
            }
        }
        $result->free();
        $conn -> close();
        return "cover";
    }
?>