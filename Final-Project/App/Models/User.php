<?php
namespace App\Models;

use App\Databases\Connection;
use App\Interfaces\Crud;
use PDO;

class User extends Connection implements Crud {
    private $ID, $user_name, $user_email, $user_pass, $created_at;

    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
        return $this;
    }

    public function getUserName() {
        return $this->user_name;
    }

    public function setUserName($user_name) {
        $this->user_name = $user_name;
        return $this;
    }

    public function getUserEmail() {
        return $this->user_email;
    }

    public function setUserEmail($user_email) {
        $this->user_email = $user_email;
        return $this;
    }

    public function getUserPass() {
        return $this->user_pass;
    }

    public function setUserPass($user_pass) {
        $this->user_pass = $user_pass;
        return $this;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
        return $this;
    }

    public function create() {
        $query = "INSERT INTO users (user_name, user_email, user_pass) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        
        $hashedPassword = password_hash($this->user_pass, PASSWORD_DEFAULT);
        $stmt->bindParam(1, $this->user_name, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->user_email, PDO::PARAM_STR);
        $stmt->bindParam(3, $hashedPassword, PDO::PARAM_STR);
        
        return $stmt->execute();
    }

    public function read() {
        $query = "SELECT * FROM users ORDER BY ID DESC";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readById($id) {
        $query = "SELECT * FROM users WHERE ID = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readByEmail($email) {
        $query = "SELECT * FROM users WHERE user_email = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id) {
        $query = "UPDATE users SET user_name = ?, user_email = ?, user_pass = ? WHERE ID = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        
        $hashedPassword = password_hash($this->user_pass, PASSWORD_DEFAULT);
        $stmt->bindParam(1, $this->user_name, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->user_email, PDO::PARAM_STR);
        $stmt->bindParam(3, $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(4, $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM users WHERE ID = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
