<script type="text/javascript" src="<?php echo base_url(); ?>js/recovery.js"></script>
<div class="col-sm-6 col-sm-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Восстановление пароля</h3>
        </div>
        <div class="panel-body">
            <div class="alert alert-danger" id="recovery_error">Нет такого пользователя или данные введены не верно</div>
            <div class="alert alert-success" id="recovery_success">Ссылка для восстановления отправлена на почту</div>
            <p class="text-muted">Введите логин или e-mail, указанный при регистрации, чтобы получить ссылку для восстановления.</p>
            <form class="form-inline" id="recovery_form" method="post" action="javascript:void(null);" onsubmit="send()">
                <div class="form-group" id="login_email">
                        <input type="text" name="login_email" class="form-control" placeholder="Логин или e-mail">
                </div>
                <button class="btn btn-primary" type="submit">Отправить</button>
            </form>
        </div>
    </div>
</div>

