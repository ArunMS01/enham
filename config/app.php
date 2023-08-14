<?php
session_start();
define('DB_HOST','localhost');
define('DB_USER','bellsgym_enham');
define('DB_PASSWORD','Enham@#1234567');
define('DB_DATABASE','bellsgym_enham');
define('SITE_URL','https://enham.in/');
include_once('Databaseconnection.php');
$db = new Databaseconnection;


function base_url($slug){
    echo SITE_URL.$slug;
}
function redirect($message,$page){
    $redirectTo = SITE_URL.$page;
    $_SESSION['message'] = $message;
    header("location: $redirectTo");
    exit(0);
}

function redirectback($message){
    $_SESSION['message'] = $message;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit(0);
}

function validateInput($dbcon, $input){
 return mysqli_real_escape_string($dbcon,$input);
}
?>