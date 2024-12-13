<?php
   
$fullname = $_POST['fullname'] ?? null;
$email = $_POST['email'] ?? null;
$passwords = $_POST['passwords'] ?? null;
$repeatPasswords=$_POST['repeatpasswords']?? null;

$errorMessage=null;

if($passwords !== $repeatPasswords){
    $_SESSION['errorMessage']="Password doesnt match";
    view('register');
    exit();
} 

if((new App\User())->emailchecker($email)){
    $_SESSION['errorMessage']="This email already exists!";
    view('register');
    exit();
} else {
    (new App\User())->users($fullname, $email, $passwords, $repeatPasswords);

    $users=(new App\User())->login($email, $passwords);

        if($users){
            $_SESSION['user'] = [
            'id' => $users['id'],
            'name' => $users['fullname'],
            'email' => $users['email'],
            ];
    redirect('/todos');
    }
     
}