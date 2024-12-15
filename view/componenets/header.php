<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #e3f2fd, #bbdefb);
        color: #333;
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    .navbar {
        background-color: #0288d1;
    }

    .navbar a.navbar-brand {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .todo-body {
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        padding: 30px;
    }

    .todo-text {
        font-weight: bold;
        color: #0288d1;
    }

    .list-group-item {
        border: none;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .list-group-item.completed {
        background: #ffebcc;
        color: #f57c00;
    }

    .list-group-item.pending {
        background: #fce4ec;
        color: #d81b60;
    }

    .list-group-item.in_progress {
        background: #e8f5e9;
        color: #388e3c;
    }

    .login-form,
    .register-form {
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        max-width: 500px;
        margin: auto;
    }

    .login-title,
    .register-title {
        color: #0288d1;
        font-size: 2rem;
        margin-bottom: 20px;
    }

    .input-box input {
        border: 1px solid #0288d1;
        border-radius: 5px;
    }

    .input-box input:focus {
        border-color: #0288d1;
        box-shadow: 0 0 5px rgba(2, 136, 209, 0.5);
    }

    button {
        background: #0288d1;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background: #0277bd;
    }

    .status {
        display: inline-block;
        padding: 5px 10px;
        font-size: 0.9rem;
        border-radius: 15px;
    }

    footer {
        text-align: center;
        padding: 10px;
        background: #0288d1;
        color: white;
    }

    footer a {
        color: #ffffff;
        text-decoration: none;
    }

    .auth-container {
        background: white;
        padding: 30px;
        max-width: 400px;
        margin: 50px auto;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    .auth-header h1 {
        font-size: 2rem;
        color: #00796b;
        margin-bottom: 10px;
    }

    .auth-header p {
        font-size: 1rem;
        color: #555;
        margin-bottom: 20px;
    }

    .input-box {
        margin-bottom: 20px;
        text-align: left;
        position: relative;
    }

    .input-label {
        display: block;
        margin-bottom: 8px;
        font-size: 0.9rem;
        color: #333;
    }

    .input-box input {
        width: 100%;
        padding: 12px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        font-size: 1rem;
        transition: border-color 0.3s;
    }

    .input-box input:focus {
        border-color: #00796b;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 121, 107, 0.3);
    }

    .auth-button {
        width: 100%;
        background-color: #00796b;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .auth-button:hover {
        background-color: #004d40;
    }

    .remember-forgot-box {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.9rem;
        margin-bottom: 20px;
    }

    .remember-forgot-box a {
        color: #00796b;
        text-decoration: none;
    }

    .remember-forgot-box a:hover {
        text-decoration: underline;
    }

    .error-message {
        color: red;
        font-size: 0.9rem;
        margin-bottom: 10px;
    }

    .switch-auth {
        font-size: 0.9rem;
        color: #555;
    }

    .switch-auth a {
        color: #00796b;
        text-decoration: none;
    }

    .switch-auth a:hover {
        text-decoration: underline;
    }
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-tkXxZsImT5zLwld3z1qMPTxPQIc0j9vQ4tGHSnAzzCUQg+Kg5lnJRmM3ozcdRgyT" crossorigin="anonymous">
</script>
</body>

</html>