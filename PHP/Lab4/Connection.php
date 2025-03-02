<?php

namespace Connection;
use PDO;
class Connection{
    private $dnName ="ItiPhp";
    private $hostName="localhost";
    private $password="";
    private $userName = "root";
    public $connetion;
    function __construct()
    {
        $this->connetion = new PDO("mysql:host={$this->hostName};dbname={$this->dnName}",$this->userName,$this->password);
    }
}
new Connection();