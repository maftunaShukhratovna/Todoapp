<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #0d6efd;
        color: white;
    }

    .todo-body {
        max-width: 700px;
        box-shadow: 0 0 5px 5px #ccc;
    }

    .todo-text {
        font-weight: bold;
    }

    .completed {
        font-weight: bold;
        text-decoration: line-through;
        color: green;
    }

    .in_progress {
        text-decoration: underline;
        color: #d1970f;
        font-weight: bold;
    }

    .pending {
        font-weight: bold;
    }

    .paragraph {
        text-align: center;
        font-weight: bold;

    }

    .bodyofpage {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .bodyforpg {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #333;
    }

    .container {
        text-align: center;
        background-color: #fff;
        padding: 50px;
        border-radius: 8px;
        box-shadow: 0 0 100 rgba(0, 0, 0, 0.1);
    }

    .message h1 {
        font-size: 100px;
        font-weight: bold;
        color: #e74c3c;
    }

    .message p {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .btn-pagenotfound {
        display: inline-block;
        padding: 10px 20px;
        background-color: #3498db;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-pagenotfound:hover {
        background-color: #2980b9;
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    .firstbody {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .secondbody {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url(https://user-images.githubusercontent.com/13468728/233847739-219cb494-c265-4554-820a-bd3424c59065.jpg);
        background-size: cover;
        background-position: center;
    }

    .login-form {
        background: rgba(64, 64, 64, 0.15);
        border: 3px solid rgba(255, 255, 255, 0.3);
        padding: 30px;
        border-radius: 16px;
        backdrop-filter: blur(25px);
        text-align: center;
        color: white;
        width: 400px;
        box-shadow: 0px 0px 20px 10px rgba(0, 0, 0, 0.15);
    }

    .login-title {
        font-size: 40px;
        margin-bottom: 40px;
    }

    .input-box {
        margin: 20px 0;
        position: relative;
    }

    .input-box input {
        width: 100%;
        background: rgba(255, 255, 255, 0.1);
        border: none;
        padding: 12px 12px 12px 45px;
        border-radius: 99px;
        outline: 3px solid transparent;
        transition: 0.3s;
        font-size: 17px;
        color: white;
        font-weight: 600;
    }

    .input-box input::placeholder {
        color: rgba(255, 255, 255, 0.8);
        font-size: 17px;
        font-weight: 500;
    }

    .input-box input:focus {
        outline: 3px solid rgba(255, 255, 255, 0.3);
    }

    .input-box input::-ms-reveal {
        filter: invert(100%);
    }

    .input-box i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        color: rgba(255, 255, 255, 0.8);
    }

    .remember-forgot-box {
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
        font-size: 15px;
    }

    .remember-forgot-box label {
        display: flex;
        gap: 8px;
        cursor: pointer;
    }

    .remember-forgot-box input {
        accent-color: white;
        cursor: pointer;
    }

    .remember-forgot-box a {
        color: white;
        text-decoration: none;
    }

    .remember-forgot-box a:hover {
        text-decoration: underline;
    }

    .login-btn {
        width: 100%;
        padding: 10px 0;
        background: #2F9CF4;
        border: none;
        border-radius: 99px;
        color: white;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s;
    }

    .login-btn:hover {
        background: #0B87EC;
    }

    .register {
        margin-top: 15px;
        font-size: 15px;
    }

    .register a {
        color: white;
        text-decoration: none;
        font-weight: 500;
    }

    .register a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body class="bg-dark-subtle">