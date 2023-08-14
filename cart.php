<?php
$title = "Cart";
include('config/app.php');
include('codes/authentication_code.php');
include('controllers/CategoryController.php');
include('controllers/ProductController.php');
include('controllers/WishlistController.php');
include('controllers/AuthenticationController.php');

include('inc/header.php');
?>
<style>
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

    .update_cart {
        display: none;
    }
</style>
<section class="inner-section single-banner" style="background: url(images/banner-image.jpg) no-repeat center;">
    <div class="container">
        <h2>Cart</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a> /</li>
            <li class="breadcrumb-item" style="color:#fff;" aria-current="page">Cart</li>
        </ol>
    </div>
</section>


<section class="inner-section checkout-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert-info">
                    <!-- <p>Returning customer? <a href="login.html">Click here to login</a></p> -->
                </div>
            </div>
            <?php
            if (isset($_SESSION["add-to-cart"])) {
                if (count($_SESSION["add-to-cart"]) >= 1) {
            ?>
                    <div class="col-lg-12">
                        <div class="account-card">
                            <div class="account-title">
                                <h4>Your order</h4>
                            </div>
                            <div class="account-content" >
                              <div id="cart_products">
                                  
                              </div>
                              <div id="cart-total-price">
                                  
                              </div>
                            </div>
                        </div>
                    </div>
         

        </div>

        <?php if (!isset($_SESSION['authenticated'])) { ?>

            <div class="checkout-proced"><a id="checkoutbtn" class="btn btn-inline">proced to
                    checkout</a></div>
        <?php
        } else {
        ?>

            <div class="checkout-proced"><a href="checkout.php" class="btn btn-inline">proced to
                    checkout</a></div>
        <?php
        }
    }
    else{
        echo "<a class='btn btn-outline' href='index.php'>Nothing In cart continue shopping</a>";
    }
}
        ?>

    </div>

</section>




<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="" class="" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <input class="form-control" type="text" id="email" name="email" name="email" placeholder="Email*">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="password" name="password" name="password" placeholder="Password*">
                <p style="display:none; color:red;" id="pass_err">Password must contain of 1 uppercase character,1 lowercase character, 1 digit,1 special character, and minimum length of 8 characters.</p>
            </div>
            <div class="form-group">
                <label class="checkbox-inline">
                    <input type="checkbox" onclick="showPassword()">Show Password

                </label>
            </div>
            <div class="form-group">
                <button name="checkout-login" type="submit" class="btn btn-info" type="submit">LOGIN</button>
            </div>
        </form>
        <span>Not a member?</span><a href="register.php">Click here to register.</a>
    </div>

</div>
<script>
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

    $(document).on('click', '.qtybutton', function() {
        
        var product_quantity = $(this).closest('.cart-plus-minus').find('.cart_quantity').val();
        var productid = $(this).data('product_id');
        var maxqty = $(this).closest('.cart-plus-minus').find('.cart_quantity').attr('max');
       if(parseInt(product_quantity) < parseInt(maxqty)){
        $.ajax({
            url: "codes/add-to-cart.php",
            method: "post",
            data: {
                product_quantity: product_quantity,
                productid: productid,
                action: 'update-cart'
            },
            success: function(data) {
                if (data) {
                    //   console.log(data);
                        let mydata = JSON.parse(data);

                        $("#cart_qnt").text(mydata.cart_quantity);
                        $("#cart_tot").text(mydata.cart_total);
                        $("#cart_tot_mobile").text(mydata.cart_quantity);
                    loadcartproducts();
                     loadcarttotal();
                        
                }
            }
        });
       }
       else{
            var qtyerror = $(this).closest('.cart-plus-minus').find('.qtyerr');
            qtyerror.text("Max quantity is" + maxqty + "left");
       }

    });

    $(document).on('click', '.remove-products', function() {
        var productid = $(this).data('productid');
        $.ajax({
            url: "codes/add-to-cart.php",
            method: "post",
            data: {
                productid: productid,
                action: 'delete-cart'
            },
            success: function(data) {

                 loadcartproducts();
                loadcarttotal();

            }
        });
    });


    function loadcartproducts(){
         $.ajax({
            url: "codes/add-to-cart.php",
            method: "post",
            data: {
                action: 'load-cart'
            },
            success: function(data) {
                console.log(data);
                if(data){
                $("#cart_products").html(data);
                }
                let cartqty = $('#cart_qty').val();
                if(cartqty < 1){
                    location.href="index.php";
                }
               
            }
        });
    }
    
    
    loadcartproducts();
     loadcarttotal();
      function loadcarttotal(){
         $.ajax({
            url: "codes/add-to-cart.php",
            method: "post",
            data: {
                action: 'card-total-price'
            },
            success: function(data) {
                $("#cart-total-price").html(data);
            }
        });
    }

    $(document).on('click', '.cart_quantity-btn', function() {
        var btnstatus = $(this).closest('.cart-plus-minus').find('.update_cart');
        btnstatus.show();

    });

    var modal = document.getElementById("myModal");

    var btn = document.getElementById("checkoutbtn");

    var span = document.getElementsByClassName("close")[0];

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
</script>
<?php
include('inc/footer.php');
?>