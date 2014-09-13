<?php
	require_once("dbConfig.php");

// Abrufen der Daten
$kommando = $VERBINDUNG->query("SELECT * FROM `guestbook` ORDER BY  `timestamp` DESC ");
$listitem = $kommando->fetchAll(PDO::FETCH_OBJ);

echo json_encode($listitem);
?>
