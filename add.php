<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="leaflet/leaflet.css">
        <script language="javascript" type="text/javascript" src="js/bootstrap.js"></script>
        <title>
            Broadsport.ch
        </title>
		
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
                                <li><a href="About.html">About</a></li>
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
            
            <?php	

                require_once('php/connect.php');

                $table = "events";
                $sent = $_POST['send'];
                $title = htmlentities($_POST['Titel']);
                $descript = htmlentities($_POST['Kurze_beschreibung']);
                $sportart = htmlentities($_POST['sportart']);
                $continent = htmlentities($_POST['continent']);
                $reach = htmlentities($_POST['reichweite']);
                $adress = htmlentities($_POST['Adresse']);
                $zip = htmlentities($_POST['PLZ']);
                $city = htmlentities($_POST['Stadt']);
                $year = htmlentities($_POST['Jahr']);
                $month = htmlentities($_POST['Monat']);
                $day = htmlentities($_POST['Tag']);
                $hour = htmlentities($_POST['Stunde']);
                $minutes = htmlentities($_POST['Minute']);
                $errors = array();
                
                if (isset($sent) {
                    
                    //variablen auf Inhalt prüfen und ggf. den Fehler (hier einfach der Feldname) in das Array $errors packen.
                    if ($title == '') {
                        $errors[] = 'Titel'
                    }
                    if ($descript = '') {
                        $errors[] = 'Beschreibung';
                    } 
                    if ($year = '') {
                        $errors[] = 'Jahr';
                    } else {
                        if ($year = !(> 2014 && <2030)){
                            $errors[] = 'Inkorrektes Jahr';
                        }
                    }
                    if ($month = '') {
                        $errors[] = 'Monat';
                    } else {
                        if ($month = !(> 0 && <13)) {
                            $errors[] = 'Inkorrekter Monat';
                        }
                    }
                    if ($day = '') {
                        $errors[] = 'Tag';
                    } else {
                        if ($month = 02 || 2) {
                            if ($day = >29) {
                                $errors[] = 'Unmöglicher Tag';
                            }
                        }
                    }
                    if ($hour = '') {
                        $errors[] = 'Stunde';
                    } 
                    if ($miutes = '') {
                        $errors[] = 'Minute';
                    }
                }
                
                
                /*if(isset($sent)){
                    $sql = "INSERT INTO `".$table."` (`id` ,`title`, `description` , `sportart`, `continent`, `reach`, `adress`, `zip`,                         `city`, `jahr`, `monat`, `tag`, `stunde`, `minute`) 
                    VALUES 
                    ('', '".$title."', '".$descript."', '".$sportart."', '".$continent."', '".$reach."', '".$adress."', '".$zip."',                             '".$city."', '".$year."', '".$month."', '".$day."', '".$hour."', '".$minutes."');";
                    dbDo($sql);
                }*/

            ?>
            
            
            <br>
            <h2>Eigene Veranstaltung eintragen</h2>
            <p>
            Hier kannst Du eine neue Veranstaltung eintragen.
            </p>
            <form method="POST" action="success.php">
            <table  style="background-color:silver" class="table table-hover" border="2" cellpadding="2">
				
                <tr>
                    <td>
                        Titel
                    </td>
                    <td>
                        <input type="text" name="Titel" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Kurze beschreibung
                    </td>
                    <td>
                        <input type="text" name="Kurze_beschreibung"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Webseite des Veranstalters
                    </td>
                    <td>
                        <input type="text" name="Webseite" value="<?php echo $_website; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Sportart
                    </td>
                    <td>
                        <select name="sportart">
                            <option value="Fussball">Fusball</option>
                            <option value="Basketball">Basketball</option>
                            <option value="Handball">Handball</option>
                            <option value="Volleyball">Volleyball</option>
                            <option value="Tennis">Tennis</option>
                            <option value="Rugby">Rugby</option>
                            <option value="Tischtennis">Tischtennis</option>
                            <option value="Squash">Squash</option>
                            <option value="Eis Hockey">Eis Hockey</option>
                            <option value="Rennrodeln">Rennrodeln</option>
                            <option value="Skeleton">Skeleton</option>
                            <option value="Alpine Skiing">Alpine Skiing</option>
                            <option value="Freestyle Skiing">Freestyle Skiing</option>
                            <option value="Speed Skating">Eisschnelllauf</option>
                            <option value="Baseball">Baseball</option>
                            <option value="Cricket">Cricket</option>
                            <option value="Andere">Anderes</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Kontinent
                    </td>
                    <td>
                        <select name="continent">
                            <option value="Europa">Europa</option>
                            <option value="America">Amerika</option>
                            <option value="Asien">Asien</option>
                            <option value="Afrika">Afrika</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Reichweite
                    </td>
                    <td>
                        <select name="reichweite">
                            <option value="Lokal">Lokal</option>
                            <option value="National">National</option>
                            <option value="Kontinental">Kontinental</option>
                            <option value="Weltweit">Weltweit</option>
                            <option value="Olympisch">Olympisch</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Adresse
                    </td>
                    <td>
                        <input type="text" name="Adresse" />
                    </td>
                </tr>
                <tr>
                    <td>
                        PLZ
                    </td>
                    <td>
                        <input type="text" name="PLZ" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Stadt
                    </td>
                    <td>
                        <input type="text" name="Stadt" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Datum (JJJJ-MM-TT)
                    </td>
                    <td>
                        <input type="text" name="Jahr" maxlength="4" size="3" />
                        &nbsp;
                        <input type="text" name="Monat" maxlength="2" size="1" />
                        &nbsp;
                        <input type="text" name="Tag" maxlength="2" size="1" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Uhrzeit (SS-HH)
                    </td>
                    <td>
                        <input type="text" name="Stunde" maxlength="2" size="1" />
                        &nbsp;
                        <input type="text" name="Minute" maxlength="2" size="1" />
                    </td>
                </tr>
				
				
            </table>	         
            
            <!-- Map 2.0 -->
            <div id="map" style="height: 250px;"></div>
            <script src="leaflet/leaflet.js"></script>
            <script>
            var map = L.map('map').setView([46.951083, 7.438639], 16);
                
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
                maxZoom: 18
                }).addTo(map);
				
			
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
			});
            </script>
                
            <br>
            <input type=submit name=send value="Send">
			<input type="reset" />
            </form>
            
            
            <br><br><br><br>
        </div>
    </body>
</html>