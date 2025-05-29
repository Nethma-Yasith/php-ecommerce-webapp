<?php
require "connection.php";
session_start();

if(isset($_GET["id"])){

    $email = $_SESSION["usr"]["email"];
    $cid = $_GET["id"];


    Database::iud("INSERT INTO `recent`(`product_id`,`user_email`) VALUES ('".$cid."','".$email."')");
    Database::iud("DELETE FROM `cart` WHERE `product_id`='".$cid."' AND `user_email`='".$email."' ");

    echo("1");

}else{
    echo("Something Went Wrong");
}

?>