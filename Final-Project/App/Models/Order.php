<?php
namespace App\Models;

use App\Databases\Connection;
use App\Interfaces\Crud;
use PDO;

class Order extends Connection implements Crud{
    private $ID,$firstname,$lastname,$streetaddress,$appartment,$towncity,$postcode,$phone,$email,$payable_total_cost,$user_id,$status,$created_at ;

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
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of streetaddress
     */ 
    public function getStreetaddress()
    {
        return $this->streetaddress;
    }

    /**
     * Set the value of streetaddress
     *
     * @return  self
     */ 
    public function setStreetaddress($streetaddress)
    {
        $this->streetaddress = $streetaddress;

        return $this;
    }

    /**
     * Get the value of appartment
     */ 
    public function getAppartment()
    {
        return $this->appartment;
    }

    /**
     * Set the value of appartment
     *
     * @return  self
     */ 
    public function setAppartment($appartment)
    {
        $this->appartment = $appartment;

        return $this;
    }

    /**
     * Get the value of towncity
     */ 
    public function getTowncity()
    {
        return $this->towncity;
    }

    /**
     * Set the value of towncity
     *
     * @return  self
     */ 
    public function setTowncity($towncity)
    {
        $this->towncity = $towncity;

        return $this;
    }

    /**
     * Get the value of postcode
     */ 
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set the value of postcode
     *
     * @return  self
     */ 
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of payable_total_cost
     */ 
    public function getPayable_total_cost()
    {
        return $this->payable_total_cost;
    }

    /**
     * Set the value of payable_total_cost
     *
     * @return  self
     */ 
    public function setPayable_total_cost($payable_total_cost)
    {
        $this->payable_total_cost = $payable_total_cost;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

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

    public function create()
    {
        $query = "INSERT INTO orders ( firstname, lastname, streetaddress, appartment, towncity, postcode, phone, email, payable_total_cost, user_id, status) VALUES (?, ?, ?, ?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $this->firstname, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->lastname, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->streetaddress, PDO::PARAM_STR);
        $stmt->bindParam(4, $this->appartment, PDO::PARAM_STR);
        $stmt->bindParam(5, $this->towncity, PDO::PARAM_STR);
        $stmt->bindParam(6, $this->postcode, PDO::PARAM_INT);
        $stmt->bindParam(7, $this->phone, PDO::PARAM_STR);
        $stmt->bindParam(8, $this->email, PDO::PARAM_STR);
        $stmt->bindParam(9, $this->payable_total_cost, PDO::PARAM_INT);
        $stmt->bindParam(10, $this->user_id, PDO::PARAM_INT);
        $stmt->bindParam(11, $this->status, PDO::PARAM_STR);
        return $stmt->execute();
    }
    function read()
    {
        $querey = "SELECT * FROM orders ORDER BY ID DESC";
        $stmt = $this->conn->prepare($querey);
        if (!$stmt) {
            return false;
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function readById($id)
    {
        $querey = "SELECT * FROM orders WHERE ID=?";
        $stmt = $this->conn->prepare($querey);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function update($id)
    {
        $querey = "UPDATE orders SET status=? WHERE ID=?";
        $stmt = $this->conn->prepare($querey);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $this->status, PDO::PARAM_STR);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    function delete($id)
    {
        $querey = "DELETE FROM orders WHERE ID = ?";
        $stmt = $this->conn->prepare($querey);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}