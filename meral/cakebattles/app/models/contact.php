<?php
class Contact extends AppModel {
    var $useTable = false;
	
	// validate
	var $validate = array(
		'name' => array(
			'rule'=>VALID_NOT_EMPTY,
			'message'=>'Enter a Name.'
			),
		'email' => array(
			'rule'=>'email',
			'message'=>'Enter a valid Email Address.'
			),
		'message' => array(
			'rule'=>VALID_NOT_EMPTY,
			'message'=>'Enter a message.'
			)
	);
}
?>