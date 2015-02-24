<?php
	class UsersController extends AppController{

    public $uses = array('User', 'Result');
        
		public function index(){
            $this->User->recursive = 0;
            $this->set('users', $this->paginate());
		}

    public function performance(){
        
    }

    public function student_performance(){
        
        $recuperaId = $this->User->find('first', 
                array(
                  'conditions' => array(
                      'User.username' => $this->request->data['Users']['username'],
                      )
                  ));

        $this->Result->recursive = 0;
        $this->set('Results', $this->paginate());

        if($recuperaId['User']['id'] != null){

          $resultados = $this->Result->find('all', 
                array(
                    'conditions' => array(
                        'Result.user_id' => $recuperaId['User']['id']
                        ),
                    'order' => array('Result.data asc')
                    ));
            
          $this->set(compact(array('resultados')));

        }
        else{
          $this->Session->setFlash(__('
                        <script> alert("Aluno não encontrado!"); </script>', true));
          $this->redirect(array('action' => 'performance'));

        }
    }
        
    public function login(){
        $this->layout = 'login';
        if ($this->Auth->login()) {
            if ($this->Auth->user('teacher')) {
                $this->redirect(array('controller' => 'users', 'action' => 'index'));   
            }
            else {
                $this->redirect(array('controller' => 'exams', 'action' => 'index'));
            }
            
        }
        elseif (empty($this->data)) {
            return;
        } else {   
            $this->Session->setFlash(__('<script> alert("Usuário ou senha inválidos."); </script>', true));
            $this->request->data = null;
        }
    }

    function edit ($id){

       if (empty($this->data)) {
           $this->data = $this->User->find('first', array('conditions' => array('id' => $id)));
           
       }
       else{
               $this->User->save($this->data);
               $this->redirect('manager');
       }

    }

   public function change_pass() {
       $this->User->recursive = 0;

       if (!empty($this->data)) {

           $this->User->id = $this->Session->read('Auth.User.id');

           if ($this->User->save($this->data)) {
               $this->Session->setFlash(__('<script> alert("Senha alterada com sucesso!"); </script>', true));
               $this->redirect(array('controller' => 'exams', 'action' => 'index'));
           } else {
               $this->Session->setFlash(__('<script> alert("As duas senhas não conferem! Tente novamente."); </script>', true));
           }
       }

       $this->data = $this->User->read(null, $this->Session->read('Auth.User.id'));
   }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('add');
    }

    public function add_student() {
      if ($this->request->is('post')) {
        if($this->User->find('first', array('conditions' => array('username' => $this->request->data['User']['username']))) == null){
          $this->User->create();
          $this->request->data['User']['teacher'] = 0;
          if ($this->User->save($this->request->data)) {
              $this->Session->setFlash(__('<script> alert("Aluno salvo com sucesso!"); </script>', true));
              $this->redirect(array('action' => 'add_student'));
          } 
          else {
             $this->Session->setFlash(__('<script> alert("O aluno não pode ser salvo."); </script>', true));
          }
        }
        else {
          $this->Session->setFlash(__('<script> alert("Usuário não pode ser salvo! O RA já existe."); </script>', true));
        }
      }
    }

    public function add_teacher() {
      if ($this->request->is('post')) {
        if($this->User->find('first', array('conditions' => array('username' => $this->request->data['User']['username']))) == null){
          $this->User->create();
          $this->request->data['User']['teacher'] = 1;
          if ($this->User->save($this->request->data)) {
              $this->Session->setFlash(__('<script> alert("Usuário salvo com sucesso!"); </script>', true));
              $this->redirect(array('action' => 'add_teacher'));
          } 
          else {
             $this->Session->setFlash(__('<script> alert("O usuário não pode ser salvo."); </script>', true));
          }
        } 
        else {
          $this->Session->setFlash(__('<script> alert("Usuário não pode ser salvo! O Registro de Professor já existe."); </script>', true));
        }
      }
    }
	}
?>