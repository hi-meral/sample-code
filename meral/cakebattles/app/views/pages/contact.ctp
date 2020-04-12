<div class="contact index">
	<h1>Contact</h1>
	<p>If you have any questions or comments regarding CakeBattles then please fill out the form below.</p>
	<?php echo $form->create('Contact',array('url'=>'/contact')); ?>
	<?php echo $form->input('name',array(
		'label'=>'Name: <span>*</span>'
	)); ?>
	<?php echo $form->input('email',array(
		'label'=>'Email: <span>*</span>'
	)); ?>
	<?php echo $form->input('message',array(
		'label'=>'Message: <span>*</span>',
		'type'=>'textarea'
	)); ?>
	<?php echo $form->end('Send'); ?>
</div>