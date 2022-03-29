<?php 
class Database{
    public $conn;
    function __construct() {
        $servername = "localhost";
        $dbname = 'estudoapi';
        $username = "root";
        $password = "";
        
        try {
          $conn = new PDO("mysql:host=$servername;dbname=estudoapi", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->conn= $conn;
        } catch(PDOException $e) {
          echo " Database Connection failed: " . $e->getMessage();
        }
    }
}
?>