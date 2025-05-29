<?php
 
session_start();

if (isset($_SESSION["usr"])) {
    $_SESSION["usr"] = null;
    session_destroy();
    echo ("success");
}
?>