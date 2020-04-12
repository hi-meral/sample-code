<?php $toptags = $this->requestAction('contenders/toptags'); ?>
<?php if(!empty($toptags)): ?>
<div id="toptags">
	<h3>Top Tags</h3>
	<ol>
		<?php foreach($toptags as $k=>$v): ?>
		<li>
			<a href="/tags/view/<?php echo $v['tags']['slug']; ?>" title="Has <?php echo $v[0]['num_contenders']; ?> Contenders.">
			<?php echo $v['tags']['name']; ?>
			</a>
		</li>
		<?php endforeach; ?>
	</ol>
</div>
<?php endif; ?>