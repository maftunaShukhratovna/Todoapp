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

    public function updateTelegramId($telegramId, $userId) {
        $query = 'UPDATE users SET telegram_id = ? WHERE id = ?';
        $stmt = $this->mysqli->prepare($query);
        
        $stmt->bind_param('si', $telegramId, $userId);
        $stmt->execute();
        $stmt->close();
    }

    public function getUserIdByTelegramId($telegramId) {
        $userId=null;
        $query = 'SELECT id FROM users WHERE telegram_id = ?'; 
        $stmt = $this->mysqli->prepare($query);
        
        $stmt->bind_param('s', $telegramId);
        $stmt->execute();

        $stmt->bind_result($userId); 
        $stmt->fetch();
        
        $stmt->close();
        
        return $userId;  
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