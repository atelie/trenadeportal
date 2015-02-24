<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<?php
			echo $this->Html->css('jquery-ui.css');
			echo $this->Html->css('/development-bundle/themes/smoothness/jquery-ui.css');
			echo $this->Html->css('bootstrap.min');
			echo $this->Html->script('jquery-1.9.1.js');
			echo $this->Html->script('jquery-ui.js');
			echo $this->Html->script('trenade.js');
			echo $this->Html->script('jquery.js');
			echo $this->Html->css('stylelogin');
		?>
	</head>
	<body>
		<?php echo $this->Session->flash(); ?>
	
		<?php echo $this->fetch('content'); ?>
	</body>
</html>