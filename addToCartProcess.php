<?php

session_start();

require "connection.php";

if (isset($_SESSION["usr"])) {

    if (isset($_GET["id"])) {
        $email = $_SESSION["usr"]["email"];
        $pid = $_GET["id"];
        Database::iud("INSERT INTO `cart` (`user_email`,`product_id`,`qty`) VALUES('" . $email . "','".$pid."','1')");
        echo ("1");
    }else{
        echo("3");
    }
} else {
    echo ("2");
}
