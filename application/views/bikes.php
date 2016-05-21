<script type="text/javascript" src='<?php echo base_url(); ?>js/search.js'></script>

<div class="row">
    <div class="col-md-4">
        <form method="post" id="search_form" class="form-inline">
            <div class="input-group">
                <input type="text" class="form-control" name="search_query" id="search_input" placeholder="Поиск">
                <span class="input-group-btn">
                    <button id="search" class="btn btn-primary" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </form>
    </div>
</div>

<div id="bikes" ><?php echo $bikes_html ?></div>

<div id="info_message" class="alert alert-info" role="alert">
    <span id="message_text"></span>
</div>

