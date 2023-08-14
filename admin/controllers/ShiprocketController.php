<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
class ShiprocketController
{
  public function __construct()
  {
    $db = new Databaseconnection;
    $this->conn = $db->conn;
  }

  public function getshipStatus($shiprocket_orderid)
  {
    $gettoken = $this->generateToken();
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/orders/show/' . $shiprocket_orderid . '',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $gettoken . ''
      ),
    ));

    $response = curl_exec($curl);
    // echo $response;
  
    // echo $data;
    $response1 = json_decode($response, true);
    // print_r($response1);
    //  echo $response1['data'][0]['status'];
    //  echo $response1['data'][0]['status_code'];
    //  echo $response1['data'][0]['created_at'];
    curl_close($curl);
    if (isset($response1['data']['status'])) {
      return $response1['data']['status'];
    }
    if(isset($response1['data']['status_code'])){
        if($response1['data']['status_code'] == 7){
            
            // Item Status Do delivered 7 code means
          $result =  $this->updateitemstatus($shiprocket_orderid, $response1['data']['created_at']);
       
        }
    }
    
  }
  public function updateitemstatus($shiprocket_orderid, $created_at){
    //   Check if already updated
    $checkdatesql = "SELECT delivery_date FROM order_items WHERE shiprocket_orderid = '$shiprocket_orderid'";
     $resultdate = $this->conn->query($checkdatesql);
     if($resultdate){
       while($row = $resultdate->fetch_assoc()){
           $deliverydate = $row['delivery_date'];
         
       }
     }
    $date=date_create($created_at);
    $created_ats = date_format($date,"Y-m-d H:i:s");
    if(empty($deliverydate)){
    $sql = "UPDATE order_items SET delivery_date = '$created_ats' WHERE shiprocket_orderid = '$shiprocket_orderid'";
    $result = $this->conn->query($sql);  
    
    }
    
  }
  public function generatetrackingtoken($adminid){
       if ($adminid == '1') {
      $sql = "SELECT * FROM `shiprocket_token` WHERE id = '1'";
      $result = $this->conn->query($sql);
      if ($result) {
        foreach ($result as $row) {
          $created_date = $row['created_at'];
          $token = $row['token'];
        }
        $dateofcreation =  date("Y-m-d", strtotime($created_date));
        $current_date = date("Y-m-d");
        $diff = abs(strtotime($current_date) - strtotime($dateofcreation));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        if ($days > 9) {
          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/auth/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "email": "namaneretail890@gmail.com",
              "password": "Naman@123"
          }',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'
            ),
          ));

          $response = curl_exec($curl);

          $reponse = json_decode($response, true);


          $token = $reponse['token'];
          curl_close($curl);
          $sql = "UPDATE shiprocket_token SET token = '$token' WHERE id = '1'";
          $result = $this->conn->query($sql);
          if($result){ 
          return $token;
          }
         
        } else {
          return $token;
        }
      }
    }
    if ($adminid == '2') {
      $sql = "SELECT * FROM `shiprocket_token` WHERE id = '2'";
      $result = $this->conn->query($sql);
      if ($result) {
        foreach ($result as $row) {
          $created_date = $row['created_at'];
          $token = $row['token'];
        }
        $dateofcreation =  date("Y-m-d", strtotime($created_date));
        $current_date = date("Y-m-d");
        $diff = abs(strtotime($current_date) - strtotime($dateofcreation));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        if ($days > 9) {
          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/auth/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
              "email": "sweetyagarwal3611@gmail.com",
              "password": "Naman@#1234"
          }',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'
            ),
          ));
          $token = $reponse['token'];
          curl_close($curl);
          $sql = "UPDATE shiprocket_token SET token = '$token' WHERE id = '2'";
          $result = $this->conn->query($sql);
          if($result){ 
          return $token;
          }
        } else {
          return $token;
        }
      }
    }
  }

  public function makeShipmentbyorderid($orderId)
  {
    if (isset($_SESSION['authenticated'])) {
      $adminid = $_SESSION['auth_user']['user_id'];
    }
    // $sql = "SELECT orders.order_number, orders.ordered_on, orders.payment_info, orders.ship_firstname, orders.ship_lastname, orders.ship_email,
    // orders.ship_phone, orders.ship_address1,orders.ship_address2,orders.ship_city, orders.ship_zip, orders.ship_zone, orders.ship_country,
    // order_items.product_id, order_items.quantity, order_items.shipping, orders_items.total, order_items.sku_number
    // FROM `orders` INNER JOIN ON orders.id = order_items.order_id WHERE order_items.order_id = '$orderId' AND order_items.admin_id = '$adminid'";
    $sql = "SELECT * FROM `orders` WHERE id = '$orderId' LIMIT 1";
    $result = $this->conn->query($sql);
    if ($result) {
      while ($row = $result->fetch_assoc()) {
        $inputData = [
          'orderid' => $row['id'],
          'order_number' => $row['order_number'],
          'customer_id' => $row['customer_id'],
          'ordered_on' => $row['ordered_on'],
          'payment_info' => $row['payment_info'],
          'ship_firstname' => $row['ship_firstname'],
          'ship_lastname' => $row['ship_lastname'],
          'ship_email' => $row['ship_email'],
          'ship_phone' => $row['ship_phone'],
          'ship_address1' => $row['ship_address1'],
          'ship_address2' => $row['ship_address2'],
          'ship_city' => $row['ship_city'],
          'ship_zip' => $row['ship_zip'],
          'ship_zone' => $row['ship_zone'],
          'ship_country' => $row['ship_country'],
          'payment_info' => $row['payment_info']
        ];
      }
      $sql_getitems = "SELECT order_items.quantity, order_items.total ,order_items.sku_number, product.name, product.item_weight, product.item_length, product.item_height, product.item_breadth FROM order_items INNER JOIN 
      product ON order_items.product_id = product.id WHERE order_items.order_id = '$orderId' AND order_items.admin_id ='$adminid'";
      $result_items = $this->conn->query($sql_getitems);
      if ($result_items) {
        $shippedproducts = $this->shipOrder($result_items, $inputData);
        // print_r($shippedproducts);
        $update_trackingid = $this->updateTrackingid($shippedproducts, $inputData['orderid']);
        if ($update_trackingid) {
          return $shippedproducts;
        } else {
          return false;
        }
      }
    } else {
      return false;
    }
  }

  public function shipOrder($result_items, $inputData)
  {
    $gettoken = $this->generateToken();
    // echo $gettoken;
    if ($inputData['payment_info'] == 'Cash on delivery') {
      $payment_method = "COD";
    } else {
      $payment_method = "Prepaid";
    }
    $curl = curl_init();
    // $data = array();
    $data = '';
    $subtotal_items = 0;
    $item_weight = 0;
    $item_length = 0;
    $item_height = 0;
    $item_breadth = 0;
    foreach ($result_items as $orderitems) {
      $item_weight = $item_weight + $orderitems['item_weight'];
      $item_length = $item_length + $orderitems['item_length'];
      $item_height = $item_height + $orderitems['item_height'];
      $item_breadth = $item_breadth + $orderitems['item_breadth'];

      $subtotal_items = $subtotal_items + $orderitems['quantity'] * $orderitems['total'];
      $data .= ' {
            
              "name" : "' . $orderitems['name'] . '",
              "sku": "' . $orderitems['sku_number'] . '",
              "units":  ' . $orderitems['quantity'] . ',
              "selling_price":  "' . $orderitems['total'] . '",
              "discount":  "",
              "tax":  "",
              "hsn":  ""
            
            },';
    }

    // echo $subtotal_items;

    $orderDate = date("Y-m-d H:i", strtotime($inputData['ordered_on']));


    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/orders/create/adhoc',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{
    "order_id": "' . $inputData['order_number'] . '",
    "order_date": "' . $orderDate . '",
    "pickup_location": "Primary",
    "channel_id": "",
    "comment": "",
    "billing_customer_name": "' . str_replace(' ', '', $inputData['ship_firstname']) . '",
    "billing_last_name": "' . $inputData['ship_lastname'] . '",
    "billing_address": "' . $inputData['ship_address1'] . '",
    "billing_address_2": "' . $inputData['ship_address2'] . '",
    "billing_city": "' . $inputData['ship_city'] . '",
    "billing_pincode": "' . $inputData['ship_zip'] . '",
    "billing_state": "' . $inputData['ship_zone'] . '",
    "billing_country": "' . $inputData['ship_country'] . '",
    "billing_email": "' . $inputData['ship_email'] . '",
    "billing_phone": "' . $inputData['ship_phone'] . '",
    "shipping_is_billing": true,
    "shipping_customer_name": "",
    "shipping_last_name": "",
    "shipping_address": "",
    "shipping_address_2": "",
    "shipping_city": "",
    "shipping_pincode": "",
    "shipping_country": "",
    "shipping_state": "",
    "shipping_email": "",
    "shipping_phone": "",
    "order_items": [
      
    
        ' . rtrim($data, ",") . '
      
    ],
    "payment_method": "' . $payment_method . '",
    "shipping_charges": 0,
    "giftwrap_charges": 0,
    "transaction_charges": 0,
    "total_discount": 0,
    "sub_total": ' . $subtotal_items . ',
    "length": ' . $item_length . ',
    "breadth": ' . $item_breadth . ',
    "height": ' . $item_height . ',
    "weight": ' . $item_weight . '
  }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $gettoken . ''
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    // echo $response;
    // echo "Heloo";
    $reponse = json_decode($response, true);
    // echo $reponse['shipment_id'];
    // echo $reponse['order_id'];
    if (!empty($reponse['shipment_id'])) {
      $shipment_details = [
        'shipment_id' => $reponse['shipment_id'],
        'shiporder_id' => $reponse['order_id']
      ];
        // print_r($shipment_details);
      return $shipment_details;
    }
  }

  public function updateTrackingid($shipid, $orderid)
  {
    if (isset($_SESSION['authenticated'])) {
      $adminid = $_SESSION['auth_user']['user_id'];
    }
    // echo "njfddf";
    // print_r($shipid);
    // echo "Shipmentid" . $shipid['shipment_id'];
    if($shipid){
    $shipment_id = $shipid['shipment_id'];
    $shiporder_id = $shipid['shiporder_id'];
   
    $sql = "UPDATE order_items SET tracking_id = '$shipment_id' , shiprocket_orderid	= '$shiporder_id' WHERE order_id = '$orderid' AND admin_id = '$adminid'";
    $result = $this->conn->query($sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
    }
  }
  
    public function dateDiffInDays($date1, $date2) 
  {
      // Calculating the difference in timestamps
      $diff = strtotime($date2) - strtotime($date1);
  
      // 1 day = 24 hours
      // 24 * 60 * 60 = 86400 seconds
      return abs(round($diff / 86400));
  }

   public function generateToken()
  {
    if (isset($_SESSION['authenticated'])) {
      $adminid = $_SESSION['auth_user']['user_id'];
    }
    if ($adminid == '1') {
      $sql = "SELECT * FROM `shiprocket_token` WHERE id = '1'";
      $result = $this->conn->query($sql);
      if ($result) {
        foreach ($result as $row) {
          $created_date = $row['created_at'];
          $token = $row['token'];
        }
        $current_date = date("Y-m-d");
        $dateDiff = $this->dateDiffInDays($created_date, $current_date);
      
        if ($dateDiff > 9) {
          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/auth/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
              "email": "namaneretail890@gmail.com",
              "password": "Naman@123"
          }',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'
            ),
          ));

          $response = curl_exec($curl);

          $reponse = json_decode($response, true);


          $token = $reponse['token'];
          curl_close($curl);
          $current_date = date("Y-m-d");
          $sql = "UPDATE shiprocket_token SET token = '$token',created_at = '$current_date' WHERE id = '1'";
          $result = $this->conn->query($sql);
          if ($result) {
            return $token;
          }
        } else {
          return $token;
        }
      }
    }
    if ($adminid == '2') {
      $sql = "SELECT * FROM `shiprocket_token` WHERE id = '2'";
      $result = $this->conn->query($sql);
      if ($result) {
        foreach ($result as $row) {
          $created_date = $row['created_at'];
          $token = $row['token'];
        }
       
        $current_date = date("Y-m-d");
        $dateDiff = $this->dateDiffInDays($created_date, $current_date);
       
      
        if ($dateDiff > 9) {
          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/auth/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
              "email": "sweetyagarwal3611@gmail.com",
              "password": "Naman@#1234"
          }',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'
            ),
          ));
          $response = curl_exec($curl);

          $reponse = json_decode($response, true);
          $token = $reponse['token'];
          curl_close($curl);
          $current_date = date("Y-m-d");
          $sql = "UPDATE shiprocket_token SET token = '$token',created_at = '$current_date' WHERE id = '2'";
          $result = $this->conn->query($sql);
          if ($result) {
            return $token;
          }
        } else {
          return $token;
        }
      }
    }
  }

  public function getShiprocketstatus($trackingid, $admin_id)
  {
    $gettoken = $this->generatetrackingtoken($admin_id);
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/courier/track/shipment/' . $trackingid . '',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $gettoken . ''
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    // echo $response;
    
    $reponse = json_decode($response, true);
    $output ='';
    if($reponse){
        if($reponse['tracking_data']['track_status'] == 0){
        $output .='
        <p>Items Yet to be processed.</p>
        ';
        }
        else{
            $output .='
            
            <p>Estimated Delivery Date: '.$reponse['tracking_data']['etd'].'</p>
            <hr>
            ';
            foreach($reponse['tracking_data']['shipment_track_activities'] as $shipmentactivity){
                  $output .='
            <p>Date: '.$shipmentactivity['date'].'</p>
            <p>Location : '.$shipmentactivity['location'].'</p>
            '; 
            }
        }
        
        echo $output;
    }
  }

  public function cancelShipment($orderId)
  {
    if (isset($_SESSION['authenticated'])) {
      $adminid = $_SESSION['auth_user']['user_id'];
    }
    // $sql = "SELECT * FROM `orders` WHERE id = '$orderId' LIMIT 1";
    $sql = "SELECT * FROM `order_items` WHERE order_id = '$orderId' AND admin_id = '$adminid'";
    $result = $this->conn->query($sql);
    if ($result) {
      while ($row = $result->fetch_assoc()) {
        $order_number = $row['shiprocket_orderid'];
      }
    
    }
  
    $gettoken = $this->generateToken();
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/orders/cancel',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{
  "ids": [' . $order_number . ']
}',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $gettoken . ''
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    // echo $response;
    return true;
  }
  
  public function returnOrder($result_items, $inputData){
       $gettoken = $this->generateToken();
    // echo $gettoken;
    if ($inputData['payment_info'] == 'Cash on delivery') {
      $payment_method = "COD";
    } else {
      $payment_method = "Prepaid";
    }
    // $data = array();
    $data = '';
    $subtotal_items = 0;
    $item_weight = 0;
    $item_length = 0;
    $item_height = 0;
    $item_breadth = 0;
    foreach ($result_items as $orderitems) {
      $item_weight = $item_weight + $orderitems['item_weight'];
      $item_length = $item_length + $orderitems['item_length'];
      $item_height = $item_height + $orderitems['item_height'];
      $item_breadth = $item_breadth + $orderitems['item_breadth'];

      $subtotal_items = $subtotal_items + $orderitems['quantity'] * $orderitems['total'];
      $data .= ' {
      
      "sku": "' . $orderitems['sku_number'] . '",
      "name": "' . $orderitems['name'] . '",
      "units": ' . $orderitems['quantity'] . ',
      "selling_price": ' . $orderitems['total'] . ',
      "discount": 0,
      "qc_enable":false,
      "hsn": "",
      "brand":"",
      "qc_size":""
      
            },';
    }

    $orderDate = date("Y-m-d H:i", strtotime($inputData['ordered_on']));
    // echo "hello" . $orderDate;

    // Return api
    
      $maindata = '{
          "order_id": "' . $inputData['order_number'] . '",
  "order_date": "' . $orderDate . '",
  "channel_id": " ",
  "pickup_customer_name": "' . str_replace(' ', '', $inputData['ship_firstname']) . '",
  "pickup_last_name": "' . $inputData['ship_lastname'] . '",
  "company_name":" ",
  "pickup_address": "' . $inputData['ship_address1'] . '",
  "pickup_address_2": "' . $inputData['ship_address2'] . '",
  "pickup_city": "' . $inputData['ship_city'] . '",
  "pickup_state": "' . $inputData['ship_zone'] . '",
  "pickup_country": "' . $inputData['ship_country'] . '",
  "pickup_pincode": ' . $inputData['ship_zip'] . ',
  "pickup_email": "' . $inputData['ship_email'] . '",
  "pickup_phone": "' . $inputData['ship_phone'] . '",
  "pickup_isd_code": "91",
  "shipping_customer_name": "' . str_replace(' ', '', $inputData['ship_firstname']) . '",
  "shipping_last_name": "' . $inputData['ship_lastname'] . '",
  "shipping_address": "' . $inputData['ship_address1'] . '",
  "shipping_address_2": "' . $inputData['ship_address2'] . '",
  "shipping_city": "' . $inputData['ship_city'] . '",
  "shipping_country": "' . $inputData['ship_country'] . '",
  "shipping_pincode": ' . $inputData['ship_zip'] . ',
  "shipping_state": "' . $inputData['ship_zone'] . '",
  "shipping_email": "' . $inputData['ship_email'] . '",
  "shipping_isd_code": "91",
  "shipping_phone": ' . $inputData['ship_phone'] . '
    }';
//   echo $maindata;
    $curl = curl_init();
    
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/orders/create/return',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "order_id": "' . $inputData['order_number'] . '",
  "order_date": "' . $orderDate . '",
  "channel_id": " ",
  "pickup_customer_name": "' . str_replace(' ', '', $inputData['ship_firstname']) . '",
  "pickup_last_name": "' . $inputData['ship_lastname'] . '",
  "company_name":" ",
  "pickup_address": "' . $inputData['ship_address1'] . '",
  "pickup_address_2": "' . $inputData['ship_address2'] . '",
  "pickup_city": "' . $inputData['ship_city'] . '",
  "pickup_state": "' . $inputData['ship_zone'] . '",
  "pickup_country": "' . $inputData['ship_country'] . '",
  "pickup_pincode": ' . $inputData['ship_zip'] . ',
  "pickup_email": "' . $inputData['ship_email'] . '",
  "pickup_phone": "' . $inputData['ship_phone'] . '",
  "pickup_isd_code": "91",
  "shipping_customer_name": "' . str_replace(' ', '', $inputData['ship_firstname']) . '",
  "shipping_last_name": "' . $inputData['ship_lastname'] . '",
  "shipping_address": "' . $inputData['ship_address1'] . '",
  "shipping_address_2": "' . $inputData['ship_address2'] . '",
  "shipping_city": "' . $inputData['ship_city'] . '",
  "shipping_country": "' . $inputData['ship_country'] . '",
  "shipping_pincode": ' . $inputData['ship_zip'] . ',
  "shipping_state": "' . $inputData['ship_zone'] . '",
  "shipping_email": "' . $inputData['ship_email'] . '",
  "shipping_isd_code": "91",
  "shipping_phone": ' . $inputData['ship_phone'] . '
  "order_items": [
    ' . rtrim($data, ",") . '
    ],
  "payment_method": "PREPAID",
  "total_discount": "0",
  "sub_total": ' . $subtotal_items . ',
    "length": ' . $item_length . ',
    "breadth": ' . $item_breadth . ',
    "height": ' . $item_height . ',
    "weight": ' . $item_weight . '
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $gettoken . ''
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
  }
  
public function returnShipment($orderId, $order_item_id){
    if (isset($_SESSION['authenticated'])) {
      $adminid = $_SESSION['auth_user']['user_id'];
    }
    $sql = "SELECT * FROM `orders` WHERE id = '$orderId' LIMIT 1";
    $result = $this->conn->query($sql);
    if ($result) {
      while ($row = $result->fetch_assoc()) {
        $inputData = [
          'orderid' => $row['id'],
          'order_number' => $row['order_number'],
          'customer_id' => $row['customer_id'],
          'ordered_on' => $row['ordered_on'],
          'payment_info' => $row['payment_info'],
          'ship_firstname' => $row['ship_firstname'],
          'ship_lastname' => $row['ship_lastname'],
          'ship_email' => $row['ship_email'],
          'ship_phone' => $row['ship_phone'],
          'ship_address1' => $row['ship_address1'],
          'ship_address2' => $row['ship_address2'],
          'ship_city' => $row['ship_city'],
          'ship_zip' => $row['ship_zip'],
          'ship_zone' => $row['ship_zone'],
          'ship_country' => $row['ship_country'],
          'payment_info' => $row['payment_info']
        ];
      }
$sql_getitems = "SELECT order_items.quantity, order_items.total ,order_items.sku_number, product.name, product.item_weight, product.item_length, product.item_height, product.item_breadth FROM order_items INNER JOIN 
      product ON order_items.product_id = product.id WHERE order_items.id = '$order_item_id' AND order_items.admin_id ='$adminid'";
      $result_items = $this->conn->query($sql_getitems);
      if ($result_items) {
        $returnproduct = $this->returnOrder($result_items, $inputData);
        if ($returnproduct) {
          return true;
        } else {
          return false;
        }
      }
    } else {
      return false;
    }
  
}
}
