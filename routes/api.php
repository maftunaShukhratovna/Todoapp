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

$router->post('/api/todos', function($todoId) use ($todo){
    $todo->store($_POST['title'], $_POST['dueDate'], $todoId);
    apiResponse([
        'ok'=>true,
        'message'=>'Todo created successfully'
    ]);
});

$router->delete('/api/todos/{id}', function($todoId) use ($todo){
    $todo->delete($todoId);
    apiResponse([
        'ok'=>true,
        'message'=>'Todo deleted successfully'
    ]);
});


$router->post('/api/todos/{id}', function($todoId) use ($todo){
    $todo->update($todoId, $_POST['title'], $_POST['dueDate']);
    apiResponse([
        'ok'=>true,
        'message'=>'Todo updated successfully'
    ]);
});

$router->get('/api/todos/{id}', function($todoId) use ($todo){
    $todo->inProgress($todoId);
    apiResponse([
        'ok'=>true,
        'message'=>'Status changed successfully'
    ]);
});

$router->get('/api/todos/{id}', function($todoId) use ($todo){
    $todo->complete($todoId);
    apiResponse([
        'ok'=>true,
        'message'=>'Status changed successfully'
    ]);
});

$router->get('/api/todos/{id}', function($todoId) use ($todo){
    $todo->pending($todoId);
    apiResponse([
        'ok'=>true,
        'message'=>'Status changed successfully'
    ]);
});




