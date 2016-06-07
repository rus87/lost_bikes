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
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>js/jquery-2.2.0.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/signin.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/logout.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/template.js"></script>    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
    <div id="back_fading"></div>
        <div class="container-fluid" id="main_menu">
            <nav class="navbar navbar-inverse navbar-fixed-top" id="nav_bar">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">LOST BIKES</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="<?php echo $menu_active_btn['bikes'] ?>"><a href="<?php echo base_url().'bikes/show'; ?>">Проверить байк/запчасть</a></li>
                    <li class="<?php echo $menu_active_btn['add_bike'] ?>"><a href="<?php echo base_url(); ?>add_bike">Добавить</a></li>
                </ul>
                <div id="user_panel">
                    <?php echo $user_panel; ?>
                </div> 
            </nav>
        </div>
        <div class="container">
            <div id="user_error" class="alert alert-danger" role="alert">
                <a class="pull-right" id="close_alert"><span class="glyphicon glyphicon-remove"></span></a>
                <strong>Ошибка :( </strong>
                <span id="error_text"></span>
            </div>
            <div id="content" ><?php echo $content ?></div>
        </div>
    </body>
</html>