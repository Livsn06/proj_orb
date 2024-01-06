<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        echo "<td>" . $row['projectDue'] . "</td>"; // Correct column name
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
    </div>

</body>
</html>
