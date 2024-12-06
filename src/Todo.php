<?php

namespace App;

use App\DB;

class Todo{
    public $mysqli;
    public function __construct(){
        $db=new DB();
        $this ->mysqli=$db->conn;
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
        
    }



}