<?php
require 'view/componenets/header.php';
?>

<?php
require 'view/componenets/navbar.php';
?>


<div class="homepage">
    <div class="bodyofpage text-center d-flex align-items-center justify-content-center vh-100">
        <div class="container">
            <div class="content">
                <h1 class="display-3 fw-bold">Welcome to the To-Do App</h1>
                <p class="fs-4">Organize your tasks, stay productive, and achieve your goals effortlessly.</p>
                <div>
                    <a href="/loginpage" class="btn btn-primary me-2">Login</a>
                    <a href="/registerpage" class="btn btn-success">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require 'view/componenets/footer.php';
?>

