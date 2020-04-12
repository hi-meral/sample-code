<?php
class ContenderItem extends AppModel {
	var $name = 'ContenderItem';
	
	// belongs to
	var $belongsTo = array(
		'Contender'=>array(
			'className'=>'Contender'
		)
	);
}
?>