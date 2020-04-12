<div class="login form">
<h1>Login</h1>
<?php echo $form->create('User', array('url'=>'login'));?>
	<fieldset>
 		<legend><?php __('Login');?></legend>
		<?php
		echo $form->input('username',array(
			'label'=>'Username: <span>*</span>',
			'title'=>'Your Username. (Required)'
		));
		echo $form->input('password',array(
			'label'=>'Password: <span>*</span>',
			'title'=>'Your Password. (Required)'
		));
		?>
	</fieldset>
<?php echo $form->end('Login');?>
</div>