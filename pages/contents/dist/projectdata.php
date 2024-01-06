<?php

if(isset($_POST['getDetails'])){
    

    echo '
<main class="project-settings" id="p-settings">
    <div class="p-nav">

        <a href="createtask.php">
            <button class="p-btns create-task" id="create-task-btn">
                <i class="fa-solid fa-file-invoice"></i>
                <span>Create task</span>
            </button>
        </a>
        <a href="#">
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

                <tr class="project-task">
                    <td class="fulltask">
                        <div class="task-details">
                            <div>
                                <small>#1</small>
                                <small>Task name</small>
                            </div>
                            <div class="tasks" id="progress-task">

                                <!-- THIS IS AJAX -->
                               <div class="cb-input subtask">
                                    <input class="check" type="checkbox" value="" onclick="this.checked=!this.checked;" > 
                                    <small>subtask</small>
                               </div>
                            </div>
                        </div>
                        
                    </td>
                    
                    <td class="task-user">
                        <div class="tuser-prof">
                            <img src="default_Userprofile.png" alt="profile">
                            <small>James Harder</small>
                        </div>
                    </td>

                    <td class="task-status">
                        <div class="tstatus">
                            <small>DONE</small>
                        </div>
                    </td>

                    <td class="task-due">
                        <div class="task-duedate">
                            <small>Dec 18, 2024 At 05:20pm</small>
                        </div>
                    </td>

                    <td class="task-progbar">
                        <div class="task-progress">
                            <div class="outter-bar">
                                <div class="inner-bar" style="width: 35%;"></div>
                            </div>
                            <small class="percenttxt">10%</small>
                        </div>  
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
    ';
}


?>