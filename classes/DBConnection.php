<?php
if(!defined('DB_SERVER')){
    require_once("../initialize.php");
}
class DBConnection{

private $host;
private $username;
private $password;
private $database;
   
    public $conn;
    
  public function __construct(){

    $this->host = getenv('MYSQLHOST');
    $this->username = getenv('MYSQLUSER');
    $this->password = getenv('MYSQLPASSWORD');
    $this->database = getenv('MYSQLDATABASE');

    if (!isset($this->conn)) {

        $this->conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );

        if ($this->conn->connect_error) {
            die("Database Connection Failed: " . $this->conn->connect_error);
        }
    }
}
    public function __destruct(){
        $this->conn->close();
    }
}
?>