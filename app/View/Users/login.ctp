<?php
    
    $entrar = array(
    'label' => 'Entrar',
    'class' => 'btn btn-lg btn-primary btn-block'
    );

    $input_login = array(
        'placeholder' => 'Login',
        'type' => 'text',
        'class' => 'form-control',
        'div' => array(
        'class' => 'form-group',
    ));

    $input_password = array(
        'placeholder' => 'Senha',
        'type' => 'password',
        'id' => '',
        'class' => 'form-control',
        'div' => array(
        'class' => 'form-group',
    ));

    $form_user = array(
        'role' => 'form');
    
?>
        <h1 class="form-signin" style="max-width:100%;"> 
            <img alt="Trenade" src="../img/logo-login.png" class="img-responsive" style=" margin:0 auto;" >        
        </h1>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                    
                           <?php echo $this->Form->create('User',$form_user);?>
                           <?php 
                              echo $this->Form->input('username', $input_login);
                              echo $this->Form->input('password', $input_password);
                            ?>
                            <?php echo $this->Form->end($entrar); ?>                         
                    </div>
                </div>
            </div>
        </div>



      
