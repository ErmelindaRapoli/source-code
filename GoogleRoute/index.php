<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>A simple route with google map</title>

        <link href='http://fonts.googleapis.com/css?family=Arvo|Indie+Flower' rel='stylesheet' type='text/css'>

        <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>

        <!-- Import for google map - Begin -->        
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="js/calcola_percorso.js">
        </script>
        <script>
            window.onload = function () {
                var idMap = 'map_canvas';
                var idPercorso = 'map_directions';
                var latitudineMarker = 40.151406;
                var longitudineMarker = 17.967998;
                var infoMarker = 'Porto Selvaggio';
                var titleMarker = 'Parco naturale regionale Porto Selvaggio (LE)'

                initialize(idMap, idPercorso, latitudineMarker, longitudineMarker, titleMarker, infoMarker);
            }
        </script>
        
        <style>
            #map_canvas {

                width: 80%;
                height: 400px;
                border: 1px solid grey;
                margin: 2% 0 0 10%;
                float: left;
            }
            
            #mappa{
                width: 40%;
                float: left;
            }
        </style>
    </head>
    <body>
        <div id="contents">
            <div style="width:100%">
                <div id="map_canvas"></div>

            </div>
        </div>

        <div id="route" Style="width:99%">            
                    <form id="mappa" action='#mappa'class="tsc_form_contact_light nolabel" onSubmit='calcRoute();
                                return false;'>

                        <p>Stato:
                            <input type='text' id='fd_stato' class="form-input"></p>
                        <p>Provincia:
                            <input type='text' id='fd_provincia' class="form-input"  ></p>
                        <p>Comune:
                            <input type='text' id='fd_comune' class="form-input"  ></p>
                        <p>Via:
                            <input type='text' id='fd_via' class="form-input"  ></p>

                        <p  style="float:left" ><input type='submit' value='Mostra percorso' class="form-btn"></p>
                        <p  style="float:left" ><input type='button' value='Cancella percorso' onClick='delRoute();' class="form-btn"></p>

                    </form>
            <div id="map_directions" style="float:right; margin-right:2%;margin-left:2%;width:45%; font-size:12px">
            </div>                
        </div>
        <a name="target"></a>

    </div>


</body>
</html>
