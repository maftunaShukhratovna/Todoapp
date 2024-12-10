<?php
   
use App\Todo;

$fullname = $_POST['fullname'] ?? null;
$email = $_POST['email'] ?? null;
$passwords = $_POST['passwords'] ?? null;

$todo = new Todo();

$todo->users($fullname, $email, $passwords);
redirect("/todos");



