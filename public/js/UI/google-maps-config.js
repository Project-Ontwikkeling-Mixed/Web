var thereIsAMarker = false;
var maphidden = true;

$('#admin-map').slideUp();


var map = new GMaps({
        el: '#admin-map',
        lat: 51.2154075,
        lng: 4.409795,
        zoom: 12
    });


hideAdminMap = function(){
    $('#admin-map').slideUp();
    $('#locatie-status').text("Er werd succesvol een locatie gekozen");
    $('#admin-map-link').text("Klik hier om de locatie te wijzigen");
}

showAdminMap = function(){
    
    $('#admin-map').slideDown();
    $('#admin-map-link').text("Klik hier indien de locatie is gekozen");
        
}



$('#admin-map-link').click(function(){
    if(maphidden){
        showAdminMap();
        maphidden = false;
    }
    
    else if(!maphidden && thereIsAMarker){
        hideAdminMap();
        maphidden = true;
    }
    
    else if(!maphidden && !thereIsAMarker){
        //hier kan een melding komen
    }
});



GMaps.on('click', map.map, function(event) {
    console.log(thereIsAMarker);
    
    if(thereIsAMarker){
        map.removeMarkers();
        }
    
        var index = map.markers.length;
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();
    
        $('#locatie-input').val(lat+','+lng);
        


        map.addMarker({
          lat: lat,
          lng: lng,
    });

    thereIsAMarker = true;
    
    
  });