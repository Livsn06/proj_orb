<?php

require '../../../config/config.php'; 

if (isset($_POST['studentId'])) {
    $studentId = $_POST['studentId'];

    $deleteQuery = "DELETE FROM pplconnection WHERE assocby = '223-114' AND assocto = ?";

    $stmt = $conn->prepare($deleteQuery);

    if ($stmt) {
        
        $stmt->bind_param("s", $studentId);
        $stmt->execute();

        // Check if the deletion was successful
        if ($stmt->affected_rows > 0) {
            // Student deleted successfully
            echo json_encode(array("success" => true, "message" => "Student deleted successfully."));
        } else {
            // No rows affected, student may not exist or already deleted
            echo json_encode(array("success" => false, "message" => "Student not found or already deleted."));
        }

        // Close statement
        $stmt->close();
    } else {
        // Error in prepared statement
        echo json_encode(array("success" => false, "message" => "Error in prepared statement: " . $conn->error));
    }
} else {
    // Invalid request, student ID not provided
    echo json_encode(array("success" => false, "message" => "Invalid request: Student ID not provided."));
}

// Close the database connection
$conn->close();
