<?php

use App\Router;

$router=new Router();


if($router->isApicall()){
    require 'routes/api.php';
    exit();
} elseif ($router->isTelegram()){
    require 'telegram/telegram.php';
    exit();
}

require 'routes/web.php';