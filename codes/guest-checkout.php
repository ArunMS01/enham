<?php
include('../config/app.php');
require_once('../razorpay/Razorpay.php');
require_once('../config.php');
include_once('../Mails/MailController.php');
include_once('../controllers/CheckoutController.php');
include_once('../controllers/RegisterController.php');


use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);

if($_POST['payment_method'] == 'razorpay'){
     $sendVerificationmail = new MailController;
     $createorder = new CheckoutController;
     $register = new RegisterController;
     $checkuser = $register->isUserexist($_POST['customer_email']);
     if($checkuser){
         redirect('User With This mail already exist', 'buy-now.php');
     }
    //  echo "Hello";
     $create_password = $createorder->randomPassword();
     $mailsend = $sendVerificationmail->validateEmail($_POST['customer_email']);
 if($mailsend){
      
         $content = '';
    $subject = "Email Confirmation";

    $content = '
    <p>
    Hello '.$_POST['customer_name'].' <br>,
    This is the verification mail from Enham. <br>
    Your login mail is '.$_POST['customer_email'].' and passwrod is '.$create_password.' <br>
    Dont share it with anyone.<br>
    Thanks,
    </p>
    ';
 
    $mailsend = $sendVerificationmail->mailsend($content, $_POST['customer_email'], $subject);
    
$orderData = [
    'receipt'         => 'rcptid_11',
    'amount'          => $_POST['total_price'] * 100, // 39900 rupees in paise
    'currency'        => 'INR'
];


$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

$checkout = 'guest-checkout';


if(isset($_GET['checkout']) and in_array($_GET['checkout'], ['guest-checkout'], true)){
    $checkout = $_GET['checkout'];
}
$prod_array = array();
if (isset($_SESSION["add-to-cart"])) {
    foreach ($_SESSION["add-to-cart"] as $key => $cart) {
        $prod_array[] = $cart['prod_name'];
    }
    // $product_array = "'" . implode ( "', '", $prod_array ) . "'";
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $prod_array,
    "description"       => "Product Description",
    "image"             => " ",
    "prefill"           => [
    "name"              => $_POST['customer_name'] . ' ' . $_POST['customer_lastname'],
    "email"             => $_POST['customer_email'],
    "contact"           => $_POST['customer_phone'],
    ],
    "notes"             => [
    "address"           => $_POST['customer_addressf'] . '' . $_POST['customer_addrest'] . '' .$_POST['customer_city'] . '' . $_POST['customer_state'] . '' .$_POST['customer_zip'] . '' .$_POST['customer_country'],
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];


if($displayCurrency !== 'INR')
{
    $data['display_currency'] = $displayCurrency;
    $data['display_amount'] = $displayAmount;
}


$json = json_encode($data);


require("../checkout/{$checkout}.php");
}
else{
   redirect("Mail is not correct" , 'buy-now.php'); 
}
}

else{
     $register = new RegisterController;
     $checkuser = $register->isUserexist($_POST['customer_email']);
     if($checkuser){
         redirect('User With This mail already exist', 'buy-now.php');
     }
    $pament_info = validateInput($db->conn, $_POST['payment_method']);
    $order_status = "Order Placed";
       $createorder = new CheckoutController;
       
       $create_password = $createorder->randomPassword();
    
   
    date_default_timezone_set('Asia/Kolkata');
    $created_at = date('Y-m-d H:i:s');
    $inputData = [
    'customer_name' => validateInput($db->conn, $_POST['customer_name']),
    'customer_email' => validateInput($db->conn, $_POST['customer_email']),
    'customer_phone' => validateInput($db->conn, $_POST['customer_phone']),
    'customer_country' => validateInput($db->conn, $_POST['customer_country']),
    'customer_addressf' => validateInput($db->conn, $_POST['customer_addressf']),
    'customer_addrest' => validateInput($db->conn, $_POST['customer_addrest']),
    'customer_city' => validateInput($db->conn, $_POST['customer_city']),
    'customer_state' => validateInput($db->conn, $_POST['customer_state']),
    'customer_zip' => validateInput($db->conn, $_POST['customer_zip']),
    'total_price' => validateInput($db->conn, $_POST['total_price']),
    'payment_info' => validateInput($db->conn, $pament_info),
    
   
    'order_status' => validateInput($db->conn, $order_status),
    'created_at' => validateInput($db->conn, $created_at),
    'customer_lastname' => validateInput($db->conn, $_POST['customer_lastname']),
    ];
    $userData =[
        'customer_name' => validateInput($db->conn, $_POST['customer_name']),
        'customer_lastname' => validateInput($db->conn, $_POST['customer_lastname']),
        'customer_email' => validateInput($db->conn, $_POST['customer_email']),
        'create_password' => validateInput($db->conn, $create_password),
        'customer_phone' => validateInput($db->conn, $_POST['customer_phone']),
        'customer_country' => validateInput($db->conn, $_POST['customer_country']),
        'customer_addressf' => validateInput($db->conn, $_POST['customer_addressf']),
        'customer_addrest' => validateInput($db->conn, $_POST['customer_addrest']),
        'customer_city' => validateInput($db->conn, $_POST['customer_city']),
        'customer_state' => validateInput($db->conn, $_POST['customer_state']),
        'customer_zip' => validateInput($db->conn, $_POST['customer_zip']),
    ];
  
    $email = $_POST['customer_email'];
        $sendVerificationmail = new MailController;
   
    $mailsend = $sendVerificationmail->validateEmail($email);
    // echo $_POST['customer_email'];
    // print_r($mailsend);
    if($mailsend){
     $content = '';
    $subject = "Email Confirmation";

    $content = '
    <p>
    Hello '.$_POST['customer_name'].' <br>
    This is the verification mail from Enham. <br>
    Your login mail is '.$email.' and passwrod is '.$create_password.' <br>
    Dont share it with anyone.<br>
    Thanks,
    </p>
    ';
 
    $mailsend = $sendVerificationmail->mailsend($content, $email, $subject);
    
    $update_user_data = $createorder->inset_user($userData);
    if($update_user_data){ 
        $order = $createorder->create_guest_order($inputData, $update_user_data);
    if($order){
        $order_id = validateInput($db->conn, $order);
        $order_number = "15".mt_rand(100000,999999).$order_id;
        $order_no = validateInput($db->conn, $order_number);
        $update_order_number = $createorder->updateOrderno($order_no, $order_id);
        if($update_order_number){
        $order_items = $createorder->insert_order_items($order_id, $order_status);
       
            // $createorder->update_user($order_id);
            $createorder->order_details($order_id);
            $useremail = validateInput($db->conn, $_POST['customer_email']);
            $createorder->sendOrdermailtouser($useremail, $_POST['total_price']);
            redirect("Order is placed." , 'success');
            // echo '<script type="text/javascript">';
            // echo 'document.razorpayform.submit();';
            // echo '</script>';
        }
        else{
            redirect("Some Error Occured." , 'buy-now.php');
        }
    }
    else{
        redirect("Some Error Occured." , 'buy-now.php');
    }
    }
    else{
        redirect("Some Error Occured." , 'buy-now.php');
    }
    }
    else{
     redirect("Mail is not correct" , 'buy-now.php');
    }
}
?>
