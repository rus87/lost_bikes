<div class="row">
    <div class="col-md-6">
        <form method="post" id="search_form" class="form-inline">
            <div class="form-group">
                <input type="text" name="search_query" id="search_input">
                <button id="search" class="btn btn-sm" type="button">Искать</button>
            </div>
        </form>
    </div>
</div>
<div class="row" id="bikes"><?php echo $bikes ?></div>

<script type="text/javascript" src='js/search.js'></script>