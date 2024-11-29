<?php

require "DB.php";

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

    public function complete(int $id){
        $query= "UPDATE todos set status='completed' where id=:id";
        return $this->mysqli->prepare($query)->execute([
            ":id"=> $id
            ]);
    }

}