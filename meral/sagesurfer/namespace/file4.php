<?php 
  namespace file4;
  include 'file1.php';
  include 'file2.php';
  include 'file3.php';
	
//  use function file3\Dog as newf;
  //use bar as canine;
 // use animate;

	echo \file1\Cat::says();
	
	
	echo "<hr>";
	
	$f2obj = new \file2\Cat();
	
	$f2obj->says();
	
	echo "<hr>";
	
	
	echo Cat::says(); // GIVE ERROR - NAME SPACE INCLUDES ONLY NAMESPACE