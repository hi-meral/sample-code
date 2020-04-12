<?php
class Contender extends AppModel {
	var $name = 'Contender';
	
	// has many
	var $hasMany = array(
		'ContenderItem'=>array(
			'className'=>'ContenderItem',
			'dependent'=> true
		),
		'Battle'=>array(
			'className'=>'Battle',
			'dependent'=> true,
			'limit'=>5,
			'order'=>'created DESC'
		)
	);
	
	// has and belongs to many
	var $hasAndBelongsToMany = array(
		'Tag'=>array(
			'className'=>'Tag'
		)
	);
	
	// validate
	var $validate = array(
		'name'=>array(
			'rule'=>VALID_NOT_EMPTY,
			'message'=>'Please enter a valid Name.'
		),
		'contender_tags'=>array(
			'rule'=>VALID_NOT_EMPTY,
			'message'=>'Please enter at least one Tag.'
		)
	);
}
?>