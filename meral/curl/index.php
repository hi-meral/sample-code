<?php

$ch = curl_init();

//curl_setopt($ch, CURLOPT_URL,"https://api.cloud.appcelerator.com/v1/users/create.json?key=N1RKzr8CiFOgkl4pmYYrL1BN1s9nCI3X");
curl_setopt($ch, CURLOPT_URL,"http://localhost/meral/curl/curl.php");

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"username=meral&password=Yahoo#123&password_confirmation=Yahoo#123");

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$data = curl_exec ($ch);

curl_close ($ch);

//$data = file_get_contents("https://api.cloud.appcelerator.com/v1/places/search.json?key=N1RKzr8CiFOgkl4pmYYrL1BN1s9nCI3X");

echo "<pre>"; print_r($data); echo "</pre>";

?>