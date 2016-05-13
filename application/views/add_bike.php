<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form method="post" enctype="multipart/form-data" class="form-horizontal" role="form" id="bike_add_form" action="">
            <div class="well well-sm">
                <div class="form-group">
                    <label class="control-label col-sm-4">Байк/рама:<span style="color:red"> *</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="frame" placeholder="Specialized SX Trail M">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Фото:<span style="color:red"> *</span></label>
                    <div class="col-sm-8">
                        <input type="file" name="photo" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Город:<span style="color:red"> *</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="location" placeholder="Киев">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Дата кражи:<span style="color:red"> *</span></label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="loss_date">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Комментарий:</label>
                    <div class="col-sm-8">
                        <textarea name="comment"></textarea>
                    </div>
                </div>
            </div>
            <button id="show_parts_btn" type="button" class="btn btn-sm btn-link">Комплектующие <span class="glyphicon glyphicon-chevron-down"></span></button>
            <div class="well well-sm" id="parts">
                <div class="form-group">
                    <label class="control-label col-sm-8">Последние 4 символа серийного номера:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="frame_serial" placeholder="1234">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Вилка:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="fork" placeholder="Fox 36 Van RC">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Амортизатор:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="amort" placeholder="Marzocchi Roco">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Задний тормоз:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="break_rear" placeholder="Juicy 3">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Передний тормоз:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="break_front" placeholder="Juicy 5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Система:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="crankset" placeholder="Shimano Saint">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Передняя перекидка:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="der_front" placeholder="Shimano FD-M8025">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Задняя перекидка:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="der_rear" placeholder="Sram X0">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Кассета:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="cassette" placeholder="SRAM XG-1199">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Передняя втулка:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sleeve_front" placeholder="Novatec D041SB">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Задняя втулка:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sleeve_rear" placeholder="Novatec D042SB">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Обода:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="rims" placeholder="FireEye Excelerant 26">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Покрышка перед:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="tire_front" placeholder="Schwalbe Smart Sam">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Покрышка зад:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="tire_rear" placeholder="Schwalbe Smart Sam">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Успокоитель цепи:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="chainguide" placeholder="E Thirteen LS1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Руль:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="handlebar" placeholder="Blackspire Riser Bar 750mm">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Вынос:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="stem" placeholder="Hope AM-FR Stem">
                    </div>
                </div>
                <button id="hide_parts_btn" type="button" class="btn btn-sm btn-link">Свернуть комплектующие <span class="glyphicon glyphicon-chevron-up"></span></button></button>
            </div>
            <div class="col-sm-12" id="add_bike_btn_div">
                <button class="btn btn-primary" id="add_bike" type="button">Добавить</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src='js/add_bike.js'></script>