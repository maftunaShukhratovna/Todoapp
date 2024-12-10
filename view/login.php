<?php
require 'view/componenets/header.php';
?>

<div class="firstbody">
    <div class="secondbody">
        <form method="POST" action="/login" class="login-form">
            <h1 class="login-title">Login</h1>

            <div class="input-box">
                <i class='bx bxs-user'></i>
                <input type="text" name="" placeholder="Email">
            </div>
            <div class="input-box">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" placeholder="Password">
            </div>

            <div class="remember-forgot-box">
                <label for="remember">
                    <input type="checkbox" id="remember">
                    Remember me
                </label>
                <a href="#">Forgot Password?</a>
            </div>

            <button class="login-btn">Login</button>

            <p class="register">
                Don't have an account?
                <a href="/registerpage">Register</a>
            </p>
        </form>
    </div>
</div>
<?php
require 'view/componenets/footer.php';
?>
