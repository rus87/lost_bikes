<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Lost bikes</title>

    <!-- Bootstrap -->
    <link href="http://127.0.0.1/lost_bikes/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://127.0.0.1/lost_bikes/css/style.css" rel="stylesheet">
    <script src="http://127.0.0.1/lost_bikes/js/jquery-2.2.0.js"></script>
      <script src="http://127.0.0.1/lost_bikes/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="container">
          <script type="text/javascript" src="http://127.0.0.1/lost_bikes/js/signin.js"></script>
          <script type="text/javascript" src="http://127.0.0.1/lost_bikes/js/logout.js"></script>
          <nav class="navbar navbar-inverse" id="nav_bar">
              <div class="container-fluid">
                  <div class="navbar-header">
                      <a class="navbar-brand" href="<?php echo base_url(); ?>">LOST BIKES</a>
                  </div>
                  <ul class="nav navbar-nav">
                      <li class="<?php echo $menu_active_btn['bikes'] ?>"><a href="<?php echo base_url().'bikes/show'; ?>">Проверить байк/запчасть</a></li>
                      <li class="<?php echo $menu_active_btn['add_bike'] ?>"><a href="http://127.0.0.1/lost_bikes/add_bike">Добавить</a></li>
                  </ul>
                  <div id="user_panel">
                      <?php echo $user_panel; ?>
                  </div>
              </div>
          </nav>
          <div id="user_error" class="alert alert-danger" role="alert"><strong>Ошибка :( </strong>
              <span id="error_text"></span>
          </div>
          <div id="content" ><?php echo $content ?></div>
      </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
  </body>
</html>