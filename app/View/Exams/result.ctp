<h1>Resultados de Simulados Anteriores</h1>
<table class="table table-bordered table-striped">

	<tr>
		<th>Curso</th> 
		<th>Data</th>
		<th>Pontuação</th>
	</tr>

	<?php foreach ($resultados as $res): ?>
	    <tr>
	      <td><?php echo $res['Course']['name']; ?> </td>
	      <td><?php echo $res['Result']['data']; ?> </td>
	      <td><?php echo $res['Result']['score']; ?></td>
	    </tr>
  	<?php endforeach; ?>

</table>