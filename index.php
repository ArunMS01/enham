<?php
$title = "Home";
include('config/app.php');
include('codes/authentication_code.php');
include('controllers/AuthenticationController.php');
include('controllers/CategoryController.php');
include('controllers/ProductController.php');
include('controllers/BannerController.php');
include('controllers/ReviewController.php');
include('controllers/WishlistController.php');


include('inc/header.php');
?>

<style>
    .banner-1 {
        background-image: url('images/enham-banner.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        padding: 100px 0;
    }

    .banner-2 {
        background-image: url('images/enham-banner.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        padding: 100px 0;
    }

    .product-image-m {
        display: flex;
        align-items: center;
        justify-self: center;
        height: 200px;
        width: 200px;
        margin: auto;
    }

    .product-image-m img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .padding-50 {
        padding: 70px 20px 100px 20px;
        color: #fff;
    }

    .padding-50 h2 {
        color: #fff;
    }

    .suggest-card img {
        height: 115px;
    }
</style>

<?php include('message.php') ?>
<section class="home-index-slider slider-arrow slider-dots">
    <div class="banner-part banner-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-6">
                    <div class="banner-content">
                        <h1>Shop now and receive a surprise gift</h1>
                        <!--<p>Enjoy fast and safe free home delivery within 24 hours of order placing with our reliable and secure online services including quick assistance whenever required.</p>-->
                        <div class="banner-btn"><a class="btn btn-inline" href="#"><i class="fas fa-shopping-basket"></i><span>shop now</span></a><a class="btn btn-outline" href="#"><i class="icofont-sale-discount"></i><span>get offer</span></a></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="banner-img"><img src="images/bottles.png" alt="index"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-part banner-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-6">
                    <div class="banner-content">
                          <h1>Shop now and receive a surprise gift</h1>
                        <!--<p>Enjoy fast and safe free home delivery within 24 hours of order placing with our reliable and secure online services including quick assistance whenever required.</p>-->
                        <div class="banner-btn"><a class="btn btn-inline" href="#"><i class="fas fa-shopping-basket"></i><span>shop now</span></a><a class="btn btn-outline" href="#"><i class="icofont-sale-discount"></i><span>get offer</span></a></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="banner-img"><img src="images/bottles.png" alt="index"></div>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="section suggest-part">
    <div class="container">
        <ul class="suggest-slider slider-arrow">
            <?php
            $getcategory = new CategoryController;
            $getcategory_all = $getcategory->getCategory();
            if ($getcategory_all) {
                foreach ($getcategory_all as $categories) {
            ?>
                    <li><a class="suggest-card" href="category.php?url=<?php echo $categories['cat_url'] ?>">
                            <?php if (!empty($categories['category_image'])) { ?>
                                <img src="admin/assets/category-images/<?php echo $categories['category_image'] ?>" alt="suggest">
                            <?php
                            } else {
                            ?>
                                <img src="images/home/footer-banner.jpg" alt="">
                            <?php
                            }
                            ?>
                            <h5><?php echo $categories['cat_name'] ?> </h5>
                        </a></li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
</section>
<section class="section recent-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>trending items</h2>
     
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            <?php

            $getallproducts = new ProductController;
            $tag = 'trending';
            $gettrendingProducts = $getallproducts->gettagsproducts($tag);
            // print_r($gettrendingProducts);
            if ($gettrendingProducts) {
                // print_r($gettrendingProducts);
                foreach ($gettrendingProducts as $products) {
            ?>
                    <div class="col products-column">
                        <div class="product-card">
                            <div class="product-media">

                                <?php if (!isset($_SESSION['authenticated'])) { ?>
                                    <button class="product-wish product-wishlist-modal wish" id="  "><i class="fas fa-heart"></i></button>

                                <?php
                                } else {
                                ?>
                                    <?php
                                    if (isset($_SESSION['authenticated'])) {
                                    ?>
                                        <input type="hidden" id="customer_id" value="<?php echo $_SESSION['auth_user']['user_id'] ?>">
                                    <?php
                                    }
                                    ?>
                                    <a href="#" class="product-wish wish add-to-wishlist-btn" data-productid="<?php echo $products['id'] ?>"><i class="fas fa-heart"></i></a>

                                <?php
                                }
                                ?>


                                <a class="product-image" href="<?php echo SITE_URL ?>product/<?php echo $products['url'] ?>">
                                    <div class="product-image-m">
                                        <img src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $products['image'] ?>" alt="product">
                                    </div>

                                </a>

                            </div>
                            <?php

                            $checkProdstock =  $getallproducts->checkStockunit($products['id']);
                            $stock_left = $products['quantity'] - $checkProdstock;

                            ?>
                            <div class="product-content product-cart-box">
                                <div class="product-rating">
                                    <?php
                                    $reviews = new ReviewController;
                                    $getreviews = $reviews->getProductreviews($products['id']);
                                    if ($getreviews) {
                                        for ($i = 0; $i < $getreviews; $i++) {
                                    ?>

                                            <i class="active icofont-star"></i>
                                        <?php
                                        }
                                        $getreviews = $reviews->getnoofreviews($products['id']);
                                        ?>
                                        <a href="#">(<?php echo $getreviews; ?> reviews)</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <h6 class="product-name"><a href="<?php echo SITE_URL ?>product/<?php echo $products['url']; ?>"><?php echo substr(strip_tags($products['name']), 0, 20) . '...'; ?></a></h6>
                                <h6 class="product-price"><del>&#x20B9; <?php echo $products['regular_price'] ?></del><span>&#x20B9; <?php echo $products['price'] ?></span></h6>



                                <?php
                                if ($checkProdstock && $stock_left > 1) {
                                ?>
                                    <div class="product-action-1">
                                        <button data-productid="<?php echo $products['id'] ?>" class="product-add add_to_cart_btn" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                        <div class="product-action hhh">
                                            <a class="btn btn-inline" href="cart.php">Go to cart</a>
                                            <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button> -->
                                            <input type="hidden" value="1" max="<?php echo $stock_left ?>" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                            <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button> -->
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    if ($stock_left > 1) {
                                    ?>
                                        <div class="product-action-1">
                                            <button data-productid="<?php echo $products['id'] ?>" class="product-add add_to_cart_btn" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                            <div class="product-action hjj">
                                                <a class="btn btn-inline" href="cart.php">Go to cart</a>
                                                <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button> -->
                                                <input type="hidden" value="1" max="<?php echo $products['quantity'] ?>" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                                <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button> -->
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <p style="color:red">Out of stock</p>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }
            ?>

        </div>

    </div>
</section>
<div class="section promo-part">
    <div class="container promo-home-img">
        <div class="row">
            <div class="col-lg-8">
                <div class="promo-img"></div>
            </div>
            <div class="col-lg-4">
                <div class="content">
                <h3>Personal Care</h3>
                    <p>Get a whole wide range of cosmetics from make-up brushes to hairbands, from trustworthy brands at our online store. 
Premium quality beauty products are not miles far but just a click away from you.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section recent-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Featured items</h2>
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            <?php

            $getallproducts = new ProductController;
            $tag = 'featured';
            $gettrendingProducts = $getallproducts->gettagsproducts($tag);
            // print_r($gettrendingProducts);
            if ($gettrendingProducts) {
                // print_r($gettrendingProducts);
                foreach ($gettrendingProducts as $products) {
            ?>
                    <div class="col products-column">
                        <div class="product-card">
                            <div class="product-media">

                                <?php if (!isset($_SESSION['authenticated'])) { ?>
                                    <button class="product-wish product-wishlist-modal wish" id="  "><i class="fas fa-heart"></i></button>

                                <?php
                                } else {
                                ?>
                                    <?php
                                    if (isset($_SESSION['authenticated'])) {
                                    ?>
                                        <input type="hidden" id="customer_id" value="<?php echo $_SESSION['auth_user']['user_id'] ?>">
                                    <?php
                                    }
                                    ?>
                                    <a href="#" class="product-wish wish add-to-wishlist-btn" data-productid="<?php echo $products['id'] ?>"><i class="fas fa-heart"></i></a>

                                <?php
                                }
                                ?>


                                <a class="product-image" href="<?php echo SITE_URL ?>product/<?php echo $products['url'] ?>">
                                    <div class="product-image-m">
                                        <img src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $products['image'] ?>" alt="product">
                                    </div>

                                </a>

                            </div>
                            <?php

                            $checkProdstock =  $getallproducts->checkStockunit($products['id']);
                            $stock_left = $products['quantity'] - $checkProdstock;

                            ?>
                            <div class="product-content product-cart-box">
                                <div class="product-rating">
                                    <?php
                                    $reviews = new ReviewController;
                                    $getreviews = $reviews->getProductreviews($products['id']);
                                    if ($getreviews) {
                                        for ($i = 0; $i < $getreviews; $i++) {
                                    ?>

                                            <i class="active icofont-star"></i>
                                        <?php
                                        }
                                        $getreviews = $reviews->getnoofreviews($products['id']);
                                        ?>
                                        <a href="#">(<?php echo $getreviews; ?> reviews)</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <h6 class="product-name"><a href="<?php echo SITE_URL ?>product/<?php echo $products['url']; ?>"><?php echo substr(strip_tags($products['name']), 0, 20) . '...'; ?></a></h6>
                                <h6 class="product-price"><del>&#x20B9; <?php echo $products['regular_price'] ?></del><span>&#x20B9; <?php echo $products['price'] ?></span></h6>



                                <?php
                                if ($checkProdstock && $stock_left > 1) {
                                ?>
                                    <div class="product-action-1">
                                        <button data-productid="<?php echo $products['id'] ?>" class="product-add add_to_cart_btn" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                        <div class="product-action hhh">
                                        <a class="btn btn-inline" href="cart.php">Go to cart</a>
                                            <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button> -->
                                            <input type="hidden" value="1" max="<?php echo $stock_left ?>" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                            <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button> -->
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    if ($stock_left > 1) {
                                    ?>
                                        <div class="product-action-1">
                                            <button data-productid="<?php echo $products['id'] ?>" class="product-add add_to_cart_btn" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                            <div class="product-action hjj">
                                            <a class="btn btn-inline" href="cart.php">Go to cart</a>
                                                <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button> -->
                                                <input  type="hidden" value="1" max="<?php echo $products['quantity'] ?>" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                                <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button> -->
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <p style="color:red">Out of stock</p>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }
            ?>

        </div>

    </div>
</section>



<section class="section countdown-part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 ">
                <div class="countdown-content">
                    <h3>Special discount offer on cleaning products</h3>
                    <p>Now get a special discount offer on all the cleaning products such as disinfectants, soaps, detergents, cleaners, etc. Get your home cleaning a little easier using our sustainable items.</p>
                    <a href="#" class="btn btn-inline"><i class="fas fa-shopping-basket"></i><span>shop now</span></a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="countdown-img"><img src="images/bottles.png" alt="countdown">
                    <div class="countdown-off"><span>20%</span><span>off</span></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section newitem-part">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-heading">
                    <h2>collected new items</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="new-slider slider-arrow">
                    <?php

                    $getallproducts = new ProductController;
                    $tag = 'featured';
                    $gettrendingProducts = $getallproducts->gettagsproducts($tag);
                    // print_r($gettrendingProducts);
                    if ($gettrendingProducts) {
                        // print_r($gettrendingProducts);
                        foreach ($gettrendingProducts as $products) {
                    ?>
                            <li>
                                <div class="product-card">
                                    <div class="product-media">
                                        <?php if (!isset($_SESSION['authenticated'])) { ?>
                                            <button class="product-wish product-wishlist-modal wish" id="  "><i class="fas fa-heart"></i></button>

                                        <?php
                                        } else {
                                        ?>
                                            <?php
                                            if (isset($_SESSION['authenticated'])) {
                                            ?>
                                                <input type="hidden" id="customer_id" value="<?php echo $_SESSION['auth_user']['user_id'] ?>">
                                            <?php
                                            }
                                            ?>
                                            <a href="#" class="product-wish wish add-to-wishlist-btn" data-productid="<?php echo $products['id'] ?>"><i class="fas fa-heart"></i></a>

                                        <?php
                                        }
                                        ?>
                                        <a class="product-image" href="<?php echo SITE_URL ?>product/<?php echo $products['url']; ?>">
                                            <div class="product-image-m">
                                                <img src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $products['image'] ?>" alt="product">
                                            </div>
                                        </a>

                                    </div>
                                    <?php

                                    $checkProdstock =  $getallproducts->checkStockunit($products['id']);
                                    $stock_left = $products['quantity'] - $checkProdstock;

                                    ?>
                                    <div class="product-content product-cart-box">
                                        <div class="product-rating">
                                            <?php
                                            $reviews = new ReviewController;
                                            $getreviews = $reviews->getProductreviews($products['id']);
                                            if ($getreviews) {
                                                for ($i = 0; $i < $getreviews; $i++) {
                                            ?>

                                                    <i class="active icofont-star"></i>
                                                <?php
                                                }
                                                $getreviews = $reviews->getnoofreviews($products['id']);
                                                ?>
                                                <a href="#">(<?php echo $getreviews; ?> reviews)</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <h6 class="product-name"><a href="<?php echo SITE_URL ?>product/<?php echo $products['url']; ?>">fresh green chilis</a></h6>
                                        <h6 class="product-price"><del>&#x20B9; <?php echo $products['regular_price'] ?></del><span>&#x20B9; <?php echo $products['price'] ?></span></h6>




                                        <?php
                                        if ($checkProdstock && $stock_left > 1) {
                                        ?>
                                            <div class="product-action-1">
                                                <button data-productid="<?php echo $products['id'] ?>" class="product-add add_to_cart_btn" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                                <div class="product-action hhh">
                                                <a class="btn btn-inline" href="cart.php">Go to cart</a>
                                                    <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button> -->
                                                    <input  type="hidden" value="1" max="<?php echo $stock_left ?>" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                                    <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button> -->
                                                </div>
                                            </div>
                                            <?php
                                        } else {
                                            if ($stock_left > 1) {
                                            ?>
                                                <div class="product-action-1">
                                                    <button data-productid="<?php echo $products['id'] ?>" class="product-add add_to_cart_btn" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                                    <div class="product-action hjj">
                                                    <a class="btn btn-inline" href="cart.php">Go to cart</a>
                                                    <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button> -->
                                                        <input  type="hidden" value="1" max="<?php echo $products['quantity'] ?>"  title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                                        <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button> -->
                                                    </div>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <p style="color:red">Out of stock</p>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                            </li>
                    <?php
                        }
                    }
                    ?>

                </ul>
            </div>
        </div>

    </div>
</section>
<div class="section promo-part">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                <div class="promo-img blue-promo-img">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6 padding-50">
                            <div class="content">
                                <h3 style="color: #fff;">Automotive Care</h3>
                                <p>Cars or automobiles need furbishing regularly. Shop upholstery cleaner, soft bristle brushes, duster, foam sponge, etc. with us at very attractive prices, and let your car shine!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 px-xl-3">
                <div class="promo-img red-promo-img">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="content padding-50">
                              <h3 style="color: #fff;">Household Items</h3>
                                <p>Get all the essential household items including cleaning and disinfectant products, all in one place and at reasonable costs. We can bet about the sustainable quality of our products.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section niche-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Browse by Top Niche</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <li><a href="#top-order" class="tab-link active" data-bs-toggle="tab"><i class="icofont-price"></i><span>top order</span></a></li>
                    <li><a href="#top-rate" class="tab-link" data-bs-toggle="tab"><i class="icofont-star"></i><span>top rating</span></a></li>
                    <li><a href="#top-disc" class="tab-link" data-bs-toggle="tab"><i class="icofont-sale-discount"></i><span>top discount</span></a></li>
                </ul>
            </div>
        </div>
        <div class="tab-pane fade show active" id="top-order">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                <?php

                $getallproducts = new ProductController;
                $tag = 'trending';
                $gettrendingProducts = $getallproducts->gettagsproducts($tag);
                // print_r($gettrendingProducts);
                if ($gettrendingProducts) {
                    // print_r($gettrendingProducts);
                    foreach ($gettrendingProducts as $products) {
                ?>
                        <div class="col products-column">
                            <div class="product-card">
                                <div class="product-media">

                                    <?php if (!isset($_SESSION['authenticated'])) { ?>
                                        <button class="product-wish wish product-wishlist-modal" id="  "><i class="fas fa-heart"></i></button>

                                    <?php
                                    } else {
                                    ?>
                                        <?php
                                        if (isset($_SESSION['authenticated'])) {
                                        ?>
                                            <input type="hidden" id="customer_id" value="<?php echo $_SESSION['auth_user']['user_id'] ?>">
                                        <?php
                                        }
                                        ?>
                                        <a href="#" class="product-wish wish add-to-wishlist-btn" data-productid="<?php echo $products['id'] ?>"><i class="fas fa-heart"></i></a>

                                    <?php
                                    }
                                    ?>
                                    <a class="product-image" href="<?php echo SITE_URL ?>product/<?php echo $products['url'] ?>">
                                        <div class="product-image-m">
                                            <img src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $products['image'] ?>" alt="product">
                                        </div>

                                    </a>

                                </div>
                                <?php

                                $checkProdstock =  $getallproducts->checkStockunit($products['id']);
                                $stock_left = $products['quantity'] - $checkProdstock;

                                ?>
                                <div class="product-content product-cart-box">
                                    <div class="product-rating">
                                        <?php
                                        $reviews = new ReviewController;
                                        $getreviews = $reviews->getProductreviews($products['id']);
                                        if ($getreviews) {
                                            for ($i = 0; $i < $getreviews; $i++) {
                                        ?>

                                                <i class="active icofont-star"></i>
                                            <?php
                                            }
                                            $getreviews = $reviews->getnoofreviews($products['id']);
                                            ?>
                                            <a href="#">(<?php echo $getreviews; ?> reviews)</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <h6 class="product-name"><a href="<?php echo SITE_URL ?>product/<?php echo $products['url']; ?>"><?php echo substr(strip_tags($products['name']), 0, 20) . '...'; ?></a></h6>
                                    <h6 class="product-price"><del>&#x20B9; <?php echo $products['regular_price'] ?></del><span>&#x20B9; <?php echo $products['price'] ?></span></h6>



                                    <?php
                                    if ($checkProdstock && $stock_left > 1) {
                                    ?>
                                        <div class="product-action-1">
                                            <button data-productid="<?php echo $products['id'] ?>" class="product-add add_to_cart_btn" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                            <div class="product-action hhh">
                                                <a class="btn btn-inline" href="cart.php">Go to cart</a>
                                                <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button> -->
                                                <input  type="hidden" value="1" max="<?php echo $stock_left ?>" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                                <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button> -->
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        if ($stock_left > 1) {
                                        ?>
                                            <div class="product-action-1">
                                                <button data-productid="<?php echo $products['id'] ?>" class="product-add add_to_cart_btn" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                                <div class="product-action hjj">
                                                <a class="btn btn-inline" href="cart.php">Go to cart</a>
                                                    <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button> -->
                                                    <input  type="hidden" value="1" max="<?php echo $products['quantity'] ?>" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                                    <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button> -->
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <p style="color:red">Out of stock</p>
                                    <?php
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>

            </div>
        </div>
        <div class="tab-pane fade" id="top-rate">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                <?php

                $getallproducts = new ProductController;
                $tag = 'trending';
                $gettrendingProducts = $getallproducts->gettagsproducts($tag);
                // print_r($gettrendingProducts);
                if ($gettrendingProducts) {
                    // print_r($gettrendingProducts);
                    foreach ($gettrendingProducts as $products) {
                ?>
                        <div class="col products-column">
                            <div class="product-card">
                                <div class="product-media">

                                    <?php if (!isset($_SESSION['authenticated'])) { ?>
                                        <button class="product-wish wish product-wishlist-modal" id="  "><i class="fas fa-heart"></i></button>

                                    <?php
                                    } else {
                                    ?>
                                        <?php
                                        if (isset($_SESSION['authenticated'])) {
                                        ?>
                                            <input type="hidden" id="customer_id" value="<?php echo $_SESSION['auth_user']['user_id'] ?>">
                                        <?php
                                        }
                                        ?>
                                        <a href="#" class="product-wish wish add-to-wishlist-btn" data-productid="<?php echo $products['id'] ?>"><i class="fas fa-heart"></i></a>

                                    <?php
                                    }
                                    ?>
                                    <a class="product-image" href="<?php echo SITE_URL ?>product/<?php echo $products['url'] ?>">
                                        <div class="product-image-m">
                                            <img src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $products['image'] ?>" alt="product">
                                        </div>

                                    </a>

                                </div>
                                <?php

                                $checkProdstock =  $getallproducts->checkStockunit($products['id']);
                                $stock_left = $products['quantity'] - $checkProdstock;

                                ?>
                                <div class="product-content product-cart-box">
                                    <div class="product-rating">
                                        <?php
                                        $reviews = new ReviewController;
                                        $getreviews = $reviews->getProductreviews($products['id']);
                                        if ($getreviews) {
                                            for ($i = 0; $i < $getreviews; $i++) {
                                        ?>

                                                <i class="active icofont-star"></i>
                                            <?php
                                            }
                                            $getreviews = $reviews->getnoofreviews($products['id']);
                                            ?>
                                            <a href="#">(<?php echo $getreviews; ?> reviews)</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <h6 class="product-name"><a href="<?php echo SITE_URL ?>product/<?php echo $products['url']; ?>"><?php echo substr(strip_tags($products['name']), 0, 20) . '...'; ?></a></h6>
                                    <h6 class="product-price"><del>&#x20B9; <?php echo $products['regular_price'] ?></del><span>&#x20B9; <?php echo $products['price'] ?></span></h6>



                                    <?php
                                    if ($checkProdstock && $stock_left > 1) {
                                    ?>
                                        <div class="product-action-1">
                                            <button data-productid="<?php echo $products['id'] ?>" class="product-add add_to_cart_btn" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                            <div class="product-action hhh">
                                            <a class="btn btn-inline" href="cart.php">Go to cart</a>    
                                            <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button> -->
                                                <input  type="hidden" value="1" max="<?php echo $stock_left ?>" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                                <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button> -->
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        if ($stock_left > 1) {
                                        ?>
                                            <div class="product-action-1">
                                                <button data-productid="<?php echo $products['id'] ?>" class="product-add add_to_cart_btn" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                                <div class="product-action hjj">
                                                <a class="btn btn-inline" href="cart.php">Go to cart</a>    
                                                <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button> -->
                                                    <input  type="hidden" value="1" max="<?php echo $products['quantity'] ?>" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                                    <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button> -->
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <p style="color:red">Out of stock</p>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>

            </div>
        </div>
        <div class="tab-pane fade" id="top-disc">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                <?php

                $getallproducts = new ProductController;
                $tag = 'trending';
                $gettrendingProducts = $getallproducts->gettagsproducts($tag);
                // print_r($gettrendingProducts);
                if ($gettrendingProducts) {
                    // print_r($gettrendingProducts);
                    foreach ($gettrendingProducts as $products) {
                ?>
                        <div class="col products-column">
                            <div class="product-card">
                                <div class="product-media">

                                    <?php if (!isset($_SESSION['authenticated'])) { ?>
                                        <button class="product-wish wish product-wishlist-modal" id="  "><i class="fas fa-heart"></i></button>

                                    <?php
                                    } else {
                                    ?>
                                        <?php
                                        if (isset($_SESSION['authenticated'])) {
                                        ?>
                                            <input type="hidden" id="customer_id" value="<?php echo $_SESSION['auth_user']['user_id'] ?>">
                                        <?php
                                        }
                                        ?>
                                        <a href="#" class="product-wish wish add-to-wishlist-btn" data-productid="<?php echo $products['id'] ?>"><i class="fas fa-heart"></i></a>

                                    <?php
                                    }
                                    ?>
                                    <a class="product-image" href="<?php echo SITE_URL ?>product/<?php echo $products['url'] ?>">
                                        <div class="product-image-m">
                                            <img src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $products['image'] ?>" alt="product">
                                        </div>

                                    </a>

                                </div>
                                <?php

                                $checkProdstock =  $getallproducts->checkStockunit($products['id']);
                                $stock_left = $products['quantity'] - $checkProdstock;

                                ?>
                                <div class="product-content product-cart-box">
                                    <div class="product-rating">
                                        <?php
                                        $reviews = new ReviewController;
                                        $getreviews = $reviews->getProductreviews($products['id']);
                                        if ($getreviews) {
                                            for ($i = 0; $i < $getreviews; $i++) {
                                        ?>

                                                <i class="active icofont-star"></i>
                                            <?php
                                            }
                                            $getreviews = $reviews->getnoofreviews($products['id']);
                                            ?>
                                            <a href="#">(<?php echo $getreviews; ?> reviews)</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <h6 class="product-name"><a href="<?php echo SITE_URL ?>product/<?php echo $products['url']; ?>"><?php echo substr(strip_tags($products['name']), 0, 20) . '...'; ?></a></h6>
                                    <h6 class="product-price"><del>&#x20B9; <?php echo $products['regular_price'] ?></del><span>&#x20B9; <?php echo $products['price'] ?></span></h6>




                                    <?php
                                    if ($checkProdstock && $stock_left > 1) {
                                    ?>
                                        <div class="product-action-1">
                                            <button data-productid="<?php echo $products['id'] ?>" class="product-add add_to_cart_btn" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                            <div class="product-action hhh">
                                            <a class="btn btn-inline" href="cart.php">Go to cart</a>    
                                            <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button> -->
                                                <input type="hidden" value="1" max="<?php echo $stock_left ?>" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                                <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button> -->
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        if ($stock_left > 1) {
                                        ?>
                                            <div class="product-action-1">
                                                <button data-productid="<?php echo $products['id'] ?>" class="product-add add_to_cart_btn" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                                <div class="product-action hjj">
                                                <a class="btn btn-inline" href="cart.php">Go to cart</a>        
                                                <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button> -->
                                                    <input type="hidden" value="1" max="<?php echo $products['quantity'] ?>" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                                    <!-- <button data-productid="<?php echo $products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button> -->
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <p style="color:red">Out of stock</p>
                                    <?php
                                        }
                                    }
                                    ?>



                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>

            </div>
        </div>

    </div>
</section>

<section class="section testimonial-part">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2>client's feedback</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-slider slider-arrow">
                    <div class="testimonial-card"><i class="fas fa-quote-left"></i>
                        <p>I am delighted by their services. They are the best in providing quality services and giving their customer’s requirements a high priority.</h5>
                        <ul>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                        </ul>
                        <!--<img src="images/avatar/01.jpg" alt="testimonial">-->
                    </div>
                    <div class="testimonial-card"><i class="fas fa-quote-left"></i>
                        <p>It was an excellent experience. You can find various day-to-day valuable items on their online store at reasonable costs. You can shop absolutely carefree with their secure payment methods and instant return policy.</p>
                      
                        <ul>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                        </ul>
                        <!--<img src="images/avatar/02.jpg" alt="testimonial">-->
                    </div>
                    <div class="testimonial-card"><i class="fas fa-quote-left"></i>
                        <p>I really appreciate their work. They ensure premium product quality and fast and easy shopping online. Their wide collection of items from lifestyle, household, and beauty product categories attracts customers.</p>
                    
                        <ul>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                        </ul>
                        <!--<img src="images/avatar/03.jpg" alt="testimonial">-->
                    </div>
                    <div class="testimonial-card"><i class="fas fa-quote-left"></i>
                        <p>We highly recommend them for their reliable services. They never compromise quality over the costs of items, making them the best in the business.</p>
                       
                        <ul>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                        </ul>
                        <!--<img src="images/avatar/04.jpg" alt="testimonial">-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div id="loginmodal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="" class="" method="POST" onsubmit="return validateForm()">
            <?php
            $currentpage = "$_SERVER[REQUEST_URI]";
            ?>
            <!-- <input type="hidden" name="current_page" value="<?php echo $currentpage ?>"> -->
            <div class="form-group">
                <input class="form-control mb-20" type="text" id="email" name="email" name="email" placeholder="Email*">
            </div>

            <div class="form-group">
                <input class="form-control" type="password" id="password" name="password" name="password" placeholder="Password*">
                <p style="display:none; color:red;" id="pass_err">Password must contain of 1 uppercase character,1 lowercase character, 1 digit,1 special character, and minimum length of 8 characters.</p>

            </div>

            <label class="checkbox-inline">
                <input type="checkbox" onclick="showPassword()">Show Password

            </label>
            <div class="btn-wrapper">
                <button name="wishlist-login" type="submit" class="btn btn-success" type="submit">LOGIN</button>
            </div>
        </form>
    </div>

</div>

<script>
    $('.add_to_cart_btn').on('click', function() {
        let productid = $(this).data('productid');
        var prod_quantity = $(this).closest('.product-action-1').find('.cart-quantity').val();
        var promax_qty = $(this).closest('.product-action-1').find('.cart-quantity').attr("max");
        // alert(prod_quantity);
        // alert(productid);
        // alert(promax_qty);

        if (prod_quantity <= promax_qty) {
            $.ajax({
                url: "<?php echo SITE_URL; ?>codes/add-to-cart.php",
                method: "post",
                data: {
                    prod_quantity: prod_quantity,
                    productid: productid,
                    action: 'add-to-cart'
                },
                success: function(data) {
                    if (data) {
                        console.log(data);
                        let mydata = JSON.parse(data);

                        $("#cart_qnt").text(mydata.cart_quantity);
                        $("#cart_tot").text(mydata.cart_total);
                        $("#cart_tot_mobile").text(mydata.cart_quantity);

                        // setTimeout(function() {
                        //     window.location.reload();
                        // }, 3000);

                    }
                }

            });
        }
        // else{
        //     alert("Quantity not availabel");
        // }

    });

    $(document).on('click', '.add-to-wishlist-btn', function() {
        //  alert("hjd");
        let customerid = $("#customer_id").val();
        let productid = $(this).data('productid');
        // alert(productid);
        // alert(customerid);
        $.ajax({
            url: "<?php echo SITE_URL; ?>codes/add-to-wishlist.php",
            method: "post",
            data: {
                productid: productid,
                customerid: customerid,
                action: 'add-to-wishlist'
            },
            success: function(data) {
                if (data == 'success') {
                    alert("Added To wishlist");
                    location.reload();
                }
            }

        });
    });



    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }

    }


    var email = document.getElementById("email");
    var passowrd = document.getElementById("password");


    let validEmail = false;
    let validPassword = false;


    email.addEventListener('change', () => {
        console.log("email is blurred");
        let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
        let str = email.value;
        console.log(regex, str);
        if (regex.test(str)) {
            email.classList.add('is-valid');
            email.classList.remove('is-invalid');
            validEmail = true;
        } else {
            email.classList.remove('is-valid');
            email.classList.add('is-invalid');
            validEmail = false;

        }
    })
    password.addEventListener('change', () => {
        console.log("phone is blurred");
        let str = password.value;
        console.log(str);
        if (str.match(/[a-z]/g) && str.match(
                /[A-Z]/g) && str.match(
                /[0-9]/g) && str.match(
                /[^a-zA-Z\d]/g) && str.length >= 8) {
            password.classList.add('is-valid');
            password.classList.remove('is-invalid');
            document.getElementById("pass_err").style.display = 'none';
            validPassword = true;

        } else {
            password.classList.remove('is-valid');
            document.getElementById("pass_err").style.display = 'block';
            password.classList.add('is-invalid');
            validPassword = false;
        }
    })

    function validateForm() {
        if (validEmail && validPassword) {
            document.getElementById("error").style.display = "none";
            return true;
        } else {
            document.getElementById("error").style.display = "block";
            console.log("false");
            return false;

        }
    }

    var modal = document.getElementById("loginmodal");

    $('.product-wishlist-modal').on('click', function() {
        modal.style.display = "block";
    })


    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<?php
include('inc/footer.php');
?>