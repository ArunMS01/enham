<!-- <button id="rzp-button1">Pay with Razorpay</button> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="<?php echo SITE_URL;?>verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >

</form>
<script>
// Checkout details as a json
var options = <?php echo $json?>;

 var password ="<?php echo $create_password;?>";
 
 console.log(password);

/**
 * The entire list of Checkout fields is available at
 * https://docs.razorpay.com/docs/checkout-form#checkout-fields
 */
options.handler = function (response){
    if(response.razorpay_payment_id != ''){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    var razorpay_payment_id = response.razorpay_payment_id;
    var name = "<?php echo $_POST['customer_name'] ?>";
    var email = "<?php echo $_POST['customer_email'] ?>";
    var phone = "<?php echo $_POST['customer_phone'] ?>";
    var country = "<?php echo $_POST['customer_country'] ?>";
    var addressf = "<?php echo $_POST['customer_addressf'] ?>";
    var addrest = "<?php echo $_POST['customer_addrest'] ?>";
    var city = "<?php echo $_POST['customer_city'] ?>";
    var state = "<?php echo $_POST['customer_state'] ?>";
    var zip = "<?php echo $_POST['customer_zip'] ?>";
    var total_price = "<?php echo $_POST['total_price'] ?>";
    var payment_info = "<?php echo  $_POST['payment_method']?>";
   
    var lastname = "<?php echo  $_POST['customer_lastname']?>"
    var password ="<?php echo $create_password;?>";
    
    console.log(password);

    $.ajax({
            url: "<?php echo SITE_URL;?>codes/checkout-code.php",
            type: 'post',
            data: {
                customer_name: name,
                customer_lastname:lastname,
                customer_email: email,
                customer_phone: phone,
                create_password:password,
                customer_country: country,
                customer_state: state,
                customer_city: city,
                customer_zip: zip,
                customer_addressf: addressf,
                customer_addrest: addrest,
               
                payment_method: payment_info,
                lastname: lastname,
                total_price: total_price,
                razorpay_payment_id:razorpay_payment_id,
                
                action: 'place-order-as-guest'

            },

            success: function(data) {
         
            }
        });
    }
        document.razorpayform.submit();
   
};

// Boolean whether to show image inside a white frame. (default: true)
options.theme.image_padding = false;

options.modal = {
    ondismiss: function() {
        localStorage.setItem("paymentcheck", "Payment is Failed");
        location.href = "<?php echo SITE_URL?>buy-now.php";
    },
    // Boolean indicating whether pressing escape key 
    // should close the checkout form. (default: true)
    escape: true,
    // Boolean indicating whether clicking translucent blank
    // space outside checkout form should close the form. (default: false)
    backdropclose: false
};

var rzp = new Razorpay(options);
    rzp.open();
</script>