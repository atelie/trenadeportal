<?php
	class Answer extends AppModel{
		public $belongsTo = array('AltQuestion', 'TextQuestion');
	}
?>