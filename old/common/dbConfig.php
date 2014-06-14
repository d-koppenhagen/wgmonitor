<?php
$SERVER = "mysql:host=localhost;
             dbname=shoppingList";
$BENUTZER = "root"; // Datenbank-User (Benutzername)
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
?>
