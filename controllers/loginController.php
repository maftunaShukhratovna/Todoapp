<?php
   
$email = $_POST['email'] ?? null;
$passwords = $_POST['passwords'] ?? null;

$errorMessage=null;

if(!(new App\User())->emailchecker($email)){
    $errorMessage="This email doesnt exist!";
    view('login',['errorMessage'=>$errorMessage]);
    exit();
} 

$user=(new App\User())->login($email, $passwords);

if($user){
    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['fullname'],
        'email' => $user['email'],
    ];
    redirect('/todos');
} else{
    $errorMessage="Password wrong";
    view('login',['errorMessage'=>$errorMessage]);
}
