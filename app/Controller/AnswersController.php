<?php
class AnswersController extends AppController {

	public function index(){

	}

	public function add() {
		if ($this->request->is('post')) {
            if ($this->Answer->save($this->request->data)) {
                $this->Session->setFlash(__('<script> alert("Resposta adicionada!"); </script>', true));
                $this->redirect(array('action' => 'index'));
            } else {
               $this->Session->setFlash(__('<script> alert("não pode ser salva!"); </script>', true));
            }
        }
	}
}