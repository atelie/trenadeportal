	<script>
		window.history.forward(1);
	</script>
	<?php	    
	    $corrigir = array(
	    'label' => 'Corrigir',
	    'class' => 'btn btn-lg btn-primary'
	    );
	?>
	<div class="wrap">
		<?php echo $this->Session->flash();?>
		
		<div class="form-group">		
			<h1>Simulado de <?php echo $nome_curso;?></h1>

			<?php
				$numeroQ = 0;
				
				echo '<h3>Conhecimentos Gerais</h3>';

				echo $this->Form->create('Exam', array(
					'action' => 'correction', 'type' => 'post'));

				foreach ($conhecimentos_gerais as $con) {	

					echo '<div class="questions">';

						$numeroQ++;
						echo '<br><p><span style="font-weight: bold;" >'.$numeroQ.')</span> '.$pergunta = $con['AltQuestion']['question_text'].'</p>';

						if(isset($con['AltQuestion']['image'])) {
						echo $this->Html->image('/upload/'.$con['AltQuestion']['image'], array('alt' => 'uploaded image'));
						echo '<br><br>';
						}

						$options = array(
							'1' => ' A) '.$con['AltQuestion']['answerA'],
							'2' => ' B) '.$con['AltQuestion']['answerB'],
							'3' => ' C) '.$con['AltQuestion']['answerC'],
							'4' => ' D) '.$con['AltQuestion']['answerD'],
							'5' => ' E) '.$con['AltQuestion']['answerE']
						);

						$attributes = array(
							'legend' => false,
							'value' => false,
							'required'
						);

						echo $this->Form->hidden($numeroQ, array(
						'value' => $con['AltQuestion']['id']));

						echo $this->Form->radio($con['AltQuestion']['id'], $options, $attributes);

					echo '</div>';
				}

				echo '<h3>Específicas</h3>';

				foreach ($alternativas as $alt) {	

					echo '<div class="questions">';

						$numeroQ++;
						echo '<br><p><span style="font-weight: bold;" >'.$numeroQ.')</span> '.$pergunta = $alt['AltQuestion']['question_text'].'</p>';

						if(isset($alt['AltQuestion']['image'])) {
						echo $this->Html->image('/upload/'.$alt['AltQuestion']['image'], array('alt' => 'uploaded image'));
						echo '<br><br>';
						}
						
						$options = array(
							'1' => ' A) '.$alt['AltQuestion']['answerA'],
							'2' => ' B) '.$alt['AltQuestion']['answerB'],
							'3' => ' C) '.$alt['AltQuestion']['answerC'],
							'4' => ' D) '.$alt['AltQuestion']['answerD'],
							'5' => ' E) '.$alt['AltQuestion']['answerE']
						);

						$attributes = array(
							'legend' => false,
							'value' => false,
							'required'
						);

						echo $this->Form->hidden($numeroQ, array(
						'value' => $alt['AltQuestion']['id']));

						echo $this->Form->radio($alt['AltQuestion']['id'], $options, $attributes);

					echo '</div>';
				}
				
				/*

				foreach ($dissertativa as $dis) {	

					echo '<div class="questions">';

						$numeroQ++;
						echo '<br><p><span style="font-weight: bold;" >'.$numeroQ.')</span> '.$pergunta = $dis['TextQuestion']['question_text'].'</p>';

						if(isset($dis['TextQuestion']['image'])) {
						echo $this->Html->image('/upload/'.$dis['TextQuestion']['image'], array('alt' => 'uploaded image'));
						echo '<br><br>';
						}
						
						echo $this->Form->textarea('answer_text', array(
						'label' => 'Resposta: '));

						echo $this->Form->hidden($numeroQ, array(
						'value' => $dis['TextQuestion']['id']));

					echo '</div>';
				}
				
				*/
			?>

			<?php 

			echo $this->Form->hidden('num_curso', array(
						'value' => $numero_curso));

				echo $this->Form->end($corrigir);
			?>
            
		</div>
	</div>

         

