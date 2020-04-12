<div class="tags view">
<h2>Viewing Tag: <?php echo $tag['Tag']['name']; ?></h2>
</div>

<div class="related">
	<?php if (!empty($tag['Contender'])):?>
	<table class="stripe" id="tags_view">
	<thead>
		<tr>
			<th><?php __('Name'); ?></th>
			<th class="battles"><?php __('Battles'); ?></th>
			<th class="won"><?php __('Won'); ?></th>
			<th class="lost"><?php __('Lost'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($tag['Contender'] as $contender): ?>
			<tr>
				<td><?php echo $html->link($contender['name'], array('controller'=> 'contenders', 'action'=>'view', $contender['slug'])); ?></td>
				<td class="battles"><?php echo $contender['battles'];?></td>
				<td class="won"><?php echo $contender['won'];?></td>
				<td class="lost"><?php echo $contender['lost'];?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>
</div>
