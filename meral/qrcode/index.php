<?php

//include "BarcodeQR.php"; 
//$qr = new BarcodeQR(); 
//
//
//$qr->url("www.shayanderson.com"); 
//$qr->contact("name", "address", "phone", "email"); 
//
//$qr->draw();
//

include "qrcode.php";

$myClass1 = new QrCodes;


?>
<img src="<?php echo $myClass1->GetCode("MERAL MARADIA"); ?>" />
