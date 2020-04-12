<div class="tags index">
<h2><?php __('Tags');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php foreach ($tags as $tag): ?>
	<tr>
		<td><?php echo $tag['Tag']['name']; ?></td>
		<td><?php echo $tag['Tag']['created']; ?></td>
		<td><?php echo $tag['Tag']['modified']; ?></td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $tag['Tag']['slug'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>

<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
