<h1>Questões Dissertativas Cadastradas</h1>
<table class="table table-bordered table-striped">

	<tr>
		<th>Categoria</th> 
		<th>Enunciado</th>
		<th>Gerenciar</th>
	</tr>

	<?php foreach ($users as $user): ?>
		<tr>
		<?php
			if($user['Category']['name'] == "Curso"): ?>
				<td><?php echo $user['Course']['name']; ?> </td>
		<?php 
			else: ?>
				<td><?php echo $user['Category']['name']; ?> </td>
		<?php endif; ?>
		

		<td><?php echo $user['TextQuestion']['question_text']; ?></td>
		<td><?php echo $this->Html->link(__('Editar'), array(
			'action' => 'edit', $user['TextQuestion']['id'])) ?>
		<?php echo $this->Html->link(__('Deletar'), array(
		'action' => 'delete', $user['TextQuestion']['id'])) ?></td>

	</tr>
<?php endforeach; ?>

</table>