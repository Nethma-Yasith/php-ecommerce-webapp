<?php

require "connection.php";

// $email = $_SESSION["u"]["email"];
$size = $_POST["size"];
$category = $_POST["category"];
$title = $_POST["title"];
$detail = $_POST["detail"];
$color = $_POST["color"];
$cost = $_POST["price"];
$qty = $_POST["qty"];
$dwc = $_POST["dwc"];
$doc = $_POST["doc"];
$desc = $_POST["desc"];
 
// echo($size);
// echo($color);
 
if ($category == "0") {
    echo ("Please select a Category");
} else if (empty($title)) {
    echo ("Please Enter a Title");
} else if (strlen($title) >= 100) {
    echo ("Title should have lover than 100 characters");
} else if (empty($detail)) {
    echo ("Please Enter a Detail.");
} else if ($color == "#ff6191") {
    echo ("Please select a colour");
}else if (empty($size)) {
    echo ("Please select a Size");
}else if (empty($cost)) {
    echo ("Please Enter the Price.");
} else if (!is_numeric($cost)) {
    echo ("Invalid input for Cost");
} else if (empty($qty)) {
    echo ("Please Enter the Quantity.");
} else if ($qty == "0" | $qty == "e" | $qty < 0) {
    echo ("Invalid input for Quantity");
} else if (empty($dwc)) {
    echo ("Please Enter the delivery fee for Colombo.");
} else if (!is_numeric($dwc)) {
    echo ("Invalid input for delivery cost inside Colombo");
} else if (empty($doc)) {
    echo ("Please Enter the delivery fee for out of Colombo.");
} else if (!is_numeric($doc)) {
    echo ("Invalid input for delivery cost out of Colombo");
} else if (empty($desc)) {
    echo ("Please Enter a Description.");
} else {

    // $bhm_rs = Database::search("SELECT * FROM `product_has_size` WHERE `product_id` = '" . $brand . "' AND `modal_id`='" . $model . "'");

    // $brand_has_model_id;
    // if ($bhm_rs->num_rows == 1) {
    //     $bhm_data = $bhm_rs->fetch_assoc();
    //     $brand_has_model_id = $bhm_data["id"];
    // } else {
    //     Database::iud("INSERT INTO `brand_has_modal`(`brand_id`,`modal_id`) VALUES('" . $brand . "','" . $model . "')");
    //     $brand_has_model_id = Database::$connection->insert_id;
    // }

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $status = 1;

    Database::iud("INSERT INTO `product` (`category_id`, `price`, `qty`, `details`, `title`,`color`,`size`,`status_id`, `datetime_added`, `delivery_fee_colombo`, `delivery_fee_other`, `description`) 
    VALUES('".$category."','".$cost."','".$qty."','".$detail."','".$title."','".$color."','".$size."','".$status."','".$date."','".$dwc."','".$doc."','".$desc."')");

    

    $product_id = Database::$connection->insert_id;

    $length = sizeof($_FILES);
    if ($length <= 7 && $length > 0) {
        $allowed_img_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

        for ($x = 0; $x < $length; $x++) {
            if (isset($_FILES["image" . $x])) {

                $img_file = $_FILES["image" . $x];
                $file_extention = $img_file["type"];

                if (in_array($file_extention, $allowed_img_extentions)) {
                   
                    $new_img_extention;

                    if ($file_extention == "image/jpg") {
                        $new_img_extention = ".jpg";
                    } else if ($file_extention == "image/jpeg") {
                        $new_img_extention = ".jpeg";
                    } else if ($file_extention == "image/png") {
                        $new_img_extention = ".png";
                    } else if ($file_extention == "image/svg+xml") {
                        $new_img_extention = ".svg";
                    }

                    $file_name = "assets/product_images/".$title."_".$x."_".uniqid().$new_img_extention;
                    move_uploaded_file($img_file["tmp_name"],$file_name);

                    Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES ('".$file_name."','".$product_id."')");
                
                } else {
                    echo ("Invalid Image type");
                }
            }
        }

        echo("Product Images Saved Successfuly");
    } else {
        echo ("Invalid image Count");
    }

}
?>
