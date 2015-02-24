<?php
class Exam extends AppModel {

	public $validate = array(
		
		'course_id'=> array(
			'required' => array(
				'rule' => 'verificaCurso',
				'message' => 'Selecione um curso.'
				)
			)
		);

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
			),
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
			)
		);
	
	function verificaCurso(){
		$simulado = $this->data['Exam'];
		if($simulado['course_id'] == '0'){
			return false;
		}
		return true;
	}

}
