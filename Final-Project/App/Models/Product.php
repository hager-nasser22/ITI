<?php
namespace App\Models;
use App\Databases\Connection;
use App\Interfaces\Crud;
use PDO;

class Product extends Connection implements Crud{
    private $ID,$product_title,$price,$image,$description,$type,$created_at;

    /**
     * Get the value of ID
     */ 
    public function getID()
    {
        return $this->ID;
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
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

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
        $query = "INSERT INTO product (product_title, image, description, price, type) VALUES (?, ?, ?, ?,?)";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $this->product_title, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->image, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->description, PDO::PARAM_STR);
        $stmt->bindParam(4, $this->price, PDO::PARAM_INT);
        $stmt->bindParam(5, $this->type, PDO::PARAM_STR);
        return $stmt->execute();
    }
    function read()
    {
        $querey = "SELECT * FROM product ORDER BY ID DESC";
        $stmt = $this->conn->prepare($querey);
        if (!$stmt) {
            return false;
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function readById($id)
    {
        $querey = "SELECT * FROM product WHERE ID=?";
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
        $querey = "UPDATE product SET product_title=?, image=?, description=?, price=?, type=? WHERE ID=?";
        $stmt = $this->conn->prepare($querey);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $this->product_title, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->image, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->description, PDO::PARAM_STR);
        $stmt->bindParam(4, $this->price, PDO::PARAM_INT);
        $stmt->bindParam(5, $this->type, PDO::PARAM_STR);
        $stmt->bindParam(6, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    function delete($id)
    {
        $querey = "DELETE FROM product WHERE ID = ?";
        $stmt = $this->conn->prepare($querey);
        if (!$stmt) {
            return false;
        }
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}