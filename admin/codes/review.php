<?php
include('../../config/app.php');
include_once('../controllers/ReviewController.php');
$reviews = new ReviewController;
if(isset($_POST['delete-reviews'])){
    
    $ratingid = validateInput($db->conn, $_POST['ratingid']);
    $deletereview = $reviews->delete($ratingid);
    if($deletereview){
        redirect("Deleted Successfully", 'admin/reviews.php');
    }
    else{
        redirect("Some error ocurred", 'admin/reviews.php');
    }
}
if(isset($_POST['update_review'])){
    $ratingid = validateInput($db->conn, $_POST['review_id']);
    $review_message = validateInput($db->conn, $_POST['review_message']);
    $updatereview = $reviews->update($ratingid,  $review_message);
    // print_r($updatereview);
    if($updatereview){
        redirect("Updated Successfully", 'admin/reviews.php');
    }
    else{
        redirect("Some error ocurred", 'admin/reviews.php');
    }
}
?>