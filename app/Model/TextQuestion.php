<?php
App::uses('AppModel', 'Model', 'Controller/Component');
class TextQuestion extends AppModel {


	public $validate = array(
			'category_id'=> array(
				'required' => array(
					'rule' => 'verificaIndices',
					'message' => 'Selecione uma categoria.'
				)
			),
			'course_id'=> array(
				'required' => array(
					'rule' => 'verificaIndices',
					'message' => 'Selecione um curso.'
				)
			),
			'question_text' => array(
		        'required' => array(
		        	'rule' => array('notEmpty'),
		        	'message' => 'Insira o enunciado da questão!'
	       		)
	    	),
			'answer_text' => array(
				'required' => array(
					'rule' => 'notEmpty',
					'message' => 'Insira uma resposta correta.'
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
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
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

	function verificaIndices(){
		$valor = $this->data['TextQuestion'];
		if($valor['category_id'] == '0' || $valor['answer_text'] == null){
			return false;
		}	
		if($valor['category_id'] == '2' and $valor['course_id'] == '0'){
			return false;
		}
		return true;
	}

}
