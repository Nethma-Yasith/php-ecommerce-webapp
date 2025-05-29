<?php

require "connection.php"

?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="x-ua-compatible" content="ie=edge" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

 <title>LUBOVE Login</title>
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
 <link rel="stylesheet" href="style.css" />
 <link rel="stylesheet" href="bootstrap.css" />
 <link rel="stylesheet" href="assets/css/style.css" />
 <link rel="stylesheet" href="assets/css/responsive.css" />

 <!-- Background css -->
 <link rel="stylesheet" id="bg-switcher-css" href="assets/css/backgrounds/bg-4.css">

</head>

<body>


 
  

 <!-- Ec login page -->
 <section class="ec-page-content section-space-p ">
     <div class="container" id="signInBox">
         <div class="row">
             <div class="col-md-12 text-center">
                 <div class="section-title">
                     <div class="col-12 logo"></div>
                     <h2 class="ec-bg-title">Sign In</h2>
                     <h2 class="ec-title">Sign In</h2>
                     <p class="sub-title mb-3">Best place to buy and sell digital products</p>
                 </div>
             </div>
             <div class="ec-login-wrapper col-12 col-lg-6">
                 <div class="ec-login-container ">
                     <div class="ec-login-form ">
                         <div class="row ">

                         
                             <span class="ec-login-wrap">
                                 <label>Email Address*</label>
                                 <input type="text" placeholder="Enter your email add..."/>

                             </span>
                             <span class="ec-login-wrap">
                                 <label>Password*</label>
                                 <input type="password" placeholder="Enter your password" />

                             </span>
                             <div class="row">
                                 <span class="ec-login-wrap ec-login-fp col-12 col-lg-6 d-flex justify-content-lg-start">
                                     <!-- <div class="row"> -->
                                     <label class="mt-3 px-2"><a href="#" data-bs-toggle="modal">Remember Me</a></label>
                                     <input type="checkbox" style="width: 15px;" id="rememberme"/>
                                     <!-- </div> -->
                                 </span>
                                 <span class="ec-login-wrap ec-login-fp col-12 col-lg-6 justify-content-end">
                                     <label class="mt-3 ms-2"><a href="#" data-bs-toggle="modal" onclick="forgotPassword();">Forgot Password?</a></label>
                                     <!-- <input type="checkbox" id="myCheck" onclick="myFunction()"> -->
                                 </span>

                             </div>
                             <span class="ec-login-wrap ec-login-btn">
                                 <button class="btn btn-primary" onclick="Signin();">Sign In</button>
                                 <!-- <button class="btn btn-secondary"  onclick="changeView();">Register</button> -->
                                 <a href="register.php" class="btn btn-secondary">Register</a>

                             </span>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

 <!-- Modal -->
 <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
             <div class="modal-body">
                 <div class="row">

                     <div class="ec-login-wrapper col-12 ">
                         <div class="ec-login-container ">
                             <div class="ec-login-form ">
                                 <div class="row ">



                                     <span class="ec-login-wrap col-12 col-lg-6 ">
                                         <label>New Password*</label>
                                         <input type="password" placeholder="Enter New Password" id="np" />
                                     </span>
                                     <span class="ec-login-wrap col-12 col-lg-6 ">
                                         <label>Re-type Password*</label>
                                         <input type="password" placeholder="Enter Re-type Password" id="rnp" />
                                     </span>

                                     <button class="btn btn-secondary" onclick="ShowPassword();" id="myButton1">Show</button>

                                     <span class="ec-login-wrap col-12">
                                         <label>Verification Code*</label>
                                         <input type="password" placeholder="Enter your Verification Code" id="vc" />
                                     </span>

                                     <span class="ec-login-wrap ec-login-btn">
                                         <button class="btn btn-primary" onclick="resetpw();">Reset</button>

                                     </span>

                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Modal end -->



 

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
 <script src="script2.js"></script>
 <script src="script.js"></script>
 <script src="assets/js/vendor/index.js"></script>
 <script src="assets/js/main.js"></script>

</body>

</html>