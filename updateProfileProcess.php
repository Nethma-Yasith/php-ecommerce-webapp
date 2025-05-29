<?php

session_start();

require "connection.php";

if (isset($_SESSION["usr"])) {

    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    $mobile = $_POST["m"];
    $address = $_POST["ad"];
    $province = $_POST["p"];
    $district = $_POST["d"];
    $city = $_POST["c"];
    


    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];

        if (!in_array($file_ex, $allowed_image_extentions)) {
            echo ("Please select a valid image");
        } else {
            $new_file_extention;
            if ($file_ex == "image/jpg") {
                $new_file_extention = ".jpg";
            } else if ($file_ex == "image/jpeg") {
                $new_file_extention = ".jpeg";
            } else if ($file_ex == "image/png") {
                $new_file_extention = ".png";
            } else if ($file_ex == "image/svg+xml") {
                $new_file_extention = ".svg";
            }

            $file_name = "assets/profile_image/" . $_SESSION["usr"]["fname"] . "_" . uniqid() . $new_file_extention;
            move_uploaded_file($image["tmp_name"], $file_name);

            $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $_SESSION["usr"]["email"] . "'");
            $image_num = $image_rs->num_rows;

            if ($image_num == 1) {
                Database::iud("UPDATE `profile_image` SET `path`='" . $file_name . "' WHERE `user_email` = '" . $_SESSION["usr"]["email"] . "'");
            } else {
                Database::iud("INSERT INTO `profile_image` (`path`,`user_email`) VALUES ('" . $file_name . "','" . $_SESSION["usr"]["email"] . "')");
            }
        }
    }

    Database::iud("UPDATE `user` SET `fname`='" . $fname . "' , `lname` = '" . $lname . "' , `mobile` = '" . $mobile . "' WHERE `email` = '" . $_SESSION["usr"]["email"] . "'");

    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $_SESSION["usr"]["email"] . "'");
    $address_num = $address_rs->num_rows;

    if ($address_num == 1) {
        Database::iud("UPDATE `user_has_address` SET `address`='" . $address . "' , `city_id`='" . $city . "' WHERE `user_email` = '" . $_SESSION["usr"]["email"] . "' ");
    } else {
        Database::iud("INSERT INTO `user_has_address` (`address`,`user_email`,`city_id`) VALUES ('" . $address . "', '" . $_SESSION["usr"]["email"] . "' ,'" . $city . "')");
    }

    
    echo ("success");
} else {
    echo ("Please login First");
}

?>