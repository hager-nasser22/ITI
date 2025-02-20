<?php
// $errors =[];
// function required($data){
//     foreach($data as $key=>$value){
//         if(!isset($value)){
//             $errors["$key"]= "Please Enter Your $key";
//         }
//     }
// }
// required($_POST);
if(!$_POST){
    header("Location:register.php");
}
function register($data){
    foreach($data as $value){
        echo $value."<br>";
    }
}
function login($data){
    foreach($data as $value){
        echo $value."<br>";
    }
}
var_dump($_POST);
if(isset($_POST["register"])){
    register($_POST);
}
else if(isset($_POST["login"])){
    login($_POST);
}