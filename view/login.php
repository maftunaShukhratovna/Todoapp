<?php
require 'view/componenets/header.php';
?>


<div class="auth-container">
    <form method="POST" action="/login" class="auth-form">
        <div class="auth-header">
            <h1 class="auth-title">Login</h1>
            <p>Welcome back! Please log in to access your account.</p>
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

        <div class="remember-forgot-box">
            <label for="remember">
                <input type="checkbox" id="remember" name="remember">
                Remember me
            </label>
            <a href="#">Forgot Password?</a>
        </div>

        <?php if (!empty($errorMessage)): ?>
            <div class="error-message">
                <?= htmlspecialchars($errorMessage) ?>
            </div>
        <?php endif; ?>

        <button type="submit" class="auth-button">Login</button>

        <p class="switch-auth">
            Don't have an account? <a href="/registerpage">Register</a>
        </p>
    </form>
</div>

<?php
require 'view/componenets/footer.php';
?>
