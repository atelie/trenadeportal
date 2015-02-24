<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">


  <?php 
  echo $this->Html->css('bootstrap.css');
  echo $this->Html->css('sb-admin.css');
  echo $this->Html->css('font-awesome/css/font-awesome.min.css');

  echo $this->Html->script('jquery-1.10.2.js'); 
  ?>

</head>

<body>

  <div id="wrapper">

    <?php echo $this->Session->flash(); ?>
    
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <?php if($ehProfessor): ?>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-check-square-o"></i> Questões Alternativas <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>
                    <?php
                      echo $this->Html->link(
                         '<i class="fa fa-plus"></i> Adicionar',
                          array(
                              'controller'=>'alt_questions',
                              'action'=>'add',
                          ),
                          array(
                              'escape'=>false 
                          )
                      );
                    ?>
                </li>
                <li>
                    <?php
                      echo $this->Html->link(
                         '<i class="fa fa-wrench"></i> Gerenciar',
                          array(
                              'controller'=>'alt_questions',
                              'action'=>'index',
                          ),
                          array(
                              'escape'=>false 
                          )
                      );
                    ?>
                </li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-edit"></i> Questões Dissertativas <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>
                    <?php
                      echo $this->Html->link(
                         '<i class="fa fa-plus"></i> Adicionar',
                          array(
                              'controller'=>'text_questions',
                              'action'=>'add',
                          ),
                          array(
                              'escape'=>false 
                          )
                      );
                    ?>
                </li>
                <li>
                    <?php
                      echo $this->Html->link(
                         '<i class="fa fa-wrench"></i> Gerenciar',
                          array(
                              'controller'=>'text_questions',
                              'action'=>'index',
                          ),
                          array(
                              'escape'=>false 
                          )
                      );
                    ?>
                </li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-group"></i> Usuários <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>

                    <?php
                      echo $this->Html->link(
                         '<i class="fa fa-plus"></i> Adicionar Novo Aluno',
                          array(
                              'controller'=>'users',
                              'action'=>'add_student',
                          ),
                          array(
                              'escape'=>false 
                          )
                      );
                    ?>
                </li>
                <li>
                  <?php
                      echo $this->Html->link(
                         '<i class="fa fa-plus"></i> Adicionar Novo Professor',
                          array(
                              'controller'=>'users',
                              'action'=>'add_teacher',
                          ),
                          array(
                              'escape'=>false 
                          )
                      );
                    ?>
                </li>
                <li> 
                   <?php
                      echo $this->Html->link(
                         '<i class="fa fa-dashboard"></i> Verificar Desempenho',
                          array(
                              'controller'=>'users',
                              'action'=>'performance',
                          ),
                          array(
                              'escape'=>false 
                          )
                      );
                    ?>
                </li>
              </ul>
            </li>

              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-graduation-cap"></i> Cursos <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>

                    <?php
                      echo $this->Html->link(
                         '<i class="fa fa-plus"></i> Adicionar Novo Curso',
                          array(
                              'controller'=>'courses',
                              'action'=>'add',
                          ),
                          array(
                              'escape'=>false 
                          )
                      );
                    ?>
                </li>
                <li>

                    <?php
                      echo $this->Html->link(
                         '<i class="fa fa-list"></i> Listar Cursos',
                          array(
                              'controller'=>'courses',
                              'action'=>'index',
                          ),
                          array(
                              'escape'=>false 
                          )
                      );
                    ?>
                </li>
            
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gears"></i> Configurações <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>
                 <?php
                      echo $this->Html->link(
                         '<i class="fa fa-key"></i> Alterar Senha',
                          array(
                              'controller'=>'users',
                              'action'=>'change_pass',
                          ),
                          array(
                              'escape'=>false 
                          )
                      );
                    ?>
                </li>
                <li>
                 <?php
                      echo $this->Html->link(
                         '<i class="fa fa-info"></i> Total Questões',
                          array(
                              'controller'=>'exams',
                              'action'=>'number',
                          ),
                          array(
                              'escape'=>false 
                          )
                      );
                    ?>
                </li>
              </ul>
            </li>

            
          <?php else:  ?>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-edit"></i> Simulados <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>
                    <?php
                      echo $this->Html->link(__('Gerar Simulado'), array(
                      'controller' => 'exams', 'action' => 'generate'));
                    ?>
                </li>
                <li>
                    <?php
                      echo $this->Html->link(__('Resultados Anteriores'), array(
                      'controller' => 'exams', 'action' => 'result'));
                    ?>
                </li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-edit"></i> Configurações <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>
                    <?php
                      echo $this->Html->link(__('Alterar Senha'), array(
                      'controller' => 'users', 'action' => 'change_pass'));
                    ?>
                </li>
              </ul>
            </li>
            
          <?php endif; ?>
        </ul>

        <ul class="nav navbar-nav navbar-right navbar-user">

          <li class="dropdown user-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo($nomeUser); ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <?php echo $this->Html->link(__('Sair'), array(
                  'controller' => 'users', 
                  'action' => 'logout'
                  ));?>
                <i class="fa fa-power-off" style='float: right !important;margin-top: -20px;'></i>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>
      

      <div id="page-wrapper">

        <div class="content">
          <?php echo $this->fetch('content'); ?>
        </div>


      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->

    <?php 

    echo $this->Html->script('jquery.validate.min.js');
    echo $this->Html->script('bootstrap.js');
    echo $this->Html->script('tablesorter/jquery.tablesorter.js');
    echo $this->Html->script('tablesorter/tables.js');
    echo $this->Html->script('trenade.js');

    ?> 

  </body>
  </html>
