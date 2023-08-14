<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('../config/app.php');
include_once('../Mails/MailController.php');
include_once('../controllers/CheckoutController.php');
if(isset($_POST['action'])){
    if($_POST['action'] == 'place-order'){
    $pament_info = validateInput($db->conn, $_POST['payment_method']);
    $order_status = "Order Placed";
   
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
    'user_id' => validateInput($db->conn, $_POST['user_id']),
    'razorpay_payment_id' =>validateInput($db->conn, $_POST['razorpay_payment_id']),
   
    'order_status' => validateInput($db->conn, $order_status),
    'created_at' => validateInput($db->conn, $created_at),
    'customer_lastname' => validateInput($db->conn, $_POST['customer_lastname']),
    ];
    $userData =[
        'user_id' => validateInput($db->conn, $_POST['user_id']),
        'customer_name' => validateInput($db->conn, $_POST['customer_name']),
        'customer_lastname' => validateInput($db->conn, $_POST['customer_lastname']),
        'customer_email' => validateInput($db->conn, $_POST['customer_email']),
        'customer_phone' => validateInput($db->conn, $_POST['customer_phone']),
        'customer_country' => validateInput($db->conn, $_POST['customer_country']),
        'customer_addressf' => validateInput($db->conn, $_POST['customer_addressf']),
        'customer_addrest' => validateInput($db->conn, $_POST['customer_addrest']),
        'customer_city' => validateInput($db->conn, $_POST['customer_city']),
        'customer_state' => validateInput($db->conn, $_POST['customer_state']),
        'customer_zip' => validateInput($db->conn, $_POST['customer_zip']),
    ];
  
    
    $createorder = new CheckoutController;
    $order = $createorder->create_order($inputData);
    if($order){
        $order_id = validateInput($db->conn, $order);
        $order_number = "15".mt_rand(100000,999999).$order_id;
        $order_no = validateInput($db->conn, $order_number);
        $update_order_number = $createorder->updateOrderno($order_no, $order_id);
        if($update_order_number){
        $order_items = $createorder->insert_order_items($order_id, $order_status);
        $update_user_data = $createorder->update_user($userData);
        if($update_user_data){ 
            // $createorder->update_user($order_id);
            $createorder->order_details($order_id);
            $useremail = validateInput($db->conn, $_POST['customer_email']);
            $createorder->sendOrdermailtouser($useremail, $_POST['total_price']);
            echo $order_no;
            // echo '<script type="text/javascript">';
            // echo 'document.razorpayform.submit();';
            // echo '</script>';
        }
        else{
            redirect("Some Error Occured." , 'checkout');
        }
    }
    else{
        redirect("Some Error Occured." , 'checkout');
    }
    }
    else{
        redirect("Some Error Occured." , 'checkout');
    }
}
}



if(isset($_POST['action'])){
    if($_POST['action'] == 'place-order-as-guest'){
    $pament_info = validateInput($db->conn, $_POST['payment_method']);
    $order_status = "Order Placed";
   
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
   
    'razorpay_payment_id' =>validateInput($db->conn, $_POST['razorpay_payment_id']),
   
    'order_status' => validateInput($db->conn, $order_status),
    'created_at' => validateInput($db->conn, $created_at),
    'customer_lastname' => validateInput($db->conn, $_POST['customer_lastname']),
    ];
    $userData =[
 
        'customer_name' => validateInput($db->conn, $_POST['customer_name']),
        'password' => validateInput($db->conn, $_POST['create_password']),
        'customer_lastname' => validateInput($db->conn, $_POST['customer_lastname']),
        'customer_email' => validateInput($db->conn, $_POST['customer_email']),
        'customer_phone' => validateInput($db->conn, $_POST['customer_phone']),
        'customer_country' => validateInput($db->conn, $_POST['customer_country']),
        'customer_addressf' => validateInput($db->conn, $_POST['customer_addressf']),
        'customer_addrest' => validateInput($db->conn, $_POST['customer_addrest']),
        'customer_city' => validateInput($db->conn, $_POST['customer_city']),
        'customer_state' => validateInput($db->conn, $_POST['customer_state']),
        'customer_zip' => validateInput($db->conn, $_POST['customer_zip']),
    ];
  
    // print_r($inputData);
    $createorder = new CheckoutController;
    $update_user_data = $createorder->inset_user($userData);
    if($update_user_data){ 
    $order = $createorder->create_guest_order($inputData, $update_user_data);
    // echo $order;
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
            echo $order_no;
            // echo '<script type="text/javascript">';
            // echo 'document.razorpayform.submit();';
            // echo '</script>';
        }
        else{
            redirect("Some Error Occured." , 'checkout');
        }
    }
    else{
        redirect("Some Error Occured." , 'checkout');
    }
    }
    else{
        redirect("Some Error Occured." , 'checkout');
    }
}
}

?>
