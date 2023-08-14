<?php
include_once('./Mails/MailController.php');
class CheckoutController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function create_guest_order($inputdata, $user_id){
        $created_at = $inputdata['created_at'];
        $order_status = $inputdata['order_status'];
        $user_id =  $user_id;
        $customer_name = $inputdata['customer_name'];
        $customer_lastname = $inputdata['customer_lastname'];
        $customer_email = $inputdata['customer_email'];
        $customer_phone = $inputdata['customer_phone'];
        $customer_country = $inputdata['customer_country'];
        $customer_addressf = $inputdata['customer_addressf'];
        $customer_addrest = $inputdata['customer_addrest'];
        $customer_city = $inputdata['customer_city'];
        $customer_state = $inputdata['customer_state'];
        $customer_zip = $inputdata['customer_zip'];
        $total_price = $inputdata['total_price'];
        $payment_info = $inputdata['payment_info'];
        if($inputdata['payment_info'] == 'razorpay'){
            $razorpay_payment_id = $inputdata['razorpay_payment_id'];
        }
        else{
            $razorpay_payment_id = '';
        }
        
        // print_r($inputdata);

       $sql = "INSERT INTO orders (customer_id, status, ordered_on, total, payment_info, payment_id, ship_firstname, ship_lastname, ship_email, ship_phone, ship_address1, ship_address2, ship_city, ship_zip, ship_zone, ship_country)
         VALUES ('$user_id', '$order_status', '$created_at', '$total_price', '$payment_info', '$razorpay_payment_id', '$customer_name', '$customer_lastname', '$customer_email', '$customer_phone', '$customer_addressf', '$customer_addrest', '$customer_city', '$customer_zip', '$customer_state', '$customer_country')";
        $result = $this->conn->query($sql);
        if ($result) {
            $last_order_id = $this->conn->insert_id;
            return $last_order_id;
        } else {
            return false;
        }
    }

    public function create_order($inputdata)
    {
        $created_at = $inputdata['created_at'];
        $order_status = $inputdata['order_status'];
        $user_id = $inputdata['user_id'];
        $customer_name = $inputdata['customer_name'];
        $customer_lastname = $inputdata['customer_lastname'];
        $customer_email = $inputdata['customer_email'];
        $customer_phone = $inputdata['customer_phone'];
        $customer_country = $inputdata['customer_country'];
        $customer_addressf = $inputdata['customer_addressf'];
        $customer_addrest = $inputdata['customer_addrest'];
        $customer_city = $inputdata['customer_city'];
        $customer_state = $inputdata['customer_state'];
        $customer_zip = $inputdata['customer_zip'];
        $total_price = $inputdata['total_price'];
        $payment_info = $inputdata['payment_info'];
        if($inputdata['payment_info'] == 'razorpay'){
            $razorpay_payment_id = $inputdata['razorpay_payment_id'];
        }
        else{
            $razorpay_payment_id = '';
        }
        

        $sql = "INSERT INTO orders (customer_id, status, ordered_on, total, payment_info, payment_id, ship_firstname, ship_lastname, ship_email, ship_phone, ship_address1, ship_address2, ship_city, ship_zip, ship_zone, ship_country)
         VALUES ('$user_id', '$order_status', '$created_at', '$total_price', '$payment_info', '$razorpay_payment_id', ' $customer_name', '$customer_lastname', '$customer_email', '$customer_phone', '$customer_addressf', '$customer_addrest', '$customer_city', '$customer_zip', '$customer_state', '$customer_country')";
        $result = $this->conn->query($sql);
        if ($result) {
            $last_order_id = $this->conn->insert_id;
            return $last_order_id;
        } else {
            return false;
        }
    }

    public function insert_order_items($order_id, $order_status)
    {
        if (isset($_SESSION["add-to-cart"])) {
            foreach ($_SESSION["add-to-cart"] as $key => $cart) {
                $admin_id = $cart['admin_id'];
                $productid = $cart['productid'];
                $price = $cart['price'];
                $sku = $cart['sku'];
                $prod_quant = $cart['prod_quant'];
                $sql = "INSERT INTO order_items (order_id, admin_id, product_id, quantity, total, sku_number) 
                VALUES ('$order_id', '$admin_id', '$productid', '$prod_quant', '$price', '$sku')";
                $result = $this->conn->query($sql);
                $last_orderitem_id = $this->conn->insert_id;
                $this->order_items_status($last_orderitem_id, $order_status);
            }
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function order_items_status($order_item_id, $order_status)
    {
        $sql = "INSERT INTO order_items_status (order_item_id, item_status) VALUES ('$order_item_id', '$order_status')";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function update_user($userData)
    {
        $userid =  $userData['user_id'];
        $customer_name =  $userData['customer_name'];
        $customer_lastname =  $userData['customer_lastname'];
        $customer_email =  $userData['customer_email'];
        $customer_phone =  $userData['customer_phone'];
        $customer_country = $userData['customer_country'];
        $customer_addressf = $userData['customer_addressf'];
        $customer_addrest =  $userData['customer_addrest'];
        $customer_city = $userData['customer_city'];
        $customer_state = $userData['customer_state'];
        $customer_zip = $userData['customer_zip'];
        // This will check if address is changed or not
     $checkifaddrexist = "SELECT * FROM user WHERE id = '$userid'";
        $checkexist = $this->conn->query($checkifaddrexist);
        if ($checkexist) {
             while($row = $checkexist->fetch_assoc()){
               $adsress1 = $row['address1'];
               $zip = $row['zip'];
             }
             if($adsress1 != '' && $zip != '' && $adsress1 != $customer_addressf){
                        $checkfornoofaddress = "SELECT COUNT(id) as totcustomer FROM customer_addresses WHERE customer_id = '$userid'";
            $checknoofaddressofauser = $this->conn->query($checkfornoofaddress);
            if ($checknoofaddressofauser->num_rows > 0) {
                while ($row = $checknoofaddressofauser->fetch_assoc()) {
                    $data = $row['totcustomer'];
                }
            }
            if ($data <= 2) {
                $updatenewaddress = "INSERT INTO customer_addresses (customer_id, phone, address1, address2, city, state, country, zip) VALUES
             ('$userid', '$customer_phone',  '$customer_addressf', '$customer_addrest', '$customer_city', '$customer_state', '$customer_country', '$customer_zip')";
                $result = $this->conn->query($updatenewaddress);
            }
            return true;
             }
             if($adsress1 == '' && $zip == ''){
              $sql = "UPDATE user SET user_name = '$customer_name', last_name ='$customer_lastname', email = '$customer_email', phone='$customer_phone', address1 ='$customer_addressf', address2 = '$customer_addrest', city = '$customer_city', zone ='$customer_state', country = '$customer_country', zip = '$customer_zip' WHERE id ='$userid'";
            $result = $this->conn->query($sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
             }
             return true;
        } 
    }

    public function updateOrderno($order_no, $order_id)
    {
        $sql = "UPDATE orders SET order_number = '$order_no' WHERE id ='$order_id'";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function update_pay_status($ordernumber){
       $sql = "UPDATE orders SET payment_status ='success' WHERE order_number ='$ordernumber'";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function order_details($order_id)
    {
        $sql = "SELECT * FROM orders WHERE id = '$order_id' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION['order_details'] = [
                'order_id' => $data['order_number'],
                'date' => $data['ordered_on'],
                'status' => $data['status'],
                'payment_info' => $data['payment_info'],
                'ship_firstname' => $data['ship_firstname'],
                'ship_lastname' => $data['ship_lastname'],
                'ship_email' => $data['ship_email'],
                'ship_phone' => $data['ship_phone'],
                'ship_address1' => $data['ship_address1'],
                'ship_address2' => $data['ship_address2'],
                'ship_city' => $data['ship_city'],
                'ship_zip' => $data['ship_zip'],
                'ship_zone' => $data['ship_zone'],
                'ship_country' => $data['ship_country'],
            ];
        }
    }

    public function sendOrdermailtouser($useremail, $totalprice)
    {
        $content = '';
        $subject = "Order Confirmation";
        $sendVerificationmail = new MailController;


        if (isset($_SESSION['order_details'])) {
            $content .= '
                       <html>
                        <body>
                        <h4 style="text-align:center;">Thanks For Shopping With Enham</h4>
                        <p>Order Number:<strong> ' . $_SESSION['order_details']['order_id'] . '</p>
                        
                        <p>Contact Details:' . $_SESSION['order_details']['ship_firstname'] . '
                        ' . $_SESSION['order_details']['ship_lastname'] . '<br>
                        Phone:' . $_SESSION['order_details']['ship_phone'] . '
                            
                        </p>
                        
                         </body>
                </html>
                       ';
        }
        $content .= '
                <html>
                <body>
                <table style="line-height: 2;">
                <tr style="font-weight: bold;border:1px solid #cccccc;background-color:#f2f2f2;">
                <td style="border:1px solid #cccccc;width:80px;">Sr No</td>
                <td style="border:1px solid #cccccc;width:200px;">Name</td>
                <td style = "text-align:right;border:1px solid #cccccc;width:85px">Price (Rs)</td>
                <td style = "text-align:right;border:1px solid #cccccc;width:75px;">Quantity</td>
                <td style = "text-align:right;border:1px solid #cccccc;">Subtotal (Rs)</td>
                </tr>
                ';

        if (isset($_SESSION["add-to-cart"])) {
            $count = 1;
            $carttotal = 0;
            foreach ($_SESSION["add-to-cart"] as $key => $cart) {

                $subtotal = $cart['price'] * $cart['prod_quant'];
                $subtotal =   number_format($subtotal, 2);
                $carttotal = $carttotal + ($cart['prod_quant'] * $cart['price']);
                $carttotal =   number_format($carttotal, 2);
                $content .= '
                                                <tr>
                                                    <td style = "border:1px solid #cccccc;">' . $count . '</td>
                                            <td style = "border:1px solid #cccccc;">' . $cart['prod_name'] . '</td>
                                                
                                        <td style = "border:1px solid #cccccc;">Rs.'  . $cart['price'] . '</td>
                                    <td style = "border:1px solid #cccccc;">  ' . $cart['prod_quant'] . '</td>
                                    <td style = "border:1px solid #cccccc;">' . $subtotal . '</td>
                                                </tr>
                                                ';
                $count++;
            }
        }
        $content .= '
                       <tr style = "font-weight: bold;">
    <td></td><td></td>
    <td style = "text-align:right;">Total (Rs)</td>
    <td style = "text-align:right;">Rs. ' . $totalprice . '</td>
</tr>
                       ';



        $content .= '
                </table>
                </body>
                </html>
                ';
        $mailsend = $sendVerificationmail->mailsend($content, $useremail, $subject);
    }

    // Below code if for guest user checkout

    public function inset_user($userData){

        $customer_name =  $userData['customer_name'];
        $customer_lastname =  $userData['customer_lastname'];
        $customer_email =  $userData['customer_email'];
        $create_password = password_hash($userData['password'], PASSWORD_DEFAULT);
        $customer_phone =  $userData['customer_phone'];
        $customer_country = $userData['customer_country'];
        $customer_addressf = $userData['customer_addressf'];
        $customer_addrest =  $userData['customer_addrest'];
        $customer_city = $userData['customer_city'];
        $customer_state = $userData['customer_state'];
        $customer_zip = $userData['customer_zip'];
        $status = '1';

     $addguestuser = "INSERT INTO user (user_name, last_name, email, password, status, phone, address1, address2, city, zone, country, zip) 
       VALUES ('$customer_name', '$customer_lastname', '$customer_email' , '$create_password','$status', '$customer_phone' , '$customer_addressf', '$customer_addrest', '$customer_city', 
        '$customer_state', '$customer_country', '$customer_zip')";
      
        $result = $this->conn->query($addguestuser);
        if($result){
            $lastuserid = $this->conn->insert_id;
            return $lastuserid;
         
        }
        else{
            return false;
        }
    }
    
    public function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
}
