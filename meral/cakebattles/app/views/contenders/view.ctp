<div class="contenders view">
<h2>Contender: <?php echo $contender['Contender']['name']; ?></h2>
	<?php $random = rand(0,count($contender['ContenderItem'])-1); ?>
	<img src="/images/resize/400/*/<?php echo $contender['ContenderItem'][$random]['id']; ?>" />

	<ul id="stats">
		<li>Battles: <?php echo $contender['Contender']['battles']; ?></li>
		<li>Won: <?php echo $contender['Contender']['won']; ?></li>
		<li>Lost: <?php echo $contender['Contender']['lost']; ?></li>
	</ul>

	<ul id="tags">
		<?php foreach($contender['Tag'] as $key=>$tag): ?>
		<li><?php echo $html->link($tag['name'],array('controller'=>'tags','action'=>'view',$tag['slug'])); ?></li>
		<?php endforeach; ?>
	</ul>

	<?php if (!empty($contender['ContenderItem'])):?>
	<div id="gallery">
		<?php foreach ($contender['ContenderItem'] as $key=>$contenderItem): ?>
			<a href="<?php echo $contenderItem['url']; ?>" class="thickbox">
				<img src="/images/resize/100/*/<?php echo $contenderItem['id']; ?>" alt="<?php echo $contender['Contender']['name']; ?> Image" />
			</a>
			<?php if(($key+1)%4==0){ echo '<div class="clear"></div>';} ?>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
</div>