<?php

/* ###################

Used Gmail creds : IMPORTANT

Go to here - https://myaccount.google.com/u/1/lesssecureapps?pli=1&pageId=none and allow less secure app 
Then  Gmail > Setting > Forwarding & POP/IMAP > IMAP access: Enable
Then use your creds here below

############################ */

require("phpmailer/PHPMailerAutoload.php"); // path to the PHPMailerAutoload.php file.

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->Host = "smtp.gmail.com";
$mail->Port = "465"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
$mail->SMTPAuth = true;
$mail->SMTPDebug = 2;
$mail->SMTPSecure = 'ssl';
$mail->Username = 'mohit.ahlavat.89@gmail.com';
$mail->Password = '##############';

$mail->From = "mohit.ahlavat.89@gmail.com";
$mail->FromName = "Mohit";
$mail->AddAddress("miralmaradia@yahoo.com", "Meral");
//$mail->AddReplyTo("Your Reply-to Address", "Sender's Name");

$mail->Subject = "Hi HTML!";

$mail->addAttachment('./phpmailer/sample.docx');

//$mail->Body = "Hi! How are you?";
$message = file_get_contents('phpmailer/template.html'); 
    $message = str_replace('%username%', "Meral", $message); 
    $message = str_replace('%password%', "secret", $message); 
	$mail->MsgHTML($message);

	//$mail->Body = "Hi! How are you?";

$mail->WordWrap = 50; 


if(!$mail->Send()) {
echo '<h1>Message was not sent. - Check Creds </h1>';
echo 'Mailer error: ' . $mail->ErrorInfo;
exit;
} else {
echo '<h1>Message has been sent.</h1>';
}
?>