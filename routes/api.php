<?php

use App\Router;

use App\Todo;

$router=new Router();

$todo=new Todo();

$router->get('/api/todos', function() use ($todo){    
    apiResponse($todo->get($_SESSION['user']['id']));

});


$router->get('/api/todos/{id}', function($todoId) use ($todo){
    apiResponse($todo->getById($todoId));
});


$router->post('/api/todos', function() use ($todo){
    $todo->store($_POST['title'], $_POST['dueDate'], $_SESSION['user']['id']);
    apiResponse([
        'ok'=>true,
        'message'=>'Todo created successfully'
    ]);
});

$router->delete('/api/todos/{id}', function($todoId) use ($todo){
    $todo->delete($todoId);
    apiResponse([
        'ok'=>true,
        'message'=>'Todo delete successfully'
    ]);
});


$router->post('/api/todos/{id}', function($todoId) use ($todo){
    $todo->update($todoId, $_POST['title'], $_POST['status'], $_POST['dueDate']);
    apiResponse([
        'ok'=>true,
        'message'=>'Todo update successfully'
    ]);
});





