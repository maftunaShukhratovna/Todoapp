<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>
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
        .pending{
            font-weight:bold;
        }

        .paragraph {
            text-align:center;
            font-weight:bold;
        
        }
        *{
        margin:0;
        padding:0;
        box-sizing: border-box;
    }

    body{
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color:#333;
    }

    .container{
        text-align:center;
        background-color: #fff;
        padding:50px;
        border-radius: 8px;
        box-shadow:0 0 100 rgba(0, 0, 0, 0.1);
    }

    .message h1 {
        font-size:100px;
        font-weight:bold;
        color:#e74c3c;
    }

    .message p {
        font-size:18px;
        margin-bottom:20px;
    }

    .btn-pagenotfound{
        display:inline-block;
        padding:10px 20px;
        background-color: #3498db;
        color: #fff;
        text-decoration:none;
        border-radius:5px;
        font-size:16px;
        transition: background-color 0.3s ease;
    }

    .btn-pagenotfound:hover{
        background-color:#2980b9;
    }
    </style>
</head>
<body class="bg-dark-subtle">
