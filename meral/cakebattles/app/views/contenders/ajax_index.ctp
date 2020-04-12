<?php
// get ids of contenders
$id1 = $contender1['Contender']['id'];
$id2 = $contender2['Contender']['id'];
// display message
if(isset($message)) {
	echo "<p class='flash_good'>{$message}</p>";
}
?>

<div class="contender1">
	<?php
		// get random item key
		$random_key = array_rand($contender1['ContenderItem']);
		$item1 = $contender1['ContenderItem'][$random_key];
		$item1_id = $item1['id'];
	?>
	<div class="item">
		<a href="<?php echo "/contenders/vote/{$id1}/{$id2}/{$id1}/{$item1_id}"; ?>" class="vote">
			<img src="/images/resize/400/*/<?php echo $item1['id']; ?>" />
		</a>

		<div class="info hide">
			<h2><a href="/contenders/view/<?php echo $contender1['Contender']['id']; ?>"><?php echo $contender1['Contender']['name']; ?></a></h2>
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
		<a href="<?php echo "/contenders/vote/{$id1}/{$id2}/{$id2}/{$item2_id}"; ?>" class="vote">
			<img src="/images/resize/400/*/<?php echo $item2['id']; ?>" />
		</a>
		<div class="info hide">
			<h2><a href="/contenders/view/<?php echo $contender2['Contender']['id']; ?>"><?php echo $contender2['Contender']['name']; ?></a></h2>
			<ul class="stats">
				<li>Battles: <?php echo $contender2['Contender']['battles']; ?></li>
				<li>Wins: <?php echo $contender2['Contender']['won']; ?></li>
				<li>Losses: <?php echo $contender2['Contender']['lost']; ?></li>
			</ul>
			<?php echo $contender2['Contender']['tags_list']; ?>
		</div>
	</div>
</div>