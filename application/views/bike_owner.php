<script type="text/javascript" src="<?php echo base_url(); ?>js/bike_owner.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bike.js"></script>
<div id="bike">
    <span class="bike_id"><?php echo $id; ?></span>
    <div class="page-header">
        <h1><?php echo $heading; ?><small> [ <?php echo $location; ?> ] </small></h1>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="thumb text-center">
                <img src="<?php echo $photo_thumb; ?>" id="thumb_photo">
                <div class="thumb_menu">
                    <a href="<?php echo $photo_orig; ?>" target="_blank"><span class="small">Открыть оригинал</span></a>
                </div>
            </div>
            <p class="text-muted text-left"><span class="small">Дата кражи: </span><strong><span class="text-info"><?php echo $loss_date ?></strong></span></p>
            <p class="text-muted text-left small">Резмещено пользователем <strong><a href=""><?php echo $user_login ?></a></strong> <?php echo $created ?></p>
            <p id="comment"><?php echo $comment ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h3>Комплектация</h3>
            <table class="table table-striped table-hover parts_table">
                <tbody>
                <?php foreach($keys as $key): ?>
                    <tr>
                        <td class="part_key"><?php echo $keys[$key]; ?></td>
                        <td class="part_key_display"><?php echo BIKE_PARTS[$key]; ?>:</td>
                        <td class="part_td"><span class="part_value" id="<?php echo $keys[$key]; ?>"><?php echo $values[$key]; ?></span>
                            <form method="post" class="form-inline part_edit_form">
                                <div class="form-group form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm" name="<?php echo $keys[$key]; ?>" value="<?php echo $values[$key]; ?>">
                                        <span class="input-group-btn"><button id="<?php echo $keys[$key]; ?>" class="btn btn-primary btn-sm edit_part_btn" type="button">Edit</button></span>
                                    </div>
                                </div>
                            </form>
                            <div class="glyphicon glyphicon-pencil edit_pen"></div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div><button class="btn btn-sm btn-link" id="parts_add_btn" type="button">Добавить</button></div>
    <div class="row"><div class="col-md-6 col-md-offset-3" id="parts_add_div"></div></div>
    <?php echo $map ?>
</div>


