<?php
/*
ini_set('display_errors', 'On');
set_error_handler("var_dump");

ini_set("SMTP","ssl://smtp.gmail.com");
ini_set("smtp_port","465");


$to       = 'mmaradia@atlasbrands.com';
$subject  = 'Testing sendmail.exe';
$message  = 'Hi, you just received an email using sendmail!';
$headers  = 'From: hi.meral@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
if(mail($to, $subject, $message))
    echo "Email sent";
else
    echo "Email sending failed";
*/

$to = "mmaradia@atlasbrands.com";
         $subject = "This is subject";
         
         $message = "<b>This is HTML message.</b>";
         $message .= "<h1>This is headline.</h1>";
         
         $header = "From:abc@somedomain.com \r\n";
         $header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
		 
?>