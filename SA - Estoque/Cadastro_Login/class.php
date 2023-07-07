<?php 
require_once(__DIR__.'/../Conn.php');

class CPDO extends Conn
{
    public object $conn;

    public function pdo(){
        $this->conn = $this->connect();
        return $this->conn;
    }
}
?>