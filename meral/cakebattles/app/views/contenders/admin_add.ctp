<div class="contenders form">
<?php echo $form->create('Contender',array('type'=>'file'));?>
	<fieldset>
 		<legend><?php __('Add Contender');?></legend>
		<?php
		echo $form->input('name',array(
			'title'=>'Name of the Contender. (Required)'
		));
		//echo $form->input('Tag');
		echo $form->input('contender_tags',array(
			'type'=>'text',
			'title'=>'Tags of the Contender, comma seperated. (Required)'
		));
		?>
		<div class="input file">
			<label>Contender Item</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
			<input type="file" name="Files[]" />
			<?php if(isset($file_error)): ?>
			<div class="error-message"><?php echo $file_error; ?></div>
			<?php endif; ?>
			<a href="#" class="jsAddFile iconAdd">Add Another File</a>
		</div>
		<div class="input buttons">
			<input type="submit" name="save" id="save" value="Save" />
			<input type="submit" name="cancel" id="cancel" value="Cancel" />
		</div>
	</fieldset>
<?php echo $form->end();?>
</div>