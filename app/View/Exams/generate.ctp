
<?php 

	$continuar = array(
		'label' => 'Continuar',
		'class' => 'btn btn-primary',
		'div' => array(
        'class' => 'form-gerarsimulado'
    ));

	$selecionaCursos = array(
		'label' => '',
		'class' => 'form-control',
		'id' => 'course_id',
		'div' => array(
        'class' => 'form-gerarsimulado'
    ));

	?>


	<div class="wrap">
		<?php echo $this->Session->flash(); ?>

		<div align="center" class="form-sumilado">			
			<h1>Gerar Simulado</h1>
			
			<?php
			echo $this->Form->create('Exams', array('action' => 'exam'));
			
			echo $this->Form->input('course_id', $selecionaCursos);
			
			echo $this->Form->end($continuar);
			?>
		</div>
	</div>