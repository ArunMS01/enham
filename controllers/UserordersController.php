<?php
class UserordersController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function get_orders($user_id){
        $sql = "SELECT * FROM orders WHERE customer_id = '$user_id' ORDER BY id DESC";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result;
        }
        else{
            return false;
        }
    }

    public function get_ordered_items($id){
        $sql = "SELECT order_items.product_id, order_items.quantity, order_items.total, order_items.tracking_id,order_items.delivery_date, order_items_status.item_status, order_items.id, order_items_status.created_at FROM order_items INNER JOIN order_items_status
        ON order_items.id = order_items_status.order_item_id
        WHERE order_items.order_id = '$id'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result;
        }
        else{
            return false;
        }
    }

    public function getOrderid($id){
        $sql = "SELECT order_id FROM order_items WHERE id ='$id' LIMIT 1";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
           $data = $result->fetch_assoc();
           return $data;
        }
        else{
            return false; 
        }
    }

    public function orderDetails($orderId){
        // $sql = "SELECT * FROM orders WHERE id = '$orderId' LIMIT 1";
        $sql = "SELECT orders.order_number, orders.total, orders.ship_firstname, orders.ship_lastname, orders.ship_phone,orders.ship_email, orders.ship_address1, orders.ship_address2,
        orders.ship_city, orders.ship_zip, orders.ship_zone, orders.ship_country, order_items.tracking_id FROM orders INNER JOIN order_items ON orders.id = order_items.order_id
        WHERE orders.id = '$orderId'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
           $data = $result->fetch_assoc();
           return $data;
        }
        else{
            return false; 
        }
    }
    
    public function getuseraddresses($userid){
        $sql = "SELECT * FROM customer_addresses WHERE customer_id = '$userid'";
        $result = $this->conn->query($sql); 
            if($result->num_rows > 0){
                return $result;
            }
            else{
                return false;
            }
    }

  
}
?>