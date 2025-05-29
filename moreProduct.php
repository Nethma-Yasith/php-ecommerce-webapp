<?php

require "connection.php";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Ekka - Ecommerce HTML Template.</title>


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
    <div id="ec-overlay"><span class="loader_img"></span></div>

    <?php include "header.php"; ?>




    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Shop</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="ec-breadcrumb-item active">Shop</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec Shop page -->
    <section class="ec-page-content ">
        <div class="container">
            <div class="row">
                <div class="ec-shop-rightside col-lg-9 col-md-12 order-lg-last order-md-first margin-b-30">
                    <!-- Shop Top Start -->
                    <div class="ec-pro-list-top d-flex">
                        <div class="col-md-6 ec-grid-list">
                            <div class="row ec-gl-btn">
                                <!-- <button class="btn btn-grid active"><img src="assets/images/icons/grid.svg" class="svg_img gl_svg" alt="" /></button> -->
                                <!-- <button class="btn btn-list"><img src="assets/images/icons/list.svg" class="svg_img gl_svg" alt="" /></button> -->
                                <!-- <input type="text" class="form-control ms-4" aria-label="Text input with dropdown button" id="basic_search_text"> -->
                            </div>

                            <div class="align-self-center">
                                <div class="header-search">

                                    <input class="form-control ec-search-bar" placeholder="Search products..." type="text" id="basic_search_text">
                                    <button class="submit" type="submit" onclick="basicSearch(0);"><img src="assets/images/icons/search.svg" class="svg_img header_svg" alt="" /></button>

                                </div>
                            </div>


                        </div>

                        <div class="col-md-6 ec-sort-select ">
                            <span class="sort-by">Select</span>
                            <div class="ec-select-inner me-4">
                                <select name="ec-select" id="basic_search_select">
                                    <option selected disabled>Category</option>
                                    <?php
                                     
                                    $category_rs = Database::search("SELECT * FROM `category`");
                                    $category_num = $category_rs->num_rows;

                                    for ($x = 0; $x < $category_num; $x++) {
                                        $category_data = $category_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($category_data["id"]); ?>"><?php echo ($category_data["name"]); ?></option>
                                    <?php
                                    }
                                    ?>
                                    <!-- <option value="1">Relevance</option>
                                    <option value="2">Name, A to Z</option>
                                    <option value="3">Name, Z to A</option>
                                    <option value="4">Price, low to high</option>
                                    <option value="5">Price, high to low</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Top End -->


                    <!-- Shop content Start -->
                    <div class="row" id="basicSearchResult">
                        <div class="shop-pro-content">
                            <div class="shop-pro-inner">
                                <div class="row">

                                    <?php

                                    $c_rs = Database::search("SELECT * FROM `category`");
                                    $c_num = $c_rs->num_rows;

                                    for ($y = 0; $y < $c_num; $y++) {
                                        $cdata = $c_rs->fetch_assoc();

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $cdata["id"] . "' AND `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");
                                        $product_num = $product_rs->num_rows;

                                        for ($z = 0; $z < $product_num; $z++) {
                                            $product_data = $product_rs->fetch_assoc();

                                    ?>


                                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content ">

                                                <?php

                                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product_data["id"] . "'");
                                                $image_data = $image_rs->fetch_assoc();

                                                ?>

                                                <?php

                                                if ($product_data["qty"] > 0) {


                                                ?>

                                                    <div class="ec-product-inner">
                                                        <div class="ec-pro-image-outer">
                                                            <div class="ec-pro-image ">


                                                                <a href='<?php echo "singleProduct.php?id=" . $product_data["id"]; ?>'>
                                                                    <!-- <a href="singleProduct.php" class="image"> -->
                                                                    <img class="main-image" src="<?php echo $image_data["code"]; ?>" alt="Product" />
                                                                    <!-- <img class="hover-image" src="assets/images/product-image/7_2.jpg" alt="Product" /> -->
                                                                    <!-- </a> -->
                                                                </a>

                                                                <span class="flags">
                                                                    <span class="sale">Sale</span>
                                                                </span>
                                                                <!-- <a href="#" class="quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img src="assets/images/icons/quickview.svg" class="svg_img pro_svg" alt="" /></a> -->
                                                                <div class="ec-pro-actions">
                                                                    <!-- <a href="compare.html" class="ec-btn-group compare" title="Compare"><img src="assets/images/icons/compare.svg" class="svg_img pro_svg" alt="" /></a> -->
                                                                    <button title="Add To Cart" class=" add-to-cart" onclick="window.location='cart.php';"><img src="assets/images/icons/cart.svg" class="svg_img pro_svg" alt="" /> Add To Cart</button>
                                                                    <button class="ec-btn-group wishlist" title="Wishlist" onclick="window.location='cart.php';"><img src="assets/images/icons/wishlist.svg" class="svg_img pro_svg" alt="" /></button>
                                                                    <!-- <a  title="Wishlist"><img src="assets/images/icons/quickview.svg" class="svg_img pro_svg" alt="" /></a> -->
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
                                                <?php

                                                } else {
                                                ?>

                                                    <div class="ec-product-inner">
                                                        <div class="ec-pro-image-outer">
                                                            <div class="ec-pro-image ">


                                                                <a href='<?php echo "singleProduct.php?id=" . $product_data["id"]; ?>'>
                                                                    <a href="singleProduct.php" class="image">
                                                                    <img class="main-image" src="<?php echo $image_data["code"]; ?>" alt="Product" />
                                                                    <img class="hover-image" src="assets/images/product-image/7_2.jpg" alt="Product" />
                                                                    </a>
                                                                </a>

                                                                <span class="flags">
                                                                    <span class="sale">Sale</span>
                                                                </span>
                                                                <!-- <a href="#" class="quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img src="assets/images/icons/quickview.svg" class="svg_img pro_svg" alt="" /></a> -->
                                                                <div class="ec-pro-actions">
                                                                    <!-- <a href="compare.html" class="ec-btn-group compare" title="Compare"><img src="assets/images/icons/compare.svg" class="svg_img pro_svg" alt="" /></a> -->
                                                                    <!-- <button title="Add To Cart" class=" add-to-cart disabled" onclick="window.location='cart.php';"><img src="assets/images/icons/cart.svg" class="svg_img pro_svg" alt="" /> Add To Cart</button>
                                                                    <button class="ec-btn-group wishlist disabled" title="Wishlist" onclick="window.location='cart.php';"><img src="assets/images/icons/wishlist.svg" class="svg_img pro_svg" alt="" /></button> -->
                                                                    <!-- <a  title="Wishlist"><img src="assets/images/icons/quickview.svg" class="svg_img pro_svg" alt="" /></a> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ec-pro-content">
                                                            <h5 class="ec-pro-title disabled"><a href="moreProduct.php"><?php echo $product_data["title"]; ?></a></h5>
                                                            <div class="ec-pro-rating">
                                                                <i class="ecicon eci-star fill"></i>
                                                                <i class="ecicon eci-star fill"></i>
                                                                <i class="ecicon eci-star fill"></i>
                                                                <i class="ecicon eci-star fill"></i>
                                                                <i class="ecicon eci-star"></i>
                                                            </div>
                                                            <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
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

                                                <?php
                                                }
                                                ?>
                                            </div>

                                    <?php
                                        }
                                    }
                                    ?>




                                </div>
                            </div>
                            <!-- Ec Pagination Start -->
                            <div class="ec-pro-pagination">
                                <span>Showing 1-12 of 21 item(s)</span>
                                <ul class="ec-pro-pagination-inner">
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a class="next" href="#">Next <i class="ecicon eci-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <!-- Ec Pagination End -->
                        </div>
                    </div>
                    <!--Shop content End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside col-lg-3 col-md-12 order-lg-first order-md-last">
                    <div id="shop_sidebar">
                        <div class="ec-sidebar-heading">
                            <h1>Filter Products By</h1>
                        </div>
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Category Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Category</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <ul>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" checked /> <a href="#">clothes</a><span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" /> <a href="#">Bags</a><span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" /> <a href="#">Shoes</a><span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" /> <a href="#">cosmetics</a><span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" /> <a href="#">electrics</a><span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" /> <a href="#">phone</a><span class="checked"></span>
                                            </div>
                                        </li>
                                        <li id="ec-more-toggle-content" style="padding: 0; display: none;">
                                            <ul>
                                                <li>
                                                    <div class="ec-sidebar-block-item">
                                                        <input type="checkbox" /> <a href="#">Watch</a><span class="checked"></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="ec-sidebar-block-item">
                                                        <input type="checkbox" /> <a href="#">Cap</a><span class="checked"></span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item ec-more-toggle">
                                                <span class="checked"></span><span id="ec-more-toggle">More
                                                    Categories</span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar Size Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Size</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <ul>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value="" checked /><a href="#">S</a><span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value="" /><a href="#">M</a><span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value="" /> <a href="#">L</a><span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value="" /><a href="#">XL</a><span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" value="" /><a href="#">XXL</a><span class="checked"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar Color item -->
                            <!-- <div class="ec-sidebar-block ec-sidebar-block-clr">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Color</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <ul>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span style="background-color:#c4d6f9;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span style="background-color:#ff748b;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span style="background-color:#000000;"></span></div>
                                        </li>
                                        <li class="active">
                                            <div class="ec-sidebar-block-item"><span style="background-color:#2bff4a;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span style="background-color:#ff7c5e;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span style="background-color:#f155ff;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span style="background-color:#ffef00;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span style="background-color:#c89fff;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span style="background-color:#7bfffa;"></span></div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-block-item"><span style="background-color:#56ffc1;"></span></div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- Sidebar Price Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Price</h3>
                                </div>
                                <div class="ec-sb-block-content es-price-slider">
                                    <div class="ec-price-filter">
                                        <div id="ec-sliderPrice" class="filter__slider-price" data-min="0" data-max="250" data-step="10"></div>
                                        <div class="ec-price-input">
                                            <label class="filter__label"><input type="text" class="filter__input"></label>
                                            <span class="ec-price-divider"></span>
                                            <label class="filter__label"><input type="text" class="filter__input"></label>
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
    <!-- End Shop page -->


    <?php include "footer.php" ?>



    <!-- Vendor JS -->
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>

    <!--Plugins JS-->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/nouislider.js"></script>
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

    <script src="assets/js/main.js"></script>
    <script src="script.js"></script>

</body>

</html>