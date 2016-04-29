var thereIsAMarker = false;

var map = new GMaps({
  el: '#admin-map',
  lat: 51.2154075,
  lng: 4.409795,
  zoom: 12
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
