<script type="text/javascript">
$(document).ready(function(){

	check();
});

</script>

<?php 

$input_course = array(
	'label' => 'Curso: ', 
	'disabled',
	'id' => 'course_id',
	'class' => 'form-control',
	'div' => array(
		'class' => 'input_course',
		));

$salvar = array(
	'label' => 'Salvar',
	'class' => 'btn btn-lg btn-primary'
	);

$upload = array(
	'label' => 'Selecionar imagem...', 
	'type' => 'file',
	'class' => 'upload',
	'id' =>'files',
	'div' => array(
		'class' => 'fileUpload btn btn-primary'),
	'a' => array('class' => 'btn btn-primary', 'href' => 'javascript:;')
	); 
	?>

	<h1>Cadastro de Questões Dissertativas</h1>
	
	<?php

	echo $this->Form->create('TextQuestion', array(
		'action' => 'add', 'type' => 'file', 'id'=>'TextQuestionAddForm'));
	
	echo $this->Form->input('category_id', array(
		'label' => 'Categoria: ', 
		'onchange' => 'check(this);', 
		'id' => 'category_id',
		'class' => 'form-control'));

	echo $this->Form->input('course_id', $input_course);	

	echo $this->Form->input('question_text', array(
		'label' => 'Enunciado: ',
		'id' => 'question_text',
		'class' => 'form-control'));

		//echo $this->Form->input('image', $upload);
		?>
		
		<div class="thumbnail">

			<span class='label' id="imagemQuestao"></span>

			<div class="caption text-center">
				<div class="btn btn-primary btn-file">
					<?php echo $this->Form->input('image', $upload); ?>
				</div>

			</div>
		</div>


		<button type="button" class="btn btn-danger" onclick="validaimg();" >Excluir imagem</button>	    

		<?php  
		echo $this->Form->input('answer_text', array(
			'label' => 'Resposta: ',
			'class' => 'form-control'));

		echo $this->Form->end($salvar);

		?>