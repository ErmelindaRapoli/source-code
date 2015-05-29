var directionsDisplay = new google.maps.DirectionsRenderer();
var directionsService = new google.maps.DirectionsService();
var map;
var myLatlng;
var idDirection;

function initialize(div_id_map, div_id_percorso, latitudine, longitudine, title, info) {
	directionsDisplay = new google.maps.DirectionsRenderer();
	idDirection = div_id_percorso;
	myLatlng = new google.maps.LatLng(latitudine, longitudine);
        var myPosCenter = new google.maps.LatLng(latitudine, longitudine);
	var mapOptions = {
			zoom:14,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			center: myPosCenter
    }
	map = new google.maps.Map(document.getElementById(div_id_map), mapOptions);
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: title
    });
	var contentString = info;

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
	google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });

}

function calcRoute() {
  	directionsDisplay.setMap(map);
	directionsDisplay.setPanel(document.getElementById(idDirection));
	var end = myLatlng;
	var start = document.getElementById("fd_via").value + ", " + document.getElementById("fd_comune").value + ", " + document.getElementById("fd_provincia").value +", " + document.getElementById("fd_stato").value;
	var request = {
	    origin:start,
	    destination:end,
	    travelMode: google.maps.DirectionsTravelMode.DRIVING
	};
	directionsService.route(request, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			directionsDisplay.setDirections(response);
		} else {
			alert("impossibile trovare indirizzo specificato")
		}
	});
}
  
function delRoute(){
  	directionsDisplay.setMap(null);
	directionsDisplay.setPanel(null);
        
        var idMap = 'map_canvas';
	var idPercorso = 'map_directions';
	var latitudineMarker = 40.1824798;
	var longitudineMarker = 17.9136483;
	var infoMarker = 'Porto Selvaggio';
	var titleMarker = 'Parco Naturale Regionale di Porto Selvaggio'

	initialize(idMap, idPercorso, latitudineMarker, longitudineMarker, titleMarker, infoMarker);
}
