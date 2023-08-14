<?php
class ReviewController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function getReviews($id){
        $sql = "SELECT * FROM product_rating INNER JOIN user ON product_rating.user_id=user.id WHERE product_id = '$id'";
        $result = $this->conn->query($sql);
        if($result){
            return $result;
        }
        else{
            return false;
        }

    }

    // SHow t=product review on product page by there ids

    public function getnoofreviews($id){
        $sql = "SELECT COUNT(id) as totalreviews FROM product_rating WHERE product_id = '$id'";

        $numberoftotrating = $this->conn->query($sql);
        if($numberoftotrating){
            $numberoftotalratings = $numberoftotrating->fetch_assoc();
            return $numberoftotalratings['totalreviews'];
        }
        else{
            return false; 
        }
    }

    public function getProductreviews($id){
       $sql = "SELECT COUNT(id) as totalreviews FROM product_rating WHERE product_id = '$id'";

        $numberoftotrating = $this->conn->query($sql);
        if($numberoftotrating){
            $numberoftotalratings = $numberoftotrating->fetch_assoc();
        
      
       $sql = "SELECT SUM(ratings) as totalratings FROM product_rating WHERE product_id = '$id'";
        $totalratings = $this->conn->query($sql);
        if($totalratings){
           $total_ratings = $totalratings->fetch_assoc();
       if($numberoftotalratings['totalreviews'] != '' && $total_ratings['totalratings'] !=''){
        $total_sub_ratings = $total_ratings['totalratings']/$numberoftotalratings['totalreviews'];
        $total_sum_ratings = round($total_sub_ratings);
        return $total_sum_ratings;
       }
    }
    }
    else{
        return false;
    }
}
}
