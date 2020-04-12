<?php
/********************************************************************************
 MachForm
  
 Copyright 2007-2014 Appnitro Software. This code cannot be redistributed without
 permission from http://www.appnitro.com/
 
 More info at: http://www.appnitro.com/
 ********************************************************************************/	
	require('includes/init.php');
	
	require('config.php');
	require('includes/db-core.php');
	require('lib/signature-to-image.php');
	
	//get query string and parse it, query string is base64 encoded
	
	$query_string = trim($_GET['q']);
	parse_str(base64_decode($query_string),$params);
	
	$form_id 	= $params['form_id'];
	$id      	= $params['id'];
	$field_name = $params['el'];
	$signature_hash  = $params['hash'];
	
	
	if(empty($form_id) || empty($id) || empty($field_name) || empty($signature_hash)){
		die("Error. Incorrect URL.");
	}


	$dbh = mf_connect_db();

	$query 	= "select {$field_name} from `".MF_TABLE_PREFIX."form_{$form_id}` where id=?";
	$params = array($id);

	$sth = mf_do_query($query,$params,$dbh);
	$row = mf_do_fetch_result($sth);
	$signature_data = $row[$field_name];

	if($signature_hash != md5($signature_data)){
		die("Error. Incorrect Signature URL.");
	}

	//get signature height
	$exploded = explode('_', $field_name);
	$element_id = (int) $exploded[1];

	$query  = "select element_size from ".MF_TABLE_PREFIX."form_elements where form_id = ? and element_id = ?";
	$params = array($form_id,$element_id);
	
	$sth = mf_do_query($query,$params,$dbh);
	$row = mf_do_fetch_result($sth);

	$element_size = $row['element_size'];
	if($element_size == 'small'){
		$signature_height = 70;		
	}else if($element_size == 'medium'){
		$signature_height = 130;
	}else{
		$signature_height = 260;
	}

	$signature_options['imageSize'] = array(309,$signature_height);
	$signature_options['penColour'] = array(0x00, 0x00, 0x00);
	$signature_img = sigJsonToImage($signature_data,$signature_options);

	// Output to browser
	header('Content-Type: image/png');
	imagepng($signature_img);

	// Destroy the image in memory when complete
	imagedestroy($signature_img);

?>