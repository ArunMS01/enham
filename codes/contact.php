<?php
include('../config/app.php');
include_once('../Mails/MailController.php');
if(isset($_POST['sendenquiry'])){
    $name = validateInput($db->conn, $_POST['name']);
    $email = validateInput($db->conn, $_POST['email']);
    $subject = validateInput($db->conn, $_POST['subject']);
    $message = validateInput($db->conn, $_POST['message']);
    $send_mail = new MailController;
    $subject = "Enham Contact Page Enquiry";
    $content = "
    <p>Name: $name</p>
    <p>Email: $email</p>
    <p>Subject: $subject</p>
    <p>Message: $message</p>
    ";
    $sendmail = $send_mail->mailsend($content, $email, $subject);
    redirect('Message Sent Successfully', 'contact.php');
}
?>