<?php
if (isset($_SESSION['errorMessage'])) {
    $errorMessage = $_SESSION['errorMessage'];
    unset($_SESSION['errorMessage']);
}

require 'view/componenets/header.php';
?>

<div class="auth-container">
    <form method="POST" action="/register" class="auth-form">
        <div class="auth-header">
            <h1 class="auth-title">Register</h1>
            <p>Create your account to get started!</p>
        </div>

        <div class="input-box">
            <label for="fullname" class="input-label">
                <i class='bx bxs-user'></i>
                Full Name
            </label>
            <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
        </div>

        <div class="input-box">
            <label for="email" class="input-label">
                <i class='bx bxs-user'></i>
                Email
            </label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="input-box">
            <label for="password" class="input-label">
                <i class='bx bxs-lock-alt'></i>
                Password
            </label>
            <input type="password" id="password" name="passwords" placeholder="Enter your password" required>
        </div>

        <div class="input-box">
            <label for="repeatpassword" class="input-label">
                <i class='bx bxs-lock-alt'></i>
                Repeat Password
            </label>
            <input type="password" id="repeatpassword" name="repeatpasswords" placeholder="Repeat your password" required>
        </div>

        <?php if (!empty($errorMessage)): ?>
            <div class="error-message">
                <?= htmlspecialchars($errorMessage) ?>
            </div>
        <?php endif; ?>

        <button type="submit" class="auth-button">Register</button>


        <p class="switch-auth">
            Already have an account? <a href="/loginpage">Login</a>
        </p>
    </form>
</div>

<?php
require 'view/componenets/footer.php';
?>
