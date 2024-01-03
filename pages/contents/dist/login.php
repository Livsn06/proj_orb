
<?php
if(isset($_POST['islogin'])){
    echo "<main class=\"login-content\" id =\"login-page\">";
?>
    <div class="inner-content" id="login">
        <img src="../images/login_bg.png" alt="" class="image">
        <div class="form-con">
            <div class="login-info">
                <h1>Login</h1>
                <p>Log in now to innovate and organize with ease. Let's launch your success together!</p>
            </div>
    
                    <div class="email-form" id="lid-field">
                        <label for="id">Email</label>
                        <input type="text" placeholder="enter your email" id="lemail">
                        <small class=""></small>
                    </div>
                    <div class="pass-form" id="lpass-field">
                        <label for="password">Password</label>
                        <input type="password" placeholder="enter your password" id="lpass">
                        <small class=""></small>
                    </div>
                    
            <div class="forgot-form">
                <a href="">forgot password?</a>
            </div>
           <div class="btn-form">
                <button type="button" id="lbtn">Log in</button>
           </div>
           <div class="dont-form">
                <p>Don’t have an account? <a id="gotoSign">Sign Up</a></p>
           </div>
        </div>
    </div>

<?php
    echo "</main>";
}

?>


