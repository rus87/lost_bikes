<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<nav class="navbar navbar-inverse" >
          <div class="container-fluid">
              <div class="navbar-header">
                  <a class="navbar-brand" href="<?php echo base_url(); ?>">LOST BIKES</a>
              </div>
              <ul class="nav navbar-nav">
                  <li class="active"><a href="">Проверить байк/запчасть</a></li>
                  <li><a href="">Добавить</a></li>
              </ul>
              <form role="form" class="form-inline navbar-right navbar-form">
                  <div class="form-group">
                      <input type="text" class="form-control input-sm" id="login" placeholder="login" size="7">
                  </div>
                  <div class="form-group">
                      <input type="password" class="form-control input-sm" id="password" placeholder="password" size="7">
                  </div>
                  <!--<input id="signin" type="button" class="btn btn-sm" value="Войти">-->
                  <button id="signin" class="btn btn-sm btn-link" type="button">Войти</button>
              </form>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="sign_up">Регистрация</a></li>
              </ul>
            
          </div>
</nav>