<div class="contenders form">
<?php echo $form->create('Contender',array('type'=>'file'));?>
	<fieldset>
 		<legend><?php __('Add Contender');?></legend>
		<?php
		echo $form->input('name',array(
			'label'=>'Contender Name: <span>*</span>',
			'title'=>'The Name of the Contender. (Required)'
		));
		echo $form->input('contender_tags',array(
			'label'=>'Contender Tags: <span>*</span>',
			'type'=>'text',
			'title'=>'Related Contender Tags, comma seperated. (Required)'
		));
		?>

		<div class="flash" id="fsUploadProgress">
			<h3>Upload Queue</h3>
		</div>
		<div id="divStatus">0 Files Uploaded</div>
		<div>
			<span id="spanButtonPlaceHolder"></span>
			<!--
			<input type="button" value="Upload files (Max 1 MB)" class="selectFiles" />
			-->
			<input type="button" id="btnCancel" value="Cancel Uploads" disabled="disabled" class="cancelQueue" />
		</div>

		<div class="input buttons">
			<input type="submit" name="save" id="save" value="Save" />
			<input type="submit" name="cancel" id="cancel" value="Cancel" />
		</div>
	</fieldset>
<?php echo $form->end();?>
</div>