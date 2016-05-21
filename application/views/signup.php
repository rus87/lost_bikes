<div id="signup_form">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Регистрация</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" id="signup" method="post" action="">
                <div class="form-group" id="signup_login">
                    <label class="control-label col-sm-3">Логин:</label>
                    <div class="col-sm-9">
                        <input type="text" name="login" class="form-control" placeholder="Введите логин...">
                        <span id="login_error" class="help-block"></span>
                    </div>
                </div>

                <div class="form-group" id="signup_email">
                    <label class="control-label col-sm-3">Почта:</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" class="form-control" placeholder="Введите e-mail...">
                        <span id="email_error" class="help-block"></span>
                    </div>
                </div>

                <div class="form-group" id="signup_password">
                    <label class="control-label col-sm-3">Пароль:</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" class="form-control" placeholder="Введите пароль...">
                        <span id="password_error" class="help-block"></span>
                    </div>
                </div>

                <div class="form-group" id="signup_passconf">
                    <label class="control-label col-sm-3">Еще раз:</label>
                    <div class="col-sm-9">
                        <input type="password" name="passconf" class="form-control" placeholder="Введите пароль...">
                        <span id="passconf_error" class="help-block"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-3">
                        <!--<input id="send" type="button" class="btn btn-primary" value="Зарегистрироваться">-->
                        <button id="send" class="btn btn-primary" type="button">Зарегистрироваться</button>
                    </div>
                </div>

            </form>
        </div>
    </div>              
</div>

<div id="reg_success">
    <div class="alert alert-success">
      <strong>Успех!</strong> Вы успешно зарегистрировались на сайте. Для активации учетной записи перейдите по ссылке, отправленной на e-mail.
    </div>
</div>




<script type="text/javascript" src="<?php echo base_url(); ?>js/signup.js"></script>
