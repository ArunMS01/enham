<?php

include('config/app.php');
include('controllers/CategoryController.php');
include('controllers/ProductController.php');
include('controllers/UserController.php');
include('controllers/WishlistController.php');
include('controllers/AuthenticationController.php');
$checkifuserislogin = new UserController;
$usercheck = $checkifuserislogin->checkifregsitereduserbuyingnow();
$title = "Buy Now";
include('inc/header.php');
?>
<style>
      #paymentfailed{
        color:red;
    }
</style>

<section class="inner-section"></section>

<section class="inner-section ">
    <div class="container ">
        <div class="row card">
            <?php include('message.php')?>
            <div class="col-lg-12 card-body">
                 <p id="paymentfailed"></p>
                <?php
                if (count($_SESSION["add-to-cart"]) >= 1) {
                ?>
                    <form action="codes/guest-checkout.php" method="POST" onsubmit="return validate()">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Personal Information</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="customername" name="customer_name" placeholder="First Name" value="">
                                            <small style="display:none; color:red;" id="name_err">Name Can not empty</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input value="" class="form-control" type="text" id="customerlastname" name="customer_lastname" placeholder="Last name">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="email" id="customeremail" value="" name="customer_email" placeholder="email address">
                                            <small style="display:none; color:red;" id="email_err">Please Fill email in correct format</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-phone ltn__custom-icon">
                                            <input class="form-control" type="number" id="customerphone" name="customer_phone" placeholder="phone number">
                                            <small style="display:none; color:red;" id="phone_err">Only 10 digits are allowed</small>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <h6>Country</h6>
                                        <div class="form-group">
                                            <select class="form-control" id="customercountry" name="customer_country">

                                                <option>India</option>

                                            </select>
                                            <small style="display:none; color:red;" id="country_err">Please Select City</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <h6>Address</h6>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="customeraddressf" name="customer_addressf" placeholder="House number and street name">
                                                    <small style="display:none; color:red;" id="addressf_err">Please Fill address</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="customeraddresssec" name="customer_addrest" placeholder="Apartment, suite, unit etc. (optional)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-lg-4 col-md-6">
                                        <h6>State </h6>
                                        <div class="input-item">
                                            <select class="form-control" type="text" id="customerstate" name="customer_state" >
                                                </select>
                                            <small style="display:none; color:red;" id="state_err">Please Fill address</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <h6>Town / City</h6>
                                        <div class="input-item">
                                            <input class="form-control" type="text" id="customercity" name="customer_city" placeholder="City">
                                            <small style="display:none; color:red;" id="city_err">Please Fill City</small>
                                        </div>
                                    </div>
                                  
                                    <div class="col-lg-4 col-md-6">
                                        <h6>Zip</h6>
                                        <div class="input-item">
                                            <input class="form-control" type="text" id="customerzip" name="customer_zip" placeholder="Zip">
                                            <small style="display:none; color:red;" id="zip_err">Please Fill Zip Code</small>
                                        </div>
                                    </div>

                
                                </div>
                                <!-- <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> Create an account?</label></p> -->
                                <!-- <h6>Order Notes (optional)</h6>
                                <div class="input-item input-item-textarea ltn__custom-icon">
                                    <textarea name="customer__message" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div> -->

                                <?php
                                if ($_SESSION["add-to-cart"]) {
                                    $carttotal = 0;
                                    foreach ($_SESSION["add-to-cart"] as $key => $cart) {
                                        $carttotal = $carttotal + ($cart['prod_quant'] * $cart['price']);
                                    }
                                } ?>

                                <input value="<?php echo $carttotal; ?>" id="total_price" type="hidden" name="total_price">
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4 class="">Payment Method</h4>
                                        <div class="form-group">
                                            <input type="radio" class="payment-method" value="razorpay" required name="payment_method">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Razorpay
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <input type="radio" class="payment-method" value="Cash on delivery" required name="payment_method">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Cash on delivery
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="title-2">Cart Totals</h4>
                                <table class="table">
                                    <tbody>
                                        <?php if (isset($_SESSION["add-to-cart"])) {
                                            foreach ($_SESSION["add-to-cart"] as $key => $cart) {
                                                $producttotal = '';
                                                $producttotal = $cart['prod_quant'] * $cart['price'];
                                        ?>
                                                <tr>
                                                    <td><?php echo $cart['prod_name'] ?> <strong>× <?php echo $cart['prod_quant'] ?></strong></td>
                                                    <td>&#x20B9; <span><?php echo $producttotal; ?></span></td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>

                                        <tr>
                                            <td>Shipping and Handing</td>
                                            <td>&#x20B9; 0</td>
                                        </tr>

                                        <tr>
                                            <?php
                                            if ($_SESSION["add-to-cart"]) {
                                                $carttotal = 0;
                                                foreach ($_SESSION["add-to-cart"] as $key => $cart) {
                                                    $carttotal = $carttotal + ($cart['prod_quant'] * $cart['price']);
                                                }
                                            }
                                            ?>
                                            <td><strong>Order Total</strong></td>
                                            <td>&#x20B9; <strong><?php echo $carttotal; ?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button id="placeordernow" class="btn btn-outline" name="directcheckoutbtn">Place order</button>

                            </div>
                        </div>
                    </form>


                <?php
                } else {
                ?>
                    <a href="index.php" class="btn btn-inline">Continue Shopping</a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<script src="country.js"></script>

<script>

    drawstate("IN");

    function drawstate(val) {
        countryoption = val;
        $('#customerstate').html('<option>--Select State--</option>');

        $.each(state, function(index, value) {
            // APPEND OR INSERT DATA TO SELECT ELEMENT.
            if (value.countryCode == val) {
                $('#customerstate').append('<option  value="' + value.name + '" data-country="' + value.countryCode + '">' + value.name + '</option>');
            }
        });
    }

    $('.moreaddreses').on('click', function() {
        var address1 = $(this).closest('.more-multiple-addresses').find('.address1').val();
        var address2 = $(this).closest('.more-multiple-addresses').find('.address2').val();
        var city = $(this).closest('.more-multiple-addresses').find('.city').val();
        var counrty = $(this).closest('.more-multiple-addresses').find('.counrty').val();
        var zip = $(this).closest('.more-multiple-addresses').find('.zip').val();
        var zone = $(this).closest('.more-multiple-addresses').find('.zone').val();

        $('#customeraddressf').val(address1);
        $('#customeraddresssec').val(address2);
        // $('#customercountry').val(counrty).trigger('change');
        $('#customercity').val(city);
        $('#customerzip').val(zip);
        $('#customerstate').val(zone);
    });

    $('#address1').on('click', function() {

        var address1 = $(this).closest('#multiple-addresses1').find('.address1').val();
        var address2 = $(this).closest('#multiple-addresses1').find('.address2').val();
        var city = $(this).closest('#multiple-addresses1').find('.city').val();
        var counrty = $(this).closest('#multiple-addresses1').find('.counrty').val();
        var zip = $(this).closest('#multiple-addresses1').find('.zip').val();
        var zone = $(this).closest('#multiple-addresses1').find('.zone').val();

        $('#customeraddressf').val(address1);
        $('#customeraddresssec').val(address2);
        // $('#customercountry').val(counrty).trigger('change');
        $('#customercity').val(city);
        $('#customerzip').val(zip);
        $('#customerstate').val(zone);

    });

    $('#different_address').on('click', function() {
        $('#customeraddressf').val(' ');
        $('#customeraddresssec').val(' ');
        // $('#customercountry').val(counrty).trigger('change');
        $('#customercity').val(' ');
        $('#customerzip').val(' ');
        $('#customerstate').val(' ');
    });

   

    function validate() {
         var email = document.getElementById("customeremail");
        var name = document.getElementById("customername");
        var phone = document.getElementById("customerphone");
        var country = document.getElementById("customercountry");
        var state = document.getElementById("customerstate");
        var city = document.getElementById("customercity");
        var zip = document.getElementById("customerzip");
        var addressf = document.getElementById("customeraddressf");

        var name_err = document.getElementById("name_err");
        var email_err = document.getElementById("email_err");
        var phone_err = document.getElementById("phone_err");
        var country_err = document.getElementById("country_err");
        var city_err = document.getElementById("city_err");
        var zip_err = document.getElementById("zip_err");
        var addressf_err = document.getElementById("addressf_err");
        let validzip = false;
        let validaddressf = false;
        let validcity = false;
        let validcountry = false;
        let validname = false;
        let validemail = false;
        let validphone = false;

          
        let strzip = zip.value;
        if (strzip != '') {
            document.getElementById("zip_err").style.display = "none";
            validzip = true;
        } else {
            document.getElementById("zip_err").style.display = "block";
            validzip = false;

        }

        let straddressf = addressf.value;
        if (straddressf != '') {
            document.getElementById("addressf_err").style.display = "none";
            validaddressf = true;
        } else {
            document.getElementById("addressf_err").style.display = "block";
            validaddressf = false;

        }

        let strcity = city.value;
        if (strcity != '') {
            document.getElementById("city_err").style.display = "none";
            validcity = true;
        } else {
            document.getElementById("city_err").style.display = "block";
            validcity = false;

        }

        let strcountry = country.value;
        if (strcountry != '') {
            document.getElementById("country_err").style.display = "none";
            validcountry = true;
        } else {
            document.getElementById("country_err").style.display = "block";
            validcountry = false;

        }

        let regexname = /^[a-zA-Z]([0-9a-zA-Z]){2,20}$/;
        let strname = name.value;
        if (regexname.test(strname)) {
            document.getElementById("name_err").style.display = "none";
            validname = true;
        } else {
            document.getElementById("name_err").style.display = "block";
            validname = false;

        }

        console.log("email is blurred");
        let regexemail = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
        let stremail = email.value;
        if (regexemail.test(stremail)) {
            document.getElementById("email_err").style.display = "none";
            validemail = true;
        } else {
            document.getElementById("email_err").style.display = "block";
            validemail = false;

        }

        let regexphone = /^([0-9]){10}$/;
        let strphone = phone.value;
        if (regexphone.test(strphone)) {
            document.getElementById("phone_err").style.display = "none";
            validphone = true;
        } else {
            document.getElementById("phone_err").style.display = "block";
            validphone = false;

        }
        
        
        if (validzip && validaddressf && validcity && validcountry && validname && validemail && validphone) {
            return true;
        } else {
            return false;
        }
    }

    // $('#placeordernow').on('click', function() {
    //     alert("bdh");




    //     // if (valid) {
    //      var total_price = $('#total_price').val();   
    //     var email = $("#customeremail").val();
    //     console.log(email);
    //     var name = $("#customername").val();
    //     console.log(name);
    //     var phone = $("#customerphone").val();
    //     console.log(phone);
    //     var country = $("#customercountry").val();
    //     console.log(country);
    //     var state = $("#customerstate").val();
    //     console.log(state);
    //     var city = $("#customercity").val();
    //     console.log(city);
    //     var zip = $("#customerzip").val();
    //     console.log(zip);
    //     var addressf = $("#customeraddressf").val();
    //     console.log(addressf);
    //     var addresssecond = "yfu";
    //     console.log(addresssecond);
    //     var user_id = $('#user_id').val();
    //     console.log(user_id);
    //     var customerlastname = $('#customerlastname').val();
    //     console.log(customerlastname);
    //     var payment_method = 'razorpay';
    //     // alert(payment_method);
    //     $.ajax({
    //         url: "codes/checkout-code.php",
    //         type: 'post',
    //         data: {
    //             name: name,
    //             email: email,
    //             phone: phone,
    //             country: country,
    //             state: state,
    //             city: city,
    //             zip: zip,
    //             addressf: addressf,
    //             addresssecond: addresssecond,
    //             user_id: user_id,
    //             payment_method: payment_method,
    //             customerlastname: customerlastname,
    //             total_price: total_price,
    //             action: 'place-order'

    //         },

    //         success: function(data) {

    //         }
    //     });

    //     // } else {
    //     //     alert("Please fill all the details");
    //     // }



    // });

    // $('.payment-method').on('click', function(){
    //   let payment_method =  $(this).val();
    //   if(payment_method == 'razorpay'){
    //         $('#placeordernow').show();
    //   }
    //   else{
    //     $('#placeordernow').hide();
    //   }
    // });
    
      checkpaymentstatus();
    function checkpaymentstatus(){
        $('#paymentfailed').text(localStorage.getItem("paymentcheck"));
    }
</script>

<?php
include('inc/footer.php');
?>