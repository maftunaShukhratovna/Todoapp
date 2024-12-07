<?php 

$task = (new App\Todo())->getById($todoId);
view('edit', ['task' => $task]);
