<?php
class CategoriesController extends AppController {

	public function index() {

	}

	public function add() {
		
		if ($this->request->is('post')) {
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('<script> alert("Categoria salva com sucesso!"); </script>', true));
                $this->redirect(array('action' => 'index'));
            } else {
               $this->Session->setFlash(__('<script> alert("O usuário não pode ser salvo."); </script>', true));
            }
        }
	}
}