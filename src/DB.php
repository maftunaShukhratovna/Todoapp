<?php
namespace App;
class DB {
    public $host;
    public $user;
    public $pass;
    public $database;
    public $conn;

    public function __construct() {
        $this->host = $_ENV['DB_HOST'];
        $this->user = $_ENV['DB_USERNAME'];
        $this->pass = $_ENV['DB_PASSWORD'];
        $this->database = $_ENV['DB_DATABASE'];
    
        $this->conn = new \mysqli($this->host, $this->user, $this->pass, $this->database);
    }
}
?>
