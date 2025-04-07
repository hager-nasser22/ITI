<?php

namespace App\Models;

use App\Databases\Connection;
use App\Interfaces\Crud;
use PDO;

class Booking extends Connection implements Crud
{
    private $ID, $user_id, $first_name, $last_name, $date, $time, $phone_number, $message, $status, $created_at, $room_NO;

    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
        return $this;
    }
    public function getUser_id()
    {
        return $this->user_id;
    }
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }
    public function getFirst_name()
    {
        return $this->first_name;
    }
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }
    public function getLast_name()
    {
        return $this->last_name;
    }
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
    public function getTime()
    {
        return $this->time;
    }
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }
    public function getPhone_number()
    {
        return $this->phone_number;
    }
    public function setPhone_number($phone_number)
    {
        $this->phone_number = $phone_number;
        return $this;
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
    public function getRoom_NO()
    {
        return $this->room_NO;
    }
    public function setRoom_NO($room_NO)
    {
        $this->room_NO = $room_NO;
        return $this;
    }
    public function getCreated_at()
    {
        return $this->created_at;
    }
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function create()
    {
        $query = "INSERT INTO bookings (user_id, first_name, last_name, date, time, phone_number, message, status, room_NO) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return false;
        $stmt->execute([$this->user_id, $this->first_name, $this->last_name, $this->date, $this->time, $this->phone_number, $this->message, $this->status, $this->room_NO]);
        return true;
    }

    public function read()
    {
        $query = "SELECT * FROM bookings ORDER BY ID DESC";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return false;
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readById($id)
    {
        $query = "SELECT * FROM bookings WHERE ID = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return false;
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function readByUserId($user_id)
    {
        $query = "SELECT * FROM bookings WHERE user_id = ? ORDER BY date DESC";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return false;
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($id)
    {
        $query = "UPDATE bookings SET status = ? WHERE ID = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return false;
        return $stmt->execute([$this->status, $id]);
    }

    public function delete($id)
    {
        $query = "DELETE FROM bookings WHERE ID = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return false;
        return $stmt->execute([$id]);
    }
}
