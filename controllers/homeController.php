<?php 

view('home', [
    'todos' => (new App\Todo())->get()
]);
