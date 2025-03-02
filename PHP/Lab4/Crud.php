<?php 
namespace Crud;
use Connection\Connection;
use PDO;

class Crud{
    private $id,$name,$email,$password,$connection;
    public function __construct() {
        $this->connection = new Connection();
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password; 
        return $this;
    }
    function add($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values = implode(", ", array_map(fn($v) => "'" . $v . "'", array_values($data)));
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->connection->connetion->exec($query);
    }

    function all($table) {
        $query = "SELECT * FROM $table";
        $stmt = $this->connection->connetion->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function show($table, $id) {
        $query = "SELECT * FROM $table WHERE id = :id";
        $stmt = $this->connection->connetion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function edit($table, $data, $id) {
        $updates = implode(", ", array_map(fn($k, $v) => "$k = '$v'", array_keys($data), array_values($data)));
        $query = "UPDATE $table SET $updates WHERE id = :id";
        $stmt = $this->connection->connetion->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    function delete($table, $id) {
        $query = "DELETE FROM $table WHERE id = :id";
        $stmt = $this->connection->connetion->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}