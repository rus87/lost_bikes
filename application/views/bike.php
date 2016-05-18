<div id="bike">
    <div class="page-header">
        <h1><?php echo $heading; ?><small> [ <?php echo $location; ?> ] </small></h1>
    </div>
    <div class="">
        <p class="text-muted text-right"><span class="small">Дата кражи: </span><strong><span class="text-info"><?php echo $loss_date ?></strong></span></p>
        <p class="text-muted text-right small">Резмещено пользователем <strong><a href=""><?php echo $user_login ?></a></strong> <?php echo $created ?></p>
    </div>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-3"><img src="<?php echo $photo; ?>" class="img-responsive"></div>
            <p><?php echo $comment ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h3>Комплектация</h3>
            <table class="table table-striped table-hover">
                <tbody>
                    <?php foreach($keys as $key): ?>
                    <tr>
                        <td class="part_key"><?php echo BIKE_PARTS[$key]; ?>:</td>
                        <td><?php echo $values[$key]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
