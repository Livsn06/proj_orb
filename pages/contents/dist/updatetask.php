<?php
if(isset($_POST['updatestatus'])){
   
    require "../../../config/config.php";

    $stid = $_POST['updatestatus'];
    $status = identifyStatus($stid);
    if(strtolower($status) == "done"){
        $sntx = "UPDATE subtasks SET ststatus = 'undone' WHERE stid = '$stid'";
        $conn -> query($sntx); 
    }else{
        $sntx = "UPDATE subtasks SET ststatus = 'done' WHERE stid = '$stid'";
        $conn -> query($sntx);
    }
    
    $conn -> close();
 
}

?>



<?php

function identifyStatus($stid)
{
    require "../../../config/config.php";

    $sntx = "SELECT ststatus FROM subtasks WHERE stid = '$stid'";
    $res = $conn -> query($sntx);

    if ($res-> num_rows > 0) {

        while($row = $res->fetch_assoc()) {
            $res -> free();
            $conn -> close();
          return $row['ststatus'];
        }
      } 
      $res -> free();
      $conn -> close();
}


?>