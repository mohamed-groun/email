<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$email=$_POST['email'];
$msg=$_POST['msg'];
try {
    //Server settings
    $mail->SMTPDebug = 1;                                       // Enable verbose debug output
  $mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true; 
$mail->Username = 'midoun.tv@gmail.com'; 
$mail->Password = 'destroyersblue'; 
$mail->SMTPSecure = 'tls'; 
$mail->Port = 587; 

$mail->setFrom('midoun.tv@gmail.com', "merci"); //ehdb no reply                                 // TCP port to connect to

    //Recipients
    $mail->setFrom('grounmohamed.promo1@gmail.com', 'Mohamed Groun');
    $mail->addAddress($email);     // Add a recipient
    


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $msg;
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

