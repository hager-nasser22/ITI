<?php
namespace App\Models;

use App\Databases\Connection;
use App\Interfaces\Crud;
use PDO;

class Admin extends Connection implements Crud{
    private $ID,$admin_name,$admin_email,$admin_password,$created_at ;

    /**
     * Get the value of ID
     */ 
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Set the value of ID
     *
     * @return  self
     */ 
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * Get the value of admin_name
     */ 
    public function getAdmin_name()
    {
        return $this->admin_name;
    }

    /**
     * Set the value of admin_name
     *
     * @return  self
     */ 
    public function setAdmin_name($admin_name)
    {
        $this->admin_name = $admin_name;

        return $this;
    }

    /**
     * Get the value of admin_email
     */ 
    public function getAdmin_email()
    {
        return $this->admin_email;
    }

    /**
     * Set the value of admin_email
     *
     * @return  self
     */ 
    public function setAdmin_email($admin_email)
    {
        $this->admin_email = $admin_email;

        return $this;
    }

    /**
     * Get the value of admin_password
     */ 
    public function getAdmin_password()
    {
        return $this->admin_password;
    }

    /**
     * Set the value of admin_password
     *
     * @return  self
     */ 
    public function setAdmin_password($admin_password)
    {
        $this->admin_password = $admin_password;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }
    public function create(){
        $query = "INSERT INTO admins (admin_name, admin_email, admin_password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
    
        $hashedPassword = password_hash($this->admin_password, PASSWORD_DEFAULT);
        
        $stmt->bindParam(1, $this->admin_name, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->admin_email, PDO::PARAM_STR);
        $stmt->bindParam(3, $hashedPassword, PDO::PARAM_STR);
        
        return $stmt->execute();
    }
    
    public function read(){
        $querey = "SELECT * FROM admins ORDER BY ID DESC";
        $stmt = $this->conn->prepare($querey);
        if (!$stmt) {
            return false;
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function readById($id)
    {
        $querey = "SELECT * FROM admins WHERE ID=?";
        $stmt = $this->conn->prepare($querey);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function readByEmail($email) {
        $querey = "SELECT * FROM admins WHERE admin_email=?";
        $stmt = $this->conn->prepare($querey);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id){
        $querey = "UPDATE admins SET admin_name =?, admin_email=?, admin_password=? WHERE ID=?";
        $stmt = $this->conn->prepare($querey);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $this->admin_name, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->admin_email, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->admin_password, PDO::PARAM_STR);
        $stmt->bindParam(4, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function delete($id){
        $querey = "DELETE FROM admins WHERE ID = ?";
        $stmt = $this->conn->prepare($querey);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}