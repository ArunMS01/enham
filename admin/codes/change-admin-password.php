<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
 $db = new DatabaseConnection;
        $dbconn = $db->conn;
include('../../config/app.php');

$admin_id = validateInput($db->conn, $_POST['admin_id']);
$password = validateInput($db->conn, $_POST['username']);
$username = validateInput($db->conn, $_POST['password']);

     $hashed_password = password_hash($password, PASSWORD_DEFAULT);
     
       $sql ="UPDATE admin SET email = '$username', password='$password' WHERE id ='$admin_id'";
        $result = $dbconn->conn->query($sql);

if ($result) {
        redirect('Updated SuccessFully', 'admin/profile.php');
    } else {
        redirect('Some Error Occured', 'admin/profile.php');
    }

?>