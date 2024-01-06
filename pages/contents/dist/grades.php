<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


<style>

    label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px; /* Add margin bottom for spacing */
        }

        
        input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px; /* Add margin bottom for spacing */
        }
        input[type="button"] {
            background-color: #007bff;
            color: #fff;
            padding: 8px 15px;
            border: none;
            cursor: pointer;
        }
    </style>






</style>


</head>
<body>

    <div class="grades">
        <table class="table">
            <thead>
                <tr>

                    <th>Project Name</th>
                    <th>Due</th>
                    <th>Grade</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                $projectID = $_SESSION['setProject'];

                    require "../../../config/config.php";// Adjust the path if necessary
                    // Fetch data from the database
                    $sql = "SELECT projectDue, projectName FROM project WHERE projectID ='$projectID' ";
                    $result = $conn->query($sql);

                    // Display data in HTML table
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . getProjectName() . "</td>"; // Correct column name
                        echo "<td>" . datetimeFormatter(getProjectDue()) . "</td>"; // Correct column name
                        echo "<td>" . getgradeGrade() . "/100</td>"; 
                        echo "<td>" . getgradefeedback() . "</td>"; 
                        echo "</tr>";
                    }
                    // Close connection
                    $conn->close();
                ?>
            </tbody>
        </table>
        
    <div class="feedbacks">

            <div class="grade">
                <label for="grade">Grade</label>
                <input type="number" name="grade" id="grade-txt" class="form-control">
                <button type="button" id="g-btn">Add Grade</button>
            </div>

            <div class="feedback">
                <label for="feedback">Feedback</label>
                <textarea id="feedback-txt" cols="30" rows="2"></textarea>
                <button type="button" id="fb-btn">Add Feedback</button>
            </div>

    </div>

</div>

</body>
</html>


<?php

function datetimeFormatter($datetimeString)
{
    $datetime = new DateTime($datetimeString);
    $formattedDatetime = $datetime->format('m\-d\-y \a\t g:i a');
    return $formattedDatetime;
}


if(isset($_POST['addFeedback'])){

    require "../../../config/config.php";
    $pid = $_SESSION['setProject'];
    $msg = $_POST['addFeedback'];

    if(getgradefeedback() == "No Feedback"){
        $sql = "INSERT INTO gradefeedback (projid, fbmessage) VALUES ('$pid', '$msg')";
        $conn->query($sql);
    }else{
        $sql = "UPDATE gradefeedback SET projid = '$pid', fbmessage = '$msg'";
        $conn->query($sql);
    }


}

if(isset($_POST['addGrades'])){

    require "../../../config/config.php";
    $pid = $_SESSION['setProject'];
    $grade = $_POST['addGrades'];

    if(getgradeGrade() == "No Grades"){
        $sql = "INSERT INTO grades (projid, points) VALUES ('$pid', '$grade')";
        $conn->query($sql);
    }else{
        $sql = "UPDATE grades SET projid = '$pid', points = '$grade'";
        $conn->query($sql);
    }

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
function getgradefeedback()
{
    $pid = $_SESSION['setProject'];
    require "../../../config/config.php";
    $stx = "SELECT fbmessage FROM gradefeedback WHERE projid = '$pid'";
    $res = $conn->query($stx);
    if($res -> num_rows > 0){
        while($row = $res -> fetch_assoc()){
            $res -> free();
            $conn->close();
            return $row['fbmessage'];
        }
    }
    $res -> free();
    $conn->close();
    return "No Feedback";
}
function getgradeGrade()
{
    $pid = $_SESSION['setProject'];
    require "../../../config/config.php";
    $stx = "SELECT points FROM grades WHERE projid = '$pid'";
    $res = $conn->query($stx);
    if($res -> num_rows > 0){
        while($row = $res -> fetch_assoc()){
            $res -> free();
            $conn->close();
            return $row['points'];
        }
    }
    $res -> free();
    $conn->close();
    return "No Grades";
    
}
?>