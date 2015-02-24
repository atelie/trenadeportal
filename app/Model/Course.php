<?php
	class Course extends AppModel{
		public $belongsTo = array('Category');
		//public $hasMany = array('AltQuestions', 'TextQuestions');

		public $hasMany = array(
	     
	      'AltQuestions' => array(
	      'className' => 'AltQuestions',
	      'foreignKey' => 'course_id',
	      'dependent'=> true),

          'TextQuestions' => array(
	      'className' => 'TextQuestions',
	      'foreignKey' => 'course_id',
	      'dependent'=> true
	      ));

		public $validate = array(
			'name' => array(
		        'required' => array(
		        	'rule' => array('notEmpty'),
		        	'message' => 'Digite o nome do curso!'
	       		)		        
	    	)
	    );
	}
?>