<?php
$title = "Checkout";
include('config/app.php');
include('codes/authentication_code.php');
include('controllers/AuthenticationController.php');
include('controllers/CategoryController.php');
include('controllers/ProductController.php');
include('controllers/UserController.php');
include('controllers/WishlistController.php');
$authenticated = new AuthenticationController;
$data = $authenticated->authDetail();
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
            <div class="col-lg-12 card-body">
                <p id="paymentfailed"></p>
                <?php
                if (count($_SESSION["add-to-cart"]) >= 1) {
                ?>
                    <form action="pay.php" method="POST" onsubmit="return validate()">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Personal Information</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="customername" name="customer_name" placeholder="First Name" value="<?php echo $data['user_name'] ?>">
                                            <small style="display:none; color:red;" id="name_err">Name Can not empty</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input value="<?php if (!empty($data['last_name'])) {
                                                                echo $data['last_name'];
                                                            } ?>" class="form-control" type="text" id="customerlastname" name="customer_lastname" placeholder="Last name">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="email" id="customeremail" value="<?php echo $data['email'] ?>" name="customer_email" placeholder="email address">
                                            <small style="display:none; color:red;" id="email_err">Please Fill email in correct format</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-phone ltn__custom-icon">
                                            <input class="form-control"
                                            value="<?php if (!empty($data['phone'])) {
                                                                echo str_replace('+91', '', $data['phone']);
                                                            } ?>"
                                            type="text" id="customerphone" name="customer_phone" placeholder="phone number">
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
                                    <?php
                                    if (isset($_SESSION['authenticated'])) {
                                    ?>
                                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['auth_user']['user_id'] ?>">
                                    <?php
                                    }
                                    ?>
                                 
                                    <div class="col-lg-4 col-md-6">
                                        <h6>State </h6>
                                        <div class="input-item">
                                            <!-- <input class="form-control" type="text" id="customerstate" name="customer_state" placeholder="State"> -->
                                            <select class="form-control"  id="customerstate" name="customer_state" placeholder="State">
                                                <option value="">--Select State--</option>
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
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

                                    <div class="col-lg-12">
                                      
                                        <?php
                                        if (!empty($data['address1'])) {
                                            
                                        ?>
                                          <h6>Use this address</h6>
                                            <div class="multiple-addresses" id="multiple-addresses1">
                                                <input type="radio" id="address1" name="addressoption">
                                                <label for="">
                                                    <?php echo $data['address1'] . ' ' . $data['address2'] . ' ' . $data['city'] . ' ' . $data['zone'] . ' ' . $data['country'] . ' ' . $data['zip'] ?>
                                                </label>
                                                <input type="hidden" class="address1" value="<?php echo $data['address1'] ?>">
                                                <input type="hidden" class="address2" value="<?php echo $data['address2'] ?>">
                                                <input type="hidden" class="city" value="<?php echo $data['city'] ?>">
                                                <input type="hidden" class="zone" value="<?php echo $data['zone'] ?>">
                                                <input type="hidden" class="country" value="<?php echo $data['country'] ?>">
                                                <input type="hidden" class="zip" value="<?php echo $data['zip'] ?>">

                                            </div>


                                        <?php
                                        }
                                        ?>

                                        <?php
                                        $getmoreaddress = new UserController;
                                        $getaddresses = $getmoreaddress->getMoreaddress($data['id']);
                                        if ($getaddresses) {
                                            foreach ($getaddresses as $row_add) {
                                        ?>
                                                <div class="more-multiple-addresses">
                                                    <input type="radio" class="moreaddreses" name="addressoption">
                                                    <label for="">
                                                        <?php echo $row_add['address1'] . ' ' . $row_add['address2'] . ' ' . $row_add['city'] . ' ' . $row_add['state'] . ' ' . $row_add['country'] . ' ' . $row_add['zip'] ?>
                                                    </label>
                                                    <input type="hidden" class="address1" value="<?php echo $row_add['address1'] ?>">
                                                    <input type="hidden" class="address2" value="<?php echo $row_add['address2'] ?>">
                                                    <input type="hidden" class="city" value="<?php echo $row_add['city'] ?>">
                                                    <input type="hidden" class="zone" value="<?php echo $row_add['state'] ?>">
                                                    <input type="hidden" class="country" value="<?php echo $row_add['country'] ?>">
                                                    <input type="hidden" class="zip" value="<?php echo $row_add['zip'] ?>">
                                                </div>
                                        <?php
                                            }
                                            
                                            ?>
                                            
                                             <h6>Use Different Address</h6>
                                            <input type="radio" id="different_address" name="addressoption">
                                            <label for="">Click here</label>
                                            <?php
                                        }
                                        ?>

                                        <div>
                                           
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
                                                Pay Online
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
                                <button id="placeordernow" class="btn btn-outline" name="checkoutbtn">Place order</button>

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
    // drawstate("IN");

    // function drawstate(val) {
    //     countryoption = val;
    //     $('#customerstate').html('<option>--Select State--</option>');

    //     $.each(state, function(index, value) {
    //         // APPEND OR INSERT DATA TO SELECT ELEMENT.
    //         if (value.countryCode == val) {
    //             $('#customerstate').append('<option  value="' + value.name + '" data-country="' + value.countryCode + '">' + value.name + '</option>');
    //         }
    //     });
    // }


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
        // $('#customerstate').val(zone);
        $('#customerstate').html('<option value="' + zone + '">' + zone + '</option>');
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
        // $('#customerstate').val(zone);
        $('#customerstate').html('<option value="' + zone + '">' + zone + '</option>');

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
    // The fucntion will check if payment razorpay is dismissed by user
    checkpaymentstatus();
    function checkpaymentstatus(){
        $('#paymentfailed').text(localStorage.getItem("paymentcheck"));
    }

</script>

<?php
include('inc/footer.php');
?>