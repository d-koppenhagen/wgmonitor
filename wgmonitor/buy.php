<?php
require_once("Config.class.php");
Config::init();
?>
<!DOCTYPE HTML>
<html>
<?php require "head.php";?>

<body>
<div class="row">
  <div class="col-md-8">
  	<?php require "menu.php";?>
    <div class="content">
    <span class="help-block">
    <form action="" method="post"  class="form-inline" role="form">
		<div class="row">
  			<div class="col-xs-7">
  				<input type="text" class="form-control" id="name" placeholder="Artikelname"  name="name" required autofocus="autofocus" style="width:100%;">
            </div>
  			<div class="col-xs-3">
    			<input type="text" class="form-control" id="quantity" placeholder="Anzahl / Menge"  name="quantity" style="width:100%;">
  			</div>
       		<div class="col-xs-2">
        		<button class="btn btn-default btn-block" type="submit">Hinzufügen</button>     
        	</div>
        </div>
    </form>
    <span class="help-block">
    </div>
    <div class="content">
    <?php
// Datenbank-Host und Datenbank-Name
$SERVER = "mysql:host=localhost;
                 dbname=shoppingList";
$BENUTZER = "dbadmin"; // Datenbank-User (Benutzername)
$PASSWORT = "Kudewe58"; // Datenbank-Passwort

// Zeichensatz UTF-8 bei der Verbindung setzen
$OPTION = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

try {
 // Verbindung zur Datenbank aufbauen
 $VERBINDUNG = new PDO($SERVER, $BENUTZER, $PASSWORT, $OPTION);
}
catch (PDOException $e) {
 // Bei einer fehlerhaften Verbindung eine Nachricht ausgeben
 echo $e->getMessage();
}



// Wurde das Formular abgesendet
if ($_SERVER["REQUEST_METHOD"] == "POST") {

 // Nachricht eintragen
 // $var->prepare() bereitet die Anweisung für die Ausführung vor.
 $kommando = $VERBINDUNG->prepare("INSERT INTO `liste`
                                   SET
                                    `name`     = :name,
                                    `quantity` = :quantity,
									`bought`   = 0");

 // $var->bindParam() bindet einen Parameter an den angegebenen Variablennamen
 // (die Platzhalter werden mit den POST-Variablen ersetzt).
 $kommando->bindParam(':name', $_POST["name"]);
 $kommando->bindParam(':quantity', $_POST["quantity"]);

 // $var->execute() führt die vorbereitete Anweisung aus
 if ($kommando->execute()) {
  echo '';
 }
}
?>



    <?php

// Abrufen der Daten
$kommando = $VERBINDUNG->query("SELECT `id`, `name`, `quantity`, `bought`
                                FROM `liste` ORDER BY  `id` DESC ");
$listitem = $kommando->fetchAll(PDO::FETCH_OBJ);

echo '<table class="table table-striped">
        <tr>
          <th width="80%">Artikel</th>
          <th style="text-align:center;">Anzahl</th>
        </tr>';
foreach ($listitem as $item) {
 echo '<tr><td>' .$item->name . '</td>' .
  	   '<td style="text-align:center;">' .$item->quantity .'</td></tr>';
}
echo '</table>';

?>
    <button class="btn btn-default btn-block" type="submit">Erledigte Einträge löschen</button>
  </div>
</div>  
	<?php require "sidebar.php";?>
</div>
</body>
</html>
