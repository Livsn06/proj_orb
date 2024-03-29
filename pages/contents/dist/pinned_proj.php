<?php


    if(isset($_POST['getPinned'])){
        
        session_start();
        $table = validateActiveUserStatus();
        $colemail = ($table == "instructorreg")? "instructorreg.instremail" : "studemail";
        $colid = ($table == "instructorreg")? "instructorreg.instrid" : "studid";
        $activeEmail = getactiveUserEmail();

        require "../../../config/config.php";

        $stx = "SELECT projectid, projectname, projectcover, userid FROM project 
        INNER JOIN pinned_project ON projectid = projid INNER JOIN
        $table ON $colid = userid WHERE $colemail = '$activeEmail' ORDER BY pintime DESC";



        $res = $conn->query($stx);
    
        if ($res->num_rows > 0) {

            while($row = $res->fetch_assoc()) 
            {
                echo '
                    <div class="card">
                    <button id="" value="'.$row['projectid'].'">
                        <img src="'.$row['projectcover'].'" alt="image">
                        '.$row['projectname'].'
                    </button>
                    <i class="fa-solid fa-star star" style="color: #ffbb00;" id="'.$row['projectid'].'"></i>
                    </div>   
                ';
            }
        }

        $res->free();
        $conn->close();

    }


    if(isset($_POST['changePin'])){
        
        $projID = trim($_POST['projid']);


        require "../../../config/config.php";

        if(isPinned($projID)){

            $stx = "DELETE FROM pinned_project WHERE projid = '$projID';";
            $conn->query($stx);
            echo '<i class="fa-regular fa-star star projstar" style="color: #ffbb00;" id="'.$projID.'"></i>';
        }else{

            $userid = getUser($projID);
            $stx = "INSERT INTO pinned_project (userid, projid) VALUES ('$userid', '$projID')";
            $conn->query($stx);  
            echo '<i class="fa-solid fa-star star projstar" style="color: #ffbb00;" id="'.$projID.'"></i>';
        }

        $conn->close();

    }



?>







<?php


function getUser($projID)
{
    require "../../../config/config.php";

    session_start();
    $stx = "";
    $col = "";
    if(isset($_SESSION['instrLogin'])){
        $stx = "SELECT instrid FROM project WHERE projectid = '$projID'";
        $col = "instrid";
    }else{
        $email = $_SESSION['studLogin'];
        $stx = "SELECT studid FROM studentreg WHERE studemail = '$email'";
        $col = "studid";
    }
   
    $res = $conn->query($stx);

    if ($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) 
        {
            $res->close();
            $conn->close();
            return $row[$col];
        }
    }
    $res->free();
    $conn->close();
}



function isPinned ($projID)
{
    $projID = trim($projID);

    require "../../../config/config.php";
    $stx = "SELECT * FROM pinned_project WHERE projid = '$projID'";
    $res = $conn->query($stx);
    if($res -> num_rows > 0){
        $res->free();
        return true;
    }
    $res->free();
    return false;
}

function validateActiveUserStatus()
{
    if(!empty($_SESSION['instrLogin'])){
        return 'instructorreg';
    }
    if(!empty($_SESSION['studLogin'])){
        return 'studentreg';
    }
    
    return "no user";
}
function getactiveUserEmail()
{
    if(!empty($_SESSION['instrLogin'])){
        return $_SESSION['instrLogin'];
    }
    if(!empty($_SESSION['studLogin'])){
        return $_SESSION['studLogin'];
    }
    
    return "no user";
}

?>

