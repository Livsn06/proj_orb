<?php
if(isset($_POST['getCreate'])){

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
if(isset($_POST['insertProject']))
{
    session_start();
   $title = trim($_POST['ptitle']);
   $cover = $_FILES['file'];
   $due = trim($_POST['pdue']);
   $userid =  returnUserID($_SESSION['instrLogin']);
  

   require "../../config/config.php";

    if(!empty($title) && !($cover == null) && !empty($due))
    {
        $path = upload_Cover($cover);
       
        $stx = "INSERT INTO project (projectname, projectcover, projectdue, instrid) VALUES ('$title', '$path', '$due', '$userid')";
        $conn->query($stx);  
    }
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
    
    if($res ->num_rows > 0){
        foreach($res as $row){
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