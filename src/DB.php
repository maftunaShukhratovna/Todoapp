<?php
class DB {
    public $host = "127.0.0.1";
    public $user = "root";
    public $pass = "Maftuna@2005";
    public $database = "todo_app";
    public $conn;

    public function __construct() {
    
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database);

        echo "Mysql ulandi";
    }
}
?>
