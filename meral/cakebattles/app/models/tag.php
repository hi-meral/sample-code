<?php
class Tag extends AppModel {
	var $name = 'Tag';
	
	// has and belongs to many
	var $hasAndBelongsToMany = array(
		'Contender'=>array(
			'className'=>'Contender',
			'dependent'=> true,
			'conditions'=> array('Contender.status'=>1)
		)
	);
	
	// validate
	var $validate = array(
		'name'=>array(
			'rule'=>VALID_NOT_EMPTY,
			'message'=>'Please enter a valid Name.'
		),
		'Tag'=>array(
			'rule'=>array('multiple',array('min'=>1)),
			'message'=>'Please select at least one Tag.'
		)
	);
}
?>