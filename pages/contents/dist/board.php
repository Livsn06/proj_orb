<?php
if(isset($_POST['isboard'])){
    session_start();
    $email = $_SESSION['instrLogin'];
    require "../../../config/config.php";

    $stx = "SELECT projectid FROM project ORDER BY projectdate DESC";
    $res = $conn->query($stx);

    echo '
    <main class="board" id="board">
    <div class="sorter">
        <div id="drop-sort">
            <label for="sort">Sort by</label>
            <select name="" id="dropdown-sort" class="d-sort">
                <option value="">--Default--</option>
                <option value="">Day Created</option>
                <option value="">Due Date</option>
                <option value="">Alpabethically A-Z</option>
            </select>
        </div>

        <div id="search-sort">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
            <input type="text">
        </div>
    </div>

    <div class="cards" id="prj-crds">';
    
        echo '      
        <div id="create-proj">
            <button id="newproj" value="">
                Create board
                <i class="fa-regular fa-plus fa-lg create-icon "></i>
            </button>
        </div>
    ';

    if ($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) 
        {
            echo getCards ($row['projectid'], $email);
        }
    
    }

echo '
    </div>
</main>
    
    ';

    $res -> free();
    $conn -> close();
        
}




?>






<?php


function getCards ($projID, $email)
{

    require "../../../config/config.php";
    $stx = "SELECT projectid, projectname, projectcover, projectdate, projectdue FROM project INNER JOIN instructorreg 
    ON project.instrid = instructorreg.instrid WHERE projectid = '$projID' AND instructorreg.instremail = '$email'";
    $ispinned = isPinned ($projID);
    $res = $conn->query($stx);
    
    if ($res->num_rows > 0) {

        if($ispinned){
            while($row = $res->fetch_assoc()) 
            {
                $res -> free();
                $conn -> close();
                return '
                        <div style="background-image: url(\''.$row['projectcover'].'\');" id="existproj">
                        <button id="proj" value="'.$row['projectid'].'" class="projget">
                            <span class="p-title">'.$row['projectname'].'</span>
                            <span class="s-date">Created: '.$row['projectdate'].'</span>
                            <span class="e-date">Due Date: '.$row['projectdue'].'</span>
                        </button>

                        <span id="starindic">
                            <i class="fa-solid fa-star star projstar" style="color: #ffbb00;" id="'.$row['projectid'].'"></i>
                        </span>

                        </div>
                ';
            }
        }
        else{
            while($row = $res->fetch_assoc()) 
            {
                $res -> free();
                $conn -> close();
                return '
                    <div style="background-image: url(\''.$row['projectcover'].'\');" id="existproj">
                    <button id="proj" value="'.$row['projectid'].'" class="projget">
                        <span class="p-title">'.$row['projectname'].'</span>
                        <span class="s-date"><b>Created:</b> '.datetimeFormatter($row['projectdate']).'</span>
                        <span class="e-date"><b>Due Date:</b> '.datetimeFormatter($row['projectdue']).'</span>
                    </button>
               
                    <span id="starindic">
                        <i class="fa-regular fa-star star projstar" style="color: #ffbb00;" id="'.$row['projectid'].'"></i>
                    </span>

                    </div>
                ';
            }
        }
   
      } 

}

function isPinned ($projID)
{
    $projID = trim($projID);

    require "../../../config/config.php";
    $stx = "SELECT * FROM pinned_project WHERE projid = '$projID'";
    $res = $conn->query($stx);
    if($res -> num_rows > 0){
        $res->free();
        return true;
    }
    $res->free();
    return false;
}


function datetimeFormatter($datetimeString)
{
    $datetime = new DateTime($datetimeString);
    $formattedDatetime = $datetime->format('m\-d\-y \a\t g:i a');
    return $formattedDatetime;
}




?>







