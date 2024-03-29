<?php
if (isset($_POST['getCreate'])) {

    echo '
<section class="" id="createBoardmodal">
            <main class="inner-body">
                <button class="tap-outside" id="exit-outside"></button>
            
                <main class="content">
                    <button class="exit-button" id="exit-button"><i class="fa-solid fa-circle-xmark fa-xl"></i></button>
                    <div class="title-container"><h1>Create Board</h1></div>
                    <div class="form-field">
                        <div class="image-con">
                            <img src="../images/cm_defaultIMG.png" alt="imahe" id="display-image">
                            <button>
                                <h4>Select Cover</h4>
                                <input type="file" accept="image/*" id="image-select-btn">
                            </button>
                        </div>
            
                        <div class="title-field">
                            <h4>Board Title</h4>
                            <input type="text" placeholder="enter your title" id="title-input">
                        </div>

                        <div class="title-field">
                            <h4>Due Date</h4>
                            <input type="datetime-local" placeholder="enter your title" id="date-input">
                        </div>
            
                        <div class="btn">
                            <button id="create-board-btn">Create Board</button>
                        </div>
                    </div>
                </main>
            
            </main>
</section>

';
}
?>



<?php


if (isset($_POST['insertProject'])) {
    session_start();
    $title = trim($_POST['ptitle']);
    $cover = $_FILES['file'];
    $due = trim($_POST['pdue']);
    $userid =  returnUserID($_SESSION['instrLogin']);

    require "../../config/config.php";

    if (!empty($title) && !($cover == null) && !empty($due)) {
        $path = upload_Cover($cover);

        $stx = "INSERT INTO project (projectname, projectcover, projectdue, instrid) VALUES ('$title', '$path', '$due', '$userid')";

        if ($conn->query($stx)) {
            $projID = $conn->insert_id;
            $room_set = set_room_id($projID);
            if (!$room_set) {
                echo "Error setting room ID for the user.";
            }
        }
    }
}


function set_room_id($id): bool
{
    require "../../config/config.php";

    $management_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MDQ1NjgxMzMsImV4cCI6MTcwNDY1NDUzMywianRpIjoiand0X25vbmNlIiwidHlwZSI6Im1hbmFnZW1lbnQiLCJ2ZXJzaW9uIjoyLCJuYmYiOjE3MDQ1NjgxMzMsImFjY2Vzc19rZXkiOiI2NTc0MzBmNWNkOTkzZGZiNDRhYTQ5MDMifQ.Gp_Rv6yEEXrjjxpc_KkPYISD-9yeLRJoaIVAIgbd4g8';

    $url = 'https://api.100ms.live/v2/rooms';
    $templateId = '65796a86a8c1fb92568b1704';

    $data = array(
        'name' => $id . "-room",
        'description' => 'This is a sample description for the room',
        'template_id' => $templateId
    );

    $headers = array(
        'Authorization: Bearer ' . $management_token,
        'Content-Type: application/json'
    );

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = json_decode(curl_exec($ch), true);

    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
        curl_close($ch);
        return false;
    }

    $room_id = $response['id'];

    curl_close($ch);

    $updateQuery = "UPDATE project SET roomName = '$room_id' WHERE projectID = '$id'";

    $result = $conn->query($updateQuery);
    if (!$result) {
        echo "Error: " . $conn->error;
        return false;
    }

    return true;
}


function upload_Cover($coverfile)
{
    $newPath = "../../uploads/pictures/";
    $prefix = "cover_";
    $filename = $prefix . uniqid() . "." . pathinfo($coverfile['name'], PATHINFO_EXTENSION);
    $oldDIR = $coverfile['tmp_name'];

    $path = $newPath . $filename;
    move_uploaded_file($oldDIR, $path);
    return $path;
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

?>