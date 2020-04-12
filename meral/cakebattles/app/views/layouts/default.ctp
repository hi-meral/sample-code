<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title><?php echo $title_for_layout; ?></title>
	<?php echo $html->css('cake.generic'); ?>
	<script type="text/javascript" src="/js/js.php"></script>

	<?php if(isset($swfupload)): ?>
	<script type="text/javascript">
		var session_id = "<?php echo session_id(); ?>";
	</script>
	<script type="text/javascript" src="/js/swfupload/swfupload.php"></script>
	<?php endif; ?>

	<?php if(isset($thickbox)): ?>
	<script type="text/javascript" src="/js/thickbox/thickbox.php"></script>
	<link rel="stylesheet" type="text/css" href="/css/thickbox.css" media="screen" />
	<?php endif; ?>

	<?php if(isset($tooltips)): ?>
	<script type="text/javascript" src="/js/tooltip/tooltip.php"></script>
	<?php endif; ?>

	<?php echo $scripts_for_layout; ?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $html->link('CakeBattles','/'); ?></h1>
			<ul id="nav">
				<li><?php echo $html->link('Submit a Contender','/contenders/add'); ?></li>
				<li><?php echo $html->link('Features','/features'); ?></li>
				<li><?php echo $html->link('Contact','/contact'); ?></li>
			</ul>
		</div>
		<div id="content_wrapper">
		<div id="content">
			<?php $session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
		</div>
		<div id="footer_wrapper">
			<div id="footer">
				<?php echo $this->element('footer_top5', array('cache'=>'+12 hour')); ?>
				<?php echo $this->element('footer_toptags', array('cache'=>'+12 hour')); ?>
				<?php echo $this->element('footer_about', array('cache'=>true)); ?>
			</div>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>