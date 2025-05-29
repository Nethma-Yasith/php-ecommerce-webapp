<?php
require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Lubove - Register</title>
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
    <link rel="stylesheet" href="bootstrap.css" />

    <!-- Main Style -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="assets/css/backgrounds/bg-4.css">

</head>

<body>



    <!-- Start Register -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">

                    <div class="section-title">
                        <div class="col-12 logo"></div>
                        <h2 class="ec-bg-title">Register</h2>
                        <h2 class="ec-title">Register</h2>
                        <p class="sub-title mb-3">Best place to buy and sell digital products</p>
                    </div>
                </div>
                <div class="ec-register-wrapper">
                    <div class="ec-register-container">
                        <div class="ec-register-form">
                            <div class="row">

                                <span class="ec-register-wrap ec-register-half  ">
                                    <label>First Name*</label>
                                    <input type="text" placeholder="Enter your first name" id="f" />
                                </span>


                                <span class="ec-register-wrap ec-register-half">
                                    <label>Last Name*</label>
                                    <input type="text" placeholder="Enter your last name" id="l" />
                                </span>

                                <span class="ec-register-wrap ec-register-half">
                                    <label>Email*</label>
                                    <input type="email" placeholder="Enter your email add..." id="e" />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Phone Number*</label>
                                    <input type="text" placeholder="Enter your phone number" id="m" />
                                </span>

                                <span class="ec-register-wrap ec-register-half">
                                    <label>Password*</label>
                                    <input type="password" placeholder="Enter your Password" id="p" />
                                </span>

                                <span class="ec-register-wrap ec-register-half">
                                    <label>Gender *</label>
                                    <span class="ec-rg-select-inner">
                                        <select name="ec_select_Gender" id="g" class="ec-register-select">

                                            <?php
                                            $rs = Database::search("SELECT * FROM `gender`");
                                            $n = $rs->num_rows;

                                            for ($x; $x < $n; $x++) {
                                                $d = $rs->fetch_assoc();


                                            ?>

                                                <option value="<?php echo $d["id"]; ?>"><?php echo $d["gender_name"]; ?></option>

                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </span>
                                </span>

                                <!-- <div class="row justify-content-center "> -->
                                    <diV class="col-12 col-lg-12  justify-content-end">
                                        <span class="ec-register-wrap ec-register-btn mt-2 justify-content-end ">
                                            <button class="btn btn-primary" onclick="register();">Register</button>
                                            <button class="btn btn-secondary" onclick="window.location='signin.php';">Sign In</button>
                                        </span>
                                    </diV>
                                    
                                    <!-- <div class="col-12 col-lg-12 justify-content-lg-start">
                                        <span class="ec-register-wrap ec-register-btn mt-2 ">
                                            <button class="btn btn-secondary" onclick="window.location='login.php';">Log In</button>
                                        </span>
                                    </div> -->
                                    
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- End Register -->


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

    <script src="assets/js/vendor/index.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="script.js"></script>

</body>

</html>