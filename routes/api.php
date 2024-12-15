<?php

use App\Router;

use App\Todo;

$router=new Router();

$todo=new Todo();

$router->get('/api/todos', function() use ($todo){
    apiResponse($todo->get(9));

});


$router->get('/api/todos/{id}', function($todoId) use ($todo){
    apiResponse($todo->getById($todoId));
});



