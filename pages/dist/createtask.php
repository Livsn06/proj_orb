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
    <title>Project Orbit | Create Task</title>
    <!-- Include your CSS and JavaScript files here -->
    <link rel="stylesheet" href="../styles/project.css">
    <!-- Include your external libraries (e.g., jQuery, SweetAlert) if not already included -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../functions/project/taskpercent.js"></script>
    <script src="../functions/project/projectfunction.js"></script>
    <script src="../functions/dashboard/nav_function.js"></script>
    <script src="../functions/project/sidebar.js"></script>
    <script src="https://kit.fontawesome.com/a3ac451aad.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../styles/createtask.css">

   

</head>
<body>

<section class="outer-body">
    <!-- main content -->
    <main class="right-sec">
        <header class="pd-header">
            <a href="project.php">
            <button class="backbutton">
                back
            </button>
            </a>
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

<section class="create-task">
    <form method="post" action="createtask.php">
        <label for="taskName">TASK NAME</label>
        <input type="text" name="taskName" id="taskName" required>

        <label for="dueDate">DUE DATE</label>
        <input type="datetime-local" name="dueDate" id="dueDate" required>


                <div class="subtasks">
                        <label for="subTask1">SUBTASK 1</label>
                        <input type="text" name="subTask1" id="subTask1" required>

                        <label for="subTask2">SUBTASK 2</label>
                        <input type="text" name="subTask2" id="subTask2">

                        <label for="subTask3">SUBTASK 3</label>
                        <input type="text" name="subTask3" id="subTask3">

                        <label for="subTask4">SUBTASK 4</label>
                        <input type="text" name="subTask4" id="subTask4">

                        <label for="subTask5">SUBTASK 5</label>
                        <input type="text" name="subTask5" id="subTask5">

                </div>

                <!-- Repeat the above block for subTask2 to subTask5 -->

                    <label for="assignedTo">ASSIGNED TO</label>
                    <select name="assignedTo[]" id="assignedTo" required>
                        <?php
                            get_Students();
                        ?>
                    </select>
                    <button type="submit">Create Task</button>

            </form>
    </section>


    </main>

</section>

</body>
</html>







<?php

    if(isset($_POST['taskName']) && 
    isset($_POST['dueDate']))
    {

        $assignto = "";
        foreach($_POST['assignedTo'] as $val){
            $assignto = $val;
        }

        require "../../config/config.php";
        $taskname = $_POST['taskName'];
        $due = $_POST['dueDate'];
  
        $taskname = $_POST['taskName'];
        $assignby = getSelected_Data('instrid');
        $projid = $_SESSION['setProject'];

        $syntax = "INSERT INTO task (projectid, taskname, assignby, assignto, duedate) 
        VALUES ('$projid', '$taskname ', '$assignby', '$assignto', '$due')";
        $conn -> query($syntax);
        $conn -> close();


            if(!empty($_POST['subTask1'])){
                insertSUBTASK($_POST['subTask1'], $assignto);
            }
            if(!empty($_POST['subTask2'])){
                insertSUBTASK($_POST['subTask2'], $assignto);
            }
            if(!empty($_POST['subTask3'])){
                insertSUBTASK($_POST['subTask3'], $assignto);
            }
            if(!empty($_POST['subTask4'])){
                insertSUBTASK($_POST['subTask4'], $assignto);
            }
            if(!empty($_POST['subTask5'])){
                insertSUBTASK($_POST['subTask5'], $assignto);
            }


    }

    function insertSUBTASK ($name, $to)
    {
        $taskid = getTask();
        require "../../config/config.php";
        $syntax = "INSERT INTO subtasks (taskid, stname, stassignto, ststatus) VALUES ('$taskid', '$name ', '$to', 'undone')";
        $conn -> query($syntax);
        $conn -> close();
    }

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

    function get_Students()
    {

        $pid = trim($_SESSION['setProject']);

        require "../../config/config.php";

        $sntx = "SELECT r.studid, CONCAT(allstudfname,' ', allstudlname)  AS fullname FROM project_assigned r INNER JOIN overallstudent o ON allstudid=studid
         WHERE r.projtid = '$pid'";
         
        $result = $conn -> query($sntx);

        if($result -> num_rows > 0){
            echo '<option value="">--Select--</option>';
            while($row = $result -> fetch_assoc()){
                echo '
                <option value="'.trim($row['studid']).'">'.trim($row['fullname']).'</option>
                ';
            }
        }else{
            echo '<option value="">--No Data--</option>';
        }
        $result->free();
        $conn -> close();
    }

function getTask()
{
    require "../../config/config.php";
    $projid = $_SESSION['setProject'];
    $sql = "SELECT taskid FROM task WHERE projectid ='$projid'";
    $res = $conn->query($sql);
    $val = "";
    if($res -> num_rows > 0){
        while($data = $res -> fetch_assoc()){
           $val =  $data['taskid'];
        }
    }
    $res -> free();
    $conn -> close();
    return $val;
}
?>