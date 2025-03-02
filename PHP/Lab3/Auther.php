<?php
class Auther
{
    private $name, $email, $gender;
    function getName()
    {
        return $this->name;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getGender()
    {
        return $this->gender;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    function __construct($name, $gender, $email)
    {
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
        $this->ValidationGender();
    }
    function ValidationGender()
    {
        if ($this->gender == "m") {
            $this->gender = "Male";
        }
        if ($this->gender == "f") {
            $this->gender = "Famele";
        }
    }
    function __toString()
    {
        return "Auther[name={$this->getName()},email={$this->getEmail()},gender={$this->getGender()}]";
    }
}
// $instance = new Auther();
// $instance->setEmail("Hager@gmail.com");
// $instance->Auther("Hager",'m',"kjcsdc");
// echo $instance;
// $instance1 = new Auther();
// $instance1->setEmail("Hage@gmail.com");
// $instance1->Auther("Hager",'m');
// echo $instance1;
// $instance2 = new Auther();
// $instance2->setEmail("Hag@gmail.com");
// $instance2->Auther("Hager",'m');
// echo $instance2;

class Book
{
    private $name;
    private $price;
    private $qty = 0;
    private $authors = [];

    function __construct($name, $authors, $price, $qty = 0)
    {
        $this->name = $name;
        $this->authors = $authors;
        $this->price = $price;
        $this->qty = $qty;
    }

    function setQty($qty)
    {
        $this->qty = $qty;
    }

    function setPrice($price)
    {
        $this->price = $price;
    }

    function getAuthors()
    {
        return $this->authors;
    }

    function getName()
    {
        return $this->name;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getQty()
    {
        return $this->qty;
    }

    public function __toString()
    {
        $authorsStr = implode(", ", array_map(fn($author) => (string)$author, $this->authors));
        return "Book[name=" . $this->name . ", Authors=[" . $authorsStr . "], price=" . $this->price . ", Qty=" . $this->qty . "]";
    }
}


$author1 = new Auther("MENNA", "menna@gmail.com", "f");
$author2 = new Auther("Ali", "ali@example.com", "m");
$author3 = new Auther("Sara", "sara@example.com", "f");


$book = new Book("Math Book", [$author1, $author2, $author3], 500, 3);

echo $book;
