<?php
class Battle extends AppModel {
	var $name = 'Battle';
	
	// belongs to
	var $belongsTo = array(
		'Contender'=>array(
			'className'=>'Contender'
		)
	);
}
?>