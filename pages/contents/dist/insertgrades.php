<?php

session_start();
if(isset($_POST['addFeedback'])){

    require "../../../config/config.php";
    $pid = $_SESSION['setProject'];
    $msg = $_POST['addFeedback'];

    $sql = "INSERT INTO gradefeedback (projid, fbmessage) VALUES ('$pid', '$msg')";
    $conn->query($sql);
    echo"eyyyyy";
}


function getProjectName()
{
    $pid = $_SESSION['setProject'];
    require "../../../config/config.php";
    $stx = "SELECT projectname FROM project WHERE projectid = '$pid'";
    $res = $conn->query($stx);
    while($row = $res -> fetch_assoc()){
        $res -> free();
        $conn->close();
        return $row['projectname'];
    }

}
function getProjectDue()
{
    $pid = $_SESSION['setProject'];
    require "../../../config/config.php";
    $stx = "SELECT projectdue FROM project WHERE projectid = '$pid'";
    $res = $conn->query($stx);
    while($row = $res -> fetch_assoc()){
        $res -> free();
        $conn->close();
        return $row['projectdue'];
    }
}
?>