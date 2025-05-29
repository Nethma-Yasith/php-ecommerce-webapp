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
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

     <!-- Main Style -->
     <link rel="stylesheet" href="assets/css/style.css" />
     <link rel="stylesheet" href="assets/css/responsive.css" />

     <!-- Background css -->
     <link rel="stylesheet" id="bg-switcher-css" href="assets/css/backgrounds/bg-4.css">

 </head>

 <body class="compare_page">


     <?php include "header.php";
        if (isset($_SESSION["usr"])) {
        ?>



         <!-- Ec breadcrumb start -->
         <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="row ec_breadcrumb_inner">
                             <div class="col-md-6 col-sm-12">
                                 <h2 class="ec-breadcrumb-title">Wishlist</h2>
                             </div>
                             <div class="col-md-6 col-sm-12">
                                 <!-- ec-breadcrumb-list start -->
                                 <ul class="ec-breadcrumb-list">
                                     <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                     <li class="ec-breadcrumb-item active">Wishlist</li>
                                 </ul>
                                 <!-- ec-breadcrumb-list end -->
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Ec breadcrumb end -->

         <?php

            $user = $_SESSION["usr"]["email"];

            $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $user . "'");
            $watch_num = $watch_rs->num_rows;

            if ($watch_num == 0) {
            ?>


             <!-- emty view start -->
             <section class="ec-page-content section-space-p">
                 <div class="container">
                     <div class="row">

                         <div class="ec-wish-rightside col-lg-12 col-md-12 vh-100">

                         </div>

                     </div>
                 </div>
             </section>
             <!-- emty view end -->

         <?php
            } else {
            ?>

             <!-- Ec Wishlist page -->
             <section class="ec-page-content section-space-p">
                 <div class="container">
                     <div class="row">
                         <?php
                            for ($x = 0; $x < $watch_num; $x++) {
                                $watch_data = $watch_rs->fetch_assoc();
                            ?>
                             <!-- have products -->

                             <?php
                                $product_rs = Database::search("SELECT * FROM `product` WHERE product.id='" . $watch_data["product_id"] . "'");
                                $product_data = $product_rs->fetch_assoc();

                                $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $watch_data["product_id"] . "'");
                                $product_img_data = $product_img_rs->fetch_assoc();

                                ?>
                             <!-- Compare Content Start -->
                             <div class="ec-wish-rightside col-lg-12 col-md-12 ">
                                 <!-- Compare content Start -->
                                 <div class="ec-compare-content">
                                     <div class="ec-compare-inner">
                                         <div class="row margin-minus-b-30">

                                             <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-6 pro-gl-content ">
                                                 <div class="ec-product-inner">
                                                     <div class="ec-pro-image-outer">
                                                         <div class="ec-pro-image">


                                                             <a href='<?php echo "singleProduct.php?id=" . $product_data["id"]; ?>'>
                                                                 <!-- <a href="singleProduct.php" class="image"> -->
                                                                 <img class="main-image" src="<?php echo $product_img_data["code"]; ?>" alt="Product" />
                                                                 <!-- <img class="hover-image" src="assets/images/product-image/7_2.jpg" alt="Product" /> -->
                                                                 <!-- </a> -->
                                                             </a>
                                                              <button onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);' class=" ec-com-remove ec-remove-wish btn-success">X</button> 
                                                             <span class="flags">
                                                                 <!-- <span class="sale">Sale</span> -->
                                                             </span>
                                                             <!-- <a href="#" class="quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img src="assets/images/icons/quickview.svg" class="svg_img pro_svg" alt="" /></a> -->
                                                             <div class="ec-pro-actions">
                                                                 <!-- <a href="compare.html" class="ec-btn-group compare" title="Compare"><img src="assets/images/icons/compare.svg" class="svg_img pro_svg" alt="" /></a> -->
                                                                 <button title="Add To Cart" class=" add-to-cart" onclick="addToCart(<?php echo $product_data['id']; ?>)"><img src="assets/images/icons/cart.svg" class="svg_img pro_svg" alt="" /> Add To Cart</button>

                                                                 <?php


                                                                    $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "' AND `user_email`='" . $_SESSION["usr"]["email"] . "'");
                                                                    $watchlist_num = $watchlist_rs->num_rows;

                                                                    if ($watchlist_num == 1) {
                                                                    ?>

                                                                     <button class="ec-btn-group wishlist" title="Wishlist" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'><i class="bi bi-heart-fill text-danger fs-4" id='heart<?php echo $product_data["id"]; ?>'></i></button>
                                                                     <!-- <a  title="Wishlist"><img src="assets/images/icons/quickview.svg" class="svg_img pro_svg" alt="" /></a> -->
                                                                 <?php
                                                                    } else {
                                                                    ?>

                                                                     <button class="ec-btn-group wishlist" title="Wishlist" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'><i class="bi bi-heart-fill text-dark fs-4" id='heart<?php echo $product_data["id"]; ?>'></i></button>

                                                                 <?php
                                                                    }

                                                                    ?>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="ec-pro-content">
                                                         <h5 class="ec-pro-title"><a href="product-left-sidebar.html"><?php echo $product_data["title"]; ?></a></h5>
                                                         <div class="ec-pro-rating">
                                                             <i class="ecicon eci-star fill"></i>
                                                             <i class="ecicon eci-star fill"></i>
                                                             <i class="ecicon eci-star fill"></i>
                                                             <i class="ecicon eci-star fill"></i>
                                                             <i class="ecicon eci-star"></i>
                                                         </div>

                                                         <span class="ec-price">
                                                             <!-- <span class="old-price"> </span> -->
                                                             <span class="new-price">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                                         </span>
                                                         <div class="ec-pro-option">
                                                             <div class="ec-pro-color">
                                                                 <span class="ec-pro-opt-label">Color</span>
                                                                 <ul class=" disabled">
                                                                     <li class="deactive"><span style="background-color:<?php echo $product_data["color"]; ?>;"></span></a></li>
                                                                     <!-- <li><a href="#" class="ec-opt-clr-img" data-src="assets/images/product-image/7_2.jpg" data-src-hover="assets/images/product-image/7_2.jpg" data-tooltip="Orange"><span style="background-color:#b89df8;"></span></a></li> -->
                                                                 </ul>
                                                             </div>
                                                             <div class="ec-pro-size">
                                                                 <span class="ec-pro-opt-label">Size</span>
                                                                 <ul class="ec-opt-size">
                                                                     <li class="deactive"><a href="#" data-tooltip="Small">S</a></li>
                                                                 </ul>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>

                                             </div>



                                         </div>
                                     </div>
                                 </div>
                                 <!--compare content End -->
                             </div>
                             <!-- Compare Content end -->
                         <?php
                            }
                            ?>
                     </div>
                 </div>
             </section>
         <?php
            }

            ?>
     <?php

        } else {
            echo ("Please Login First");
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
     <script>
         function googleTranslateElementInit() {
             new google.translate.TranslateElement({
                 pageLanguage: 'en'
             }, 'google_translate_element');
         }
     </script>
     <!-- Main Js -->
     <script src="script.js"></script>
     <script src="assets/js/vendor/index.js"></script>
     <script src="assets/js/main.js"></script>

 </body>

 </html>