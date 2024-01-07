<?php
if(isset($_POST['getFiles'])){
    echo '
    <main class="project-files" id="p-files">
    <div class="nav">
        <div class="selection">
            <small>Order by</small>
            <select name="" id="">
                <option value="">Option 1</option>
                <option value="">Option 2</option>
                <option value="">Option 3</option>
            </select>
        </div>
        <button>
            <i class="fa-solid fa-folder-closed"></i>
            <span class="txt">Upload Files</span>
        </button>
    </div>
    <div>
        this is a folder sections
    </div>
</main>

    ';
}
?>



