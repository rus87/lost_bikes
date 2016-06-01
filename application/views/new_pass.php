<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Восстановление пароля</h3>
        </div>
        <div class="panel-body">
            <div class="alert alert-success" style="display: none" id="success_msg">
                Пароль успешно изменен. Можете использоввть его для входа на сайт.
            </div>
            <form class="form-horizontal" id="new_pass_form" method="post" action="javascript:void(null);" onsubmit="send()">
                <div class="form-group" id="password">
                    <label class="control-label col-xs-4 text-muted">Новый пароль:</label>
                    <div class="col-xs-8">
                        <input type="password" name="password" class="form-control" placeholder="Введите пароль...">
                        <span id="password_error" class="help-block"></span>
                    </div>
                </div>
                <div class="form-group" id="passconf">
                    <label class="control-label col-xs-4 text-muted">Еще раз:</label>
                    <div class="col-xs-8">
                        <input type="password" name="passconf" class="form-control" placeholder="Введите пароль...">
                        <span id="passconf_error" class="help-block"></span>
                    </div>
                </div>
                <input name="token" type="hidden" value="<?php echo $token ?>">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <button class="btn btn-primary" type="submit">Отправить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>js/new_pass.js"></script>