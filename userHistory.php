 
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
<body class="shop_page">
    <!-- <div id="ec-overlay"><span class="loader_img"></span></div> -->

    <?php include "header.php";?>


     
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">User History</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="ec-breadcrumb-item active">History</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- User history section -->
    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-vendor-block">
                                <div class="ec-vendor-block-items">
                                    <ul>
                                        <li><a href="userProfile.php">User Profile</a></li>
                                        <li><a href="userHistory.php">History</a></li>
                                        <li><a href="wishlist.php">Wishlist</a></li>
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
                    <div class="ec-vendor-dashboard-card">
                        <div class="ec-vendor-card-header">
                            <h5>Product History</h5>
                            <div class="ec-header-btn">
                                <a class="btn btn-lg btn-primary" href="#">Shop Now</a>
                            </div>
                        </div>
                        <div class="ec-vendor-card-body">
                            <div class="ec-vendor-card-table">
                                <table class="table ec-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><span>225</span></th>
                                            <td><img class="prod-img" src="assets/images/product-image/1.jpg"
                                                    alt="product image"></td>
                                            <td><span>Stylish baby shoes</span></td>
                                            <td><span>16 Jul 2021</span></td>
                                            <td><span>$65</span></td>
                                            <td><span>Active</span></td>
                                            <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                        href="#">View</a></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>548</span></th>
                                            <td><img class="prod-img" src="assets/images/product-image/2.jpg"
                                                    alt="product image"></td>
                                            <td><span>Sweat Pullover Hoodie</span></td>
                                            <td><span>13 Aug 2016</span></td>
                                            <td><span>$68</span></td>
                                            <td><span>On Hold</span></td>
                                            <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                        href="#">View</a></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>684</span></th>
                                            <td><img class="prod-img" src="assets/images/product-image/3.jpg"
                                                    alt="product image"></td>
                                            <td><span>T-shirt for girl</span></td>
                                            <td><span>20 Jul 2015</span></td>
                                            <td><span>$360</span></td>
                                            <td><span>On Hold</span></td>
                                            <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                        href="#">View</a></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>987</span></th>
                                            <td><img class="prod-img" src="assets/images/product-image/4.jpg"
                                                    alt="product image"></td>
                                            <td><span>Wool hat for men</span></td>
                                            <td><span>05 Feb 2014</span></td>
                                            <td><span>$584</span></td>
                                            <td><span>On Hold</span></td>
                                            <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                        href="#">View</a></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>225</span></th>
                                            <td><img class="prod-img" src="assets/images/product-image/5.jpg"
                                                    alt="product image"></td>
                                            <td><span>Women leather purse</span></td>
                                            <td><span>23 Jul 2013</span></td>
                                            <td><span>$65</span></td>
                                            <td><span>On Hold</span></td>
                                            <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                        href="#">View</a></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>548</span></th>
                                            <td><img class="prod-img" src="assets/images/product-image/6.jpg"
                                                    alt="product image"></td>
                                            <td><span>Doctor kit toy</span></td>
                                            <td><span>28 Mar 2011</span></td>
                                            <td><span>$68</span></td>
                                            <td><span>Disabled</span></td>
                                            <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                        href="#">View</a></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>684</span></th>
                                            <td><img class="prod-img" src="assets/images/product-image/7.jpg"
                                                    alt="product image"></td>
                                            <td><span>Teddy bear for baby</span></td>
                                            <td><span>16 Apr 2010</span></td>
                                            <td><span>$360</span></td>
                                            <td><span>On Hold</span></td>
                                            <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                        href="#">View</a></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End User history section -->


    <?php include "footer.php" ?>
    
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
    <script src="assets/js/main.js"></script>

</body>

</html>