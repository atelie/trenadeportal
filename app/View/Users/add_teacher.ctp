<?php 
	$salvar = array(
	    'label' => 'Salvar',
	    'class' => 'btn btn-lg btn-primary'
	);
?>

<h1>Cadastrar Novo Professor</h1>
<?php
	echo $this->Form->create('User', array(
		'action' => 'add_teacher'));
	
	echo $this->Form->input('name', array(
		'label' => 'Nome do professor: ',
		'class' => 'form-control'));
	
	echo $this->Form->input('username', array(
		'label' => 'Registro do Professor (mínimo 6 dígitos): ', 
		'class' => 'form-control'));
	
	echo $this->Form->input('email', array(
		'label' => 'E-mail: ',
		'class' => 'form-control'));

	$this->request->data['User']['teacher'] = 1;
	
	echo $this->Form->input('password', array(
		'label' => 'Senha: ',
		'class' => 'form-control'));
	
	echo $this->Form->input('confirm_password', array(
		'label'=>'Confirmação da senha: ', 
		'type' => 'password',
		'class' => 'form-control'));
	
	echo $this->Form->end($salvar);
?>

