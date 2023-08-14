<?php
include('../../config/app.php');
include_once('../controllers/AdminController.php');
if (isset($_POST['update_user'])) {
  $userid =  validateInput($db->conn, $_POST['userid']);
  $userstatus = validateInput($db->conn, $_POST['status']);
  $updateuser  = new AdminController;
  $result =  $updateuser->updateUserstatus($userid, $userstatus);
  if($result){
    redirectback("Updated Successfully");
  }
  else{
    redirectback("Soem error occured");
  }
}
?>  