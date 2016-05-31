<form class="form-inline navbar-right navbar-form">
    <button id="show_login_popup" class="btn btn-link" type="button"><span class="glyphicon glyphicon-user"></span> Авторизация</button>
</form>


<div id="login_popup" class="well well-sm">
    <form id="sign_in_form" class="form-inline">
        <div class="form-group">
            <input type="text" class="form-control input-sm" name="login" placeholder="login" size="7">
        </div>
        <div class="form-group">
            <input type="password" class="form-control input-sm" name="password" placeholder="password" size="7">
        </div>
        <div class="form-group checkbox">
            <input type="checkbox" name="remember">
        </div>
        <button id="signin" class="btn btn-sm btn-link" type="button"><span class="glyphicon glyphicon-log-in"></span> Войти</button>
    </form>
    <div class="row">
    <div class="col-sm-4">
        <form action="<?php echo base_url();?>sign_up" method="post">
            <button class="btn btn-sm btn-link" type="submit">Регистрация</button>
        </form>
    </div>
    <div class="col-sm-8">
        <form action="" method="post">
            <button class="btn btn-sm btn-link" type="submit">Восстановить пароль</button>
        </form>
    </div>
    </div>
</div>