<?php
require_once('./mail/class.phpmailer.php');
require_once('./mail/mail_config.php');
require_once('./mail/functii.php');

$mail = new PHPMailer(true); 
$nume = $_POST['nume'];
$prenume = $_POST['prenume'];
$adresa_email = $_POST['mail'];
$corp = $_POST['mesaj'];


$mail->IsSMTP();

try {
  $mail->SMTPDebug  = 1;                     
  $mail->SMTPAuth   = true;                  
  $mail->SMTPSecure = "tls";                 
  $mail->Host       = "smtp.gmail.com";      
  $mail->Port       = 587;                   
  $mail->Username   = 'php.optional@gmail.com';  // GMAIL username
  $mail->Password   = 'optional';            // GMAIL password
  $mail->AddReplyTo('adresa_mail@yahoo.com', 'User');
  $mail->AddAddress('php.optional@gmail.com', 'User');
  $mail->SetFrom($adresa_email, $nume.' '.$prenume);
  $mail->Subject = 'bilioteca online';
  //$mail->AltBody = 'Pentru a vizualiza acest mesaj aveti nevoie de un viewer compatibil HTML!'; 
  $mail->Body = 'Mesaj trimis de '.$nume.' '.$prenume.': '.$corp;
  $mail->Send();
  echo "<script>window.location = 'home_page.php?page=contact';</script>";

  
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //error from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //error from anything else!
}
