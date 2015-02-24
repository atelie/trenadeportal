<?php 
	$salvar = array(
	    'label' => 'Salvar',
	    'class' => 'btn btn-lg btn-primary margin-top-10'
	);
?>

<h1>Cadastrar Novo Curso</h1>
<?php
	echo $this->Form->create('Course', array(
		'action' => 'add', 'id'=>'CourseAddForm' ));

//	echo $this->Form->input('name', array(
//		'label' => 'Nome do curso: ',
//		'class' => 'form-control'));

	echo $this->Form->input('name', array(
		'label' => 'Nome do curso: ',
		'id' => 'name',
		'class' => 'form-control'));

	echo $this->Form->end($salvar);
?>