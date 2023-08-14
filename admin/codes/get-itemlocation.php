<?php
include('../../config/app.php');
include_once('../controllers/ShiprocketController.php');
if(isset($_POST['action'])){
    if($_POST['action'] == 'item_location'){
        $trackingid = validateInput($db->conn, $_POST['trackingid']);
        $admin_id = validateInput($db->conn, $_POST['admin_id']);
        $shippment = new ShiprocketController;
        $status_shiprocket =  $shippment->getShiprocketstatus($trackingid, $admin_id);
        if($status_shiprocket){
            echo $status_shiprocket;
        }
        
    }
}
?>