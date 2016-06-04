$(document).ready(function(){

    $('[data-toggle="tooltip"]').tooltip({
        placement: 'top',
        title: "<p>Для выбора места кликните в нужной точке на карте.</p><p>Для изменения места перетащите маркер или просто кликните в другом месте</p>",
        html: true
    });

    $(document).on("click", "#add_bike", function()
    {
        var form_data = new FormData($('form')[0]);
        $.ajax
        ({
            method: "POST",
            url: "add_bike/add",
            processData: false,
            contentType: false,
            data: form_data,
            success: function(answer)
            {
                
                if(answer != "OK")
                    {
                        console.log(answer);
                        $("#error_text").html(answer);
                        $("#user_error").slideDown();
                    }
                else
                    {
                        $("#user_error").slideUp();
                        $("#content").html("success!");
                    }
            }
        });
        //console.log(form_data);
    });
    
    $(document).on("click", "#show_parts_btn", function()
    {
        if( $("#parts").css('display') == 'none' ) $("#parts").slideDown(500);
        else $("#parts").slideUp(500);
    });
    
        $(document).on("click", "#hide_parts_btn", function()
    {
        $("#parts").slideUp(500);
    });
});

function show_map()
{
    if($("#map_callback").html() == '')
        $("#map_callback").html('<script src="https://maps.googleapis.com/maps/api/js?callback=map_init"></script>');
    if($("#add_bike_map").css('display') == 'none')
        $("#add_bike_map").slideDown();
    else $("#add_bike_map").slideUp();
}

function hide_map()
{
    $("#add_bike_map").slideUp();
}

var map;
var marker;
function map_init()
{
    var lat = $("#default_lat").text();
    var lng = $("#default_lng").text();
    var place = new google.maps.LatLng(lat, lng);
    var options = {
        zoom: 12,
        center: place,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('map'), options);

    google.maps.event.addListener(map, 'click', function (event) {
        addMarker(event.latLng);
    });

}

function addMarker(place)
{
    if(marker != undefined) marker.setMap(null);
        marker = new google.maps.Marker({
            position: place,
            map: map,
            draggable: true,
            zIndex: 999
        });
    $("#lat").val(place.lat);
    $("#lng").val(place.lng);
    marker.addListener('dragend', function(){
        /*console.log(marker.getPosition().lat());
        console.log(marker.getPosition().lng());*/
        $("#lat").val(marker.getPosition().lat());
        $("#lng").val(marker.getPosition().lng());

    });
}


function clear_map()
{
    if(marker != undefined) marker.setMap(null);
    $("#lat").val(null);
    $("#lng").val(null);
}