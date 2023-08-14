<?php
class UserController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function getUserdetail($user_id){
        $sql = "SELECT * FROM orders WHERE customer_id = '$user_id'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result;
        }
        else{
            return false;
        }
    }
    
        
    public function checkifregsitereduserbuyingnow(){
        if(isset($_SESSION['authenticated'])){
             redirect("You are already registered","index");
        }
    }


    public function storeRating($review_message, $product_id, $userreviewid, $stars)
    {
        $checkcommentalreadyexist = $this->checkcommentalreadyexists($product_id, $userreviewid);
        if (!$checkcommentalreadyexist) {
            $checkuserbuytheproduct = $this->checkIfuserbuyproduct($product_id, $userreviewid);
            if ($checkuserbuytheproduct) {


                $sql = "INSERT INTO product_rating (product_id, user_id, ratings, message) VALUES ('$product_id', '$userreviewid', '$stars', '$review_message')";
                $result = $this->conn->query($sql);


                if ($result->num_rows > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } 
    }

    public function checkcommentalreadyexists($product_id, $userreviewid)
    {
        $sql = "SELECT * FROM product_rating WHERE product_id = '$product_id' AND user_id = '$userreviewid'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkIfuserbuyproduct($product_id, $userreviewid)
    {
        $sql = "SELECT orders.id
        FROM orders
        INNER JOIN order_items ON orders.id=order_items.order_id WHERE orders.customer_id ='$userreviewid' AND order_items.product_id = '$product_id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getMoreaddress($id){
        $sql = "SELECT * FROM `customer_addresses` WHERE customer_id = '$id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
}

?>