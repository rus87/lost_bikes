<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript" src="js/signin.js"></script>
<script type="text/javascript" src="js/logout.js"></script>
<nav class="navbar navbar-inverse" id="nav_bar">
          <div class="container-fluid">
              <div class="navbar-header">
                  <a class="navbar-brand" href="<?php echo base_url(); ?>">LOST BIKES</a>
              </div>
              <ul class="nav navbar-nav">
                  <li class="active"><a href="">Проверить байк/запчасть</a></li>
                  <li><a href="">Добавить</a></li>
              </ul>
              <div id="user_panel">
                  <?php echo $user_panel; ?>
              </div>
            
          </div>
</nav>

<div id="sign_in_error" class="alert alert-danger" role="alert"><strong>Ошибка :( </strong>
    <span id="error_text"></span>
</div>


