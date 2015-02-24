<?php 
	$salvar = array(
	    'label' => 'Salvar',
	    'class' => 'btn btn-lg btn-primary'
	);
?>

<h1>Cadastrar Novo Aluno</h1>
<?php
	echo $this->Form->create('User', array(
		'action' => 'add_student'));
	
	echo $this->Form->input('name', array(
		'label' => 'Nome do aluno: ',
		'class' => 'form-control'));
	
	echo $this->Form->input('username', array(
		'label' => 'RA (mínimo 6 dígitos): ', 
		'class' => 'form-control'));
	
	echo $this->Form->input('email', array(
		'label' => 'E-mail: ',
		'class' => 'form-control'));

	$this->request->data['User']['teacher'] = 0;
	
	echo $this->Form->input('password', array(
		'label' => 'Senha: ',
		'class' => 'form-control'));
	
	echo $this->Form->input('confirm_password', array(
		'label'=>'Confirmação da senha: ', 
		'type' => 'password',
		'class' => 'form-control'));
	
	echo $this->Form->end($salvar);
?>

