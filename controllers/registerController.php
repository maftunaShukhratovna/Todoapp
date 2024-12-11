<?php
   
use App\Todo;

$fullname = $_POST['fullname'] ?? null;
$email = $_POST['email'] ?? null;
$passwords = $_POST['passwords'] ?? null;
$repeatPasswords=$_POST['repeatpasswords']?? null;

$errorMessage=null;

$todo = new Todo();

if($passwords !== $repeatPasswords){
    $errorMessage="Password doesnt match";
    view('register',['errorMessage'=>$errorMessage]);
    exit();
} 

if($todo->emailchecker($email)){
    $errorMessage="This email already exists!";
    view('register',['errorMessage'=>$errorMessage]);
    exit();
} else {
    $todo->users($fullname, $email, $passwords, $repeatPasswords);
    redirect("/todos");
}









