
<?php 

	$continuar = array(
		'label' => 'Continuar',
		'class' => 'btn btn-primary',
		'style' => 'margin-top: 6px'
	);

	?>


		<?php echo $this->Session->flash(); ?>

		<div align="center">			
			<h1>Verificar Desempenho de Aluno</h1>
			
			<div class="form-sumilado">
			<?php

			echo $this->Form->create('Users', array('action' => 'student_performance'));
			
			echo $this->Form->input('username', array(
			'label' => 'RA: ',
			'class' => 'form-control'));
			
			echo $this->Form->end($continuar);
			?>
			</div>
		</div>
