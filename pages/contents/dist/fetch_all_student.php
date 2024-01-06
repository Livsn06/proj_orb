<?php

require '../../../config/config.php'; 

$query = "SELECT p.*, CONCAT(o.allstudFname, ' ', o.allstudLname) AS full_name FROM pplconnection p LEFT JOIN overallstudent o ON p.assocto = o.allstudid 
JOIN instructorreg i ON i.instrid = p.assocby WHERE p.assocby = '223-114'";
$result = $conn->query($query);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode(['data' => $data]);

$result->free();
$conn->close();
?>