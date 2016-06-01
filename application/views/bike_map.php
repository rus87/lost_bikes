<script type="text/javascript" src="<?php echo base_url(); ?>js/bike_map.js"></script>

    <div id="map"></div>
    <div id="lat" style="display: none"><?php echo $coordinates[0] ?></div>
    <div id="lng" style="display: none"><?php echo $coordinates[1] ?></div>

<script src="https://maps.googleapis.com/maps/api/js?callback=map_init"></script>