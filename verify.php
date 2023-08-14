<?php
include('config/app.php');
require('config.php');

include('codes/authentication_code.php');
include('controllers/CategoryController.php');
include('controllers/CheckoutController.php');
include('controllers/ProductController.php');
include('controllers/WishlistController.php');
include('controllers/AddtocartController.php');


require('razorpay/Razorpay.php');
$checkaddtocart = new AddtocartController;
$checkcart = $checkaddtocart->checkcartiexist();

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
$title = "Thank You";

include('inc/header.php');

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false) {
    $api = new Api($keyId, $keySecret);

    try {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    } catch (SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

?>


<section class="inner-section single-banner" style="background: url(images/banner-image.jpg) no-repeat center;">
    <div class="container">
        <h2>Thanks</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item " style="color:#fff;" aria-current="page"> /Thanks</li>
        </ol>
    </div>
</section>


<section class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if ($success === true) {
                    
                    $html = "<p>Your payment was successful</p>
                             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>
                           ";
                             
                   
                } else {
                    $html = "<p>Your payment failed</p>
                             <p>{$error}</p>";
                }
                echo $html;
                ?>
            </div>
        </div>
        <?php
        // print_r($_SESSION['order_details']);
        if (isset($_SESSION['order_details'])) {
            $update_payment_status = new CheckoutController;
           $updated_status = $update_payment_status->update_pay_status($_SESSION['order_details']['order_id']);
            print_r($updated_status);
        ?>
        

            <div class="row">

                <div class="col-md-3">

                    <ul>
                        <li>Order Number:<strong><?php echo $_SESSION['order_details']['order_id'] ?></strong></li>
                        <li>Order Date:<span><?php echo $_SESSION['order_details']['date'] ?></span></li>
                        <li>Order Status:<span><?php echo $_SESSION['order_details']['status'] ?></span></li>
                        <li>Payment Information:<span><?php echo $_SESSION['order_details']['payment_info'] ?></span></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Full Name:<span><?php echo $_SESSION['order_details']['ship_firstname'] . $_SESSION['order_details']['ship_lastname']  ?> </span></li>
                        <li>Email:<span><?php echo $_SESSION['order_details']['ship_email'] ?></span></li>
                        <li>Phone:<span><?php echo $_SESSION['order_details']['ship_phone'] ?></span></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Address1:<span><?php echo $_SESSION['order_details']['ship_address1'] ?></span></li>
                        <li>Address2:<span><?php echo $_SESSION['order_details']['ship_address2'] ?></span></li>
                        <li>City:<span><?php echo $_SESSION['order_details']['ship_city'] ?></span></li>
                        <li>Zip:<span><?php echo $_SESSION['order_details']['ship_zip'] ?></span></li>
                        <li>State:<span><?php echo $_SESSION['order_details']['ship_zone'] ?></span></li>
                        <li>Country:<span><?php echo $_SESSION['order_details']['ship_country'] ?></span></li>
                    </ul>
                </div>
                <div class="col-md-12">
                <div class="table-scroll">
                                <table class="table-list custom-responsive-table">
                        <thead>
                            <th>Sr No.</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </thead>
                        <tbody>
                            <?php
                            $carttotal = 0;
                            if (isset($_SESSION["add-to-cart"])) {
                                $count = 1;
                                
                                foreach ($_SESSION["add-to-cart"] as $key => $cart) {
                                    $carttotal = $carttotal + ($cart['prod_quant'] * $cart['price']);
                            ?>
                                    <tr>
                                        <td data-label="Srno"><?php echo $count; ?></td>
                                        <td data-label="Product Name"><?php echo $cart['prod_name'] ?></td>
                                        <td data-label="Product"><img style="width:60px" class="product_img" src="<?php echo SITE_URL; ?>admin/assets/product-images/<?php echo $cart['prod_image'] ?>" alt=""> </td>
                                        <td data-label="Quantity"><?php echo $cart['prod_quant'] ?></td>
                                        <td data-label="Price"> &#8377 <?php echo $cart['price'] ?></td>

                                    </tr>
                            <?php
                                    $count++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    </div>
                    <div class="col-lg-12">
                        <h3>Grand Total: &#8377 <span><?php echo  $carttotal; ?></span></h3>
                    </div>
                     <?php unset($_SESSION["add-to-cart"]); ?> 
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</section>

<?php
include('inc/footer.php');
?>