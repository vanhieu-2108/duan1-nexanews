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
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

// Insert Update Delete
function pdo_mutaion($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        global $conn;
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $stmt;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// Get Rows
function pdo_querys($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        global $conn;
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// Get Row
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        global $conn;
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
