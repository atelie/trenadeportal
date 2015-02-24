	<div class="wrap">
		<?php echo $this->Session->flash();?>
		
		<div class="panel panel-warning">
		  <div class="panel-heading">
		    <div class="row">
		      <div class="col-xs-6">
		        <i class="fa fa-check fa-5x"></i>
		      </div>
		      <div class="col-xs-6 text-right">
		        <p class="announcement-heading"><?=$score?> </p>
		        <p class="announcement-text">Acertos</p>
		      </div>
		    </div>
		  </div>

		</div>



		<div class="form-group">		
			<h1>Correção</h1>

			<?php
				$numeroQ = 0;

				foreach ($questoesAlt as $alt) {	

					echo '<div class="questions">';

					$numeroQ++;
					echo '<br><p><span style="font-weight: bold;" >'.$numeroQ.')</span> '.$pergunta = $alt['AltQuestion']['question_text'].'</p>';
					
					echo '<p> A) '.$alt['AltQuestion']['answerA'].'</p>';
					echo '<p> B) '.$alt['AltQuestion']['answerB'].'</p>';
					echo '<p> C) '.$alt['AltQuestion']['answerC'].'</p>';
					echo '<p> D) '.$alt['AltQuestion']['answerD'].'</p>';
					echo '<p> E) '.$alt['AltQuestion']['answerE'].'</p>';

					echo '<p>Resposta correta: '; 
					convertQuest ($respostasCertas[$numeroQ]['AltQuestion']['answer_id']);

					echo '<p>Você respondeu: ';
					convertQuest ($respostasUsuario[$numeroQ]);

					correcao ($respostasCertas[$numeroQ]['AltQuestion']['answer_id'],$respostasUsuario[$numeroQ]);
					
					echo '</div>';
				}
				
				/*

				foreach ($questoesDis as $dis) {	

					echo '<div class="questions">';

						$numeroQ++;
						echo '<br><p><span style="font-weight: bold;" >'.$numeroQ.')</span> '.$pergunta = $dis['TextQuestion']['question_text'].'</p>';
						
						echo 'Resposta: '.$dis['TextQuestion']['answer_text'];

					echo '</div>';
				}
				
				*/
			?>
            
		</div>
	</div>

         

<?php
function convertQuest ($respostasCertas)
{
    switch ($respostasCertas) {
							case 1:
								echo " ( A ) </p> ";
								break;
							case 2:
								echo " ( B )  </p>";
								break;
							case 3:
								echo " ( C ) </p>";
								break;
							case 4:
								echo " ( D ) </p>";
								break;
							case 5:
								echo " ( E ) </p>";
								break;
						}
}


function correcao ($gabarito,$resposta){

	if($gabarito == $resposta):
	    echo "<div class='alert alert-success alert-dismissable'>   Resposta correta! </div>";
	else:
	    echo "<div class='alert alert-danger alert-dismissable'>   Resposta incorreta! </div>";
	endif;
}
?>
