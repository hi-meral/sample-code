<div class="contenders form">
<?php
// display upload errors
if(isset($upload_errors)) {
echo $misc->display_errors($upload_errors);
}
?>
<?php echo $form->create('Contender',array('type'=>'file'));?>
	<fieldset>
 		<legend><?php __('Edit Contender');?></legend>
	<?php
		echo $form->input('id');
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
			<a href="" class="jsAddFile iconAdd">Add Another File</a>
		</div>
		<div class="input buttons">
			<input type="submit" name="save" id="save" value="Save" />
			<input type="submit" name="saveclose" id="saveclose" value="Save &amp; Close" />
			<input type="submit" name="cancel" id="cancel" value="Cancel" />
		</div>
	</fieldset>
<?php echo $form->end();?>
</div>

<?php if(!empty($this->data['ContenderItem'])): ?>
	<h3>Related Items</h3>
	<div class="gallery">
	<?php foreach($this->data['ContenderItem'] as $key=>$item): ?>
		<?php echo $html->link($html->image("/images/view/*/100/false/".$item['id'],array('alt'=>'Contender Image')),$item['url'],array('escape'=>false,'target'=>'_blank')); ?>
	<?php endforeach; ?>
	</div>
<?php endif; ?>