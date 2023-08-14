<?php
include('config/app.php');
include('codes/authentication_code.php');
include('controllers/CategoryController.php');
include('controllers/ProductController.php');
include('controllers/RelatedProductController.php');
include('controllers/ReviewController.php');
include('controllers/WishlistController.php');
include('controllers/AuthenticationController.php');


if (isset($_GET['url'])) {
    $url = validateInput($db->conn, $_GET['url']);
}
$getProduct = new ProductController;
$result =  $getProduct->getSingleproduct($url);
if(!empty($result['title'])){
$title = $result['title'];
}
else{
    $title = "Product";  
}
if(!empty($result['meta_description'])){
$meta_desc = $result['meta_description'];
}
else{
    $meta_desc = "Product";  
}
include('inc/header.php');
?>

<style>
    .category-image {
        display: flex;
        align-items: center;
        justify-self: center;
        height: 200px;
        margin: auto;
        width: 200px;
    }

    .category-image img {
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


    .easyzoom {
        text-align: center;
        border: 1px solid #ddd;
    }

    .main-images-prod {
        display: flex;

        align-items: center;
        justify-self: center;
        height: 490px;
        width: 495px;
        margin: auto;
    }

    .main-images-prod img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .slick-initialized .slick-slide {
        border-radius: 4px;
        background: #fff;
    }

    .thumb-prod-img {
        width: 98px;
        height: 98px;
        margin: auto;
        background: #fff;

    }

    .thumb-prod-img img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .inner-section-1 {
        margin-bottom: 50px;
    }

    /*Gallery slider css*/
    .main-gallery-slides {
        display: flex;
        flex-direction: row-reverse;
    }

    .main-gallery-slides .details-preview {
        width: 77%;
    }

    .thumb-details-list .slick-track {
        display: flex;
        width: 100px !important;
        flex-direction: column;
    }

    .thumb-details-list {
        width: 100%;
    }

    @media only screen and (min-width:360px) and (max-width:768px) {
        .main-gallery-slides {
            flex-direction: column !important;
        }

        .main-gallery-slides .details-preview {
            width: auto;
        }

        .thumb-details-list .slick-track {
            width: auto;
            display: unset;
        }

        .easyzoom {
            border: none;
        }
    }

    @media only screen and (min-width:768px) and (max-width:2000px) {
        .btn-groups {
            display: flex;
        }

        .details-action-group a {
            margin-top: 10px;
            margin-left: 10px;
        }

        .product-action-cart {
            width: 58%;
        }

    }

    #checkoutbtn:hover {
        background: #fff;
        color: #000;
    }

    #checkoutbtn {
        margin-top: 10px;
    }

    .add-to-wishlist-btn:hover {
        background-color: #fff;
        color: #000;
    }

    .buy-now-btn {
        margin: 10px 0 0 10px;
    }
    #checkserviceability{
        width: 34%;
    border-bottom: 2px solid #3169d8;
    }
    .service-check{
        margin-top:10px;
    }
    .product-section-main ul{
        list-style:disc;
    }
</style>

<section class="inner-section-1"></section>

<section class="inner-section ">
    <?php include('message.php') ?>
    <div class="container-fluid">
        <?php
        
        if ($result) {
            $checkProdstock =  $getProduct->checkStockunit($result['id']);
            $stock_left = $result['quantity'] - $checkProdstock;
        }
        ?>
        <div class="row">
            <div class="col-lg-6">

                <div class="details-gallery main-gallery-slides">

                    <ul class="details-preview">
                        <li class="easyzoom easyzoom--overlay">
                            <a href="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $result['image'] ?>">
                                <div class="main-images-prod">
                                    <img class="" src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $result['image'] ?>" alt="product">
                                </div>

                            </a>
                        </li>

                        <?php
                        if (!empty($result['image_one'])) {
                        ?>
                            <li class="easyzoom easyzoom--overlay">
                                <a href="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $result['image_one'] ?>">
                                    <div class="main-images-prod">
                                        <img class="" src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $result['image_one'] ?>" alt="product">
                                    </div>
                                </a>
                            </li>

                        <?php
                        }
                        ?>
                        <?php
                        if (!empty($result['image_two'])) {
                        ?>
                            <li class="easyzoom easyzoom--overlay"><a href="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $result['image_two'] ?>">
                                    <div class="main-images-prod">
                                        <img class="" src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $result['image_two'] ?>" alt="product">
                                    </div>
                                </a>
                            </li>

                        <?php
                        }
                        ?>
                        <?php
                        if (!empty($result['image_three'])) {
                        ?>
                            <li class="easyzoom easyzoom--overlay">
                                <a href="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $result['image_three'] ?>">
                                    <div class="main-images-prod">
                                        <img class="" src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $result['image_three'] ?>" alt="product">
                                    </div>
                                </a>
                            </li>

                        <?php
                        }
                        ?>
                        <?php
                        if (!empty($result['image_four'])) {
                        ?>
                            <li class="easyzoom easyzoom--overlay">
                                <a href="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $result['image_four'] ?>">
                                    <div class="main-images-prod">
                                        <img class="" src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $result['image_four'] ?>" alt="product">
                                    </div>
                                </a>
                            </li>

                        <?php
                        }
                        ?>


                    </ul>
                    <ul class="details-thumb thumb-details-list">
                        <li>
                            <div class="thumb-prod-img"><img src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $result['image'] ?>" alt="product"></div>
                        </li>
                        <?php
                        if (!empty($result['image_one'])) {
                        ?>
                            <li>
                                <div class="thumb-prod-img"><img src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $result['image_one'] ?>" alt="product"></div>
                            </li>
                        <?php
                        }
                        ?>
                        <?php
                        if (!empty($result['image_two'])) {
                        ?>
                            <li>
                                <div class="thumb-prod-img"><img src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $result['image_two'] ?>" alt="product"></div>
                            </li>
                        <?php
                        }
                        ?>
                        <?php
                        if (!empty($result['image_three'])) {
                        ?>
                            <li>
                                <div class="thumb-prod-img"><img src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $result['image_three'] ?>" alt="product"></div>
                            </li>
                        <?php
                        }
                        ?>
                        <?php
                        if (!empty($result['image_four'])) {
                        ?>
                            <li>
                                <div class="thumb-prod-img"><img src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $result['image_four'] ?>" alt="product"></div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="product-navigation">
                    <?php
                    // Fucntion to get next and previous category wise product
                    $current_product_id = $result['id'];
                    $getrelatedprev_products = new RelatedProductController;
                    $get_relprev_products = $getrelatedprev_products->getprevrelatedProducts($current_product_id);
                    if ($get_relprev_products) {
                    ?>
                        <li class="product-nav-prev"><a href="<?php echo SITE_URL ?>product/<?php echo $get_relprev_products; ?>"><i class="icofont-arrow-left"></i>prev product </a></li>

                    <?php
                    }
                    // Fucntion to get next and previous category wise product
                    $current_product_id = $result['id'];
                    $getrelatednext_products = new RelatedProductController;
                    $get_relnext_products = $getrelatednext_products->getnextrelatedProducts($current_product_id);
                    if ($get_relnext_products) {
                    ?>
                        <li class="product-nav-next"><a href="<?php echo SITE_URL ?>product/<?php echo $get_relnext_products; ?>">next product <i class="icofont-arrow-right"></i></a></li>
                    <?php
                    }
                    ?>
                </ul>
                <div class="details-content">
                    <h3 class="details-name"><a href="#"><?php echo $result['name'] ?></a></h3>
                    <div class="details-meta">
                        <!-- <p>SKU:<span><?php echo $result['sku'] ?></span></p> -->
                        <?php

                        if (!empty($result['brand_name'])) {
                        ?>
                            <p><span><?php echo $result['brand_name'] ?></span></p>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="details-rating">
                        <?php
                        $reviews = new ReviewController;
                        $getreviews = $reviews->getProductreviews($result['id']);
                        if ($getreviews) {
                            for ($i = 0; $i < $getreviews; $i++) {
                        ?>

                                <i class="active icofont-star"></i>
                            <?php
                            }
                            $getreviews = $reviews->getnoofreviews($result['id']);
                            ?>
                            <a href="#">(<?php echo $getreviews; ?> reviews)</a>
                        <?php
                        }
                        ?>
                    </div>
                    <h3 class="details-price"><del>&#8377; <?php echo $result['regular_price'] ?></del><span>&#8377; <?php echo $result['price'] ?><small></small></span></h3>
                    <div class="product-section-main">
                    <p class="details-desc "><?php echo $result['short_decs'] ?></p>
                    </div>
                    <input type="hidden" value="<?php echo $result['id'] ?>" id="productid">

                    <input type="hidden" id="admin_id" value="<?php echo $result['admin_id'] ?>">

                    <div class="details-list-group"><label class="details-list-title">Share:</label>
                        <ul class="details-share-list">
                            <li><a href="#" class="icofont-facebook" title="Facebook"></a></li>
                            <li><a href="#" class="icofont-twitter" title="Twitter"></a></li>
                            <li><a href="#" class="icofont-linkedin" title="Linkedin"></a></li>
                            <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>
                        </ul>
                      
                        
                    </div>
                   



                    <!-- <input id="product_quantity" min="1" max="2" class="action-input cart-plus-minus-box" title="Quantity Number" type="text" name="quantity" value="1"> -->

                    <?php
                    if ($checkProdstock && $stock_left > 1) {

                    ?>
                        <div  id="cart_products" class="product-action product-action-cart" style="display: flex;">
                            <button class="action-minus" title="Quantity Minus"><i class="icofont-minus"></i></button>
                            <input disabled type="text" value="1" max="<?php echo $stock_left ?>" id="product_quantity" title="Quantity Number" name="qtybutton" class="action-input cart-plus-minus-box">
                            <button class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button>
                            <p id="max_qtyerr"></p>
                        </div>
                        <?php

                    } else {
                        if ($stock_left > 1) {
                        ?>
                            <div  id="cart_products" class="product-action product-action-cart" style="display: flex;">
                                <button class="action-minus" title="Quantity Minus"><i class="icofont-minus"></i></button>
                                <input disabled type="text" value="1" max="<?php echo $result['quantity'] ?>" id="product_quantity" title="Quantity Number" name="qtybutton" class="action-input cart-plus-minus-box">
                                <button class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button>
                            </div>
                            <p id="max_qtyerr"></p>
                        <?php
                        } else {
                        ?>
                            <p style="color:red">Out of stock</p>
                    <?php
                        }
                    }
                    ?>

                    <div class="btn-groups">
                        <?php
                        if ($checkProdstock && $stock_left > 1) {

                        ?>
                            <div style="text-align:center">
                                <button style="margin-top:10px; width:100%;" class="add-to-cart-btn-1 btn btn-outline" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add to cart</span></button>
                            </div>
                            <?php

                        } else {
                            if ($stock_left > 1) {
                            ?>
                                <div style="text-align:center">
                                    <button style="margin-top:10px; width:100%;" class="add-to-cart-btn-1 btn btn-outline" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add to cart</span></button>
                                </div>
                            <?php
                            } else {
                            ?>

                        <?php
                            }
                        }
                        ?>




                        <div class="details-action-group">



                            <?php
                            if (!isset($_SESSION['authenticated'])) { ?>

                                <a class="btn btn-outline" id="checkoutbtn" href="#" title="Add Your Wishlist"><i class="icofont-heart"></i><span>add to wishlist</span></a>

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
                                <a class="btn btn-outline add-to-wishlist-btn" href="#" title="Add Your Wishlist"><i class="icofont-heart"></i><span>add to wishlist</span></a>

                            <?php
                            }
                            ?>


                        </div>

                        <div class="buy-now-btn">



                            <?php
                            if ($checkProdstock && $stock_left > 1) {
                                if (!isset($_SESSION['authenticated'])) { ?>

                                    <a class="btn btn-outline" id="directcheckout" href="#" title="Add Your Wishlist"><i class="fas fa-bolt"></i><span>buy now</span></a>
                                <?php
                                } else {
                                ?>

                                    <a class="btn btn-outline" id="directcheckout" href="#" title="Add Your Wishlist"><i class="fas fa-bolt"></i><span>buy now</span></a>
                                    <?php
                                }
                            } else {
                                if ($stock_left > 1) {
                                    if (!isset($_SESSION['authenticated'])) {
                                    ?>

                                        <a class="btn btn-outline" id="directcheckout" href="#" title="Add Your Wishlist"><i class="fas fa-bolt"></i><span>buy now</span></a>
                                    <?php
                                    } else {
                                    ?>

                                        <a class="btn btn-outline" id="directcheckout" href="#" title="Add Your Wishlist"><i class="fas fa-bolt"></i><span>buy now</span></a>



                                    <?php
                                    }
                                } else {
                                    ?>

                            <?php
                                }
                            }
                            ?>




                        </div>
                       
                    </div>
                      <div class="service-check">
                          <input type="hidden" id="adminid" value="<?php echo $result['admin_id']  ?>">
                            <input type="hidden" id="item_weight" value="<?php echo $result['item_weight']  ?>">
                          <label class="details-list-title">Enter your pincode to check service ability in your area:</label>
                        <input type="number" id="checkserviceability">
                        <p id="servicemessage"></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<section class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <li><a href="#tab-desc" class="tab-link active" data-bs-toggle="tab">descriptions</a></li>
                    <li><a href="#tab-spec" class="tab-link" data-bs-toggle="tab">Specifications</a></li>
                    <li><a href="#tab-reve" class="tab-link" data-bs-toggle="tab">reviews</a></li>
                    <li><a href="#tab-otherdetails" class="tab-link" data-bs-toggle="tab">Other details</a></li>
                </ul>
            </div>
        </div>
        <div class="tab-pane fade show active" id="tab-desc">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-details-frame">
                        <div class="tab-descrip">
                                 <div class="product-section-main">
                            <p ><?php echo $result['long_desc'] ?></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-spec">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-details-frame">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Product code</th>
                                    <td>SKU: <?php echo $result['sku'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Weight</th>
                                    <td><?php echo $result['item_weight'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Item length</th>
                                    <td><?php echo $result['item_length'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Item length</th>
                                    <td><?php echo $result['item_length'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Item breadth</th>
                                    <td><?php echo $result['item_breadth'] ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-reve">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-details-frame">
                        <ul class="review-list">

                            <?php
                            $reviews = new ReviewController;
                            $getall_reviews = $reviews->getReviews($result['id']);
                            if ($getall_reviews) {
                                foreach ($getall_reviews as $reviews) {
                            ?> <li>
                                        <div class="col-md-12">
                                            <div class="card mt-4 p-4">
                                                <h4><?php echo $reviews['user_name'] . " " . $reviews['last_name'] ?></h4>
                                                <div class="rating">
                                                    <?php
                                                    for ($i = 1; $i <= $reviews['ratings']; $i++) {
                                                    ?>
                                                        <span>*</span>
                                                    <?php
                                                    }
                                                    ?>
                                                    <p><?php echo $reviews['message'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>


                        </ul>
                    </div>
                    <div class="product-details-frame">
                        <h3 class="frame-title">add your review</h3>
                        <form action="codes/ratings.php" method="POST" class="review-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="star-rating">
                                        <input type="radio" name="stars" value="5" id="star-1"><label for="star-1"></label>
                                        <input type="radio" name="stars" value="4" id="star-2"><label for="star-2"></label>
                                        <input type="radio" value="3" name="stars" id="star-3"><label for="star-3"></label>
                                        <input type="radio" value="2" name="stars" id="star-4"><label for="star-4"></label>
                                        <input type="radio" value="1" name="stars" id="star-5"><label for="star-5"></label>
                                    </div>
                                </div>

                                <input type="hidden" value="<?php echo $result['id'] ?>" name="product_id">
                                <div class="col-lg-12">
                                    <div class="form-group"><textarea name="review_message" class="form-control" placeholder="Describe"></textarea></div>
                                </div>

                                <?php if (!isset($_SESSION['authenticated'])) {
                                ?>

                                    <div class="col-md-12">
                                        <a href="javascript:void(0)" class="btn btn-inline" id="submit-review"><i class="icofont-water-drop"></i><span>drop your review</span></a>
                                    </div>
                                <?php
                                } else {
                                ?>

                                    <div class="col-md-12">

                                        <input type="hidden" name="redirect_url" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                                        <input type="hidden" id="customer_review_id" name="userreviewid" value="<?php echo $_SESSION['auth_user']['user_id'] ?>">
                                        <button type="submit" class="btn btn-inline" name="submit-review"><i class="icofont-water-drop"></i><span>drop your review</span></button>
                                    </div>
                                <?php
                                }
                                ?>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade " id="tab-otherdetails">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-details-frame">
                        <div class="tab-descrip">

                            <p><?php echo $result['general_info'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-heading">
                    <h2>related this items</h2>
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            <?php

            $current_product_id = $result['id'];
            $getrelated_products = new RelatedProductController;
            $get_rel_products = $getrelated_products->getcategoryProducts($current_product_id);
            if ($get_rel_products) {
                // print_r($get_rel_products);
                foreach ($get_rel_products as $related_products) {
            ?>
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">


                                <a class="product-image" href="<?php echo SITE_URL ?>product/<?php echo $related_products['url']; ?>">
                                    <div class="category-image">
                                        <img src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $related_products['image'] ?>" alt="product">
                                    </div>
                                </a>

                            </div>
                            <?php

                            $checkProdstock =  $getProduct->checkStockunit($related_products['id']);
                            $stock_left = $result['quantity'] - $checkProdstock;

                            ?>
                            <div class="product-content product-cart-box">
                                <div class="product-rating">
                                    <?php
                                    $reviews = new ReviewController;
                                    $getreviews = $reviews->getProductreviews($related_products['id']);
                                    if ($getreviews) {
                                        for ($i = 0; $i < $getreviews; $i++) {
                                    ?>

                                            <i class="active icofont-star"></i>
                                        <?php
                                        }
                                        $getreviews = $reviews->getnoofreviews($related_products['id']);
                                        ?>
                                        <a href="#">(<?php echo $getreviews; ?> reviews)</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <h6 class="product-name"><a href="<?php echo SITE_URL ?>product/<?php echo $related_products['url']; ?>"><?php echo substr(strip_tags($related_products['name']), 0, 20) . '...'; ?></a></h6>
                                <h6 class="product-price"><del>&#x20B9; <?php echo $related_products['regular_price'] ?></del><span>&#x20B9; <?php echo $related_products['price'] ?></span></h6>


                                <?php
                                if ($checkProdstock && $stock_left > 1) {
                                ?>
                                    <div class="product-action-1">
                                        <button data-productid="<?php echo $related_products['id'] ?>" class="product-add" title="Add to Cart"><i class="fas fa-shopping-basket add_to_cart_btn"></i><span>add</span></button>
                                        <div class="product-action hhh">
                                              <a class="btn btn-inline" href="cart.php">Go to cart</a>
                                            <!--<button data-productid="<?php echo $related_products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button>-->
                                            <input type="hidden" value="1" max="<?php echo $stock_left ?>" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                            <!--<button data-productid="<?php echo $related_products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button>-->
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    if ($stock_left > 1) {
                                    ?>
                                        <div class="product-action-1">
                                            <button data-productid="<?php echo $related_products['id'] ?>" class="product-add add_to_cart_btn" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                            <div class="product-action hjj">
                                                  <a class="btn btn-inline" href="cart.php">Go to cart</a>
                                                <!--<button data-productid="<?php echo $related_products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button>-->
                                                <input type="hidden" value="1" max="<?php echo $related_products['quantity'] ?>" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                                <!--<button data-productid="<?php echo $related_products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button>-->
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
        <div class="row">
            <!-- <div class="col-lg-12">
                <div class="section-btn-25"><a href="shop-4column.html" class="btn btn-outline"><i class="fas fa-eye"></i><span>view all related</span></a></div>
            </div> -->
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
    $(document).on('click', '.add-to-cart-btn-1', function() {
        //  alert("hjd");
        let prod_quantity = $("#product_quantity").val();
        let productid = $("#productid").val();
        // let admin_id = $('#admin_id').val();
        $.ajax({
            url: "<?php echo SITE_URL; ?>codes/add-to-cart.php",
            method: "post",
            data: {
                prod_quantity: prod_quantity,
                productid: productid,
                action: 'add-to-cart'
            },
            success: function(data) {

                location.reload();

            }

        });
    });

    // $('.add_to_cart_btn').on('click', function() {
    //     let productid = $(this).data('productid');
    //     var prod_quantity = $(this).closest('.product-cart-box').find('.cart-quantity').val();
    //     // alert(btnstatus);
    //     // alert(productid);

    //     $.ajax({
    //         url: "<?php echo SITE_URL; ?>codes/add-to-cart.php",
    //         method: "post",
    //         data: {
    //             prod_quantity: prod_quantity,
    //             productid: productid,
    //             action: 'add-to-cart'
    //         },
    //         success: function(data) {
    //            location.reload();
    //         }

    //     });

    // });

    $('#directcheckout').on('click', function() {
        let prod_quantity = $('#product_quantity').val();
        
        let productid = $('#productid').val();
        // alert(productid);
        var promax_qty = $('#product_quantity').attr("max");
        // alert(prod_quantity);
        // alert(productid);
        // alert(promax_qty);

          if  (parseInt(prod_quantity) < parseInt(promax_qty)) {
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
                        location.href = "<?php echo SITE_URL?>buy-now.php";

                        // setTimeout(function() {
                        //     window.location.reload();
                        // }, 3000);

                    }
                }

            });
        }
        else{
            $('#max_qtyerr').text("Max quantity is" + promax_qty + "left");
        }
        
    
    });
    
    $('.action-plus').on('click', function(){
        let prod_quantity = $('#product_quantity').val();

        let productid = $('#productid').val();

        var promax_qty = $('#product_quantity').attr("max");
         if (parseInt(prod_quantity) < parseInt(promax_qty)) {
        $('#max_qtyerr').text(" "); 
         }
         else{
         $('#max_qtyerr').text("Max quantity is" + promax_qty + "left"); 
         }
    })

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

                        // setTimeout(function() {
                        //     window.location.reload();
                        // }, 3000);

                    }
                }

            });
        }
        else{
            alert("Quantity not availabel");
        }

    });
    
    $("#checkserviceability").keyup('click', function(){
      let pincode =  $(this).val();
      let adminid = $('#adminid').val();
      let item_weight = $('#item_weight').val();
      let pincodelength = pincode.toString().length;
      if(pincodelength >= 6){
            $.ajax({
            url: "<?php echo SITE_URL; ?>codes/check-serviceability.php",
            method: "post",
            data: {
                adminid:adminid,
                pincode: pincode,
                item_weight:item_weight,
                action: 'service-check'
            },
            beforeSend: function() {
                
              $('#servicemessage').text("Please wait loading...");
            },
            success: function(data) {
                if (data != 'error') {
                 $('#servicemessage').text("Get it by date: " + data);
                 $('#servicemessage').css('color', '#2c6cc3');
                }
                else{
                $('#servicemessage').text("Delivery postcode not serviceable");
                 $('#servicemessage').css('color', 'red'); 
                }
               
            }

        });
      }
      
    });

    $(document).on('click', '.add-to-wishlist-btn', function() {
        //  alert("hjd");
        let customerid = $("#customer_id").val();
        let productid = $("#productid").val();
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
                    alertify.notify('Item added to wishlist', 'success', 5, function() {
                        console.log('dismissed');
                    });
                } else {
                    alertify.notify('Already added to wishlist', 'success', 5, function() {
                        console.log('dismissed');
                    });
                }
            }

        });
    });

    var modal = document.getElementById("loginmodal");

    var btn = document.getElementById("checkoutbtn");

    var dropreviewbtn = document.getElementById("submit-review");

    var span = document.getElementsByClassName("close")[0];
    dropreviewbtn.onclick = function() {
        modal.style.display = "block";
    }
    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

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

    let $easyzoom = $('.easyzoom').easyZoom();
</script>

<?php
include('inc/footer.php');
?>