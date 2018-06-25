function initMap() {
  var myLatLng = {
  lat: 55.781827, 
  lng: 37.555483};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 17,
    center: myLatLng
  });
  //var image = '../img/location-icon.png';
var image = 'https://cdn2.iconfinder.com/data/icons/iconslandgps/PNG/64x64/Pinpoints/NeedleLeftYellow2.png';
  var marker = new google.maps.Marker({
    position: myLatLng,
    icon:image,
    map: map,
    title: 'ФинДепо'
  });
  marker.setMap(map);
}
