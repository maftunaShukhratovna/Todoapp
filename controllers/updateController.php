<?php

$title = $_POST['title'];
$due_date = $_POST['due_date'];

(new App\Todo())->update($todoId, $title, $due_date);
redirect('/todos');