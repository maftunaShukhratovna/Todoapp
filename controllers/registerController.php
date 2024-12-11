<?php
   
use App\Todo;

$fullname = $_POST['fullname'] ?? null;
$email = $_POST['email'] ?? null;
$passwords = $_POST['passwords'] ?? null;
$repeatPasswords=$_POST['repeatpasswords']?? null;

session_start();
$errorMessage=null;

$todo = new Todo();

if($passwords !== $repeatPasswords){
    $_SESSION['errorMessage']="Password doesnt match";
    view('register');
    exit();
} 

if($todo->emailchecker($email)){
    $_SESSION['errorMessage']="This email already exists!";
    view('register');
    exit();
} else {
    $todo->users($fullname, $email, $passwords, $repeatPasswords);
    redirect("/todos");
}









