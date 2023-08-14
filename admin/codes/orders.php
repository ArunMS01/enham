<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('../../config/app.php');
include_once('../controllers/CategoryController.php');
include_once('../controllers/AdminController.php');
include_once('../controllers/OrderController.php');
include_once('../controllers/ShiprocketController.php');
include_once('../../Mails/MailController.php');
if (isset($_POST['order_item_status'])) {
    $order_item_id = validateInput($db->conn, $_POST['order_item_id']);
    $order_status = validateInput($db->conn, $_POST['order_status']);
    $product_name = validateInput($db->conn, $_POST['product_name']);
    $customer_mail = validateInput($db->conn, $_POST['customer_mail']);
    $orderId =  validateInput($db->conn, $_POST['orderId']);
    if (!empty($_POST['cancel_reason'])) {
        $cancel_reason = $_POST['cancel_reason'];
    } else {
        $cancel_reason = ' ';
    }
    $shippment = new ShiprocketController;
    $order_items = new OrderController;
    if ($order_status == 'Shipped') {
        $shipped_order =  $shippment->makeShipmentbyorderid($orderId);
        // print_r($shipped_order);
        // echo "hello";
        if($shipped_order){
        $result = $order_items->update_order_item_status($order_item_id, $order_status, $cancel_reason);
        // print_r($result);
        if ($result) {
            // Make Shippment
           $content ='';
            $subject = "Order Status";
            $sendOrderstsmail = new MailController;
            $content .= '<p>Your Order ' . $product_name . ' has been ' . $order_status . '.';
           
            $content .= '
                    <br>
                    <p>Thanks For Shopping With Enham.</p>
                    ';
            $mailsend =  $sendOrderstsmail->mailsend($content, $customer_mail, $subject);
    
            // if($order_status == 'Completed'){
            // $complete_order =  $order_items->orderComplete($orderId);
            // if($complete_order){
            //       redirect('Updated SuccessFully', 'admin/orders.php');
            // }
            // else{
            //      redirect('Some Error Occured', 'admin/orders.php');
            // }
            // }
            redirect('Updated SuccessFully', 'admin/orders.php');
        } 
    }
    else {
            redirect('Some Error Occured', 'admin/orders.php');
        }
    
    }
    else if($order_status == 'Cancelled'){
          $cancel_shipment = $shippment->cancelShipment($orderId);  
        //   print_r($cancel_shipment);
          if($cancel_shipment){
          $result = $order_items->update_order_item_status($order_item_id, $order_status, $cancel_reason);
          // print_r($result);
          if ($result) {
              // Make Shippment
            $content='';
              $subject = "Order Status";
              $sendOrderstsmail = new MailController;
              $content .= '<p>Your Order ' . $product_name . ' has been ' . $order_status . '.';
           
                  $content .= '
                       and the reason is ' . $cancel_reason . '</p>
                       ';
              
              $content .= '
                      <br>
                      <p>Thanks For Shopping With Enham.</p>
                      ';
              $mailsend =  $sendOrderstsmail->mailsend($content, $customer_mail, $subject);
      
              // if($order_status == 'Completed'){
              // $complete_order =  $order_items->orderComplete($orderId);
              // if($complete_order){
              //       redirect('Updated SuccessFully', 'admin/orders.php');
              // }
              // else{
              //      redirect('Some Error Occured', 'admin/orders.php');
              // }
              // }
           
          }
            redirect('Updated SuccessFully', 'admin/orders.php');
    }
    else{
        redirect('Some Error In cancel shipment', 'admin/orders.php');
    }
}

else if($order_status == 'Return'){
    $return_shipment = $shippment->returnShipment($orderId, $order_item_id);
    if($return_shipment){
         $content='';
              $subject = "Order Status";
              $sendOrderstsmail = new MailController;
              $content .= '<p>Your Order Status' . $product_name . ' has been processed to ' . $order_status . '.';
              
              $content .= '
                      <br>
                      <p>Thanks For Shopping With Enham.</p>
                      ';
              $mailsend =  $sendOrderstsmail->mailsend($content, $customer_mail, $subject);
              redirect('Updated SuccessFully', 'admin/orders.php');
    }
    else{
      redirect('Some Error In return order', 'admin/orders.php'); 
    }
}
    else{
        // echo "hello";
        $result = $order_items->update_order_item_status($order_item_id, $order_status, $cancel_reason);
        // print_r($result);
        if ($result) {
            // Make Shippment
          $content ='';
            $subject = "Order Status";
            $sendOrderstsmail = new MailController;
            $content .= '<p>Your Order ' . $product_name . ' has been ' . $order_status . '.';
         
            $content .= '
                    <br>
                    <p>Thanks For Shopping With Enham.</p>
                    ';
            $mailsend =  $sendOrderstsmail->mailsend($content, $customer_mail, $subject);
    
            // if($order_status == 'Completed'){
            // $complete_order =  $order_items->orderComplete($orderId);
            // if($complete_order){
            //       redirect('Updated SuccessFully', 'admin/orders.php');
            // }
            // else{
            //      redirect('Some Error Occured', 'admin/orders.php');
            // }
            // }
            redirect('Updated SuccessFully', 'admin/orders.php');
        } else {
            redirect('Some Error Occured', 'admin/orders.php');
        }
    }
   
}

if (isset($_POST['updateOrderstatus'])) {
    $orderedstatus = validateInput($db->conn, $_POST['order_status']);
    $orderedid = validateInput($db->conn, $_POST['orderedid']);
    $order_items = new OrderController;
    $complete_order =  $order_items->orderComplete($orderedid, $orderedstatus);
    //  echo $complete_order;
    if ($complete_order) {
        redirect('Updated SuccessFully', 'admin/orders.php');
    } else {
        redirect('Some Error Occured', 'admin/orders.php');
    }
}

if(isset($_POST['action'])){
    if($_POST['action'] == 'load-recentorders'){
        $daysorder = $_POST['daysorder'];
        $statusorder = $_POST['statusorder'];
           $newOrders = new AdminController;
           $neworders = $newOrders->getNeworders($daysorder,$statusorder);
           if($neworders){
               echo "success";
           }
    }
}

?>

