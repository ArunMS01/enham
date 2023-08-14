<?php
include('../config/app.php');
include('../controllers/RegisterController.php');
if(isset($_POST['update_btn'])){
    $userphone = '+91' . $_POST['phone'];
    $userid = validateInput($db->conn, $_POST['userid']);
    $inputData = [
        'firstname' => validateInput($db->conn, $_POST['firstname']),
        'lastname' => validateInput($db->conn, $_POST['lastname']),
        'email' => validateInput($db->conn, $_POST['email']),
        'phone' => validateInput($db->conn, $userphone),
        'address1' => validateInput($db->conn, $_POST['address1']),
        'address2' => validateInput($db->conn, $_POST['address2']),
        'city' => validateInput($db->conn, $_POST['city']),
        'state' => validateInput($db->conn, $_POST['state']),
        'country' => validateInput($db->conn, $_POST['country']),
        'zip' => validateInput($db->conn, $_POST['zip']),
    ];
    $updateUser = new RegisterController;

    $result = $updateUser->updateUser($inputData, $userid);
    //    echo $result;
    if ($result) {
        redirect('Updated Successfully', 'my-account');
    } else {
        redirect('Some Error Occured', 'my-account');
    }
}

if(isset($_POST['delete_address'])){
    $addressid = validateInput($db->conn, $_POST['addressid']);
    $customerid = validateInput($db->conn, $_POST['customerid']);
    $updateUser = new RegisterController;
    $result = $updateUser->deleteUseraddresses($addressid, $customerid);
     if ($result) {
        redirect('Deleted Successfully', 'my-account');
            } else {
                redirect('Some Error Occured', 'my-account');
            }
}

if(isset($_POST['update_address'])){
    
     $inputData = [
        'phone' => validateInput($db->conn, $_POST['phone']),
        'addressid' => validateInput($db->conn, $_POST['addressid']),
        'customerid' => validateInput($db->conn, $_POST['customerid']),
        'addressf' => validateInput($db->conn, $_POST['addressf']),
        'address_second' => validateInput($db->conn, $_POST['address_second']),
        'city' => validateInput($db->conn, $_POST['city']),
        'state' => validateInput($db->conn, $_POST['state']),
        'country' => validateInput($db->conn, $_POST['country']),
        'zip' => validateInput($db->conn, $_POST['zip']),
    ];
        $updateUser = new RegisterController;
        $result = $updateUser->updateUseraddresses($inputData);
          if ($result) {
        redirect('Updated Successfully', 'my-account');
            } else {
                redirect('Some Error Occured', 'my-account');
            }
}
?>