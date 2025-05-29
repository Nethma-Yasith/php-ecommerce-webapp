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
     <link rel="stylesheet" href="bootstrap.css" />
     <link rel="stylesheet" href="assets/css/style.css" />
     <link rel="stylesheet" href="assets/css/responsive.css" />

     <!-- Background css -->
     <link rel="stylesheet" id="bg-switcher-css" href="assets/css/backgrounds/bg-4.css">

 </head>

 <body class="shop_page">
     <!-- <div id="ec-overlay"><span class="loader_img"></span></div> -->
     <div>
         <?php include "header.php"; ?>


         <?php

            if (isset($_SESSION["usr"])) {

                $email = $_SESSION["usr"]["email"];

                $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON
                gender.id = user.gender_id WHERE `email`='" . $email . "'");

                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");

                $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON
                 user_has_address.city_id = city.id INNER JOIN `district` ON 
                 city.district_id = district.id INNER JOIN `province` ON
                 district.province_id = province.id WHERE `user_email`='" . $email . "'");

                $data = $details_rs->fetch_assoc();
                $image_data = $image_rs->fetch_assoc();
                $address_data = $address_rs->fetch_assoc();

            ?>



             <!-- Ec breadcrumb start -->
             <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
                 <div class="container">
                     <div class="row">
                         <div class="col-12">
                             <div class="row ec_breadcrumb_inner">
                                 <div class="col-md-6 col-sm-12">
                                     <h2 class="ec-breadcrumb-title">User Profile</h2>
                                 </div>
                                 <div class="col-md-6 col-sm-12">
                                     <!-- ec-breadcrumb-list start -->
                                     <ul class="ec-breadcrumb-list">
                                         <li class="ec-breadcrumb-item"><a href="index.php">Home</a></li>
                                         <li class="ec-breadcrumb-item active">Profile</li>
                                     </ul>
                                     <!-- ec-breadcrumb-list end -->
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- Ec breadcrumb end -->

             <!-- User profile section -->
             <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
                 <div class="container">
                     <div class="row">
                         <!-- Sidebar Area Start -->
                         <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                             <div class="ec-sidebar-wrap">
                                 <!-- Sidebar Category Block -->
                                 <div class="ec-sidebar-block">
                                     <div class="ec-vendor-block">
                                         <!-- <div class="ec-vendor-block-bg"></div>
                                    <div class="ec-vendor-block-detail">
                                        <img class="v-img" src="assets/images/user/1.jpg" alt="vendor image">
                                        <h5>Mariana Johns</h5>
                                    </div> -->
                                         <div class="ec-vendor-block-items">
                                             <ul>
                                                 <li>User Profile</li>
                                                 <li><a href="user-history.html">History</a></li>
                                                 <li><a href="wishlist.html">Wishlist</a></li>
                                                 <li><a href="cart.php">Cart</a></li>
                                                 <li><a href="checkout.html">Checkout</a></li>
                                                 <li><a href="track-order.html">Track Order</a></li>
                                                 <li><a href="user-invoice.html">Invoice</a></li>
                                             </ul>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="ec-shop-rightside col-lg-9 col-md-12">
                             <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                                 <div class="ec-vendor-card-body">
                                     <div class="row">
                                         <div class="col-md-12">
                                             <div class="ec-vendor-block-profile">
                                                 <div class="ec-vendor-block-img space-bottom-30">
                                                     <div class="ec-vendor-block-bg">
                                                         <a href="#" class="btn btn-lg btn-primary" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal">Edit Detail</a>
                                                     </div>
                                                     <div class="ec-vendor-block-detail">

                                                         <?php
                                                            if (!empty($image_data["path"])) {
                                                            ?>
                                                             <img class="v-img" src="<?php echo $image_data["path"]; ?>" id="viewImg">
                                                         <?php
                                                            } else {
                                                            ?>
                                                             <img class="v-img" src="assets/profile_image/default_user.svg" id="viewImg">
                                                         <?php
                                                            }
                                                            ?>
                                                         <h5 class="name"><?php echo $data["fname"] . " " . $data["lname"]; ?></h5>
                                                         <p>( User )</p>
                                                     </div>
                                                     <p>Hello <span><?php echo $data["fname"] . " " . $data["lname"]; ?>!</span></p>
                                                     <p>From your account you can easily view and track orders. You can manage and change your account information like address, contact information and history of orders.</p>
                                                 </div>
                                                 <h5>Account Information</h5>

                                                 <div class="row">
                                                     <div class="col-md-6 col-sm-12">
                                                         <div class="ec-vendor-detail-block ec-vendor-block-email space-bottom-30">
                                                             <h6>E-mail address <a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><img src="assets/images/icons/edit.svg" class="svg_img pro_svg" alt="edit" /></a></h6>
                                                             <ul>
                                                                 <li><strong>Email 1 : </strong><?php echo $data["email"]; ?></li>
                                                                 <!-- <li><strong>Email 2 : </strong>support2@exapmle.com</li> -->
                                                             </ul>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-sm-12">
                                                         <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                             <h6>Contact number<a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><img src="assets/images/icons/edit.svg" class="svg_img pro_svg" alt="edit" /></a></h6>
                                                             <ul>
                                                                 <li><strong>Phone Number 1 : </strong><?php echo $data["mobile"]; ?></li>
                                                                 <!-- <li><strong>Phone Nubmer 2 : </strong>(123) 123 456 7890</li> -->
                                                             </ul>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-sm-12">
                                                         <div class="ec-vendor-detail-block ec-vendor-block-address mar-b-30">
                                                             <h6>Address<a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><img src="assets/images/icons/edit.svg" class="svg_img pro_svg" alt="edit" /></a></h6>
                                                             <ul>
                                                                 <?php
                                                                    if (!empty($address_data["address"])) {
                                                                    ?>
                                                                     <li><strong>Home : </strong><?php echo $address_data["address"]; ?></li>
                                                                 <?php
                                                                    } else {
                                                                    ?>
                                                                     <li><strong>Home : </strong>Please Update Youer Shiping Address</li>
                                                                 <?php
                                                                    }
                                                                    ?>
                                                             </ul>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6 col-sm-12">
                                                         <div class="ec-vendor-detail-block ec-vendor-block-address mar-b-30">
                                                             <h6>Registerd Date<a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><img src="assets/images/icons/edit.svg" class="svg_img pro_svg" alt="edit" /></a></h6>
                                                             <ul>
                                                                 <li><strong>Your joined date : </strong><?php echo $data["joined_date"]; ?></li>
                                                             </ul>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
             <!-- End User profile section -->


             <!-- Modal -->
             <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-body">
                             <div class="row">
                                 <div class="ec-vendor-block-img space-bottom-30">
                                     <div class="ec-vendor-block-bg cover-upload">
                                         <div class="thumb-upload">
                                             <div class="thumb-edit">
                                                 <input type='file' id="thumbUpload01" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                                 <label><img src="assets/images/icons/edit.svg" class="svg_img header_svg" alt="edit" /></label>
                                             </div>
                                             <div class="thumb-preview ec-preview">
                                                 <div class="image-thumb-preview">
                                                     <img class="image-thumb-preview ec-image-preview v-img" src="assets/images/banner/8.jpg" alt="edit" />
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="ec-vendor-block-detail">
                                         <div class="thumb-upload">
                                             <div class="thumb-edit">
                                                 <input type="file" id="profileimg" class="ec-image-upload" accept="image/*" />
                                                 <label for="profileimg" onclick="changeImage();"><img src="assets/images/icons/edit.svg" class="svg_img header_svg" alt="edit" /></label>
                                             </div>
                                             <div class="thumb-preview ec-preview">
                                                 <div class="image-thumb-preview">
                                                     <?php
                                                        if (!empty($image_data["path"])) {
                                                        ?>
                                                         <img class="image-thumb-preview ec-image-preview v-img" src="<?php echo $image_data["path"]; ?>" id="viewImg" />
                                                     <?php
                                                        } else {
                                                        ?>
                                                         <img class="image-thumb-preview ec-image-preview v-img" src="assets/profile_image/default_user.svg" id="viewImg" />
                                                     <?php
                                                        }
                                                        ?>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="ec-vendor-upload-detail">
                                         <form class="row g-3">
                                             <div class="col-md-6 space-t-15">
                                                 <label class="form-label">First name</label>
                                                 <input type="text" class="form-control" value="<?php echo $data["fname"]; ?>" id="fname">
                                             </div>
                                             <div class="col-md-6 space-t-15">
                                                 <label class="form-label">Last name</label>
                                                 <input type="text" class="form-control" value="<?php echo $data["lname"]; ?>" id="lname">
                                             </div>
                                             <div class="col-md-6 space-t-15">
                                                 <label class="form-label">Mobile Number</label>
                                                 <input type="text" class="form-control" value="<?php echo $data["mobile"]; ?>" id="mobile">
                                             </div>
                                             <div class="col-md-6 space-t-15">
                                                 <label class="form-label">Email</label>
                                                 <input type="text" class="form-control" readonly value="<?php echo $data["email"]; ?>">
                                             </div>
                                             <?php

                                                if (!empty($address_data["address"])) {
                                                ?>

                                                 <div class="col-md-12 space-t-15">
                                                     <label class="form-label">Shiping Address </label>
                                                     <input type="text" class="form-control" value="<?php echo $address_data["address"]; ?>" id="address">
                                                 </div>

                                             <?php
                                                } else {
                                                ?>

                                                 <div class="col-md-12 space-t-15">
                                                     <label class="form-label">Shiping Address </label>
                                                     <input type="text" class="form-control" id="address">
                                                 </div>

                                             <?php
                                                }

                                                $province_rs = Database::search("SELECT * FROM `province`");
                                                $district_rs = Database::search("SELECT * FROM `district`");
                                                $city_rs = Database::search("SELECT * FROM `city`");

                                                ?>



                                             <!-- province -->
                                             <div class="col-6 mt-3">
                                                 <label class="form-label">Province</label>
                                                 <select class="form-select" id="province">

                                                     <option value="0">Select Province</option>

                                                     <?php

                                                        $province_num = $province_rs->num_rows;

                                                        for ($x = 0; $x < $province_num; $x++) {
                                                            $province_data = $province_rs->fetch_assoc();
                                                        ?>
                                                         <option value="<?php echo $province_data["id"]; ?>" <?php
                                                                                                                if (!empty($address_data["province_id"])) {
                                                                                                                    if ($province_data["id"] == $address_data["province_id"]) {
                                                                                                                ?>selected <?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                            ?>>
                                                             <?php echo $province_data["name"]; ?>
                                                         </option>
                                                     <?php
                                                        }
                                                        ?>

                                                 </select>
                                             </div>
                                             <!-- province -->



                                             <!-- district -->
                                             <div class="col-6 mt-3">
                                                 <label class="form-label">District</label>
                                                 <select class="form-select" id="district">

                                                     <option value="0">Select District</option>

                                                     <?php

                                                        $district_num = $district_rs->num_rows;

                                                        for ($x = 0; $x < $district_num; $x++) {
                                                            $district_data = $district_rs->fetch_assoc();
                                                        ?>
                                                         <option value="<?php echo $district_data["id"]; ?>" <?php
                                                                                                                if (!empty($address_data["district_id"])) {
                                                                                                                    if ($district_data["id"] == $address_data["district_id"]) {

                                                                                                                ?>selected <?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                            ?>>
                                                             <?php echo $district_data["name"]; ?>
                                                         </option>
                                                     <?php
                                                        }
                                                        ?>

                                                 </select>
                                             </div>
                                             <!-- district -->


                                             <!-- city -->
                                             <div class="col-12 mt-3">
                                                 <label class="form-label">City</label>
                                                 <select class="form-select" id="city">

                                                     <option value="0">Select City</option>

                                                     <?php

                                                        $city_num = $city_rs->num_rows;

                                                        for ($x = 0; $x < $city_num; $x++) {
                                                            $city_data = $city_rs->fetch_assoc();
                                                        ?>
                                                         <option value="<?php echo $city_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["city_id"])) {
                                                                                                                if ($city_data["id"] == $address_data["city_id"]) {
                                                                                                            ?>selected <?php
                                                                                                                    }
                                                                                                                }
                                                                                                                        ?>>
                                                             <?php echo $city_data["name"]; ?>
                                                         </option>
                                                     <?php
                                                        }
                                                        ?>

                                                 </select>
                                             </div>
                                             <!-- city -->



                                             <div class="col-md-12 space-t-15 mt-5">
                                                 <button type="submit" class="btn btn-primary" onclick="updateProfile();">Update</button>
                                                 <a href="#" class="btn btn-lg btn-secondary qty_close" data-bs-dismiss="modal" aria-label="Close">Close</a>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

            <?php

                } else {
                    // header("Location:signin.php");
                    // header("Refresh:0; url=signin.php");
                    echo '<script>
                    alert
                    window.location.href = "signin.php";
                    </script>';
                }
            ?>


         <?php include "footer.php" ?>
     </div>
     <!-- Modal end -->



     <!-- Vendor JS -->
     <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
     <script src="assets/js/vendor/popper.min.js"></script>
     <script src="assets/js/vendor/bootstrap.min.js"></script>
     <script src="assets/js/vendor/bootstrap-tagsinput.js"></script>
     <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
     <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
     <script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>

     <!--Plugins JS-->
     <script src="assets/js/plugins/swiper-bundle.min.js"></script>
     <script src="assets/js/plugins/nouislider.js"></script>
     <script src="assets/js/plugins/countdownTimer.min.js"></script>
     <script src="assets/js/plugins/scrollup.js"></script>
     <script src="assets/js/plugins/jquery.zoom.min.js"></script>
     <script src="assets/js/plugins/slick.min.js"></script>
     <script src="assets/js/plugins/infiniteslidev2.js"></script>
     <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
     <!-- Google translate Js -->
     <script src="assets/js/vendor/google-translate.js"></script>

     <!-- Main Js -->
     <script src="script.js"></script>
     <script src="assets/js/main.js"></script>


 </body>

 </html>