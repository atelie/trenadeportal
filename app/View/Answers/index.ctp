<h1>Respostas</h1>

<?php
echo $this->Form->create('Answer', array('action' => 'add'));
echo $this->Form->input('name');
echo $this->Form->end('Criar');
?>