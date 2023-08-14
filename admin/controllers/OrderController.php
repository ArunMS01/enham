<?php
class OrderController
{
    public function __construct()
    {
        $db = new Databaseconnection;
        $this->conn = $db->conn;
    }

    public function index()
    {
        if (isset($_SESSION['authenticated'])) {
            $admin_id = $_SESSION['auth_user']['user_id'];
        }
        $sql = "SELECT orders.id, orders.order_number,orders.customer_id,orders.status,orders.ordered_on, orders.payment_status, orders.payment_info, orders.ship_firstname, orders.ship_lastname,
                orders.ship_email, orders.ship_phone, order_items.id AS orderitemid ,order_items.total, order_items.quantity AS item_quantity, order_items.shiprocket_orderid
                FROM orders
                INNER JOIN order_items ON orders.id=order_items.order_id WHERE order_items.admin_id = '$admin_id' ORDER BY orders.id DESC";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

 
  public function export($startdate,$enddate)
    {
        if (isset($_SESSION['authenticated'])) {
            $admin_id = $_SESSION['auth_user']['user_id'];
        }
      $sql = "SELECT orders.id, orders.order_number,orders.customer_id,orders.status,orders.ordered_on, orders.payment_info, orders.ship_firstname, orders.ship_lastname,
        orders.ship_email, orders.ship_phone,orders.ship_address1,orders.ship_address2,orders.ship_city,orders.ship_zip,orders.ship_zone,orders.ship_country,
        order_items.id AS orderitemid, order_items.product_id, order_items.quantity, order_items.tax, order_items.total AS itemstotal 
        FROM orders
        INNER JOIN order_items ON orders.id=order_items.order_id WHERE order_items.admin_id = '$admin_id' AND orders.ordered_on BETWEEN '$enddate' AND '$startdate' ORDER BY orders.id DESC";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function editorder($id)
    {
        $getOrders = "SELECT * FROM orders WHERE id = '$id' LIMIT 1";
        $result = $this->conn->query($getOrders);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    public function getorderItems($orderid)
    {
        if (isset($_SESSION['authenticated'])) {
            $admin_id = $_SESSION['auth_user']['user_id'];
        }
        $orderitems = "SELECT * FROM order_items WHERE id ='$orderid' AND admin_id = '$admin_id'";
        $result = $this->conn->query($orderitems);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function update_order_item_status($order_item_id, $order_status, $cancel_reason)
    {
       $sql = "UPDATE order_items_status SET item_status = '$order_status'";
        if(!empty($cancel_reason)){
        $sql .=" , cancel_reason = '$cancel_reason'";
        }
         $sql .= " WHERE order_item_id = '$order_item_id'";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getOrdereditemstatus($itemid)
    {
        $sql = "SELECT * FROM order_items_status WHERE order_item_id='$itemid' LIMIT 1";
        $result = $this->conn->query($sql);
        //   print_r($result);
        if ($result->num_rows > 0) {
            $item_status_data = $result->fetch_assoc();
            // print_r($item_status_data);
            return $item_status_data;
        } else {
            return false;
        }
    }

    public function orderComplete($orderedid, $orderedstatus)
    {
        // echo  $orderedstatus;
        $sql = "UPDATE orders SET status = '$orderedstatus'";
        if ($orderedstatus == 'Delivered') {
            $sql .= " ,payment_info = 'completed' ";
        }
        $sql .= " WHERE id = '$orderedid'";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getOrderitemstatus($id){
        $sql = "SELECT item_status FROM `order_items_status` WHERE order_item_id = '$id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $item_status_data = $result->fetch_assoc();
            return $item_status_data['item_status'];
        } else {
            return false;
        }
    }

    public function getallorderitemstatus($id){
        $sql = "SELECT * FROM `order_items_status` WHERE order_item_id = '$id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
          return $result;
        } else {
            return false;
        }    
    }
}
