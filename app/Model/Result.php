<?php
class Result extends AppModel{

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

	public $validate = array(
		'course_id'=> array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'Curso necessário.'
				)
			),
		'score' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Quantidade de acertos necessária.'
				)
			),
		'data' => array(
			'required' => array(
				'rule' => array('date'),
				'message' => 'Selecione uma data valida.'
				)
			)
		);
}
?>