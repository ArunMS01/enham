<?php

include('config/app.php');
include('codes/authentication_code.php');
include('controllers/CategoryController.php');
include('controllers/ProductController.php');
include('controllers/WishlistController.php');
include('controllers/AuthenticationController.php');
include('controllers/AddtocartController.php');
$checkaddtocart = new AddtocartController;
$checkcart = $checkaddtocart->checkcartiexist();
$title = "Thank You";
include('inc/header.php');
?>

<section class="inner-section single-banner" style="background: url(images/banner-image.jpg) no-repeat center;">
    <div class="container">
        <h2>Thanks</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item" style="color:#fff" aria-current="page">Thanks</li>
        </ol>
    </div>
</section>


<section class="inner-section">
    <div class="container">
        <?php
        // print_r($_SESSION['order_details']);
        if (isset($_SESSION['order_details'])) {
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
                                if (isset($_SESSION["add-to-cart"])) {
                                    $count = 1;
                                    $carttotal = 0;
                                    foreach ($_SESSION["add-to-cart"] as $key => $cart) {
                                        $carttotal = $carttotal + ($cart['prod_quant'] * $cart['price']);
                                ?>
                                        <tr>
                                            <td data-label="Sr No."><?php echo $count; ?></td>
                                            <td data-label="Product name"><?php echo $cart['prod_name'] ?></td>
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




<script>
    function showPassword() {
        var x = document.getElementById("password");
        var y = document.getElementById("cpassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }

    var fname = document.getElementById("fname");
    var email = document.getElementById("email");
    var passowrd = document.getElementById("password");
    var cpassword = document.getElementById("cpassword");

    let validEmail = false;
    let validPassword = false;
    let validName = false;

    fname.addEventListener('blur', () => {
        let str = fname.value;
        // alert(str);
        console.log(str);
        if (str) {
            fname.classList.add('is-valid');
            fname.classList.remove('is-invalid');
            validName = true;
            // alert(str);
        } else {
            fname.classList.remove('is-valid');
            fname.classList.add('is-invalid');
            validName = false;

        }
    })

    email.addEventListener('blur', () => {
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
    password.addEventListener('blur', () => {
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
</script>

<?php
include('inc/footer.php');
?>