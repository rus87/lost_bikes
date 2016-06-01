var map;
function map_init()
{
    var lat = $("#lat").text();
    var lng = $("#lng").text();
    var place = new google.maps.LatLng(lat, lng);
    var options = {
        zoom: 14,
        center: place,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('map'), options);
    /*google.maps.event.addListener(map, 'click', function (event) {
        //addMarker(event.latLng);
        var loc = event.latLng;
        alert(loc);
        console.log(loc.lat());
        console.log(loc.lng());
    });*/
    addMarker(place);
}

function addMarker(place)
{
    marker = new google.maps.Marker({
        position: place,
        map: map,
        //shadow: shadow,
        //icon: image,
        //title: "My title!)",
        zIndex: 999
    });
}