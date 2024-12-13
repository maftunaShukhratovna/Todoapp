<?php 

view('todos', [
    'todos' => (new App\Todo())->get($_SESSION['user']['id'])
]);
