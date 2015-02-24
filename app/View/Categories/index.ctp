<h1>Categorias</h1>

<?php
echo $this->Form->create('Category', array('action' => 'add'));
echo $this->Form->input('name');
echo $this->Form->end('Criar');
?>