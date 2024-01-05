<?php

if(isset($_POST['gotoProject']))
{
    session_start();
    $_SESSION['setProject'] = trim($_POST['gotoProject']);
    echo "naysu";
}

if(isset($_POST['exitProject']))
{
    session_start();
    $_SESSION['setProject'] = "";
    echo "byeuu";
}



?>