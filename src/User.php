<?php

namespace App;

use App\DB;

class User{
    public $mysqli;
    public function __construct(){
        $db=new DB();
        $this->mysqli=$db->conn;
    }

    public function users(string $fullname, string $email, string $passwords, string $repeatPasswords){
        
        $query="INSERT INTO users (fullname, email, passwords, repeatpasswords) VALUES (?,?,?,?)";
        $stmt=$this->mysqli->prepare($query);

        $stmt->bind_param('ssss',$fullname,$email, $passwords, $repeatPasswords);
        $stmt->execute();
        $stmt->close();

    }

    public function emailchecker($email){
        $stmt = $this->mysqli->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return true;
        }

        return false;
    }

    public function login($email, $passwords){
        $stmt = $this->mysqli->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($passwords==$user['passwords']) {
                return $user;
            } else {
                return null;
            }
        }

        return null; 
    }
}