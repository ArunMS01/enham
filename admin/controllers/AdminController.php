<?php
class AdminController
{
    public function __construct()
    {
        $db = new Databaseconnection;
        $this->conn = $db->conn;
    }
    
    public function shippedProducts(){
        $sql = "SELECT * FROM order_items_status WHERE item_status = 'Shipped'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $numrows = $result->num_rows;
            return $numrows;
        }
        else{
            return false;
        }
    }
    
    public function getShippedproducts(){
        $sql = "SELECT count(id) as totalshippedproduct FROM order_items_status WHERE item_status = 'Shipped'";
        $result = $this->conn->query($sql);
        if($result){
           while($row = $result->fetch_assoc()){
                $totshippedproducts =  $row['totalshippedproduct'];
            }
            return $totshippedproducts;
        }
        else{
            return false; 
        }
        
    }
    
    public function totalSales(){
       $ordergrandtotal = 0;
       $sql = "SELECT om.total AS ordertotal FROM orders AS om
       JOIN order_items ot ON om.id = ot.order_id
       JOIN order_items_status ots ON ot.id = ots.order_item_id
       WHERE ots.item_status = 'Delivered'
       ";
      $result = $this->conn->query($sql);
        if($result){
            while($row = $result->fetch_assoc()){
                $ordergrandtotal =  $ordergrandtotal + $row['ordertotal'];
            }
           return $ordergrandtotal;
        }
        else{
            return false;
        }
       
    }
    
    public function getAllproducts(){
        if (isset($_SESSION['authenticated'])) {
            $admin_id = $_SESSION['auth_user']['user_id'];
        }
        $sql = "SELECT * FROM `product` WHERE status = '0' AND admin_id = '$admin_id'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $numrows = $result->num_rows;
            return $numrows;
        }
        else{
            return false;
        }
    }
    
       public function gettotalOrders(){
        // $sql = "SELECT * FROM `orders` WHERE status != 'Cancel'";
        if (isset($_SESSION['authenticated'])) {
            $admin_id = $_SESSION['auth_user']['user_id'];
        }
        $sql = "SELECT orders.id, orders.order_number,orders.customer_id,orders.status,orders.ordered_on,orders.total, orders.payment_info, orders.ship_firstname, orders.ship_lastname,
                orders.ship_email, orders.ship_phone
                FROM orders
                INNER JOIN order_items ON orders.id=order_items.order_id WHERE order_items.admin_id = '$admin_id' AND orders.status != 'Cancel' ORDER BY orders.id DESC";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $numrows = $result->num_rows;
            return $numrows;
        }
        else{
            return false;
        }
    }
    
       public function getNeworders($daysorder,$statusorder)
    {
        $output ='';
        if (isset($_SESSION['authenticated'])) {
            $admin_id = $_SESSION['auth_user']['user_id'];
        }
        // $sql = "SELECT orders.id, orders.order_number,orders.customer_id,orders.status,orders.ordered_on,orders.total, orders.payment_info, orders.ship_firstname, orders.ship_lastname,
        //         orders.ship_email, orders.ship_phone
        //         FROM orders
        //         INNER JOIN order_items ON orders.id=order_items.order_id WHERE order_items.admin_id = '$admin_id' ORDER BY orders.id DESC";
        
        $sql = "SELECT om.id, om.order_number,om.customer_id,om.status,om.ordered_on,om.total, om.payment_info, om.ship_firstname, om.ship_lastname,
                om.ship_email, om.ship_phone FROM orders AS om
       JOIN order_items ot ON om.id = ot.order_id
       JOIN order_items_status ots ON ot.id = ots.order_item_id WHERE ot.admin_id = '$admin_id'";
       
       
       
       if(!empty($statusorder)){
    $sql .=" AND ots.item_status = '$statusorder'";
       }
         if(!empty($daysorder)){
         $sql .=" AND om.ordered_on > (NOW() - INTERVAL $daysorder DAY)";
       }  
       
       $sql .=" ORDER BY om.id DESC";

        $result = $this->conn->query($sql);
        if ($result) {
           foreach($result as $row){
               $output .='
                 <tr>
                          <td>'. $row['order_number'] .'</td>  
                           <td>'. $row['ship_firstname'] . ' ' . $row['ship_lastname'] .'</td> 
                           <td>Rs.'. number_format($row['total'],2)  .'</td>
                           <td>'. $row['payment_info'] .'</td>
                           <td><a href="edit-order.php?id='. $row['id'] .'">Edit</a></td>
                        </tr>
               ';
           }
           echo $output;
        }
    }
    
    public function getnumberOfneworders(){
        if (isset($_SESSION['authenticated'])) {
            $admin_id = $_SESSION['auth_user']['user_id'];
        }
          $sql = "SELECT COUNT(orders.id) AS total FROM `orders`
            INNER JOIN order_items ON orders.id=order_items.order_id
           WHERE orders.status = 'Order Placed' AND order_items.admin_id = '$admin_id'";
        $result = $this->conn->query($sql);
        if($result){
        $data = $result->fetch_assoc();
        return $data['total'];
        }
        else{
            return false;
        }
    }
    
      public function cutomerQueries(){
        $sql = "SELECT * FROM `customer_query` WHERE status = '1'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $numrows = $result->num_rows;
            return $numrows;
        }
        else{
            return false;
        }
    }

    public function updateUserstatus($userid, $userstatus){
        $sql = "UPDATE user SET status = '$userstatus' WHERE id = '$userid'";
        $result = $this->conn->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
}