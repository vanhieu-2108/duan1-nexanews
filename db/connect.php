<?php
class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "duan1";
    private $conn;
    public function __construct()
    {
        try {
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password, $options);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connect successfully!";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
$database = new Database();
$conn = $database->getConnection();
