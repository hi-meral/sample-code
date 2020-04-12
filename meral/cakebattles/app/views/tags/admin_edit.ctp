<div class="tags form">
<?php echo $form->create('Tag');?>
	<fieldset>
 		<legend><?php __('Edit Tag');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name',array(
			'title'=>'Name of the Tag. (Required)'
		));
		echo $form->input('Contender',array(
			'title'=>'Related Contenders. (Optional)'
		));
	?>
		<div class="input buttons">
			<input type="submit" name="save" id="save" value="Save" />
			<input type="submit" name="cancel" id="cancel" value="Cancel" />
		</div>
	</fieldset>
<?php echo $form->end();?>
</div>