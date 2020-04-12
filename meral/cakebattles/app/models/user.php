<?php
class User extends AppModel {
	var $name = 'User';
	var $useTable = 'admins';

	// validate
	var $validate = array(
		'username'=>array(
			'rule'=>VALID_NOT_EMPTY,
			'message'=>'Please enter a valid username.'
		),
		'password'=>array(
			'rule'=>VALID_NOT_EMPTY,
			'message'=>'Please enter a valid password.'
		),
	);
}
?>