<?php
namespace App\Models;

use App\Databases\Connection;
use App\Interfaces\Crud;
use PDO;

class Room extends Connection implements Crud{
    private $ID, $room_name;

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
     * Get the value of room_name
     */ 
    public function getRoom_name()
    {
        return $this->room_name;
    }

    /**
     * Set the value of room_name
     *
     * @return  self
     */ 
    public function setRoom_name($room_name)
    {
        $this->room_name = $room_name;
        return $this;
    }


    public function create(){
        $query = "INSERT INTO rooms (room_name) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $this->room_name, PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    public function read(){
        $query = "SELECT * FROM rooms ORDER BY ID DESC";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readById($id)
    {
        $query = "SELECT * FROM rooms WHERE ID=?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id){
        $query = "UPDATE rooms SET room_name =? WHERE ID=?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $this->room_name, PDO::PARAM_STR);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function delete($id){
        $query = "DELETE FROM rooms WHERE ID = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function getAvailableRooms()
    {
        $query = "SELECT ID, room_name FROM rooms";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}