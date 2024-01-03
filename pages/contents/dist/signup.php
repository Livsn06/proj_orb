
<?php
if(isset($_POST['issignup'])){
    echo "
    <main class=\"login-content\" id =\"signup-page\">
    ";
?>
    
    <div class="inner-content" id="signup">
        <img src="../images/signup_bg.png" alt="" class="image">

                <div class="form-con">
                    <div class="login-info">
                        <h1>Register now</h1>
                        <p>Register now to innovate and organize with ease. Let's launch your success together!</p>
                    </div>
                    <div class="scroll">
                        <div class="form" id="id-field">
                            <label for="email">ID Number</label>
                            <input type="text" placeholder="enter your school id" id="sid" value="">
                            <small id="sidindic"></small>
                        </div>

                        <div class="form" id="email-field">
                            <label for="email">Email</label>
                            <input type="email" placeholder="enter your email" id="semail" value="">
                            <small id="semailindic"></small>
                        </div>

                        <div class="form" id="spass-field">
                            <label for="password">Password</label>
                            <input type="password" placeholder="enter your password" id="spassw" value="">
                            <small id="spassindic"></small>
                        </div>
                        <div class="form" id="cpass-field">
                            <label for="password">Confirm Password</label>
                            <input type="password" placeholder="confirm your password" id="scpass" value="">
                            <small id="scpassindicate"></small>
                        </div>
                    </div>

                    <div class="btn-form">
                            <button type="submit" id="sbtn">Register</button>
                    </div>
                <div class="dont-form">
                        <p>Already have an account? <a id="gotoLog">Log in</a></p>
                </div>
            </div>
    </div>

<?php
    echo "</main>";
}

?>

