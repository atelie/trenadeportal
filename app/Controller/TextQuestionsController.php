<?php
App::uses('AppController', 'Controller');

class TextQuestionsController extends AppController {

	public $uses = array('User', 'TextQuestion');

	public function index() {
		$this->TextQuestion->recursive = 0;
		$this->set('TextQuestions', $this->paginate());

		$users = $this->TextQuestion->find('all', 
                array(
                    'conditions' => array(
                        'TextQuestion.user_id' => $this->Auth->user('id'),
                        ),
                    'order' => array('TextQuestion.id asc')
                    ));
            
		$this->set(compact(array('users')));
	}

	public function view($id = null) {
		if (!$this->TextQuestion->exists($id)) {
			throw new NotFoundException(__('Invalid text question'));
		}
		$options = array('conditions' => array('TextQuestion.' . $this->TextQuestion->primaryKey => $id));
		$this->set('textQuestion', $this->TextQuestion->find('first', $options));
	}


    public function add() {
        
        $imageName = null;
        
        $this->set('categories', array('[Selecione]') + $this->TextQuestion->Category->find('list'));
        $this->set('courses', array('[Selecione]') + $this->TextQuestion->Course->find('list'));

            if ($this->request->is('post')) {

                if ($this->data['TextQuestion']['image']) {
                    $image = $this->data['TextQuestion']['image'];
                    //allowed image types
                    $imageTypes = array("image/gif", "image/jpeg", "image/png", "image/jpg");
                    //upload folder - make sure to create one in webroot
                    $uploadFolder = "upload";
                    //full path to upload folder
                    $uploadPath = WWW_ROOT . $uploadFolder;
                   

                    //check if image type fits one of allowed types
                    foreach ($imageTypes as $type) {

                        if ($type == $image['type']) {
                          //check if there wasn't errors uploading file on serwer
                            if ($image['error'] == 0) {
                                 //image file name
                                $imageName = $image['name'];
                                $data['AltQuestion']['image'] = $imageName;
                                //check if file exists in upload folder
                                if (file_exists($uploadPath . '/' . $imageName)) {
                                    //create full filename with timestamp
                                    $imageName = date('His') . $imageName;
                                }
                                //create full path with image name
                                $full_image_path = $uploadPath . '/' . $imageName;
                                //upload image to upload folder
                                if (move_uploaded_file($image['tmp_name'], $full_image_path)) {
                                    $this->Session->setFlash('File saved successfully');
                                    $this->set('imageName',$imageName);
                                } else {
                                    $this->Session->setFlash('There was a problem uploading file. Please try again.');
                                }
                            } else {
                                $this->Session->setFlash('Error uploading file.');
                            }
                            break;
                        } else {
                            $this->Session->setFlash('Unacceptable file type');
                        }
                    }
                }
                
                $this->request->data['TextQuestion']['user_id'] = $this->Auth->user('id');
                $this->request->data['TextQuestion']['image'] = $imageName;

                if ($this->TextQuestion->save($this->request->data)) {
                   $this->Session->setFlash(__('
                        <script> alert("Questão adicionada com sucesso!"); </script>
                        <div class="bs-example">
                          <div class="alert alert-dismissable alert-warning">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <p>Para adicionar esta mesma questão outra vez em uma graduação diferente, escolha outro curso, selecione a imagem novamente (caso a questão possua) e clique em [Salvar].</p>
                          </div>
                        </div>', true));
                    //$this->redirect(array('action' => 'add'));
                } else {
                   $this->Session->setFlash(__('<script> alert("Não pode ser salvo! Verifique os campos."); </script>',true));
                }
            }

        }  


        public function edit($id=null) {

        $this->TextQuestion->id = $id;
        $this->set('categories', array('[Selecione]') + $this->TextQuestion->Category->find('list'));
        $this->set('courses', array('[Selecione]') + $this->TextQuestion->Course->find('list'));

        $imageName = null;

        $this->set('NomeImagem', $this->TextQuestion->find('first', array(
                    'fields' => 'image',
                    'conditions' => array('TextQuestion.id' => $id), 
                    'limit' => 1
                    )));

        $oldquestion = $this->TextQuestion->find('first', array(
            'fields' => 'image',
            'conditions' => array('TextQuestion.id' => $id), 
            'limit' => 1
        ));

            if ($this->request->is('put')) {

                if ($this->data['TextQuestion']['image']) {
                     
                    $image = $this->data['TextQuestion']['image'];
                    //allowed image types
                    $imageTypes = array("image/gif", "image/jpeg", "image/png", "image/jpg");
                    //upload folder - make sure to create one in webroot
                    $uploadFolder = "upload";
                    //full path to upload folder
                    $uploadPath = WWW_ROOT.$uploadFolder;
                     //check if image type fits one of allowed types
                    foreach ($imageTypes as $type) {

                          //check if there wasn't errors uploading file on serwer
                            if ($image['error'] == 0) {
                                 //image file name
                                $imageName = $image['name'];
                                $data['TextQuestion']['image'] = $imageName;
                                //check if file exists in upload folder
                                if (file_exists($uploadPath . '/' . $imageName)) {
                                    //create full filename with timestamp
                                    $imageName = date('His') . $imageName;
                                }
                                //create full path with image name
                                $full_image_path = $uploadPath . '/' . $imageName;
                                //upload image to upload folder
                                if (move_uploaded_file($image['tmp_name'], $full_image_path)) {
                                    $this->Session->setFlash('File saved successfully');
                                    $this->set('imageName',$imageName);
                                } else {
                                    $this->Session->setFlash('There was a problem uploading file. Please try again.');
                                }
                            } else {
                                $this->Session->setFlash('Error uploading file.');
                            }
                            break;
                        
                    }
                }
                /*
                else {
                    $this->request->data['TextQuestion']['image'] = $oldquestion['TextQuestion']['image'];
                }
                */

                if($imageName == null){
                    $imageName = $oldquestion['TextQuestion']['image'];
                }
             
                if($this->request->data['imagemvazia'] == 'vazio'){
                    $imageName = null;
                }
              
                $this->request->data['TextQuestion']['image'] = $imageName;

            if ($this->TextQuestion->save($this->request->data)) {
                $this->Session->setFlash(__('<script> alert("Questão editada com sucesso!"); </script>', true));
                $this->redirect(array('action' => 'index'));
            }
        }
        else{
            $this->request->data = $this->TextQuestion->read();
        }

    }
/*

	public function edit($id=null) {
        $this->TextQuestion->id = $id;
        $this->set('categories', array('[Selecione]') + $this->TextQuestion->Category->find('list'));
        $this->set('courses', array('[Selecione]') + $this->TextQuestion->Course->find('list'));

        if($this->request->isPost()) {
            if ($this->TextQuestion->save($this->request->data)) {
                $this->Session->setFlash(__('<script> alert("Questão editada com sucesso!"); </script>', true));
                $this->redirect(array('action' => 'index', $this->TextQuestion->id));
            }
        }
        else{
            $this->request->data = $this->TextQuestion->read();
        }

	}
*/
	public function delete ($id){
        $this->TextQuestion->delete($id);
        $this->redirect(array(
            'controller' => 'text_questions', 
            'action' => 'index'));

    }
}
