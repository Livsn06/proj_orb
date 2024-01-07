<?php

if (isset($_POST['getDetails'])) {

    session_start();
    $projectID = $_SESSION['setProject'];

    require "../../../config/config.php";
    $sql = "SELECT * FROM task WHERE projectID ='$projectID' ";
    $res = $conn->query($sql);

    echo '
<main class="project-settings" id="p-settings">
    <div class="p-nav">

        <a href="createtask.php">
            <button class="p-btns create-task" id="create-task-btn">
                <i class="fa-solid fa-file-invoice"></i>
                <span>Create task</span>
            </button>
        </a>
        <a href="https://darcmattz-videoconf-1719.app.100ms.live/meeting/hsq-uyvk-feg" target="_blank">
            <button class="p-btns meet">
                <i class="fa-solid fa-video"></i>
               <span>Meet</span>
            </button>
        </a>
    </div>
    <div>
        <table class="task-tbl">
            <thead>
                <tr>
                    <th>Assigned Task</th>
                    <th>Student</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Progress</th>
                </tr>
            </thead>
            <tbody>
';

    if ($res->num_rows > 0) {

        while ($row = $res->fetch_array()) {
            echo '
                <tr class="project-task">
                <td class="fulltask">
                    <div class="task-details">
                        <div>
                            <small>#' . $row[0] . '</small>
                            <small>' . $row[2] . '</small>
                        </div>
                        <div class="tasks" id="progress-task">

                        ' . getSubtaskProgressCHECK($row[0]) . '
                        
                        </div>
                    </div>
                    
                </td>
            ';


            echo '                   
                    <td class="task-user">
                        <div class="tuser-prof">
                            <img src="../images/default_Userprofile.png" alt="profile">
                            <small>' . getname($row[4]) . '</small>
                        </div>
                    </td>

                    <td class="task-status">
                        <div class="tstatus">
                            <small>' . $row[5] . '</small>
                        </div>
                    </td>

                    <td class="task-due">
                        <div class="task-duedate">
                            <small>' . $row[6] . '</small>
                        </div>
                    </td>

                    ' . getSubtaskProgress($row[0]) . '
';
        }
    }

    echo '
                </tr>
            </tbody>
        </table>
    </div>
</main>
    ';
}




?>


<?php

function getname($id)
{
    $id = trim(strtoupper($id));
    require "../../../config/config.php";

    $sntx = "SELECT r.studid, CONCAT(allstudfname,' ', allstudlname)  AS fullname FROM studentreg r INNER JOIN overallstudent o ON o.allstudid= r.studid 
    WHERE r.studid = '$id'";
    $result = $conn->query($sntx);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $result->free();
            $conn->close();
            return $row['fullname'];
        }
    }
    $result->free();
    $conn->close();
}



function getSubtaskProgress($taskid)
{

    require "../../../config/config.php";
    $sql = "SELECT ststatus FROM subtasks WHERE taskid ='$taskid'";
    $sql2 = "SELECT ststatus FROM subtasks WHERE taskid ='$taskid' AND ststatus <> 'undone'";
    $res = $conn->query($sql);
    $res2 = $conn->query($sql2);

    $tno = 0;
    $tdone = 0;
    $percent = 0;

    if ($res->num_rows > 0) {
        $tno = 100 / $res->num_rows;
        $tdone = $res2->num_rows;
        $percent = $tno * $tdone > 100 ? 100 : $tno * $tdone;
    }

    $res->free();
    $res2->free();
    $conn->close();

    return '
    <td class="task-progbar">
        <div class="task-progress">
            <div class="outter-bar">
                <div class="inner-bar" style="width: ' . $percent . '%;"></div>
            </div>
            <small class="percenttxt">' . $percent . '%</small>
        </div>  
    </td>
    ';
}



function getSubtaskProgressCHECK($taskid)
{

    require "../../../config/config.php";
    $sql2 = "SELECT stname, ststatus FROM subtasks WHERE taskid ='$taskid'";
    $res = $conn->query($sql2);

    $val = "";
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {

            if ($row['ststatus'] != "undone") {
                $val .= '
                <div class="cb-input subtask">
                    <input class="check" type="checkbox" value="" onclick="this.checked=!this.checked;" checked> 
                    <small>' . $row['stname'] . '</small>
                </div>
                ';
            } else {
                $val .= '
                <div class="cb-input subtask">
                    <input class="check" type="checkbox" value="" onclick="this.checked=!this.checked;" > 
                    <small>' . $row['stname'] . '</small>
                </div>
                ';
            }
        }
    }


    $res->free();
    $conn->close();
    return $val;
}
?>