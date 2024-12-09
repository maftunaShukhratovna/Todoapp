<?php

namespace App;

use App\DB;

class Todo{
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

    public function store(string $title, string $duedate){

        $query="INSERT INTO todos(title, status, due_date, created_at, updated_at) VALUES (?, 'pending', ?, NOW(), NOW())";
        $stmt=$this->mysqli->prepare($query);

        $stmt->bind_param('ss',$title, $duedate);
        $stmt->execute();
        $stmt->close();
    }


    public function get(){
        $query= "SELECT * FROM todos";
        $result=$this->mysqli->query($query);

        $todos=[];
        while($row=mysqli_fetch_assoc($result)){
            $todos[]=$row;
        }
        return $todos;

    }

    
    public function delete(string $id){
        $query= "DELETE FROM todos WHERE id=?";
        $stmt=$this->mysqli->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();
    }


    public function complete(int $id){
        $query= "UPDATE todos set status='completed', updated_at=NOW() where id=?";
        $stmt=$this->mysqli->prepare($query);
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }


    public function inProgress (int $id): bool {
        $query = "UPDATE todos set status='in_progress', in_progress=NOW() where id=?";
        $stmt=$this->mysqli->prepare($query);
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }
    

    public function pending (int $id): bool {
        $query = "UPDATE todos set status='pending', pending=NOW() where id=?";
        $stmt=$this->mysqli->prepare($query);
        $stmt->bind_param("i",$id);
        return $stmt->execute();
        
    } 


    public function getById($id){
        $query="SELECT * FROM todos WHERE id=?";
        $smtm=$this->mysqli->prepare($query);
        $smtm->bind_param("i",$id);
        $smtm->execute();
        $result=$smtm->get_result();
        return $result->fetch_assoc();
    }

    public function update( $id, $title, $due_date){
        $query= "UPDATE todos SET title=?, due_date=?, updated_at=NOW() where id=?";
        $stmt= $this->mysqli->prepare($query);
        $stmt->bind_param("ssi",$title, $due_date, $id);
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

    // public function getuserById($email, $password){
    //     $stmt = $this->mysqli->prepare("SELECT * FROM users WHERE email = ?");
    //     $stmt->bind_param("s",$email);
    //     $stmt->execute();

    //     $result=$stmt->get_result();
    //     $user=$result->fetch_assoc();

    // }


}
