<?php

function test1($para1,$para2){
	// $para1;
	// $para2;
}

function test2($para1,$para2){	
	// $para1;
	// $para2;
}

//From ajax call 

$allowedActions = array('test1','test2');
if(in_array('test1',$allowedActions)) {
	$data = call_user_func('test1','para1','para2');
}

// OR direct call from php page

$data = call_user_func('test1','para1','para2');


?>
