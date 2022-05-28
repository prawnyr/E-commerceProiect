<?php 

class Database{
  private $server;
  private $username;
  private $password;
  private $database;
  public $mysqli;

  public function __construct() {
    $this->connect();
  }

  private function connect(){
    $this->server = 'localhost';
    $this->username = 'root';
    $this->password = '';
    $this->database = 'store';

    $this->mysqli = new mysqli($this->server, $this->username, $this->password, $this->database);
    return $this->mysqli;
  }
  public function result($sql){
        $result = $this->mysqli->query($sql);
        return $result;
  }
  public function insertid($sql){
        $result = $this->mysqli->query($sql);
        return mysqli_insert_id($this->mysqli);
  }
  
} 
 ?>