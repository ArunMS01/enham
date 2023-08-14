<?php
include('../config/app.php');
include_once('../controllers/UserController.php');
if(isset($_POST['submit-review'])){
  $redirect_url = $_POST['redirect_url'];
  $review_message = validateInput($db->conn, $_POST['review_message']);
  $product_id = validateInput($db->conn, $_POST['product_id']);
  $userreviewid = validateInput($db->conn, $_POST['userreviewid']);
  $stars = validateInput($db->conn, $_POST['stars']);
  // echo $stars;
  $addrating = new UserController;
  $result = $addrating->storeRating($review_message,$product_id,$userreviewid,$stars);
  // print_r($result);
  if($result){
    redirectback("Added Successfully" , $_SERVER['HTTP_REFERER']);
  }
  else{
    redirectback("You didn't purchase this product OR Some error occured" , $_SERVER['HTTP_REFERER']);
  }
}

?>