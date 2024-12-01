<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page not found</title>
    <style> 
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

    .btn {
        display:inline-block;
        padding:10px 20px;
        background-color: #3498db;
        color: #fff;
        text-decoration:none;
        border-radius:5px;
        font-size:16px;
        transition: background-color 0.3s ease;
    }

    .btn:hover{
        background-color:#2980b9;
    }
    
    
    </style>
</head>
<body>
    <div class="container">
        <div class="message">
            <h1>404</h1>
            <p>The page doesn't exist!!!</p>
            <a href="/todos" class="btn">Go Back to Homepage</a>
        </div>
    </div>
    
</body>
</html>

