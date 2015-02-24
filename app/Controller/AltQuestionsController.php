<?php
	class AltQuestionsController extends AppController{

        public $uses = array('User', 'AltQuestion', 'Answer');

        public function index(){
            $this->AltQuestion->recursive = 0;
            $this->set('AltQuestions', $this->paginate());

            $users = $this->AltQuestion->find('all', 
                    array(
                        'conditions' => array(
                            'AltQuestion.user_id' => $this->Auth->user('id'),
                            ),
                        'order' => array('AltQuestion.id asc')
                        ));
                
            $this->set(compact(array('users')));

        }

		public function add() {

        
        $this->set('categories', array('[Selecione]') + $this->AltQuestion->Category->find('list'));
        $this->set('courses', array('[Selecione]') + $this->AltQuestion->Course->find('list'));
        $this->set('answers', array('[Selecione]') + $this->Answer->find('list'));

        $imageName = null;


			if ($this->request->is('post')) {

                if ($this->data['AltQuestion']['image']) {
                    $image = $this->data['AltQuestion']['image'];
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
                
                $this->request->data['AltQuestion']['user_id'] = $this->Auth->user('id');
                $this->request->data['AltQuestion']['image'] = $imageName;

                if ($this->AltQuestion->save($this->request->data)) {
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

        $this->AltQuestion->id = $id;
        $this->set('categories', array('[Selecione]') + $this->AltQuestion->Category->find('list'));
        $this->set('courses', array('[Selecione]') + $this->AltQuestion->Course->find('list'));
        $this->set('answers', array('[Selecione]') + $this->Answer->find('list'));

        $imageName = null;

        $this->set('NomeImagem', $this->AltQuestion->find('first', array(
                    'fields' => 'image',
                    'conditions' => array('AltQuestion.id' => $id), 
                    'limit' => 1
                    )));

        $oldquestion = $this->AltQuestion->find('first', array(
            'fields' => 'image',
            'conditions' => array('AltQuestion.id' => $id), 
            'limit' => 1
        ));

          if ($this->request->is('put')) {

                if ($this->data['AltQuestion']['image']) {
                     
                    $image = $this->data['AltQuestion']['image'];
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
                        
                    }

                } 
                /*
                else {
                    $this->request->data['AltQuestion']['image'] = $oldquestion['AltQuestion']['image'];
                }
                */

              if($imageName == null){
                    $imageName = $oldquestion['AltQuestion']['image'];
                }
             
              if($this->request->data['imagemvazia'] == 'vazio'){
                    $imageName = null;
                }
              
                $this->request->data['AltQuestion']['image'] = $imageName;

            if ($this->AltQuestion->save($this->request->data)) {
                $this->Session->setFlash(__('<script> alert("Questão editada com sucesso!"); </script>', true));
                $this->redirect(array('action' => 'index'));
            }
        }
        else{
            $this->request->data = $this->AltQuestion->read();
        }

    }

    public function delete ($id){
        $this->AltQuestion->delete($id);
        $this->redirect(array(
            'controller' => 'alt_questions', 
            'action' => 'index'));
    }
}
?>