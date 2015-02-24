<?php
	class ExamsController extends AppController{

        public $uses = array('User', 'Exam', 'Course', 'AltQuestion', 'TextQuestion', 'Result');

        public function index(){
            
        }

        public function result(){
            $this->Result->recursive = 0;
            $this->set('Results', $this->paginate());

            $resultados = $this->Result->find('all', 
                    array(
                        'conditions' => array(
                            'Result.user_id' => $this->Auth->user('id'),
                            ),
                        'order' => array('Result.data asc')
                        ));
                
            $this->set(compact(array('resultados')));
        }

        public function correction(){

            if ($this->request->is('post')) {
                //Pega os ids de questões
                $questions = array();
                for ($id=1;$id<15;$id++) {
                    $questions[$id] = $this->request->data['Exam'][$id];
                }
                
                $answeredAlt = array();
                $answers_list = array();
                $questoesAlt = array();
                $score = 0;

                for ($i=1;$i<=14;$i++) {
                    
                    $answeredAlt[$i] = $this->request->data['Exam'][$questions[$i]];
                    
                    $questoesAlt[$i] = $this->AltQuestion->find('first', 
                    array('conditions' => array('AltQuestion.id' => $questions[$i])));
                    
                    $answers_list[$i] = $this->AltQuestion->find('first', array(
                    'fields' => array('answer_id'),
                    'conditions' => array('AltQuestion.id' => $questions[$i])
                    ));
                    
                    if($answers_list[$i]['AltQuestion']['answer_id'] == $answeredAlt[$i]){
                        $score++;
                    }   
                }
                
                /*

                $questoesDis = array();
                $questoesDis[1] = $this->TextQuestion->find('first',
                    array('conditions' => array('TextQuestion.id' => $questions[15])));
                    
                */

                $this->set('questoesAlt', $questoesAlt);
                //$this->set('questoesDis', $questoesDis); 
                $this->set('respostasCertas', $answers_list);
                $this->set('respostasUsuario', $answeredAlt);    
                $this->set('score', $score);

                $this->request->data['Result']['user_id'] = $this->Auth->user('id');
                $this->request->data['Result']['score'] = $score;
                $this->request->data['Result']['data'] = date('Y-m-d');
                $this->request->data['Result']['course_id'] = $this->data['Exam']['num_curso'];;

                $salvou = false;
                if ($this->Result->save($this->request->data)) {
                    $salvou = true;
                }
                if(!$salvou) {
                    $this->Session->setFlash(__('<script> alert("Erro! Resultado não foi salvo!"); </script>', true));
                }
                $this->request->data = null;
            }
        }

        public function generate(){
            $this->set('courses', array('[SELECIONE O CURSO]') + $this->Course->find('list'));
        }

        public function exam() {

            if ($this->request->is('post')) { 

                $id_busca = $this->request->data['Exams']['course_id'];

                if ($id_busca == '0') {
                    $this->Session->setFlash(__('<script> alert("Selecione o curso!"); </script>',true));
                    $this->redirect(array('action' => 'generate'));
                } 
                else {
                    $course = $this->Course->find('first', 
                    array( 'conditions' => array('Course.id' => $id_busca)));
                    $course_name = $course['Course']['name'];
                    $this->set('nome_curso', $course_name);

                    $qtdAltConhecimentosGerais = $this->AltQuestion->find('count', array(
                    'fields' => array('DISTINCT id','question_text','image','answerA','answerB','answerC','answerD','answerE', 'answer_id'),
                    'conditions' => array('AltQuestion.category_id' => '1'), 
                    'order' => 'rand()',
                    'limit' => 4
                    ));

                    $qtdAltEspecificas = $this->AltQuestion->find('count', array(
                    'fields' => array('DISTINCT id','question_text','image','answerA','answerB','answerC','answerD','answerE', 'answer_id'),
                    'conditions' => array('AltQuestion.course_id' => $id_busca), 
                    'order' => 'rand()',
                    'limit' => 10
                    ));

                    $qtdTxtEspecificas = $this->TextQuestion->find('count', array(
                    'fields' => array('DISTINCT id','question_text','image','answer_text'),
                    'conditions' => array('TextQuestion.course_id' => $id_busca), 
                    'order' => 'rand()',
                    'limit' => 1
                    ));

                    if (($qtdAltConhecimentosGerais < 4) || ($qtdAltEspecificas < 10) /*|| ($qtdTxtEspecificas < 1)*/) {
                        $this->Session->setFlash(__('<script> alert("Impossível gerar simulado!"); </script>',true));
                        $this->redirect(array('action' => 'generate'));
                    }
                    else {

                        $this->set('conhecimentos_gerais', $this->AltQuestion->find('all', array(
                        'fields' => array('DISTINCT id','question_text','image','answerA','answerB','answerC','answerD','answerE', 'answer_id'),
                        'conditions' => array('AltQuestion.category_id' => '1'), 
                        'order' => 'rand()',
                        'limit' => 4
                        )));

                        $this->set('alternativas', $this->AltQuestion->find('all', array(
                        'fields' => array('DISTINCT id','question_text','image','answerA','answerB','answerC','answerD','answerE', 'answer_id'),
                        'conditions' => array('AltQuestion.course_id' => $id_busca), 
                        'order' => 'rand()',
                        'limit' => 10
                        )));

                        $this->set('dissertativa', $this->TextQuestion->find('all', array(
                        'fields' => array('DISTINCT id','question_text','image','answer_text'),
                        'conditions' => array('TextQuestion.course_id' => $id_busca), 
                        'order' => 'rand()',
                        'limit' => 1
                        )));

                        $this->set('numero_curso', $id_busca);
                    }
                }

            }
            else {
                $this->redirect(array('action' => 'generate'));
            }

        }

        public function number(){
            $this->set('courses', array('[SELECIONE O CURSO]') + $this->Course->find('list'));
        }

        public function count() {


            if ($this->request->is('post')) { 

                $id_busca = $this->request->data['Exams']['course_id'];

                if ($id_busca == '0') {
                    $this->Session->setFlash(__('<script> alert("Selecione o curso!"); </script>',true));
                    $this->redirect(array('action' => 'number'));
                } else {
                    $course = $this->Course->find('first', 
                    array( 'conditions' => array('Course.id' => $id_busca)));
                    $course_name = $course['Course']['name'];
                    $this->set('nome_curso', $course_name);

                    $this->set('conhecimentos_gerais', $this->AltQuestion->find('count', array(
                    'fields' => array('DISTINCT id','question_text','image','answerA','answerB','answerC','answerD','answerE', 'answer_id'),
                    'conditions' => array('AltQuestion.category_id' => '1'), 
                    'order' => 'rand()',
                    'limit' => 4
                    )));

                    $this->set('alternativas', $this->AltQuestion->find('count', array(
                    'fields' => array('DISTINCT id','question_text','image','answerA','answerB','answerC','answerD','answerE', 'answer_id'),
                    'conditions' => array('AltQuestion.course_id' => $id_busca), 
                    'order' => 'rand()',
                    'limit' => 10
                    )));

                    $this->set('dissertativa', $this->TextQuestion->find('count', array(
                    'fields' => array('DISTINCT id','question_text','image','answer_text'),
                    'conditions' => array('TextQuestion.course_id' => $id_busca), 
                    'order' => 'rand()',
                    'limit' => 1
                    )));


                    $this->set('numero_curso', $id_busca);
                }

            }else {
                $this->redirect(array('action' => 'number'));
            }

        }

    }
