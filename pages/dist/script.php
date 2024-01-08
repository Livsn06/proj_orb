<?php 
	session_start();
	if(isset($_FILES['files'])){

		$folder = "../../uploads/documents/";

		$names = $_FILES['files']['name']; // The $names variable will hold an array

		$tmp_names = $_FILES['files']['tmp_name']; // And the $tmp_names holds

		$upload_data = array_combine($tmp_names, $names);

		foreach ($upload_data as $temp_folder => $file) {
			insertDocument($folder.$file, $file);
			move_uploaded_file($temp_folder, $folder.$file);
		}
		echo "
		
			<script>
			alert(\"Upload Successs\");
			showFiles();
			</script>

		";
	}			





function insertDocument($filepath, $name) 
{
		$projid = $_SESSION['setProject'];

		$userid =  "";
		if(isset($_SESSION['instrLogin'])){
			$userid =  returnUserID($_SESSION['instrLogin']);
		}else{
			$userid =  returnUserID($_SESSION['studLogin']);
		}

		require "../../config/config.php";
		$stx = "INSERT INTO document (projectid, filename, filepath, uploadby) VALUES ('$projid', '$name', '$filepath', '$userid')";
	
		$conn->query($stx);
		$conn -> close();
	}
	

function returnUserID($useremail)
{
    require "../../config/config.php";
    $stx = "SELECT instrid FROM instructorreg WHERE instremail = '$useremail'";

    $res = $conn->query($stx);

    if ($res->num_rows > 0) {
        foreach ($res as $row) {
            $res->free();
            $conn->close();
            return $row['instrid'];
        }
    }
    $res->free();
    $conn->close();
    return "";
}

function returnUserStudID($useremail)
{
    require "../../config/config.php";
    $stx = "SELECT studid FROM studentreg WHERE studemail = '$useremail'";

    $res = $conn->query($stx);

    if ($res->num_rows > 0) {
        foreach ($res as $row) {
            $res->free();
            $conn->close();
            return $row['studid'];
        }
    }
    $res->free();
    $conn->close();
    return "";
}


	?>