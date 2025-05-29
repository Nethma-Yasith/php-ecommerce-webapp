 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="x-ua-compatible" content="ie=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

     <title>Ekka - Ecommerce HTML Template.</title>
     <meta name="keywords" content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
     <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
     <meta name="author" content="ashishmaraviya">

     <!-- site Favicon -->
     <link rel="icon" href="assets/images/favicon/favicon.png" sizes="32x32" />
     <link rel="apple-touch-icon" href="assets/images/favicon/favicon.png" />
     <meta name="msapplication-TileImage" content="assets/images/favicon/favicon.png" />

     <!-- css Icon Font -->
     <link rel="stylesheet" href="assets/css/vendor/ecicons.min.css" />

     <!-- css All Plugins Files -->
     <link rel="stylesheet" href="assets/css/plugins/animate.css" />
     <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
     <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
     <link rel="stylesheet" href="assets/css/plugins/countdownTimer.css" />
     <link rel="stylesheet" href="assets/css/plugins/slick.min.css" />
     <link rel="stylesheet" href="assets/css/plugins/nouislider.css" />
     <link rel="stylesheet" href="assets/css/plugins/bootstrap.css" />

     <!-- Main Style -->
     <link rel="stylesheet" href="assets/css/style.css" />
     <link rel="stylesheet" href="assets/css/responsive.css" />

     <!-- Background css -->
     <link rel="stylesheet" id="bg-switcher-css" href="assets/css/backgrounds/bg-4.css">

 </head>

 <body class="cart_page">




     <?php include "header.php";
        if (isset($_SESSION["usr"])) {

            $email = $_SESSION["usr"]["email"];
            $total = 0;
            $subtotal = 0;
            $shiping = 0;

        ?>


         <!-- Ec breadcrumb start -->
         <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="row ec_breadcrumb_inner">
                             <div class="col-md-6 col-sm-12">
                                 <h2 class="ec-breadcrumb-title">Cart</h2>
                             </div>
                             <div class="col-md-6 col-sm-12">
                                 <!-- ec-breadcrumb-list start -->
                                 <ul class="ec-breadcrumb-list">
                                     <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                     <li class="ec-breadcrumb-item active">Cart</li>
                                 </ul>
                                 <!-- ec-breadcrumb-list end -->
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Ec breadcrumb end -->

         <!-- Ec cart page -->
         <section class="ec-page-content section-space-p">
             <div class="container">
                 <div class="row">

                     <?php

                        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "'");
                        $cart_num = $cart_rs->num_rows;

                        if ($cart_num == 0) {
                        ?>

                         <div class=" col-12 justify-content-center   vh-100" style="background-color:green;">
                             <h4 class="ec-ship-title justify-content-center align align-items-center">Empty Cart</h4>
                             <button class="btn btn-warning">Check Out</button>
                         </div>

                     <?php
                        } else {
                        ?>

                         <div class="ec-cart-leftside col-lg-8 col-md-12 ">
                             <!-- cart content Start -->
                             <div class="ec-cart-content">
                                 <div class="ec-cart-inner">
                                     <div class="row">
                                         <!-- <form action="#"> -->
                                         <?php

                                            for ($x = 0; $x < $cart_num; $x++) {
                                                $cart_data = $cart_rs->fetch_assoc();
                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cart_data["product_id"] . "'");
                                                $product_data = $product_rs->fetch_assoc();

                                                $total = $total + ($product_data["price"] * $cart_data["qty"]);

                                                $address_rs = Database::search("SELECT district.id AS did FROM `user_has_address` INNER JOIN `city` ON 
                                                user_has_address.city_id = city.id INNER JOIN `district` ON city.district_id=district.id WHERE
                                                `user_email` = '" . $email . "'");

                                                $address_data = $address_rs->fetch_assoc();
                                                $ship = 0;

                                                if ($address_data["did"] == 5) {
                                                    $ship = $product_data["delivery_fee_colombo"];
                                                    $shiping = $shiping + $ship;
                                                } else {
                                                    $ship = $product_data["delivery_fee_other"];
                                                    $shiping = $shiping + $ship;
                                                }

                                                // $seller_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $product_data["user_email"] . "'");
                                                // $seller_data = $seller_rs->fetch_assoc();
                                                // $seller_name = $seller_data["fname"] . " " . $seller_data["lname"];

                                            ?>



                                             <div class="table-content cart-table-content">
                                                 <table>
                                                     <thead>
                                                         <tr>
                                                             <th>Product</th>
                                                             <th>Price</th>
                                                             <th style="text-align: center;">Quantity</th>
                                                             <th>Total</th>
                                                             <th></th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         <?php

                                                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product_data["id"] . "' ");
                                                            $image_num = $image_rs->num_rows;
                                                            $image_data = $image_rs->fetch_assoc();

                                                            ?>

                                                         <tr>
                                                             <td data-label="Product" class="ec-cart-pro-name"><a href="product-left-sidebar.html"><img class="ec-cart-pro-img mr-4" src="<?php echo $image_data["code"] ?>" /><?php echo $product_data["title"]; ?></a></td>
                                                             <td data-label="Price" class="ec-cart-pro-price"><span class="amount">Rs. <?php echo $product_data["price"]; ?> .00</span></td>
                                                             <td data-label="Quantity" class="ec-cart-pro-qty" style="text-align: center;">
                                                                 <div class="cart-qty-plus-minus">
                                                                     <input class="cart-plus-minus" type="number"  value="<?php echo $cart_data["qty"]; ?>" />
                                                                 </div>
                                                             </td>
                                                             <td data-label="Total" class="ec-cart-pro-subtotal">Rs.<?php echo ($product_data["price"] * $cart_data["qty"]) ?>.00</td>
                                                             <td data-label="Remove" class="ec-cart-pro-remove">
                                                                 <a onclick="delete_fromCart(<?php echo $cart_data['id']; ?>);"><i class="ecicon eci-trash-o"></i></a>
                                                             </td>
                                                         </tr>

                                                     </tbody>
                                                 </table>
                                             </div>

                                             <?php
                                            }

                                            ?>
                                             <div class="row">
                                                 <div class="col-lg-12">
                                                     <div class="ec-cart-update-bottom">
                                                         <a href="#">Continue Shopping</a>
                                                         <button class="btn btn-primary">Check Out</button>
                                                     </div>
                                                 </div>
                                             </div>

                                         
                                         <!-- </form> -->
                                     </div>
                                 </div>
                             </div>
                             <!--cart content End -->
                         </div>
                         <!-- Sidebar Area Start -->
                         <div class="ec-cart-rightside col-lg-4 col-md-12">
                             <div class="ec-sidebar-wrap">
                                 <!-- Sidebar Summary Block -->
                                 <div class="ec-sidebar-block">
                                     <div class="ec-sb-title">
                                         <h3 class="ec-sidebar-title">Summary ( <?php echo $cart_num; ?> ) items</h3>
                                     </div>
                                     <div class="ec-sb-block-content">
                                         <h4 class="ec-ship-title">Estimate Shipping</h4>

                                     </div>

                                     <div class="ec-sb-block-content">
                                         <div class="ec-cart-summary-bottom">
                                             <div class="ec-cart-summary">
                                                 <div>
                                                     <span class="text-left">Sub-Total</span>
                                                     <span class="text-right">Rs. <?php echo $total; ?> .00</span>
                                                 </div>
                                                 <div>
                                                     <span class="text-left">Delivery Charges</span>
                                                     <span class="text-right">Rs. <?php echo $shiping; ?> .00</span>
                                                 </div>
                                                 <div>
                                                     <span class="text-left">Coupan Discount</span>
                                                     <span class="text-right"><a class="ec-cart-coupan">Apply Coupan</a></span>
                                                 </div>
                                                 <div class="ec-cart-coupan-content">
                                                     <form class="ec-cart-coupan-form" name="ec-cart-coupan-form" method="post" action="#">
                                                         <input class="ec-coupan" type="text" required="" placeholder="Enter Your Coupan Code" name="ec-coupan" value="">
                                                         <button class="ec-coupan-btn button btn-primary" type="submit" name="subscribe" value="">Apply</button>
                                                     </form>
                                                 </div>
                                                 <div class="ec-cart-summary-total">
                                                     <span class="text-left">Total Amount</span>
                                                     <span class="text-right">Rs. <?php echo ($shiping + $total); ?> .00</span>
                                                 </div>
                                             </div>

                                         </div>
                                     </div>
                                 </div>
                                 <!-- Sidebar Summary Block -->
                             </div>
                         </div>
                     <?php
                        }

                        ?>
                 </div>
             </div>
         </section>

     <?php

        } else {
            echo ("Please Sign In or Register");
        }
        ?>

     <?php include "footer.php" ?>

     <!-- Vendor JS -->
     <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
     <script src="assets/js/vendor/popper.min.js"></script>
     <script src="assets/js/vendor/bootstrap.min.js"></script>
     <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
     <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>

     <!--Plugins JS-->
     <script src="assets/js/plugins/swiper-bundle.min.js"></script>
     <script src="assets/js/plugins/countdownTimer.min.js"></script>
     <script src="assets/js/plugins/scrollup.js"></script>
     <script src="assets/js/plugins/jquery.zoom.min.js"></script>
     <script src="assets/js/plugins/slick.min.js"></script>
     <script src="assets/js/plugins/infiniteslidev2.js"></script>
     <script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
     <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
     <!-- Google translate Js -->
     <script src="assets/js/vendor/google-translate.js"></script>

     <!-- Main Js -->
     <script src="script.js"></script>
     <script src="assets/js/vendor/index.js"></script>
     <script src="assets/js/main.js"></script>

 </body>

 </html>