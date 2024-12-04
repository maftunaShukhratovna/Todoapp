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
    view('pgnotfound');
});


$router->get('/todos', function () use ($todo) {
    $todos = $todo->get();
    view('home', [
        'todos' => $todos
    ]);
});


$router->get('/complete', function () use ($todo) {
    if (!empty($_GET['id'])) {
        $id=intval($_GET['id']);
        $todo->complete($_GET['id']);
        header('Location: /edit?id='.$id);
        exit();
    }
});

$router->get('/in-progress', function () use ($todo) {
    if (!empty($_GET['id'])) {
        $id=intval($_GET['id']);
        $todo->inProgress($_GET['id']);
        header('Location: /edit?id='.$id);
        exit();
    }
});


$router->get('/pending', function () use ($todo) {
    if (!empty($_GET['id'])) {
        $id=intval($_GET['id']);
        $todo->pending($_GET['id']);
        
        header('Location: /edit?id='.$id);
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

$router->get('/edit', function() use ( $todo) {
    if (!empty($_GET['id'])) {
        $id=intval($_GET['id']);
        $task=$todo->getById($id);

        view('edit',['task'=>$task]);
        
    }
});

$router->post('/update', function() use ($todo) {
    if (!empty($_POST['id']) && !empty($_POST['title']) && !empty($_POST['due_date'])) {
        $id = intval($_POST['id']);
        $title = $_POST['title'];
        $due_date = $_POST['due_date'];

        $todo->update($id, $title, $due_date);
            header("Location: /todos"); 
            exit;
    }
});
       




