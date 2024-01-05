<?php
if(isset($_POST['getMembers'])){
    echo'
    <main class="project-member" id="p-member">
        <div class="nav">
            <button>
                <i class="fa-solid fa-user-plus"></i>
                <span class="txt">Invite Members</span>
            </button>
        </div>

        <table> 
            <thead>
                <tr>
                    <th>Members</th>
                    <th>Tasks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Legend</td>
                    <td>Task 1</td>
                </tr>
                <tr>
                    <td>Mike Reyes</td>
                    <td>Task 2</td>
                </tr>
            </tbody>
        </table>
    </main>

    ';
}
?>