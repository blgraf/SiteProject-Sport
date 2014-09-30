<html>
	<head> 
        <title>Broadsport - Sportveranstaltungen in der Nähe</title>
        <meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" >
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
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
                                <li><a href="submit.php">Veranstaltung eintragen</a></li>
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
        
            <h1>Broadsport - Sportveranstaltungen in der Nähe</h1>
            <h2>News / Updates</h2>
        
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
                $title = $_POST['Titel'];
                $descript = $_POST['Kurze_beschreibung'];
                $sportart = $_POST['sportart'];
                $continent = $_POST['continent'];
                $reach = $_POST['reichweite'];
                $adress = $_POST['Adresse'];
                $zip = $_POST['PLZ'];
                $city = $_POST['Stadt'];
                $dte = $_POST['Datum'];
                $time = $_POST['Uhrzeit'];
                */
                ?>
            
            </table>
        </div>
    </body>
</html>
