<?php

namespace App\Databases;

use PDO;
use PDOException;

class Connection
{
    private $hostName = "localhost";
    private $userName = "root";
    private $password = "";
    private $dbName = "coffee-shop";
    public $conn;
    public function __construct()
    {
        $this->conn = new PDO("mysql:host={$this->hostName};dbname={$this->dbName}", $this->userName, $this->password);
    }
}
new Connection();
