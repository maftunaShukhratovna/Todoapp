<?php
require 'view/componenets/header.php';
?>

<div class="firstbody">
    <div class="secondbody">
        <form method="POST" action="/register" class="login-form">
            <h1 class="login-title">Register</h1>


            <div class="input-box">
                <i class='bx bxs-user'></i>
                <input type="text" name="fullname" placeholder="Full name" required>
            </div>

            <div class="input-box">
                <i class='bx bxs-user'></i>
                <input type="text" name="email" placeholder="Email" required>
            </div>

            <div class="input-box">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" name="passwords" placeholder="Password" required>
            </div>

            <button class="login-btn" type="submit">Register</button>

            <p class="register">
                Already have an accaunt?
                <a href="/loginpage">Login</a>
            </p>
        </form>
    </div>
</div>
<?php
require 'view/componenets/footer.php';
?>