<?php
    session_start();
    // if  log in ung session ng student page babalik sa home page

    // if  log in ung session ng instructor page babalik sa dashboard page
    if(isset($_SESSION['instrLogin'])){
        header("Location: dashboard.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../functions/landing/formvalidation.js"></script>
    <script src="../functions/landing/landingpage.js"></script>

    <link rel="stylesheet" href="../styles/landing.css">
    <title>Project Orbit</title>
</head>
<body>
    <header class="header">
        <img src="../images/logo.png" alt="" class="logo">
        <div class="links">
            <li><a href="landing.php">Home</a></li>
            <li><a href="about.php" target="_blank">About</a></li>
            <li><a href="contact.php" target="_blank">Contact</a></li>
            <li class="login"><a id="vanlogin">Login</a></li>
        </div>  
    </header>
    <div id="modal"></div>
    <section class="contents" id="body-content">
        
    </section>

</body>
</html>