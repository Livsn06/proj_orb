<?php
session_start();
if(isset($_POST['getFiles'])){
    echo '
    <main class="project-files" id="p-files">
    <div class="nav">
        <div class="selection" style="visibility: hidden;">
            <small>Order by</small>
            <select name="" id="">
                <option value="">Option 1</option>
                <option value="">Option 2</option>
                <option value="">Option 3</option>
            </select>
        </div>
        <a href="choosefiles.php" target= "_blank" style="text-decoration: none;">
            <button id="">
            <i class="fa-solid fa-folder-closed"></i>
            <span class="txt">Upload Files</span>
        </button>
    </a>
    </div>
    <div class="outer"> 
        <div class="inner files">
';



require "../../../config/config.php";



$id = $_SESSION['setProject'];

$stx = "SELECT filename, filepath FROM document WHERE projectid = '$id' ORDER BY uploaddate DESC";

$res = $conn->query($stx);

if ($res->num_rows > 0) {
    while($row = $res->fetch_assoc()) 
    {
        echo '
        <a href="'.$row['filepath'].'" download>
            <button>
                <i class="fa-solid fa-file"></i>
                <span>'.$row['filename'].'</span>
            </button>
        </a>
        ';
    }

}else{
    echo '<div style="width: 100%; "><h1 style="text-align: center; ">No data </h1></div>';
}



echo'
        </div>
    </div>
</main>

    ';
}
?>


