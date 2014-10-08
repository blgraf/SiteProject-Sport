<html>
	<head> 
        <title>Broadsport - Sportveranstaltungen in der Nähe</title>
        <meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" >
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="leaflet/leaflet.css">
	</head>
	<body>
        <div class="container">
            <p></p>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collabse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.php">Home</a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="add.php">Veranstaltung eintragen</a></li>
                                <li><a href="about.html">About</a></li>
                            </ul>
                            <!-- <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form> -->
                        </div>
                    </div>
                </div>
            </nav>
            
            <br>
            <h1>Broadsport - Sportveranstaltungen in der Nähe</h1>
            <h2>News / Updates</h2>
            
            <!-- Map 2.0 -->
            <?php
                require_once('php/connect.php');
                
                $myquery = "
                    SELECT  `lat`, `lng` FROM  `events`
                    WHERE `lat` <> 0
                ";
                $query = mysql_query($myquery);
    
                if ( ! $query ) {
                    echo mysql_error();
                    die;
                }
    
                $data = array();
                
            ?>
            
            <div id="map" style="height: 400px"></div>
            
			<script src="leaflet/leaflet.js"></script>
			
            <script>
            var map = L.map('map').setView([46.951083, 7.438639], 16);
                
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
                maxZoom: 18
                }).addTo(map);
				
            <?php
                  echo "var planelatlong = [";
    
                for ($x = 0; $x < mysql_num_rows($query); $x++) {
                    $data[] = mysql_fetch_assoc($query);
                    echo "[",$data[$x]['lat'],",",$data[$x]['lng'],"]";
                    if ($x <= (mysql_num_rows($query)-2) ) {
                        echo ",";
                    }
                }

                echo "];";
            ?>
                
            for (var i = 0; i < planelatlong.length; i++) {
			marker = new L.marker([planelatlong[i][0],planelatlong[i][1]])
				.addTo(map);
            }
            
			/*
			var new_event_marker;

			map.on('click', function(e) {

			if(typeof(new_event_marker)==='undefined')
			{
				new_event_marker = new L.marker(e.latlng,{ draggable: true}).bindPopup('Event Position');
				new_event_marker.addTo(map);        
			}
			else 
			{
				new_event_marker.setLatLng(e.latlng);         
			}
			}); */
            </script>
            
            <table border="1">
                <?php 
                
                //require_once('php/connect.php');
                
                $Connect = mysqli_connect("localhost", "bsport", "PHArU6yU", "evts");

                $sql = "SELECT * FROM events";
 
                $db_erg = mysqli_query( $Connect, $sql );
                if ( ! $db_erg )
                {
                    die('Ungültige Abfrage: ' . mysqli_error($Connect));
                }
 
                
                    while ($zeile = mysqli_fetch_array( $db_erg, MYSQL_ASSOC))
                    {
                        echo "<h3>". $zeile['title'] . " findet am ". $zeile['jahr'] . ".". $zeile['monat'] . ".". $zeile['tag'] . ". um ". $zeile['stunde'] . ":". $zeile['minute'] . " statt.</h3>";
                        /*echo '<table border="1">';
                        echo "<tr>";
                        echo "<td>". $zeile['id'] . "</td>";
                        echo "<td>". $zeile['nachname'] . "</td>";
                        echo "<td>". $zeile['vorname'] . "</td>";
                        echo "<td>". $zeile['akuerzel'] . "</td>";
                        echo "<td>". $zeile['strasse'] . "</td>";
                        echo "<td>". $zeile['plz'] . "</td>";
                        echo "<td>". $zeile['telefon'] . "</td>";
                        echo "</tr>";
                        echo "</table>";*/
                    }
                
                /*
                $table = "events";
                $sent = $_POST['send'];
                $title = htmlentities($_POST['Titel']);
                $descript = htmlentities($_POST['Beschreibung']);
                $sportart = htmlentities($_POST['sportart']);
                $continent = htmlentities($_POST['continent']);
                $reach = htmlentities($_POST['reichweite']);
                $year = htmlentities($_POST['Jahr']);
                $month = htmlentities($_POST['Monat']);
                $day = htmlentities($_POST['Tag']);
                $hour = htmlentities($_POST['Stunde']);
                $minutes = htmlentities($_POST['Minute']);
                $latitude = htmlentities($_POST['lat']);
                $longitude = htmlentities($_POST['lng']);
                */
                ?>
            
            </table>
      
            <br><br><br><br>
        </div>
		</div>
    </body>
</html>
