<?php
class CoursesController extends AppController {
    
    public function index(){
        $courses = $this->Course->find('all');
        $this->set('courses',$courses);
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->Course->save($this->request->data)) {
                $this->Session->setFlash(__('<script> alert("sucesso!"); </script>', true));
                $this->redirect(array('controller' => 'users', 'action' => 'index'));
            } else {
               $this->Session->setFlash(__('<script> alert("não pode ser salvo."); </script>', true));
            }
        }
    }

    public function delete ($id){
        $this->Course->delete($id,true);
        $this->redirect(array(
            'controller' => 'courses', 
            'action' => 'index'));
    }   

}