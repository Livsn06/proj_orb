<?php
if(isset($_POST['getMembers'])){

    require "../../../config/config.php";
    session_start();
    $pid = trim($_SESSION['setProject']);
    $sntx = " SELECT studid, task FROM project_assigned WHERE projtid = '$pid'";
    $result = $conn -> query($sntx);

  
    echo'
    <main class="project-member" id="p-member">
        <div class="nav">
            <button id="addmember">
                <i class="fa-solid fa-user-plus"></i>
                <span class="txt">Invite Members</span>
            </button>
        </div>

        <table> 
            <thead>
                <tr>
                    <th>Members</th>
                    <th>Tasks</th>
                </tr>
            </thead>
            <tbody>
        ';

        if($result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
                echo'
                <tr>
                    <td>'.getname($row['studid']).'</td>
                    <td>'.$row['task'].'</td>
                </tr>
            ';
            }
        }else{
            echo'
            <tr>
                <td colspan="2">Add a student</td>  
            </tr>
        ';
        }

    echo '
            </tbody>
        </table>
    </main>
    
    ';
}
?>


<?php
if(isset($_POST['getmodal'])){
    echo'
        <section class="addmember" id="paddmember">
        <main> 
        <button class="close" id="paddclose"><i class="fa-solid fa-circle-xmark"></i></button>
            <label for="search">Search ID</label>
            <div class="searcher">
                <input type="text" id="s-member">
                <button class="searchbtn" id="s-btn">Search</button>
            </div>
            <div class="results" id="result">
                <div class="info">

                </div>
            </div>
        </main>
    </section>
    ';
}
?>

<?php
if(isset($_POST['getvalue'])){

    $id = trim(strtoupper($_POST['id']));
    if(isaddedmember($id)){
        echo '<small>Student added already..</small>';

    }else{
        if(empty($id)){
            echo'';

        }else{
            get_Students_name($id);
     }
    }

    
}

?>
<?php
if(isset($_POST['addstud'])){

    $id = trim(strtoupper($_POST['id']));
    
    addmember($id);


}

?>


<?php
  function get_Students_name($id)
  {
      require "../../../config/config.php";

      $sntx = "SELECT r.studid, CONCAT(allstudfname,' ', allstudlname)  AS fullname FROM studentreg r INNER JOIN overallstudent o ON allstudid=studid 
      WHERE r.studid LIKE '$id%'";
      $result = $conn -> query($sntx);

      if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            echo'
            <div class="info">
                <small>'.$row['studid'].'</small>
                <small>'.$row['fullname'].'</small>
                <button class="addedstud" value="'.$row['studid'].'">Add</button>
            </div>
    
        ';
        }
    }else{
        echo'
        <div class="info">
            <small>Student can\'t find..</small>
        </div>
    ';
    }

      $result->free();
      $conn -> close();
  }
 


  function isaddedmember($id)
  {
    require "../../../config/config.php";
    session_start();
    $pid = trim($_SESSION['setProject']);
    $sntx = " SELECT * FROM project_assigned WHERE projtid = '$pid' AND studid = '$id'";
    $result = $conn -> query($sntx);

    if($result -> num_rows > 0){
        
      $result->free();
      $conn -> close();
      return true;
    }

    $result->free();
    $conn -> close();
    return false;

  }

  function addmember($id)
  {
    require "../../../config/config.php";
    session_start();
    $pid = trim($_SESSION['setProject']);
    $sntx = " INSERT INTO project_assigned (projtid, studid) VALUES ('$pid','$id')";
    $conn -> query($sntx);
    $conn -> close();
  }

  function getname($id)
  {
      require "../../../config/config.php";

      $sntx = "SELECT r.studid, CONCAT(allstudfname,' ', allstudlname)  AS fullname FROM studentreg r INNER JOIN overallstudent o ON allstudid=studid 
      WHERE r.studid = '$id'";
      $result = $conn -> query($sntx);

      if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            $result->free();
            $conn -> close();
            return $row['fullname'];
        }
    }
      $result->free();
      $conn -> close();
  }
 
?>