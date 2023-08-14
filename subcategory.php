<?php
$title = "Category";
include('config/app.php');
include('codes/authentication_code.php');
include('controllers/CategoryController.php');
include('controllers/ProductController.php');
include('controllers/ReviewController.php');
include('controllers/WishlistController.php');
include('controllers/AuthenticationController.php');

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
</style>

<section class="inner-section single-banner" style="background: url(images/banner-image.jpg) no-repeat center;">
    <div class="container">
        <?php
        if (isset($_GET['url'])) {
            $url = validateInput($db->conn, $_GET['url']);
            $subcategory = new CategoryController;
            $getall_result = $subcategory->subcategoryurlname($url);
            if ($getall_result) {
                foreach ($getall_result as $resultnames)

        ?>
                <h2><?php echo $resultnames['name'] ?></h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item c_white"><a href="/">Home</a> / </li>
                    <li class="breadcrumb-item c_white" aria-current="page"><a href="<?php echo SITE_URL ?>category/<?php echo $resultnames['cat_url'] ?> "><?php echo $resultnames['cat_name'] ?> </a>/ </li>
                    <li class="breadcrumb-item c_white" aria-current="page"> <a href=""><?php echo $resultnames['name'] ?></a> </li>
                </ol>
        <?php
            }
        }
        ?>
    </div>
</section>


<section class="inner-section shop-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="top-filter">
                    <div class="filter-show"></div>
                    <div class="filter-short"><label class="filter-label">Short by :</label><select id="tags" class="form-select filter-select">
                            <option value="">default</option>
                            <option value="trending">trending</option>
                            <option value="featured">featured</option>
                            <option value="recommend">recommend</option>
                        </select></div>
                    <div class="filter-short"><label class="filter-label">Price :</label>
                        <select id="price_sorting" class="form-select filter-select">
                            <option value="">default</option>
                            <option value="1">Hight to low</option>
                            <option value="2">Low to high</option>

                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-5" id="load_more_product">

            <?php


            if (isset($_GET['url'])) {
                $url = validateInput($db->conn, $_GET['url']);
                $category = new CategoryController;

                if (isset($_POST['price_filter'])) {
                    $price_filter = $_POST['price_filter'];
                }
                $result = $category->getsubCategorybyurl($url);

                if ($result) {


                    $product = new ProductController;
                    $getProduct = $product->getsubcategoryProducts($result);
                    if ($getProduct) {
                        // print_r($getProduct);
                        foreach ($getProduct as $category_products) {

            ?>
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-media">

                                        <?php if (!isset($_SESSION['authenticated'])) { ?>
                                            <button class="product-wishlist-modal product-wish wish"><i class="fas fa-heart"></i></button>

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
                                            <a href="#" class="product-wish wish add-to-wishlist-btn" data-productid="<?php echo $category_products['id'] ?>"><i class="fas fa-heart"></i></a>

                                        <?php
                                        }
                                        ?>
                                        <a class="product-image" href="<?php echo SITE_URL ?>product/<?php echo $category_products['url'] ?>">
                                            <div class="category-image">
                                                <img src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $category_products['image'] ?>" alt="product">
                                            </div>

                                        </a>

                                    </div>
                                    <?php

                                    $checkProdstock =  $product->checkStockunit($category_products['id']);
                                    $stock_left = $category_products['quantity'] - $checkProdstock;

                                    ?>
                                    <div class="product-content product-cart-box">
                                        <div class="product-rating">
                                            <?php
                                            $reviews = new ReviewController;
                                            $getreviews = $reviews->getProductreviews($category_products['id']);
                                            if ($getreviews) {
                                                for ($i = 0; $i < $getreviews; $i++) {
                                            ?>

                                                    <i class="active icofont-star"></i>
                                                <?php
                                                }
                                                $getreviews = $reviews->getnoofreviews($category_products['id']);
                                                ?>
                                                <a href="#">(<?php echo $getreviews; ?> reviews)</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <h6 class="product-name"><a href="<?php echo SITE_URL ?>product/<?php echo $category_products['url']; ?>"><?php echo substr(strip_tags($category_products['name']), 0, 20) . '...'; ?></a></h6>
                                        <h6 class="product-price"><del>&#x20B9; <?php echo $category_products['regular_price'] ?></del><span>&#x20B9; <?php echo $category_products['price'] ?></span></h6>

                                        <?php
                                        if ($checkProdstock && $stock_left > 1) {
                                        ?>
                                            <div class="product-action-1">
                                                <button data-productid="<?php echo $category_products['id'] ?>" class="product-add add_to_cart_btn" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                                <div class="product-action hhh">
                                                <a class="btn btn-inline" href="<?php echo SITE_URL?>cart.php">Go to cart</a>    
                                                <!-- <button data-productid="<?php echo $category_products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button> -->
                                                    <input  type="hidden" value="1" max="<?php echo $stock_left ?>" id="product_quantity" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                                    <!-- <button data-productid="<?php echo $category_products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button> -->
                                                </div>
                                            </div>
                                            <?php
                                        } else {
                                            if ($stock_left > 1) {
                                            ?>
                                                <div class="product-action-1">
                                                    <button data-productid="<?php echo $category_products['id'] ?>" class="product-add add_to_cart_btn" title="Add to Cart"><i class="fas fa-shopping-basket"></i><span>add</span></button>
                                                    <div class="product-action hjj">
                                                            <a class="btn btn-inline" href="<?php echo SITE_URL?>cart.php">Go to cart</a>
                                                    <!-- <button data-productid="<?php echo $category_products['id'] ?>" class="action-minus add_to_cart_btn" title="Quantity Minus"><i class="icofont-minus"></i></button> -->
                                                        <input type="hidden" value="1" max="<?php echo $category_products['quantity'] ?>" id="product_quantity" value="1" title="Quantity Number" name="qtybutton" class="cart-quantity action-input cart-plus-minus-box">
                                                        <!-- <button data-productid="<?php echo $category_products['id'] ?>" class="action-plus add_to_cart_btn" title="Quantity Plus"><i class="icofont-plus"></i></button> -->
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
                        $lastproduct_id = $category_products['id'];
                   
                    ?>
                    <div class="row" id="remove_row">
                        <div class="col-lg-12">
                            <div class="section-btn-25">
                                <button id="show-more-btn" data-productid="<?php echo $lastproduct_id; ?>" class="btn btn-outline"><i class="fas fa-eye"></i><span>show more</span></button>
                            </div>
                        </div>
                    </div>
                    <?php
                     }
                     else{
                        echo "<h2>Not Found</h2>";
                    
                    }
                    ?>
            <?php
                }
               
            }
            ?>



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
    $(document).ready(function() {
        $('#priceinput').on('change', function() {
            document.getElementById("price_filter_form").submit();
        });
        $('#sorting_vals').on('change', function() {
            document.getElementById("sorting_form").submit();
        });

    });


    var formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'INR',

    });




    function loadproducts(last_product_id) {
        //  alert(sortValue);
        let subcategoryid = "<?php echo $result; ?>";
        let sortValue = $('#price_sorting').val();
        let tags = $('#tags').val();
        $.ajax({
            url: "<?php echo SITE_URL;?>codes/product.php",
            method: "POST",
            data: {
                last_product_id: last_product_id,
                subcategoryid: subcategoryid,
                sortValue: sortValue,
                tags: tags,
                action: 'load-subcatproducts'
            },
            dataType: "text",
            success: function(data) {
                if (data != '') {
                    $('#remove_row').remove();
                    $('#load_more_product').append(data);


                } else {
                    $('#show-more-btn').html("No Data");
                }
            }
        });
    }

    function loadproductByfilters(last_product_id) {
        let subcategoryid = "<?php echo $result; ?>";
        let sortValue = $('#price_sorting').val();
        let tags = $('#tags').val();
        $.ajax({
            url: "<?php echo SITE_URL;?>codes/product.php",
            method: "POST",
            data: {
                last_product_id: last_product_id,
                subcategoryid: subcategoryid,
                sortValue: sortValue,
                tags: tags,
                action: 'load-subfilterproducts'
            },
            dataType: "text",
            success: function(data) {
                if (data != '') {

                    $('#load_more_product').html(data);


                } else {
                    $('#show-more-btn').html("No Data");
                }
            }
        });
    }


    $('#show-more-btn').on('click', function() {
        var last_product_id = $(this).data("productid");
        loadproducts(last_product_id);
    });

    $('#price_sorting').on('change', function() {
        var last_product_id = $('#show-more-btn').data("productid");
        loadproductByfilters(last_product_id);

    });

    $('#tags').on('change', function() {
        var last_product_id = $('#show-more-btn').data("productid");
        loadproductByfilters(last_product_id);

    });

    $('.add_to_cart_btn').on('click', function() {
        let productid = $(this).data('productid');
        var prod_quantity = $(this).closest('.product-cart-box').find('.cart-quantity').val();
        // alert(btnstatus);
        // alert(productid);

        $.ajax({
            url: "<?php echo SITE_URL; ?>codes/add-to-cart.php",
            method: "post",
            data: {
                prod_quantity: prod_quantity,
                productid: productid,
                action: 'add-to-cart'
            },
            success: function(data) {
                // console.log(data);
                        let mydata = JSON.parse(data);

                        $("#cart_qnt").text(mydata.cart_quantity);
                        $("#cart_tot").text(mydata.cart_total);
                        $("#cart_tot_mobile").text(mydata.cart_quantity);

                // setTimeout(function() {
                //     window.location.reload();
                // }, 3000);
            }

        });

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


    var modal = document.getElementById("loginmodal");

    var modal = document.getElementById("loginmodal");

    $('#load_more_product').on('click', '.product-wishlist-modal', function() {
        modal.style.display = "block";
    });
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