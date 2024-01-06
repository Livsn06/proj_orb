<!-- MEMBER -->
<?php
if(isset($_POST['ismember'])){
    echo'
    <main class="member" id="member">
    ';
?>

<div class="nav">
    <!-- <div class="dropdown">
        <small>Order by</small>
        <select name="" id="">
            <option value="">option 1</option>
            <option value="">option 2</option>
            <option value="">option 3</option>
        </select>
    </div> -->
    <button class="pending">
        <i class="fa-solid fa-user-group"></i>
        <span>Pending Request</span>
    </button>
    <button class="add">
        <i class="fa-solid fa-user-plus"></i>
        <span>Add Member</span>
    </button>
</div>


<table id="studentTable" style="width:100%">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Settings</th>

                <!-- Add more columns if needed -->
            </tr>
        </thead>
        <tbody>
            <!-- Table body will be populated dynamically -->
        </tbody>
    </table>

<?php
    echo '
    </main>
    ';
}
?>
