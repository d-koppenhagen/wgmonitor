<?php
	require("dbConfig.php");

    if($_POST[name] == ''){exit ("name");}
    if($_POST[quantity] == ''){exit ("quantity");}

    // Felder in Variablen schreiben (optional)
    $name = $_POST[name];
    $quantity = $_POST[quantity];
 			// Nachricht eintragen
 			// $var->prepare() bereitet die Anweisung für die Ausführung vor.
 			/*$kommando = $VERBINDUNG->prepare("INSERT INTO `guestbook`
                                   SET
                                    `name` = :name,
                                    `text` = :nachricht");*/
			// escape variables for security
			//$firstname = mysqli_real_escape_string($VERBINDUNG, $_POST['name']);
			//$lastname = mysqli_real_escape_string($VERBINDUNG, $_POST['nachricht']);

			$sql="INSERT INTO `wg`.`shoppingList` (`id`, `name`, `quantity`, `check`, `timestamp`) VALUES (NULL, '".$name."', '".$quantity."', '0', CURRENT_TIMESTAMP);";

			$kommando = $VERBINDUNG->prepare($sql);
 			// $var->bindParam() bindet einen Parameter an den angegebenen Variablennamen
 			// (die Platzhalter werden mit den POST-Variablen ersetzt).
 			$kommando->bindParam(':name', $_POST["name"]);
 			$kommando->bindParam(':quantity', $_POST["quantity"]);

 			// $var->execute() führt die vorbereitete Anweisung aus
 			if ($kommando->execute()) {
  				echo '';
 			}
 			// $var->bindParam() bindet einen Parameter an den angegebenen Variablennamen
 			// (die Platzhalter werden mit den POST-Variablen ersetzt).
 			//$kommando->bindParam(':name', $_POST["name"]);
 			//$kommando->bindParam(':text', $_POST["nachricht"]);
 			// $var->execute() führt die vorbereitete Anweisung aus
 			//$kommando->execute();
	    echo "success";
?>
