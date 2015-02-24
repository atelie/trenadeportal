<?php
	class AltQuestion extends AppModel{

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
			'answerA' => array(
				'required' => array(
					'rule' => 'notEmpty',
					'message' => 'Insira o texto da alternativa.'
				)
			),
			'answerB' => array(
				'required' => array(
					'rule' => 'notEmpty',
					'message' => 'Insira o texto da alternativa.'
				)
			),
			'answerC' => array(
				'required' => array(
					'rule' => 'notEmpty',
					'message' => 'Insira o texto da alternativa.'
				)
			),
			'answerD' => array(
				'required' => array(
					'rule' => 'notEmpty',
					'message' => 'Insira o texto da alternativa.'
				)
			),
			'answerE' => array(
				'required' => array(
					'rule' => 'notEmpty',
					'message' => 'Insira o texto da alternativa.'
				)
			),
			'answer_id' => array(
				'required' => array(
					'rule' => 'verificaIndices',
					'message' => 'Insira uma resposta correta.'
				)
			)
		);

		function verificaIndices(){
			$valor = $this->data['AltQuestion'];
			if($valor['category_id'] == '0' || $valor['answer_id'] == '0'){
				return false;
			}
			if($valor['category_id'] == '2' and $valor['course_id'] == '0'){
				return false;
			}
			return true;
		}
	}
?>