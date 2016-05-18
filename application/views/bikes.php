
<div class="row">
    <div class="col-sm-4">
        <form method="post" id="search_form" class="form-inline">
            <div class="input-group">
                <input type="text" class="form-control" name="search_query" id="search_input" placeholder="Поиск">
                <span class="input-group-btn">
                    <button id="search" class="btn btn-default" type="button">Go!</button>
                </span>
            </div>
        </form>
    </div>
</div>

<!--
<div class="col-md-12" id="search_block">
    <form method="post" id="search_form" class="form-inline">
        <div class="form-group">
            <input type="text" name="search_query" id="search_input">
            <button id="search" class="btn btn-sm" type="button">Искать</button>
        </div>
    </form>
</div>-->
<div id="bikes" ><?php echo $bikes_html ?></div>



<script type="text/javascript" src='http://127.0.0.1/lost_bikes/js/search.js'></script>