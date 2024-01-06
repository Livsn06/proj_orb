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
    <script src="../functions/landing/faq.js"></script>
    <link rel="stylesheet" href="../styles/landing.css">
    <title>Project Orbit | About</title>


<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.faq-container {
    margin-bottom: 15px;
}
.faq-question {
    background-color: #f0f0f0;
    padding: 10px;
    cursor: pointer;
}
.faq-answer {
    display: none;
    padding: 10px;
    border: 1px solid #ccc;
    background-color: #fff;
}
.content-container {
    max-width: 800px;
    margin: 80px auto; 
    display: flex;
    flex-direction: column;
}
p {
    font-weight: bold;
}
#faq-search {
    width: 100%; 
    margin-bottom: 15px;
}</style>



</head>
<body>
    <header class="header">
        <img src="../images/logo.png" alt="" class="logo">
        <div class="links">
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact</a></li>
            <li class="login"><a id="vanlogin">Login</a></li>
        </div>  
    </header>
    <div id="modal"></div>
   
    <div class="content-container">
<h2 class="font-weight-bold mt-4 mb-3">Frequently Asked Questions (FAQs) and Guidelines</h2>

<div class="input-group">
    <input type="text" class="form-control form-control-lg" id="faq-search" placeholder="Search questions">
</div>
    <div class="faq-container">
        <div class="faq-question">What is ProjectOrbit?</div>
        <div class="faq-answer">
        ProjectOrbit is a cutting-edge project management solution. It offers a comprehensive suite of tools and features to streamline your project management process. From task tracking to team collaboration, ProjectOrbit enables efficient planning, execution, and monitoring of projects, ensuring they stay on course and meet their goals. It’s designed to provide a more organized, efficient, and successful project management experience.
        </div>
    </div>

    <div class="faq-container">
    <div class="faq-question">What are the key features of ProjectOrbit?</div>
    <div class="faq-answer">
    ProjectOrbit offers a wide range of features designed to streamline your project management process.
    </div>
    </div>

    <div class="faq-container">
        <div class="faq-question">How can ProjectOrbit help me in my project management journey?</div>
        <div class="faq-answer">
        <p>ProjectOrbit can significantly enhance your project management journey in several ways:</p>
        <p>1. Streamlined Project Management:</p>
        ProjectOrbit offers a comprehensive suite of tools and features that streamline your project management process, making it more efficient and effective.
        <p>2. Task Tracking:</p>
        With ProjectOrbit, you can easily assign tasks to team members and track their progress. This ensures everyone is on the same page and tasks are completed on time.
        <p>3. Team Collaboration:</p>
        ProjectOrbit facilitates team collaboration by providing a centralized platform for communication and idea sharing. This fosters a team environment and makes problem-solving more efficient.
        <p>4. Project Monitoring:</p>
        ProjectOrbit’s monitoring tools help you stay on top of project progress and make necessary adjustments as needed. This ensures your projects stay on course and meet their goals.
    </div>
</div>
  
<!-- Guidelines -->

    <div class="faq-container">
    <div class="faq-question">How do I start using ProjectOrbit for my projects?</div>
    <div class="faq-answer">
    <p>To start using ProjectOrbit for your projects, you would typically follow these steps:</p>
    <br>
    <p>1. Sign Up:</p>
    Register for an account on the ProjectOrbit website.
    <p>2. Create a Project:</p>
    Once you’ve logged in, you can create a new project. You’ll need to provide details such as the project name, description, and timeline.
    <p>3. Add Team Members:</p>
    Invite your team members to join the project. You can assign them roles based on their responsibilities.
    <p>4. Plan Your Project:</p>
    Use the planning tools provided by ProjectOrbit to set clear goals and timelines for your project.
    <p>5. Track Tasks:</p>
    Assign tasks to team members and track their progress using the task tracking tools.
    <p>6. Collaborate:</p>
    Use the team collaboration features to facilitate communication and collaboration among team members.
    <p>7. Monitor Progress:</p>
    Regularly monitor your projects using the monitoring tools provided by ProjectOrbit.
    </div>
    </div>

    <div class="faq-container">
    <div class="faq-question">How can I track tasks using ProjectOrbit?</div>
    <div class="faq-answer">
    <p>Tracking tasks in ProjectOrbit is an integral part of the project management process. Here are some general steps on how you can track tasks using ProjectOrbit:</p>
    <p>1.	Access ProjectOrbit:</p>
    Log in to your ProjectOrbit account.
    <p>2.	Navigate to Your Project:</p>
    Select the project for which you want to track tasks.
    <p>3.	Task Management:</p>
    ProjectOrbit provides a task management feature where you can assign tasks to team members and monitor their progress.'
    <p>4.Monitor with Reports/Dashboard:</p>
    Customize Reports/Dashboard allows you to choose the reports/dashboard that matters most for you and your project team.
</div>
    </div>

<div class="faq-container">
        <div class="faq-question">How does ProjectOrbit facilitate team collaboration?</div>
        <div class="faq-answer">
       <p>ProjectOrbit facilitates team collaboration through a variety of features and functionalities:</p>
       <p> 1. Centralized, Secure Network:</p>
        ProjectOrbit provides a centralized platform for all your project collaboration needs. It helps you connect your various team members and project information so that you can make informed and better decisions faster.
       <p> 2. Anytime/Anywhere Access:</p>
        ProjectOrbit is always there with you, providing anytime, anywhere access to project collaboration.
       <p> 3. Efficiency for Everyone:</p>
        ProjectOrbit empowers your teams to collaborate effectively. You can share files, request/respond to information, issue notices to contractors, or show data on a geospatial map.
       <p> 4. Key Functionality:</p>
        <p>ProjectOrbit offers several key functionalities that facilitate team collaboration:</p>
        <p>•	Request for Information:</p>
            A formal request for information from a member of the project team to another party within the project team.
            <p>•	Notice to Contractor:</p>
            A formal correspondence to a member(s) of the project team to advise on the specifications of the work being done.
            <p>•	Non-Conformance Report:</p>
            A formal communication to a member(s) of the project team to advise on work that requires attention.
            <p> •	Geospatial Map:</p>
            A feature that helps you manage location-related datasets together with additional layers and enables users to visually interact with their data.
            <p> •	Customized Reports/Dashboard:</p>
            Allows you to choose the reports/dashboard that matters most for you and your project team.
    </div>
</div>
  
<div class="faq-container">
        <div class="faq-question">How can I monitor my projects with ProjectOrbit?</div>
        <div class="faq-answer">
       <p>1.	Access ProjectOrbit:</p>
        Log in to your ProjectOrbit account.
       <p>2.	Navigate to Your Project:</p>
        Select the project that you want to monitor.
       <p>3.	Use Key Functionality:</p>
        ProjectOrbit offers several key functionalities that facilitate project monitoring
    </div>
</div>  

<div class="faq-container">
        <div class="faq-question">How can I contact the ProjectOrbit support team?</div>
        <div class="faq-answer">
       We have a ‘Contact Us’ or ‘Support’ section on the website where you can find contact information. You may also be able to find help through our online resources or user community. If you’re unable to find the information you need, you might consider reaching out to us through social media or any email addresses provided on our website.
    </div>
</div>  
</div>
</div>
</body>
</html>


</body>
</html>