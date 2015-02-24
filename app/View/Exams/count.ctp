<h1>Total de Questões</h1>
<br>
 <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-book fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">
                    <?php 
                   		 echo ($conhecimentos_gerais) ? $conhecimentos_gerais : 0;
                    ?>
                    </p>
                  </div>
                </div>
              </div>
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Conhecimentos gerais
                    </div>
                    	
                  </div>
                </div>
            </div>
  </div>


 <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-check-square-o fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">
					<?php 
                   		 echo ($alternativas) ? $alternativas : 0;
                    ?>
                    </p>
                  </div>
                </div>
              </div>
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Alternatvas
                    </div>
                    
                  </div>
                </div>
            </div>
  </div>

 <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-edit fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">
                    <?php 
                   		 echo ($dissertativa) ? $dissertativa : 0;
                    ?>
                    </p>
                  </div>
                </div>
              </div>
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Dissertativas
                    </div>
                    
                  </div>
                </div>             
            </div>
  </div>