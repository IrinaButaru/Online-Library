<?php

require('fpdf.php');
require('./mail/class.phpmailer.php');
require('./mail/mail_config.php');
require('./mail/functii.php');
require('./database_connection.php');


$pdf = new FPDF();
$pdf-> SetMargins(30,0,30);
$pdf->AddPage('L','A5');

$pdf->ln(10);
$x=$pdf->getX();
$y=$pdf->getY();
$pdf->SetFillColor(255,255,255);
$pdf->Rect(30,$x+10,240,180,'F');
$pdf->SetXY($x,$y+20);
$pdf->SetDrawColor(255,255,255);
$pdf->SetLineWidth(0.7);
$pdf->Rect(30,$x+10,240,180,'D');
$pdf->SetXY($x,$y);
$pdf->ln(10);
$pdf->SetLineWidth(0.2);
$lungime=240;
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',16);
$pdf->ln(25);
$x=$pdf->GetX();
$pdf->SetX($x+75);
$pdf->Cell($lungime,10,'Noutati biblioteca online',0,1,'L',0);
$pdf->ln(15);
$pdf->SetFont('Arial','B',11);
//$pdf->SetDrawColor(237,236,234);
for($i = 1; $i <= $_POST['nr_carti']; $i++)
{
	
	//$pdf->Cell(($lungime-40)/4,70,'','1',0,'L',0);
	//$pdf->Cell(5,10,' ',0,0,'L',0);
	$y=$pdf->getY(); 
	$x=$pdf->getX(); 
	$pdf->Rect($x+10,$y,($lungime-40)/4,60,'F');
    $pdf->SetXY($x+10,$y+10);
    $pdf->Image($_POST["coperta{$i}"],$x,$y+10,60,'JPEG');
	$pdf->SetX($x+($lungime-40)/4+20);
    $pdf->Cell(($lungime)/2,8,$_POST["titlu{$i}"],'0',2,'C',0);
    $pdf->Cell(($lungime)/2,8,$_POST["autor{$i}"],'0',2,'C',0);
    $pdf->Cell(($lungime)/2,8,$_POST["categorie{$i}"],'0',2,'C',0);
	$pdf->MultiCell(($lungime)/2,5,$_POST["descriere{$i}"],'0',1,'L',false);
	$pdf->ln(10);
    
}  
$attachment= $pdf->Output('newsletter.pdf', 'S');

 
$query = 'SELECT email FROM user WHERE newsletter = 1';
$result = mysql_query($query) ;

$mail = new PHPMailer(true); 
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
   while($row= mysql_fetch_row($result))
 {
 	 $mail->AddAddress($row[0]);
     $mail->SetFrom('php.optional@gmail.com','Biblioteca online');
     $mail->Subject = 'Newsletter biblioteca online';
     $mail->Body = 'Primiti acest email in urma abonarii la newsletter-ul bibliotecii online';
     $mail->AddStringAttachment($attachment, 'newsletter.pdf');
     $mail->Send();
	 echo "<script>window.location = 'home_page.php?page=admin';</script>";
  
 }
  
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //error from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //error from anything else!
}



?>
