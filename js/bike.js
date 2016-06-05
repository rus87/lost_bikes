var map;
function map_init(lat, lng)
{
    if(lat === undefined) lat = 46.474;
    if(lng === undefined) lng = 30.7557;
    var place = new google.maps.LatLng(lat, lng);
    var options = {
        zoom: 14,
        center: place,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('map'), options);
    google.maps.event.addListener(map, 'click', function (event) {
        //addMarker(event.latLng);
        var loc = event.latLng;
        alert(loc);
        console.log(loc.lat());
        console.log(loc.lng());
    });
}

$(document).ready(function(){
    $(".container").css('background-color', 'rgba(255, 255, 255, 0.9');
    $("#bike .thumb").hover(
        function()
        {
            $(".thumb_menu").fadeIn(200);
        },
        function()
        {
            $(".thumb_menu").fadeOut(200);
        }
    );
    $(".thumb_menu a").click(function()
    {
        $(".thumb_menu").fadeOut(200);
    });
    
    
    $("#popup_photo #close").click(function()
    {
        $("#popup_photo").fadeOut(50);
        $("#dark_back").fadeOut(100);
    });
    
    $("#bike #thumb_photo").click(function()
    {
        $("#dark_back").fadeIn(100);
        $("#popup_photo").fadeIn(50);
        
    });
    
    
    $("#dark_back").click(function()
    {
        if($("#popup_photo").css("display") != "none")
        {
            $("#popup_photo").fadeOut(50);
            $("#dark_back").fadeOut(100);
        }
        
    });

});