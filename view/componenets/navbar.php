<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Todo App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['user'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-user"></i> <?= htmlspecialchars($_SESSION['user']['email']) ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php
                        if (isset($task['id'])) {
                            echo '/api/todos/' . htmlspecialchars($task['id']);
                        } else {
                            echo '/api/todos';
                        }
                        ?>">Get JSON file</a>
                    </li>

                    <li class="nav-item">
                        <a href="https://t.me/nttodo_appbot?start=<?= $_SESSION['user']['id']?>" target="_blank">
                            <button class="btn btn-primary"><i class="fab fa-telegram-plane"></i> Telegram Bot</button>
                        </a>
                    </li>



                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/loginpage">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/registerpage">Register</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>