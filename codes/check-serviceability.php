<?php
include('../config/app.php');
include_once('../controllers/ShiprocketController.php');
if(isset($_POST['action'])){
    if($_POST['action'] == 'service-check'){
        $pincode = $_POST['pincode'];
        $adminid = $_POST['adminid'];
        $item_weight = $_POST['$item_weight'];
        $getavailibity = new ShiprocketController;
        $getresult = $getavailibity->getserviceability($pincode, $adminid, $item_weight);
        if($getresult){
            echo $getresult;
        }
    }
}
?>