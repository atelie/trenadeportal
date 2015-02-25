<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package     app.Controller
 * @link        http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'users', 
                'action' => 'index'),

            'logoutRedirect' => array(
                'controller' => 'users', 
                'action' => 'login'),
            )
        );

    var $permissoesAluno = array(
        'users' => array('logout' => true, 'change_pass' => true),
        'exams' => array('index' => true, 'exam' => true, 'generate' => true, 'result' => true, 'correction' => true)
        );

    var $permissoesProfessor = array(
        'users' => array('logout' => true, 'index' => true, 'add_student' => true, 'add_teacher' => true, 'change_pass' => true, 'performance' => true, 'student_performance' => true),
        'alt_questions' => array('index' => true,'add' => true,'edit' => true,'delete' => true),
        'text_questions' => array('index' => true,'view' => true,'add' => true,'edit' => true,'delete' => true),
        'courses' => array('index' => true, 'add' => true, 'delete' => true),
        'categories' => array('index' => true, 'add' => true),
        'answers' => array('index' => true, 'add' => true),
        'exams' => array('number' => true, 'count' => true)

        );

    
    public function beforeFilter() {
        parent::beforeFilter();
        $estaNaLogin = ($this->request->params['controller'] == 'users' AND $this->request->params['action'] == 'login');
        if($estaNaLogin) return;

        $eProfessor = $this->Auth->user('teacher');
        $this->set('ehProfessor', $eProfessor);
        $userName = $this->Auth->user('name');
        $this->set('nomeUser', $userName);

        $professorTemPermissao = !empty($this->permissoesProfessor[$this->request->params['controller']][$this->request->params['action']]);
        if($eProfessor AND $professorTemPermissao) return;
        
        $alunoTemPermissao = !empty($this->permissoesAluno[$this->request->params['controller']][$this->request->params['action']]);
        if(!$eProfessor AND $alunoTemPermissao) return;

        $this->Session->setFlash(__('<script> alert("Permissão negada."); </script>', true));
        $this->redirect(array('controller' => 'users', 'action' => 'login'));    
    } 
}
