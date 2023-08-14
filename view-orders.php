<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$title = "View Orders Details";
include('config/app.php');
include('controllers/AuthenticationController.php');
include('controllers/UserordersController.php');
include('controllers/CategoryController.php');
include('controllers/ProductController.php');
include('controllers/WishlistController.php');
$authenticated = new AuthenticationController;
$data = $authenticated->authDetail();
include('inc/header.php');
?>

<style>
    .tracking-data-modal {
        position: fixed;
        top: 140px;
        right: 0;
        left: 0;
        width: 50%;
        margin: auto;
        display: none;
        background: #fff;
        border-radius: 20px;
        padding: 20px;
        border: 1px solid #3169d8;
        z-index: 200;
    }

    .tracking-data-modal .close-modalt {
        float: right;
        cursor: pointer;
    }
</style>

<section class="inner-section single-banner" style="background: url(images/banner-image.jpg) no-repeat center;">
    <div class="container">
        <h2>View Orders</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item" style="color:#fff;" aria-current="page">/View Orders</li>
        </ol>
    </div>
</section>

<div id="track-data-model" class="tracking-data-modal">
    <span class="close-modalt"><i class="fa fa-window-close" aria-hidden="true"></i></span>
    <h3>Tracking Details</h3>
    <div id="trackinginfo">

    </div>
</div>


<section class="inner-section wallet-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping-cart-inner">
                    <div class="row">
                        <?php
                        if (isset($_GET['id'])) {
                            $orderedid = validateInput($db->conn, $_GET['id']);
                        }

                        $getorders = new UserordersController;
                        $getOrderid = $getorders->getOrderid($orderedid);
                        if ($getOrderid) {
                            $orderId = $getOrderid['order_id'];
                            $getorderdetails = $getorders->orderDetails($orderId);
                            if ($getorderdetails) {
                                $getOrdernumber =   $getorderdetails['order_number'];
                                $getCustomername = $getorderdetails['ship_firstname'] . ' ' . $getorderdetails['ship_lastname'];
                                $getcustomerphone = $getorderdetails['ship_phone'];
                                $getcustomermail = $getorderdetails['ship_email'];
                            }
                        }


                        $getorders = new UserordersController;
                        $getOrderid = $getorders->getOrderid($orderedid);
                        if ($getOrderid) {
                            $orderId = $getOrderid['order_id'];
                        }
                        $getOrderitems = $getorders->get_ordered_items($orderId);
                        if ($getOrderitems) {
                            foreach ($getOrderitems as $order_items) {
                                $getProdname = new ProductController;
                                $prodDetails = $getProdname->getProductnamebyId($order_items['product_id']);
                                foreach ($prodDetails as $prods) {
                                    $productname = $prods['name'];
                                    $admin_id = $prods['admin_id'];
                                    $productimage =  $prods['image'];
                                }

                        ?>
                                <div class="col-lg-6">
                                    <div class="account-card mt-5">

                                        <h4 class="account-title"><?php echo $productname; ?> x <?php echo $order_items['quantity'] ?></h4>
                                        <strong><?php echo $order_items['item_status'] ?></strong>
                                        <?php
                                        if (!empty($order_items['tracking_id'])) {
                                        ?>
                                            <a href="javascript:void(0)" data-admin_id='<?php echo $admin_id ?>' class="track-order btn btn-inline" data-trackingid="<?php echo $order_items['tracking_id'] ?>">Track your order</a>

                                        <?php
                                        }
                                        ?>

                                        <div class="my-wallet">
                                            <img width="100px" src="<?php echo SITE_URL ?>admin/assets/product-images/<?php echo $productimage; ?>" alt="">
                                            <span>Total Price: &#8377;<?php echo $order_items['quantity'] * $order_items['total'] ?></span>
                                        </div>
                                        <?php
                                        // $dateofdelivery =  date("Y-m-d", strtotime($order_items['delivery_date']));

                                        // echo $order_items['delivery_date'];
                                        $dateofcreation =  date("Y-m-d", strtotime($order_items['delivery_date']));
                                        $current_date = date("Y-m-d");
                                        $diff = abs(strtotime($current_date) - strtotime($dateofcreation));
                                        $years = floor($diff / (365 * 60 * 60 * 24));
                                        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                                        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));


                                        if ($days + 1 <= 4) {
                                        ?>

                                            <div class="wallet-card-group">
                                                <div class="wallet-card">
                                                    <form class="" action="codes/cancel-order.php" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <input type="hidden" value="<?php echo  $productname; ?>" name="productnamec">
                                                            <input type="hidden" name="orderidnumber" value="<?php echo $getOrdernumber ?>">
                                                            <input type="hidden" name="customername" value="<?php echo $getCustomername ?>">
                                                            <input type="hidden" name="customermail" value="<?php echo $getcustomermail; ?>">
                                                            <input type="hidden" name="customerphone" value="<?php echo $getcustomerphone ?>">
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="orderitem_id" value="<?php echo $order_items['id'] ?>">
                                                                <div class="form-group">
                                                                    <label for="">Reason of cancellation</label>
                                                                    <select class="form-control" required name="cancel_reason" id="">
                                                                        <option value="wrong product">Wrong product</option>
                                                                        <option value="defective product">Defective product</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <select class="form-control" name="cancel_status" id="">
                                                                        <option value="Cancelled By User">Cancel</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <input type="file" name="product_images" required class="form-control">
                                                                </div>

                                                            </div>

                                                            <div class="col-md-12 mt-2">
                                                                <button class="btn btn-inline" name="cancel_btn" type="submit">Cancel Order</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php

                                        }
                                        ?>
                                    </div>
                                </div>

                        <?php
                            }
                        }

                        ?>

                        <?php
                        if (isset($_GET['id'])) {
                            $id = validateInput($db->conn, $_GET['id']);
                        }
                        $getorders = new UserordersController;
                        $getOrderid = $getorders->getOrderid($id);
                        if ($getOrderid) {
                            $orderId = $getOrderid['order_id'];
                            $getorderdetails = $getorders->orderDetails($orderId);
                            // print_r($getorderdetails);
                            if ($getorderdetails) {

                        ?>
                                <div class="account-card mt-5">
                                  
                                        <h4 class="account-title">OrderId #<?php echo $getorderdetails['order_number'] ?> </h4>

                                    <div class="card-body">
                                        <h4>Shipping Address</h4>
                                        <strong>Grand Total: Rs/- <?php echo $getorderdetails['total'] ?></strong>
                                        <br>
                                        <strong><?php echo $getorderdetails['ship_firstname'] . ' ' . $getorderdetails['ship_lastname'] ?></strong>
                                        <p><?php echo $getorderdetails['ship_phone']  ?></p>
                                        <p><?php echo $getorderdetails['ship_address1']  . ' ' . $getorderdetails['ship_address2']
                                                . ' ' .  $getorderdetails['ship_city'] . ' ' . $getorderdetails['ship_zone']  . ' ' . $getorderdetails['ship_country']
                                                . ' ' .  $getorderdetails['ship_zip']
                                            ?></p>
                                    </div>
                                </div>

                        <?php

                            }
                        }
                        ?>


                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<script>
    $('.close-modalt').on('click', function() {
        $('#track-data-model').hide();
    })
    $('.track-order').on('click', function() {
        let trackingid = $(this).data('trackingid');

        let admin_id = $(this).data('admin_id');

        $.ajax({
            url: "<?php echo SITE_URL; ?>admin/codes/get-itemlocation.php",
            method: "post",
            data: {
                trackingid: trackingid,
                admin_id: admin_id,
                action: 'item_location'
            },
            success: function(data) {
                if (data) {
                    $('#track-data-model').show();
                    $("#trackinginfo").html(data);
                    // console.log(data);

                }
            }

        });
    });
</script>

<?php
include('inc/footer.php');
?>