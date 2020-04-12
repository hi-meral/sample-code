<?php $top5 = $this->requestAction('contenders/top5'); ?>
<?php if(!empty($top5)): ?>
<div id="top5">
<h3>Top 5</h3>
<ol>
	<?php foreach($top5 as $k=>$v): ?>
	<li>
		<a href="/contenders/view/<?php echo $v['contenders']['slug']; ?>" title="Won <?php echo $v['contenders']['won']; ?> out of <?php echo $v['contenders']['battles']; ?>.">
		<?php echo $v['contenders']['name']; ?></a>
	</li>
	<?php endforeach; ?>
</ol>
</div>
<?php endif; ?>