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
        <a href="choosefile.php" style="text-decoration: none;">
            <button id="">
            <i class="fa-solid fa-folder-closed"></i>
            <span class="txt">Upload Files</span>
        </button>
    </a>
    </div>
    <div class="outer"> 
        <div class="inner files">
                <a href="#">
                    <button>
                        <i class="fa-solid fa-file"></i>
                        <span>File name</span>
                    </button>
                </a>
        </div>
    </div>
</main>

    ';
}
?>


