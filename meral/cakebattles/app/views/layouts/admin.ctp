<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title><?php echo $title_for_layout; ?></title>
	<?php echo $html->css('cake.admin'); ?>
	<script type="text/javascript" src="/js/admin.php"></script>

	<?php if(isset($swfupload)): ?>
	<script type="text/javascript" src="/js/swfupload/swfupload.php"></script>
	<?php endif; ?>

	<?php if(isset($tooltips)): ?>
	<script type="text/javascript" src="/js/tooltip/tooltip.php"></script>
	<?php endif; ?>

	<?php echo $scripts_for_layout; ?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>CakeBattles Control Panel</h1>
			<?php if($this->action !='login'): ?>
			<ul id="nav">
				<li><?php echo $html->link('Contenders','/admin/contenders'); ?></li>
				<li><?php echo $html->link('Tags','/admin/tags'); ?></li>
				<li><?php echo $html->link('Logout','/logout'); ?></li>
			</ul>
			<?php endif; ?>
			<div class="clear"></div>
		</div>
		<div id="content">

			<?php $session->flash(); ?>
			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">

		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>