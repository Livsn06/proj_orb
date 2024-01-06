<?php

    session_start();

    // if  log in ung session ng student page babalik sa home page
    if(isset($_SESSION['studLogin'])){
        header("Location: home.php");
    }
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
    <title>Project Orbit | Contact</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f9fa;
            padding-top: 100px; 
        }

        .container {
            max-width: 800px;
            margin: 80px auto 20px;
            display: flex;
            flex-direction: row;
        }

        .contact-info {
            flex: 1;
            margin-right: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>


</head>
<body>
    <header class="header">
        <img src="../images/logo.png" alt="" class="logo">
        <div class="links">
            <li><a href="about.php" target="_blank">About</a></li>
            <li><a href="contact.php" target="_blank">Contact</a></li>
        </div>  
    </header>
    <div id="modal"></div>
    <div class="container mt-5">
        <div class="contact-info">
            <h1>Contact Us</h1>
            <p>Email:<a href="mailto:projectorbit.business@gmail.com">projectorbit.business@gmail.com</a></p>
            
            <p>Phone: +639171234567</p>
            
            <p>Website: <a href="https://projectorbit.com.ph" target="_blank">projectorbit.com.ph</a></p>
            
            <p>Address: San Vicente, Urdaneta, Pangasinan 1111</p>

        </div>
        <div class="image-container">
            <img src="../images/contact.png" alt="Contact Image">
        </div>
    </div>


</body>
</html>