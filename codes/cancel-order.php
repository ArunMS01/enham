<?php
include('../config/app.php');
include('../controllers/CancelorderController.php');
if(isset($_POST['cancel_btn'])){
    $orderitem_id = validateInput($db->conn, $_POST['orderitem_id']);
    $cancel_status = validateInput($db->conn, $_POST['cancel_status']);
    $orderidnumber = validateInput($db->conn, $_POST['orderidnumber']);
    $customername  = validateInput($db->conn, $_POST['customername']);
    $customermail = validateInput($db->conn, $_POST['customermail']);
    $customerphone = validateInput($db->conn, $_POST['customerphone']);
    $productnamec =  validateInput($db->conn, $_POST['productnamec']);

    $cancel_reason =  validateInput($db->conn, $_POST['cancel_reason']);
    $product_images = $_FILES['product_images']["name"];

    $cancelorder = new CancelorderController;
    $target_dir = "../admin/assets/cancel-order-images/";
        $target_file = $target_dir . basename($_FILES["product_images"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     
          $check = getimagesize($_FILES["product_images"]["tmp_name"]);
          if($check !== false) {
          
            $uploadOk = 1;
          } else {
            redirectback("File is not an image");
            $uploadOk = 0;
          }
    
        
        // Check file size
        if ($_FILES["product_images"]["size"] > 1000000) {
            redirectback("File size is large");
          $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            redirectback("File jpg png and jpeg are allowed");
          $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            redirectback("File not uploaded");
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["product_images"]["tmp_name"], $target_file)) {
       
          } else {
            redirectback("File not uploaded some error occured");
          }
        }
        
    $result = $cancelorder->ordercancel($orderitem_id, $cancel_status, $cancel_reason, $product_images);
    if($result){
        
        $sendmail =$cancelorder->sendCancellationmail($orderidnumber, $customername, $customermail, $customerphone, $productnamec);
        if($sendmail){
        redirect('You Order has been cancelled', 'my-account');
        }
        else{
           redirect('Some error has occured', 'my-account'); 
        }
    }
}
