<div class="ajax_loader"></div>
<?php
// only display if contenders are not empty
if(!empty($contender1) && !empty($contender2)):

// save contender ids
$id1 = $contender1['Contender']['id'];
$id2 = $contender2['Contender']['id'];
?>

<div class="contenders index vs">
<div class="contender1">
	<?php
		// get random item key
		$random_key = array_rand($contender1['ContenderItem']);
		$item1 = $contender1['ContenderItem'][$random_key];
		$item1_id = $item1['id'];
	?>
	<div class="item">
		<?php echo $html->link($html->image("/images/resize/400/*/".$item1['id']),"/contenders/vote/{$id1}/{$id2}/{$id1}/{$item1_id}",array('class'=>'vote','escape'=>false)); ?>

		<div class="info hide">
			<h2><?php echo $html->link($contender1['Contender']['name'],"/contenders/view/".$contender1['Contender']['slug']); ?></h2>
			<ul class="stats">
				<li>Battles: <?php echo $contender1['Contender']['battles']; ?></li>
				<li>Wins: <?php echo $contender1['Contender']['won']; ?></li>
				<li>Losses: <?php echo $contender1['Contender']['lost']; ?></li>
			</ul>
			<?php echo $contender1['Contender']['tags_list']; ?>
		</div>
	</div>
</div>

<div class="contender2">
	<?php
		// get random item key
		$random_key = array_rand($contender2['ContenderItem']);
		$item2 = $contender2['ContenderItem'][$random_key];
		$item2_id = $item2['id'];
	?>
	<div class="item">
		<?php echo $html->link($html->image("/images/resize/400/*/".$item2['id']),"/contenders/vote/{$id1}/{$id2}/{$id2}/{$item2_id}",array('class'=>'vote','escape'=>false)); ?>

		<div class="info hide">
			<h2><?php echo $html->link($contender2['Contender']['name'],"/contenders/view/".$contender2['Contender']['slug']); ?></h2>
			<ul class="stats">
				<li>Battles: <?php echo $contender2['Contender']['battles']; ?></li>
				<li>Wins: <?php echo $contender2['Contender']['won']; ?></li>
				<li>Losses: <?php echo $contender2['Contender']['lost']; ?></li>
			</ul>
			<?php echo $contender2['Contender']['tags_list']; ?>
		</div>
	</div>
</div>
</div>
<?php else: ?>

<div class="contenders index">
	<p>CakeBattles currently has no Contenders</p>
</div>

<?php endif; ?>