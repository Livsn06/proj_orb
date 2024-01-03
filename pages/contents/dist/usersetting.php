<?php
if(isset($_POST['getUsersettings'])){
        
    echo '
    <div class="show-user" id="show-user">
        <button class="notif-card">
                Update Profile                          
        </button>
        <button class="notif-card" id="logout-btn">
                Log out                            
        </button>
    </div>
    ';
}



if(isset($_POST['logoutUser'])){
    session_start();
    session_destroy();
    header('Location: ../../dist/landing.php');
}
?>




<?php

    function getNotifications($uid)
    {
        // $stx = "SELECT ";

        echo '
        <button class="notif-card">
            <div class="notif-details">
                <img src="../images/default_Userprofile.png" alt="prof">
                <span class="msg"><b>Acosta Rey</b> Commented to your task Project Orbit.. </span>
            </div>
            <span class="ndate">Nov 06, 2023 at 12:34 am</span>
        </button>
        ';
    }
?>