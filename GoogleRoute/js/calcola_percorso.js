var directionsDisplay = new google.maps.DirectionsRenderer();
var directionsService = new google.maps.DirectionsService();
var map;
var myLatlng;
var idDirection;

/* This is the first function to be called when the window is loaded. 
 * div_id_map = the div id in which the google map is drawn
 * div_id_percorso = the div id in which the route is shown
 * latitudine = latitude of your place address
 * longitudine = longitude of your place address
 * title = is the title of your place marker
 * info = is the info you can see when your mouse is over the place marker 
 */
function initialize(div_id_map, div_id_percorso, latitudine, longitudine, title, info) {
    /* Creates the renderer with the given options. Directions can be rendered on a map 
     * (as visual overlays) or additionally on a <div> panel (as textual instructions).
     */
    directionsDisplay = new google.maps.DirectionsRenderer();
    idDirection = div_id_percorso;
    
    /* Creates a LatLng object representing a geographic point. */
    myLatlng = new google.maps.LatLng(latitudine, longitudine); 
    /* Creates a LatLng object representing a geographic point. 
     * This could be different from the previous one because
     * this point could be used as position centre of the map
     */
    var myPosCenter = new google.maps.LatLng(latitudine, longitudine);
    
    /* we define a set of options for the object Map */
    var mapOptions = {
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP, // This map type displays a normal street map.
        center: myPosCenter
    }
    /* Creates a new map inside of the given HTML container, which is typically a DIV element.
     * We give a set of mapOptions */
    map = new google.maps.Map(document.getElementById(div_id_map), mapOptions);
    
    /* Creates a marker with the options specified. 
     * If a map is specified, the marker is added to the map upon construction. 
     * Note that the position must be set for the marker to display.
     */
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: title
    });
    var contentString = info;

    /* Creates an info window with the given options. 
     * An InfoWindow can be placed on a map at a particular position 
     * or above a marker, depending on what is specified in the options.
     */
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
    
    /* Adds the given listener function to the given event name.  */
    google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map, marker);
    });

}

/* This function is called when you push on button 'mostra percorso' and show the route */
function calcRoute() {
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById(idDirection));
    var end = myLatlng;
    var start = document.getElementById("fd_via").value + ", " + document.getElementById("fd_comune").value + ", " + document.getElementById("fd_provincia").value + ", " + document.getElementById("fd_stato").value;
    var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };
    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        } else {
            alert("impossibile trovare indirizzo specificato")
        }
    });
}

/* This function delete the route from the div and initialize again the map div. */
function delRoute() {
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
