<?php

namespace App;

use App\DB;

class Todo{
    public $mysqli;
    public function __construct(){
        $db=new DB();
        $this->mysqli=$db->conn;
    }

    public function store(string $title, string $duedate, int $userId){

        $query="INSERT INTO todos(title, status, due_date, created_at, updated_at, user_id) VALUES (?, 'pending', ?, NOW(), NOW(),?)";
        $stmt=$this->mysqli->prepare($query);

        $stmt->bind_param('ssi',$title, $duedate, $userId);
        $stmt->execute();
        $stmt->close();
    }


    
    public function get($userId) {
        $query = "SELECT * FROM todos WHERE user_id = ?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("i", $userId);

        $stmt->execute();
    
        $result = $stmt->get_result();

        $todos = [];
        while ($row = $result->fetch_assoc()) {
            $todos[] = $row;
        }
    
        $stmt->close();

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

}
