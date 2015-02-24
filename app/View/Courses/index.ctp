<h1>Cursos Cadastrados</h1>
<table class="table table-bordered table-striped">

	<tr>
		<th>Nome</th> 		
		<th>Gerenciar</th>
	</tr>

	<?php foreach ($courses as $course): ?>
		<tr>	
			
			<td><?php echo $course['Course']['name']; ?> </td>		
			<td>
			   <?php echo $this->Html->link(__('Deletar'), array(
				'action' => 'delete', $course['Course']['id'])) ?>
			</td>

		</tr>
	<?php endforeach; ?>
</table>