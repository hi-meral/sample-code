<?php
$dsn = "mysql:host=192.168.1.125;port=8400;dbname=hcare";
$username = 'root';
$password = '';

$xyz = "%yahoo%";

$conn = new PDO($dsn, $username, $password);
   
$sth = $conn->prepare("SELECT names FROM names where names like :fname");
$sth->execute(array(':fname' => $xyz));

 
$result = $sth->fetchAll();

echo "<pre>";
print_r($result);

echo "<hr>";
 echo "\nPDOStatement::errorInfo():\n";
 $arr = $sth->errorInfo();
 print_r($arr);
