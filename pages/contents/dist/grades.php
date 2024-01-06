<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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

    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Due Name</th>
                    <th>Project Name</th>
                    <th>Feedback</th>
                    <th>Grade</th>
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
                        echo "<td>" .datetimeFormatter($row['projectDue']) . "</td>"; // Correct column name
                        echo "<td>" . $row['projectName'] . "</td>"; // Correct column name
                        // echo "<td>" . $row['feedback'] . "</td>"; 
                        // echo "<td>" . $row['grade'] . "</td>"; 
                        echo "</tr>";
                    }
                    // Close connection
                    $conn->close();
                ?>
            </tbody>
        </table>
        <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <label for="feedback">Feedback</label>
                <input type="text" name="feedback" id="feedback" class="form-control">
                <input type="button" class="btn btn-primary" value="ADD FEEDBACK">
            </div>
            <div class="col-md-6">
                <label for="grade">Grade</label>
                <input type="number" name="grade" id="grade" class="form-control">
                <input type="button" class="btn btn-primary" value="ADD GRADE">
            </div>
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

?>