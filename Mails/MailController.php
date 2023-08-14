<?php
use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';
  require 'vendor/autoload.php';
  require 'VerifyEmail.class.php'; 

class MailController{
      public function mailsend($content, $email, $subject){
        $mail = new PHPMailer(true); 
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->From = "support@enham.in";
        $mail->FromName = "Enham";
        $mail->setFrom('support@enham.in','Admin');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = "Enham $subject";
        $mail->Body = $content;
        $mail->addcc("shipment@enham.in");
        $mail->send();
       
      }

  public function validateEmail($email){
   

// Initialize library class
$mail = new VerifyEmail();

// Set the timeout value on stream
$mail->setStreamTimeoutWait(20);

// Set debug output mode
$mail->Debug= TRUE; 
$mail->Debugoutput= 'html'; 

// Set email address for SMTP request
$mail->setEmailFrom('support@enham.in');
// echo $email;


// Check if email is valid and exist

		if ($mail->check($email)) {
			return true;
		} elseif (verifyEmail::validate($email)) {
		return false;
		} else {
			return false;
		}
  }
  }
?>