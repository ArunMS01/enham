<?php
class ReviewController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }
    public function index(){
        $sql = "SELECT product.name, product_rating.ratings,product_rating.id, product_rating.message,product_rating.user_id
                FROM product
                INNER JOIN product_rating ON product.id = product_rating.product_id";
        $result = $this->conn->query($sql);
        if($result){
            return $result;
        }
        else{
            return false;
        }

    }

    public function reviewUsername($id){
        $sql = "SELECT user_name, last_name FROM `user` WHERE status = '1' AND id = '$id' LIMIT 1";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            return $data;
        }
        else{
            return false;
        }
    }

    public function delete($id){
        $sql = "DELETE FROM product_rating WHERE id ='$id'";
        $result = $this->conn->query($sql);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function edit($id){
        $sql = "SELECT * FROM product_rating WHERE id ='$id' LIMIT 1";
        $result = $this->conn->query($sql);
        if($result){
            $data = $result->fetch_assoc();
            return $data;
        }
        else{
            return false;
        }
    }

    public function update($ratingid,  $review_message){
        $sql = "UPDATE product_rating SET message = '$review_message' WHERE id = '$ratingid'";
        $result = $this->conn->query($sql);
        if($result){
           return true;
        }
        else{
            return false;
        }
    }
}