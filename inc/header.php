<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="template" content="">
    <meta name="title" content="">
    <meta name="keywords" content="">
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $meta_desc; ?>" />
    <link rel="icon" href="<?php echo SITE_URL ?>images/favicon-logo.jpg">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>css/main.css">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>css/index.css">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>css/faq.css">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>css/custom.css">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>css/alertify.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>css/product-details.css">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>css/checkout.css">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>css/privacy.css">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>css/contact.css">
    <link rel="stylesheet" href="https://cartvin.com/assets/slider/css/easyzoom.css" />
    <script src="<?php echo SITE_URL ?>js-2/jquery.min.js"></script>
    <style>
        .nav-dropdown-menu-body ul,
        .nav-dropdown-menu-body li {
            list-style: none;
            margin-right: 30px;
        }

        .nav-dropdown-reverse {
            left: auto !important;
            right: 100% !important;
        }

        @media (max-width: 500px) {
            .cf:after {
                clear: both;
                content: "";
                display: table;
            }

            .nav-dropdown-menu-body {
                margin: 0;
                padding: 0;
                width: 100%;
            }

            .nav-dropdown-menu-body ul,
            .nav-dropdown-menu-title-link,
            .nav-dropdown-menu-toggle,
            nav .nav-dropdown-menu-submenu {

                padding: 0;
            }

            .nav-dropdown-menu-dropicon-bottom {
                background-color: rgb(231, 231, 231);
                border-radius: 0.4rem;
                font-size: 1em;
                padding: 0.7em;
                position: absolute;
                right: 0;
                text-align: center;
                text-shadow: 0 0 0 transparent;
                top: 0;
            }

            .nav-dropdown-menu-main {
                margin: 0;
            }

            .nav-dropdown-menu-main a {
                color: #626262;
                display: block;
                line-height: 2.6em;
                padding: 0 10px;
            }



            .nav-dropdown-menu-main ul {
                box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.05);
            }

            .nav-dropdown-menu-submenu {
                margin: 0 20px;
            }

            .nav-dropdown-menu-submenu li {
                background-color: #fff;
                border-radius: 0.4rem;

            }

            .nav-dropdown-menu-submenu,
            .nav-dropdown-menu-text-after-icons+.nav-dropdown-menu-dropicon-bottom,
            .nav-dropdown-menu-main,
            nav input[type="checkbox"],
            .nav-dropdown-menu-dropicon-right {
                display: none;
            }


            .nav-dropdown-menu-title-link a {
                overflow: hidden;
                position: relative;
                text-decoration: none;
                transition: color 0.25s ease-out;
                font-weight: 500;
                color: #555;
            }

            .nav-dropdown-menu-title-link a::after {
                right: 50%;
                transform: translateX(50%);
            }

            .nav-dropdown-menu-title-link a::before {
                left: 50%;
                transform: translateX(-50%);
            }


            .nav-dropdown-menu-toggle-link {
                background: #555;
                padding: 0.5rem;
            }

            .nav-dropdown-menu-toggle-link a {
                color: #fff;
                text-decoration: none;
            }

            .nav-dropdown-menu-toggle-link label {
                color: #fff;
            }


            .nav-logo {
                padding: 10px;
            }

            body {
                background-color: rgb(248, 248, 248);
                font-family: Montserrat, Helvetica, Arial, sans-serif;
            }

            nav {
                align-content: center;
                align-items: center;
                display: flex;
                flex-flow: row wrap;
                justify-content: center;
            }

            nav i {
                padding: 5px;
            }

            nav input[type="checkbox"]:checked+.nav-dropdown-menu-submenu,
            nav input[type="checkbox"]:checked+.nav-dropdown-menu-main {
                display: block;
            }

            nav li,
            .nav-dropdown-menu-toggle {
                position: relative;
            }
        }

        @media (max-width: 665px) and (min-width: 501px) {
            .darkerli {
                background-color: #ededed;
                text-transform: capitalize;
            }

            .darkerlishadow,
            .nav-dropdown-menu-submenu ul li:first-child {
                background-color: #ededed;
                border-top: 1px solid #fff;
                box-shadow: inset 0 5px 0 0 rgba(90, 90, 90, 0.09);
            }

            .darkerlishadowdown,
            .nav-dropdown-menu-submenu ul li:last-child {
                background-color: #ededed;
            }

            .nav-dropdown-menu-dropicon-bottom {
                padding: 0.5em;
            }

            .nav-dropdown-menu-dropicon-right {
                background-color: #ddd;
                padding: 0.08px 10px;
            }

            .nav-dropdown-menu-dropicon-right,
            .nav-dropdown-menu-dropicon-bottom {
                position: absolute;
                right: 0;
                vertical-align: middle;
            }

            .nav-dropdown-menu-main {
                height: 100%;
                left: 0;
                margin: 0;
                overflow-x: hidden;
                overflow-y: hidden;
                padding: 0;
                position: absolute;
                top: 4.5em;
                vertical-align: middle;
                width: 100%;
            }

            .nav-dropdown-menu-main ul {
                margin: 0 15px;
            }

            .nav-dropdown-menu-main:hover {
                height: 100%;
                overflow-x: hidden;
                overflow-y: scroll;
                width: 400px;
            }

            .nav-dropdown-menu-main:hover .nav-dropdown-menu-dropicon-right {
                display: inline-block;
            }

            .nav-dropdown-menu-submenu a {
                display: block;
                line-height: 2em;
            }

            .nav-dropdown-menu-submenu ul li,
            .nav-dropdown-menu-submenu ul {
                padding-left: 5px;
            }

            .nav-dropdown-menu-submenu ul,
            .nav-dropdown-menu-submenu li,
            nav-dropdown-menu-body {
                margin: 0;
            }

            .nav-dropdown-menu-submenu,
            .nav-dropdown-menu-dropicon-right,
            .nav-dropdown-menu-toggle,
            .nav-dropdown-menu-toggle-link,
            li>label,
            nav input[type="checkbox"] {
                display: none;
            }

            nav {
                -moz-user-select: none;
                -ms-user-select: none;
                -o-user-select: none;
                -webkit-transform: translateZ(0) scale(1, 1);
                -webkit-transition: width 0.2s linear;
                -webkit-user-select: none;
                background: #f7f7f7;
                bottom: 0;
                box-shadow: 1px 0 15px rgba(0, 0, 0, 0.07);
                height: 100%;
                left: 0;
                opacity: 1;
                overflow: hidden;
                position: absolute;
                top: 0;
                transition: width 0.2s linear;
                user-select: none;
                width: 55px;
            }

            nav .nav-dropdown-menu-text-after-icons {
                background-color: #e6e6e6;
                display: table-cell;
                font-family: "Titillium Web", sans-serif;
                padding-left: 5px;
                position: relative;
                vertical-align: middle;
                width: 100%;
            }

            nav .nav-icon {
                display: table-cell;
                font-size: 18px;
                height: 36px;
                position: relative;
                text-align: center;
                vertical-align: middle;
                width: 55px;
            }

            nav i {
                font-size: 25px;
                list-style: none;
                padding: 5px 0;
                position: relative;
                text-align: center;
                width: 55px;
            }

            nav li>a {
                border-collapse: collapse;
                border-spacing: 0;
                color: #8a8a8a;
                display: table;
                margin-top: 3px;
                position: relative;
                text-decoration: none;
                text-shadow: 1px 1px 1px #fff;
                transition: all 0.14s linear;
                -webkit-transform: translateZ(0) scale(1, 1);
                -webkit-transition: all 0.14s linear;
            }

            nav li:focus-within>.nav-dropdown-menu-submenu {
                display: block;
            }

            nav li:focus-within>input[type="checkbox"] .nav-dropdown-menu-submenu {
                display: block;

            }

            .nav-dropdown-menu-title-link:hover>a i,
            .nav-dropdown-menu-submenu li:hover>a {

                text-shadow: 0 0 0;
            }

            .nav-dropdown-menu-submenu li:hover>a {
                padding-left: 10px;
            }

            nav:hover {
                opacity: 1;
                overflow: hidden;
                width: 400px;
            }
        }

        @media (min-width: 666px) {
            .cf:after {
                clear: both;
                content: "";
                display: table;
            }

            .nav-dropdown-menu,
            nav li:hover>input[type="checkbox"]+.nav-dropdown-menu-submenu {
                display: block;
            }

            .nav-dropdown-menu-body {
                flex-basis: 70vw;
                flex-grow: 1;
                order: 2;
            }

            .nav-dropdown-menu-body a {
                color: #626262;
            }



            .nav-dropdown-menu-body ul,
            .nav-dropdown-menu-title-link,
            .nav-dropdown-menu-toggle,
            nav .nav-dropdown-menu-submenu {

                padding: 0;
            }

            .nav-dropdown-menu-dropicon-right {
                display: inline-block;
                font-size: 1em;
                padding: 0.8em;
                text-align: center;
                text-shadow: 0 0 0 transparent;
            }

            .nav-dropdown-menu-dropicon-right,
            .nav-dropdown-menu-dropicon-bottom {
                border-radius: 0.4rem;
                padding: 0.8em 0.5em;
                position: absolute;
                right: 0;
                top: 0;
            }

            .nav-dropdown-menu-main {
                margin: 0;
            }

            .nav-dropdown-menu-main ul {
                box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.05);
            }

            .nav-dropdown-menu-submenu {
                margin: 0 20px;
            }

            .nav-dropdown-menu-submenu li {
                min-width: 180px;
                /* border-radius: 0.4rem; */
                padding: 8px 0;
                border-bottom: 1px solid #3169D8;
            }

            .nav-dropdown-menu-submenu,
            .nav-dropdown-menu-toggle-link,
            nav input[type="checkbox"],
            .nav-dropdown-menu-submenu .nav-dropdown-menu-dropicon-bottom {
                display: none;
                padding: 5px 10px;
                border-radius: 10px;
            }



            .nav-dropdown-menu-title-link a {
                overflow: hidden;
                position: relative;
                text-decoration: none;
                font-weight: 500;
                color: #555;
                transition: color 0.25s ease-out;
            }

            .nav-dropdown-menu-title-link a::after {
                right: 50%;
                transform: translateX(50%);
            }

            .nav-dropdown-menu-title-link a::before {
                left: 50%;
                transform: translateX(-50%);
            }

            .nav-dropdown-menu-title-link a:hover::before,
            .nav-dropdown-menu-title-link a:hover::after {

                transition-duration: 0.3s;
                width: 80%;
            }

            .nav-dropdown-menu-main a {
                padding: 0.8em 1.3em;
            }

            .nav-dropdown-menu-toggle:checked+.nav-dropdown-menu,
            nav li,
            .nav-dropdown-menu-toggle,
            nav a,
            nav input[type="checkbox"]:checked+.nav-dropdown-menu-submenu {
                display: block;
            }

            nav {
                align-content: center;
                align-items: center;
                display: flex;
                flex-flow: row wrap;
                justify-content: center;
            }

            nav .nav-dropdown-menu-submenu {
                margin: 0;
                position: absolute;
                top: 100%;
                background: #fff;
                padding: 4px 10px;
                z-index: 3000;
            }

            nav .nav-dropdown-menu-submenu .nav-dropdown-menu-submenu {
                left: 100%;
                right: auto;
                top: 0;
            }

            nav .nav-dropdown-menu-submenu,
            nav input[type="checkbox"]:checked+.nav-dropdown-menu-submenu,
            .nav-dropdown-menu-toggle {
                display: none;
            }

            nav i {
                padding: 5px;
            }

            nav li {
                float: left;
                position: relative;
            }
        }

        .custom-menu-link a {
            color: #555555;
        }

        .dropdown-account {
            position: relative;
        }

        .dropdown-links-content {
           text-align: left;
    position: absolute;
    background: #fff;
    display: none;
    z-index: 10;
    right: -20px;
    width: 166px;
    padding: 10px;
    margin: auto;
    border-radius: 5px;
    border: 1px solid #acacac;
        }

        .dropdown-account:hover .dropdown-links-content {
            display: block;
        }
    </style>
    <!-- Meta Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '637986161269419');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=637986161269419&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-L36HRMGPFF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-L36HRMGPFF');
</script>
</head>

<body>
    <div class="backdrop"></div><a class="backtop fas fa-arrow-up" href="#"></a>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <div class="header-top-welcome">
                        <p>Welcome to Enham In Your Dream Online Store</p>
                    </div>
                </div>
                <div class="col-md-5 col-lg-3">

                </div>
                <div class="col-md-7 col-lg-4">

                </div>
            </div>
        </div>
    </div>
    <header class="header-part">
        <div class="container">
            <div class="header-content">
                <div class="header-media-group">
                    <button class="header-user"><img src="<?php echo SITE_URL?>images/user.png" alt="user"></button>
                    <a href="<?php echo SITE_URL; ?>"><img src="<?php echo SITE_URL?>images/enham-logo.png" alt="logo"></a>
                    <button class="header-src"><i class="fas fa-search"></i></button>
                </div>
                <a href="<?php echo SITE_URL; ?>" class="header-logo"><img src="<?php echo SITE_URL?>images/enham-logo.png" alt="logo"></a>
                <?php
                if (isset($_SESSION['authenticated'])) {
                ?>
                    <div class="dropdown-account">
                        <a href="#" class="header-widget dropdown-toggle-1" title="Name">
                            <img src="<?php echo SITE_URL?>images/user.png" alt="user"><span><?php echo $_SESSION['auth_user']['username'] ?></span>

                        </a>
                        <div class="dropdown-links-content">
                            <p><a style="color:#000" href="<?php echo SITE_URL ?>my-account.php">My Account</a></p>
                            <form action="" style="margin:10px 0" method="POST">
                                <button type="submit" class="btn-logout" name="logout_btn">Logout</button>
                            </form>
                        </div>
                    </div>

                <?php
                } else {
                ?>
                    <a href="login.php" class="header-widget" title="Login Now">
                        <img src="<?php echo SITE_URL?>images/user.png" alt="user"><span>join</span>
                    </a>
                <?php
                }
                ?>

                <form action="search.php" class="header-form">
                    <input name="search" type="text" placeholder="Search anything...">
                    <button><i class="fas fa-search"></i></button>
                </form>
                <div class="header-widget-group">

                    <?php
                    $wishlist = new WishlistController;
                    if (isset($_SESSION['authenticated'])) {
                    $userid =  $_SESSION['auth_user']['user_id'];
                   
                    $totalwishlist = $wishlist->getitemsinwishlist( $_SESSION['auth_user']['user_id']);
                    if ($totalwishlist) {
                    ?>
                        <a href="wishlist.php" style="color:background: #3169d8; color: #fff;" class="header-widget" title="Wishlist"><i class="fas fa-heart"></i> <sup><?php echo $totalwishlist; ?></sup> </a>
                    <?php
                    } else {
                    ?>
                        <a href="wishlist.php" class="header-widget" title="Wishlist"><i class="fas fa-heart"></i> </a>
                    <?php
                    }
                }
                else{
                    ?>
                       <a href="wishlist.php" class="header-widget" title="Wishlist"><i class="fas fa-heart"></i> </a>
                    <?php
                }
                    if (isset($_SESSION["add-to-cart"])) {
                        $carttotal = 0;
                        foreach ($_SESSION["add-to-cart"] as $key => $cart) {
                            $carttotal = $carttotal + ($cart['prod_quant'] * $cart['price']);
                        }
                    ?>
                        <a href="<?php echo SITE_URL?>cart.php" class="header-widget header-cart" title="Cartlist"><i class="fas fa-shopping-basket"></i><sup id="cart_qnt"><?php echo count($_SESSION["add-to-cart"]) ?></sup><span>total
                                price<small id="cart_tot">&#8377;<?php echo $carttotal ?> </small></span></a>

                    <?php

                    } else {
                    ?>
                        <a href="<?php echo SITE_URL?>cart.php" class="header-widget header-cart" title="Cartlist"><i class="fas fa-shopping-basket"></i><sup id="cart_qnt">0</sup><span>total
                                price<small id="cart_tot">₹0</small></span></a>
                    <?php
                    }

                    ?>

                </div>
            </div>
        </div>
    </header>
    <nav class="navbar-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar-content">
                        <ul class="navbar-list">
                            <li class="navbar-item dropdown"><a class="navbar-link" href="<?php echo SITE_URL; ?>">home</a>

                            </li>
                            <li class="navbar-item dropdown">
                                <ul class="nav-dropdown-menu-body">
                                    <?php
                                    $getcategory_header = new CategoryController;
                                    $getcategory_all_header = $getcategory_header->getCategory();
                                    if ($getcategory_all_header) {
                                        foreach ($getcategory_all_header as $categoriesheaders) {
                                    ?>
                                            <li class="nav-dropdown-menu-title-link darkerli">
                                                <a href="<?php echo SITE_URL ?>category/<?php echo $categoriesheaders['cat_url']; ?>"><span class="nav-dropdown-menu-text-after-icons"><?php echo $categoriesheaders['cat_name'] ?>
                                                    </span>
                                                    <span class="nav-dropdown-menu-dropicon-bottom"></span>
                                                </a>
                                                <label title="Toggle Drop-down" class="nav-dropdown-menu-dropicon-bottom" for="sm04"></label>

                                                <input type="checkbox" id="sm04" />

                                                <?php
                                                $getallSubcategoryheader = $getcategory_header->getheadersubCategory($categoriesheaders['id']);
                                                if ($getallSubcategoryheader) {
                                                ?>
                                                    <ul class="nav-dropdown-menu-submenu">
                                                        <?php
                                                        foreach ($getallSubcategoryheader as $headsubcategories) {
                                                        ?>
                                                            <li>
                                                                <a href="<?php echo SITE_URL?>subcategory/<?php echo $headsubcategories['url'] ?>"><?php echo $headsubcategories['name'] ?>
                                                                    <span class="nav-dropdown-menu-dropicon-right"></span>
                                                                </a>
                                                                <label title="Toggle Drop-down" class="nav-dropdown-menu-dropicon-bottom" for="sm06">▾</label>

                                                                <input type="checkbox" id="sm06" />
                                                                <?php
                                                                $getsecondsubcategories = $getcategory_header->getheadersecondsubcategories($headsubcategories['id']);
                                                                if ($getsecondsubcategories) {
                                                                ?>
                                                                    <ul class="nav-dropdown-menu-submenu">
                                                                        <?php
                                                                        foreach ($getsecondsubcategories as $secondsubcategories) {
                                                                        ?>
                                                                            <li>
                                                                                <a href="<?php echo SITE_URL?>collections/<?php echo $secondsubcategories['slug'] ?>"><?php echo $secondsubcategories['super_name'] ?>
                                                                                    <span class="nav-dropdown-menu-dropicon-right"></span>
                                                                                </a>

                                                                            </li>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </ul>
                                                                <?php
                                                                }
                                                                ?>

                                                            </li>
                                                        <?php
                                                        }
                                                        ?>

                                                    </ul>
                                                <?php
                                                }
                                                ?>




                                        <?php
                                        }
                                    }
                                        ?>


                                            </li>
                                </ul>
                            </li>

                        </ul>
                        <div class="navbar-info-group">
                            <div class="navbar-info"><i class="icofont-ui-touch-phone"></i>
                                <p><small>call us</small><span><a style="color:#555555" href="tel:+919648804672">+91 9648804672</a></span></p>
                            </div>
                            <div class="navbar-info"><i class="icofont-ui-email"></i>
                                <p><small>email us</small><a style="color:#555555" href="mailto:support@enham.in">support@enham.in</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside class="category-sidebar">
        <div class="category-header">
            <h4 class="category-title"><i class="fas fa-align-left"></i><span>categories</span></h4><button class="category-close"><i class="icofont-close"></i></button>
        </div>
        <ul class="category-list">

            <?php
            $getcategory_header = new CategoryController;
            $getcategory_all_header = $getcategory_header->getCategory();
            if ($getcategory_all_header) {
                foreach ($getcategory_all_header as $categoriesheaders) {
            ?>
                    <li class="category-item">
                        <div class="nav-link dropdown-link custom-menu-link">
                            <i class="icofont-book-alt"></i>
                            <a href="<?php echo SITE_URL ?>category/<?php echo $categoriesheaders['cat_url']; ?>"><?php echo $categoriesheaders['cat_name'] ?></a>
                        </div>
                        <?php
                        $getallSubcategoryheader = $getcategory_header->getheadersubCategory($categoriesheaders['id']);
                        if ($getallSubcategoryheader) {
                        ?>
                            <ul class="nav-list" style="display:none">
                                <?php
                                foreach ($getallSubcategoryheader as $headsubcategories) {
                                ?>
                                    <li>

                                        <div class="nav-link dropdown-link custom-menu-link">
                                            <a href="<?php echo SITE_URL?>subcategory/<?php echo $headsubcategories['url'] ?>"><?php echo $headsubcategories['name'] ?></a>

                                        </div>

                                        <?php
                                        $getsecondsubcategories = $getcategory_header->getheadersecondsubcategories($headsubcategories['id']);
                                        if ($getsecondsubcategories) {
                                        ?>
                                            <ul class="dropdown-list">
                                                <?php
                                                foreach ($getsecondsubcategories as $secondsubcategories) {
                                                ?>
                                                    <li>
                                                        <a href="<?php echo SITE_URL?>collections/<?php echo $secondsubcategories['slug'] ?>"><?php echo $secondsubcategories['super_name'] ?>

                                                        </a>

                                                    </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        <?php
                                        }
                                        ?>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>

                    </li>
        <?php
                        }
                    }
                }
        ?>

        </ul>
        <div class="category-footer">
            <p>All Rights Reserved by <a href="#">Enham</a></p>
        </div>
    </aside>
    <!-- <aside class="cart-sidebar">
        <div class="cart-header">
            <div class="cart-total"><i class="fas fa-shopping-basket"></i><span>total item (<?php if (isset($_SESSION["add-to-cart"])) {
                                                                                                echo count($_SESSION["add-to-cart"]);
                                                                                            } ?>)</span></div><button class="cart-close"><i class="icofont-close"></i></button>
        </div>
        <ul class="cart-list">
            <?php
            // print_r($_SESSION["add-to-cart"]);
            if (isset($_SESSION["add-to-cart"])) {
                $count = 1;
                foreach ($_SESSION["add-to-cart"] as $key => $cart) {
                    $getProduct = new ProductController;
                    // $checkProdstock =  $getProduct->checkStockunit($cart['productid']);
                    // $stock_left = $cart['max-quantity'] - $checkProdstock;

            ?>
                    <li class="cart-item">
                        <div class="cart-media"><a href="#"><img src="<?php SITE_URL ?>admin/assets/product-images/<?php echo $cart['prod_image'] ?>" alt="product"></a><button class="cart-delete remove-products" data-productid="<?php echo $cart['productid']; ?>"><i class="far fa-trash-alt"></i></button></div>
                        <div class="cart-info-group">
                            <div class="cart-info">
                                <h6><a href="product-single.html"><?php echo $cart['prod_name'] ?></a></h6>
                                <p>Unit Price - &#8377; <?php echo $cart['price'] ?></p>
                            </div>
                            <div class="cart-action-group">
                                <div class="product-action"><button class="action-minus qtybutton" title="Quantity Minus"><i class="icofont-minus"></i></button><input class="action-input cart_quantity " value="<?php echo $cart['prod_quant'] ?>" title="Quantity Number" type="text" name="quantity" min="1" /><button class="action-plus qtybutton" title="Quantity Plus"><i class="icofont-plus"></i></button></div>
                                <?php
                                $producttotal = '';
                                $producttotal = $cart['prod_quant'] * $cart['price'];
                                ?>
                                <h6>₹ <?php echo $producttotal; ?></h6>
                            </div>
                        </div>
                    </li>

            <?php
                }
            }

            ?>

        </ul>
        <?php
        if (isset($_SESSION["add-to-cart"])) {
            $carttotal = 0;
            foreach ($_SESSION["add-to-cart"] as $key => $cart) {
                $carttotal = $carttotal + ($cart['prod_quant'] * $cart['price']);
            }

        ?>
            <div class="cart-footer">
                <a class="cart-checkout-btn" href="cart.php"><span class="checkout-label">View Cart</span><span class="checkout-price">₹ <?php echo $carttotal; ?></span></a>
            </div>
        <?php
        }
        ?>
    </aside> -->
    <aside class="nav-sidebar">
        <div class="nav-header"><a href="#"><img src="<?php echo SITE_URL?>images/logo.jpg" alt="logo"></a><button class="nav-close"><i class="icofont-close"></i></button></div>
        <div class="nav-content">


            <ul class="nav-list">
                <li><a class="nav-link" href="<?php echo SITE_URL; ?>"><i class="icofont-home"></i>Home</a>

                </li>
                <li>
                    <a class="nav-link " href="my-account.php"><i class="icofont-bag-alt"></i>my account</a>

                </li>
                <?php
                $getcategory_header = new CategoryController;
                $getcategory_all_header = $getcategory_header->getCategory();
                if ($getcategory_all_header) {
                    foreach ($getcategory_all_header as $categoriesheaders) {
                ?>
                        <li>
                            <div class="nav-link dropdown-link custom-menu-link">
                                <i class="icofont-book-alt"></i>
                                <a href="<?php echo SITE_URL ?>category/<?php echo $categoriesheaders['cat_url']; ?>"><?php echo $categoriesheaders['cat_name'] ?></a>
                            </div>
                            <?php
                            $getallSubcategoryheader = $getcategory_header->getheadersubCategory($categoriesheaders['id']);
                            if ($getallSubcategoryheader) {
                            ?>
                                <ul class="nav-list" style="display:none">
                                    <?php
                                    foreach ($getallSubcategoryheader as $headsubcategories) {
                                    ?>
                                        <li>

                                            <div class="nav-link dropdown-link custom-menu-link">
                                                <a href="<?php echo SITE_URL?>subcategory/<?php echo $headsubcategories['url'] ?>"><?php echo $headsubcategories['name'] ?></a>

                                            </div>

                                            <?php
                                            $getsecondsubcategories = $getcategory_header->getheadersecondsubcategories($headsubcategories['id']);
                                            if ($getsecondsubcategories) {
                                            ?>
                                                <ul class="dropdown-list">
                                                    <?php
                                                    foreach ($getsecondsubcategories as $secondsubcategories) {
                                                    ?>
                                                        <li>
                                                            <a href="<?php echo SITE_URL;?>collections/<?php echo $secondsubcategories['slug'] ?>"><?php echo $secondsubcategories['super_name'] ?>

                                                            </a>

                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>

                        </li>
            <?php
                            }
                        }
                    }
            ?>




            <li><a class="nav-link" href="<?php echo SITE_URL?>contact-us.php"><i class="icofont-contacts"></i>contact us</a></li>
            <li><a class="nav-link" href="<?php echo SITE_URL?>privacy-policy.php"><i class="icofont-warning"></i>privacy policy</a></li>
            </ul>
            
            
            <div class="nav-info-group">
                <div class="nav-info"><i class="icofont-ui-touch-phone"></i>
                    <p><small>call us</small><a style="color:#555555" href="tel:+919648804672">+91 9648804672</a></p>
                </div>
                <div class="nav-info"><i class="icofont-ui-email"></i>
                    <p><small>email us</small><span><a style="color:#555555" href="mailto:support@enham.in">support@enham.in</a></span></p>
                </div>
            </div>
            <div class="nav-footer">
                <p>All Rights Reserved by <a href="#">Enham</a></p>
            </div>
        </div>
    </aside>
    <div class="mobile-menu">
        <a href="<?php echo SITE_URL; ?>" title="Home Page"><i class="fas fa-home"></i><span>Home</span></a>
        <button class="cate-btn" title="Category List"><i class="fas fa-list"></i><span>category</span></button>
        <a href="<?php echo SITE_URL?>cart.php" class="cart-btn" title="Cartlist"><i class="fas fa-shopping-basket"></i><span>cartlist</span>
            <?php
            if (isset($_SESSION["add-to-cart"])) {
            ?>
                <sup id="cart_tot_mobile"><?php echo count($_SESSION["add-to-cart"]) ?></sup>
            <?php
            } else {
            ?>
                <sup id="cart_tot_mobile">0</sup>
            <?php
            }
            ?>
        </a>
        <?php
        if(isset($_SESSION['auth_user']['user_id'])){
        $wishlist = new WishlistController;
        $userid =  $_SESSION['auth_user']['user_id'];
        $totalwishlist = $wishlist->getitemsinwishlist($userid);
        if ($totalwishlist) {
        ?>
            <a href="wishlist.php" title="Wishlist"><i class="fas fa-heart"></i><span>wishlist</span> <sup><?php echo $totalwishlist; ?></sup> </a>
        <?php
        } else {
        ?>
            <a href="wishlist.php" title="Wishlist"><i class="fas fa-heart"></i><span>wishlist</span> </a>
        <?php
        }
        }
        ?>
        <!-- <a href="compare.html" title="Compare List"><i class="fas fa-random"></i><span>compare</span><sup>0</sup></a> -->
    </div>
    <div class="modal fade" id="product-view">
        <div class="modal-dialog">
            <div class="modal-content"><button class="modal-close icofont-close" data-bs-dismiss="modal"></button>
                <div class="product-view">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="view-gallery">
                                <div class="view-label-group"><label class="view-label new">new</label><label class="view-label off">-10%</label></div>
                                <ul class="preview-slider slider-arrow">
                                    <li><img src="<?php echo SITE_URL?>images/product/01.jpg" alt="product"></li>
                                    <li><img src="<?php echo SITE_URL?>images/product/01.jpg" alt="product"></li>
                                    <li><img src="<?php echo SITE_URL?>images/product/01.jpg" alt="product"></li>
                                    <li><img src="<?php echo SITE_URL?>images/product/01.jpg" alt="product"></li>
                                    <li><img src="<?php echo SITE_URL?>images/product/01.jpg" alt="product"></li>
                                    <li><img src="<?php echo SITE_URL?>images/product/01.jpg" alt="product"></li>
                                    <li><img src="<?php echo SITE_URL?>images/product/01.jpg" alt="product"></li>
                                </ul>
                                <ul class="thumb-slider">
                                    <li><img src="<?php echo SITE_URL?>images/product/01.jpg" alt="product"></li>
                                    <li><img src="<?php echo SITE_URL?>images/product/01.jpg" alt="product"></li>
                                    <li><img src="<?php echo SITE_URL?>images/product/01.jpg" alt="product"></li>
                                    <li><img src="<?php echo SITE_URL?>images/product/01.jpg" alt="product"></li>
                                    <li><img src="<?php echo SITE_URL?>images/product/01.jpg" alt="product"></li>
                                    <li><img src="<?php echo SITE_URL?>images/product/01.jpg" alt="product"></li>
                                    <li><img src="<?php echo SITE_URL?>images/product/01.jpg" alt="product"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="view-details">
                                <h3 class="view-name"><a href="product-video.html">existing product name</a></h3>
                                <div class="view-meta">
                                    <p>SKU:<span>1234567</span></p>
                                    <p>BRAND:<a href="#">radhuni</a></p>
                                </div>
                                <div class="view-rating"><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="active icofont-star"></i><i class="icofont-star"></i><a href="product-video.html">(3 reviews)</a></div>
                                <h3 class="view-price"><del>₹38.00</del><span>₹24.00<small>/per kilo</small></span></h3>
                                <p class="view-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit non tempora
                                    magni repudiandae sint suscipit tempore quis maxime explicabo veniam eos
                                    reprehenderit fuga</p>
                                <div class="view-list-group"><label class="view-list-title">tags:</label>
                                    <ul class="view-tag-list">
                                        <li><a href="#">organic</a></li>
                                        <li><a href="#">vegetable</a></li>
                                        <li><a href="#">chilis</a></li>
                                    </ul>
                                </div>
                                <div class="view-list-group"><label class="view-list-title">Share:</label>
                                    <ul class="view-share-list">
                                        <li><a href="#" class="icofont-facebook" title="Facebook"></a></li>
                                        <li><a href="#" class="icofont-twitter" title="Twitter"></a></li>
                                        <li><a href="#" class="icofont-linkedin" title="Linkedin"></a></li>
                                        <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>
                                    </ul>
                                </div>
                                <div class="view-add-group"><button class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add to cart</span></button>
                                    <div class="product-action"><button class="action-minus" title="Quantity Minus"><i class="icofont-minus"></i></button><input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"><button class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button></div>
                                </div>
                                <div class="view-action-group"><a class="view-wish wish" href="#" title="Add Your Wishlist"><i class="icofont-heart"></i><span>add to
                                            wish</span></a><a class="view-compare" href="compare.html" title="Compare This Item"><i class="fas fa-random"></i><span>Compare
                                            This</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>