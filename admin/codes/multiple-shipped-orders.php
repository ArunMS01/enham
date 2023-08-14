<?php
include('../../config/app.php');
include_once('../controllers/CategoryController.php');
include_once('../controllers/AdminController.php');
include_once('../controllers/OrderController.php');
include_once('../controllers/ShiprocketController.php');
include_once('../controllers/BulkshipmentController.php');
include_once('../../Mails/MailController.php');
$shippment = new BulkshipmentController;
if (isset($_POST['action']) && $_POST['action'] == 'bulk-shipped') {
    if (isset($_POST['ordersids'])) {
        $cancel_reason ='';
        $order_status = "Shipped";
        $orderidarrays = array_unique($_POST['ordersids']);
        foreach ($orderidarrays as $orderId) {
           
            $status = false;
            $shipped_order =  $shippment->makeShipmentbyorderid($orderId);
            // print_r($shipped_order);
        $order_item_id = $shippment->getorderitemid($orderId);
        if($shipped_order){
        $result = $shippment->update_order_item_status($order_item_id, $order_status, $cancel_reason);
   
        if ($result) {
            $customer_mail =  $shippment->getuserdetails($orderId);
            $getproductnames = $shippment->getproductdetails($orderId);
           $content ='';
            $subject = "Order Status";
            $sendOrderstsmail = new MailController;
            $content .= '<p>Your Order ' . implode("','",  $getproductnames). ' has been ' . $order_status . '.';
           
            $content .= '
                    <br>
                    <p>Thanks For Shopping With Enham.</p>
                    ';
            $mailsend =  $sendOrderstsmail->mailsend($content, $customer_mail, $subject);
            $status = true;
        } 
        }
    }
    if($status){
        echo "success";
    }
    else{
        echo "error";
    }
}
}
