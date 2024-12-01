<!doctype html>
<lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
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
    </style>
</head>
<body class="bg-dark-subtle">
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="todo-body my-5 p-3">
            <h1 class="text-center todo-text">Todo App</h1>
            <p class="paragraph">Add your daily tasks here!</p>
            <form method="POST" action="/store">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Add task here"
                           aria-label="Recipient's username" aria-describedby="button-addon2"
                           name="title"
                           required
                    >
                    <input type="datetime-local" class="form-control" placeholder="Recipient's username"
                           aria-label="Recipient's username" aria-describedby="button-addon2"
                           name="due_date"
                           required
                    >
                    <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fas fa-plus"></i></button>
                </div>
            </form>
            <ul class="list-group">
                <?php
                /** @var TYPE_NAME $todos */

                foreach ($todos as $todo) {
                    if ($todo['status'] == 'completed') {
                        echo '
                                <li class="' . $todo['status'] . ' list-group-item d-flex justify-content-between align-items-center">
                            ' . $todo["title"] . '
                            <div>
                                <a href="/in-progress?id=' . $todo["id"] . '" class="btn btn-outline-primary"><i class="fa fa-hourglass-half"></i></a>
                            <a href="/pending?id=' . $todo["id"] . '" class="btn btn-outline-warning"><i class="fa fa-clock"></i></a> 
                            <a href="/delete?id=' . $todo["id"] . '" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </li>
                            ';
                    } elseif ($todo['status'] == 'pending') {
                        echo '
                                <li class="' . $todo['status'] . ' list-group-item d-flex justify-content-between align-items-center">
                            ' . $todo["title"] . '
                            <div>
                                <a href="/in-progress?id=' . $todo["id"] . '" class="btn btn-outline-primary"><i class="fa fa-hourglass-half"></i></a>
                            <a href="/complete?id=' . $todo["id"] . '" class="btn btn-outline-success"><i class="fa fa-check"></i></a>
                            <a href="/delete?id=' . $todo["id"] . '" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </li>
                            ';
                    } else {
                        echo '
                                <li class="' . $todo['status'] . ' list-group-item d-flex justify-content-between align-items-center">
                            ' . $todo["title"] . '
                            <div>
                                <a href="/pending?id=' . $todo["id"] . '" class="btn btn-outline-warning"><i class="fa fa-clock"></i></a>
                            <a href="/complete?id=' . $todo["id"] . '" class="btn btn-outline-success"><i class="fa fa-check"></i></a> 
                            <a href="/delete?id=' . $todo["id"] . '" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </li>
                            ';
                    }
                }

                ?>
            </ul>
        </div>
    </div>
</div>
</body>