<?php


	require("dbConfig.php");
	// Wurde das Formular abgesendet
	//if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Überprüfen, ob alle Felder korrekt ausgefüllt wurden
    // und ggf. fehlende Daten an JavaScript zurückgeben (auf Reihenfolge achten)
    if($_POST[name] == ''){exit ("name");}
    if($_POST[nachricht] == ''){exit ("nachricht");}

    // Felder in Variablen schreiben (optional)
    $name = $_POST[name];
    $nachricht = $_POST[nachricht];



			$sql="INSERT INTO `wg`.`guestbook` (`id`, `name`, `text`, `timestamp`) VALUES (NULL, '".$name."', '".$nachricht."', CURRENT_TIMESTAMP);";

			$kommando = $VERBINDUNG->prepare($sql);

 			// $var->bindParam() bindet einen Parameter an den angegebenen Variablennamen
 			// (die Platzhalter werden mit den POST-Variablen ersetzt).
 			$kommando->bindParam(':name', $_POST["name"]);
 			$kommando->bindParam(':text', $_POST["nachricht"]);

 			// $var->execute() führt die vorbereitete Anweisung aus
 			if ($kommando->execute()) {
  				echo '';
 			}
            echo "success";

?>
