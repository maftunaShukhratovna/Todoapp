<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require 'bootstrap.php';

use App\Todo;
use App\Router;
use App\Bot;

require 'helpers.php';


$router=new Router();

$todo = new Todo();

$bot= new Bot();

$router->get('/', function () {
    view('pgnotfound');
});


$router->get('/todos/{id}/delete', function($todoId) use ($todo) {
    $todo->delete($todoId);
    redirect('/todos');
});


$router->get('/todos', function () use ($todo) {
    $todos = $todo->get();
    view('home', [
        'todos' => $todos
    ]);
});


$router->post('/store', function () use ($todo) {
    if (!empty($_POST['title']) && !empty($_POST['due_date'])) {
        $todo->store($_POST['title'], $_POST['due_date']);
        redirect('/todos');
    }
});



$router->get('/todos/{id}/edit', function ($todoId) use ($todo) {
    $task = $todo->getById($todoId);
    view('edit', ['task' => $task]);
});


$router->post('/todos/{id}/update', function($todoId) use ($todo) {
        $title = $_POST['title'];
        $due_date = $_POST['due_date'];

        $todo->update($todoId, $title, $due_date);
        redirect('/todos');
    
});


$router->get('/edit/{id}/complete', function ($todoId) use ($todo) { 
    $todo->complete($todoId);
    redirect('/todos');
});

$router->get('/edit/{id}/in-progrees', function ($todoId) use ($todo) { 
    $todo->inProgress($todoId);
    redirect('/todos');
});


$router->get('/edit/{id}/pending', function ($todoId) use ($todo) { 
        $todo->pending($todoId);
        redirect('/todos');
});


//telegram bot
// $updates=$bot->getUpdates();

//     foreach($updates as $update){
//         $bot->Requests($update);
//     }

       









