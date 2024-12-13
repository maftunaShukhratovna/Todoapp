<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'bootstrap.php';
require 'helpers.php';


$router=new App\Router();

$router->get('/', fn()=> require 'controllers/pgController.php');

$router->get('/logout', fn()=> require 'controllers/logout.php');



$router->post('/register', fn($users)=>require 'controllers/registerController.php');

$router->get('/registerpage', fn()=>require 'controllers/registerpage.php');

$router->get('/loginpage', fn()=>require 'controllers/loginpage.php');

$router->post('/login', fn($users)=>require 'controllers/loginController.php');




$router->get('/todos/{id}/delete', fn($todoId)=>require 'controllers/deleteController.php'); 

$router->get('/todos', fn()=>require 'controllers/homeController.php');

$router->post('/store', fn()=>require 'controllers/storeController.php');

$router->get('/todos/{id}/edit', fn($todoId)=> require 'controllers/editController.php');

$router->post('/todos/{id}/update',fn($todoId)=>require 'controllers/updateController.php');

$router->get('/edit/{id}/complete', fn($todoId)=>require 'controllers/completeController.php');

$router->get('/edit/{id}/pending', fn($todoId)=>require 'controllers/pendingController.php');

$router->get('/edit/{id}/in-progrees', fn($todoId)=>require 'controllers/InProgressController.php');











// $updates=$bot->getUpdates();

// foreach($updates as $update){
//     $bot->Requests($update);
// }

       









