<?php
require 'view/componenets/header.php';
?>

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
                        echo '
                                <li class="' . $todo['status'] . ' list-group-item d-flex justify-content-between align-items-center">
                            ' . $todo["title"] . '
                            <div>
                            <a href="/todos/' . $todo["id"] . '/edit" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                            <a href="/todos/' . $todo["id"] . '/delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </li>
                            ';
                }
                ?>
            </ul>
        </div>
    </div>
<?php
require 'view/componenets/footer.php';
?>