<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


require 'src/todo.php';

require 'helpers.php';

require 'src/router.php';



$router=new Router();

$todo = new Todo();

$router->get('/', function() {
    PageNotFound('pgnotfound');
});


$router->get('/todos', function () use ($todo) {
    $todos = $todo->get();
    view('home', [
        'todos' => $todos
    ]);
});


$router->get('/complete', function () use ($todo) {
    if (!empty($_GET['id'])) {
        $todo->complete($_GET['id']);
        header('Location: /todos');
        exit();
    }
});

$router->get('/in-progress', function () use ($todo) {
    if (!empty($_GET['id'])) {
        $todo->inProgress($_GET['id']);
        header('Location: /todos');
        exit();
    }
});


$router->get('/pending', function () use ($todo) {
    if (!empty($_GET['id'])) {
        $todo->pending($_GET['id']);
        header('Location: /todos');
        exit();
    }
});


$router->post('/store', function () use ($todo) {
    if (!empty($_POST['title']) && !empty($_POST['due_date'])) {
        $todo->store($_POST['title'], $_POST['due_date']);
        header('Location: /todos');
        exit();
    }
});


$router->get('/delete', function () use ($todo) {
    if (!empty($_GET['id'])) {
        $todo->delete($_GET['id']);
        header('Location: /todos');
        exit();
    }
});



