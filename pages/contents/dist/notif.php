<?php
if(isset($_POST['getNotif'])){
        
    echo '
    <div class="show-notif" id="show-notification">
        <h1>Notifications</h1>
        <div class="notif-nav">
            <button>All</button>
            <button>Unread</button>
        </div>

        <button class="notif-card">
            <div class="notif-details">
                <img src="../images/default_Userprofile.png" alt="prof">
                <span class="msg"><b>Acosta Rey</b> Commented to your task Project Orbit.. </span>
            </div>
        <span class="ndate">Nov 06, 2023 at 12:34 am</span>
        </button>
    </div>
    ';
}
?>





<?php

    function getNotifications($uid)
    {
        $stx = "SELECT ";


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