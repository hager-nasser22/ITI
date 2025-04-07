<?php

namespace App\Models;

use App\Databases\Connection;
use App\Interfaces\Crud;
use PDO;

class Cart extends Connection implements Crud
{
    private $ID, $product_title, $product_image, $product_price, $product_description, $product_size, $product_quantity, $user_id, $product_id, $created_at;

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
     * Get the value of product_title
     */
    public function getProduct_title()
    {
        return $this->product_title;
    }

    /**
     * Set the value of product_title
     *
     * @return  self
     */
    public function setProduct_title($product_title)
    {
        $this->product_title = $product_title;

        return $this;
    }

    /**
     * Get the value of product_image
     */
    public function getProduct_image()
    {
        return $this->product_image;
    }

    /**
     * Set the value of product_image
     *
     * @return  self
     */
    public function setProduct_image($product_image)
    {
        $this->product_image = $product_image;

        return $this;
    }

    /**
     * Get the value of product_price
     */
    public function getProduct_price()
    {
        return $this->product_price;
    }

    /**
     * Set the value of product_price
     *
     * @return  self
     */
    public function setProduct_price($product_price)
    {
        $this->product_price = $product_price;

        return $this;
    }

    /**
     * Get the value of product_description
     */
    public function getProduct_description()
    {
        return $this->product_description;
    }

    /**
     * Set the value of product_description
     *
     * @return  self
     */
    public function setProduct_description($product_description)
    {
        $this->product_description = $product_description;

        return $this;
    }

    /**
     * Get the value of product_size
     */
    public function getProduct_size()
    {
        return $this->product_size;
    }

    /**
     * Set the value of product_size
     *
     * @return  self
     */
    public function setProduct_size($product_size)
    {
        $this->product_size = $product_size;

        return $this;
    }

    /**
     * Get the value of product_quantity
     */
    public function getProduct_quantity()
    {
        return $this->product_quantity;
    }

    /**
     * Set the value of product_quantity
     *
     * @return  self
     */
    public function setProduct_quantity($product_quantity)
    {
        $this->product_quantity = $product_quantity;

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
     * Get the value of product_id
     */
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

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
        $query = "INSERT INTO cart ( product_title, product_image, product_price, product_description,product_quantity, user_id, product_id) VALUES (?, ?, ?, ?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $this->product_title, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->product_image, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->product_price, PDO::PARAM_INT);
        $stmt->bindParam(4, $this->product_description, PDO::PARAM_STR);
        $stmt->bindParam(5, $this->product_quantity, PDO::PARAM_INT);
        $stmt->bindParam(6, $this->user_id, PDO::PARAM_INT);
        $stmt->bindParam(7, $this->product_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    function read()
    {
        $querey = "SELECT * FROM cart WHERE user_id=? ORDER BY ID DESC";
        $stmt = $this->conn->prepare($querey);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $this->user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function readById($id)
    {
        $querey = "SELECT * FROM cart WHERE ID=?";
        $stmt = $this->conn->prepare($querey);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id)
    {
        $query = "UPDATE cart SET product_quantity=? WHERE ID=?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) return false;

        $stmt->bindParam(1, $this->product_quantity, PDO::PARAM_INT);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);

        return $stmt->execute();
    }


    public function delete($id)
    {
        $query = "DELETE FROM cart WHERE ID = ?";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function clearCart()
    {
        $query = "DELETE FROM cart WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->user_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
