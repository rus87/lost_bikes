<div class="well well-sm">
    <form class="form-horizontal" method="post" id="parts_add_form">
        <?php foreach($fields as $field):?>
            <div class="form-group form-group-sm">
            <label class="control-label col-sm-4"><?php echo BIKE_PARTS[$field] ?>: </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="<?php echo $field ?>">
            </div>
        </div>
        <?php endforeach; ?>
        <div><button type="button" class="btn btn-sm btn-primary center-block" id="parts_send_btn">Обновить</button></div>
    </form>
</div>