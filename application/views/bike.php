<script type="text/javascript" src="<?php echo base_url(); ?>js/bike.js"></script>
<div id="bike">
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
            <table class="table table-striped table-hover">
                <tbody>
                    <?php foreach($keys as $key): ?>
                    <tr>
                        <td class="part_key_display"><?php echo BIKE_PARTS[$key]; ?>:</td>
                        <td><?php echo $values[$key]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php echo $map ?>
</div>

