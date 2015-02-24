<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0">
		<title>Trenade-Login</title>
		<?php
			echo $this->Html->css('jquery-ui.css');
			echo $this->Html->css('/development-bundle/themes/smoothness/jquery-ui.css');
			echo $this->Html->css('bootstrap.mins');
			echo $this->Html->css('users_login');
			echo $this->Html->script('jquery-1.9.1.js');
			echo $this->Html->script('jquery-ui.js');
			echo $this->Html->script('trenade.js');
			echo $this->Html->script('jquery.js');
		?>
	</head>
	<body>
    	<div class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	</body>
</html>