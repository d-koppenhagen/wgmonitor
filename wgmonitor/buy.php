 <span class="help-block"></span>

<div class="content">
  <form action="" method="POST"  class="form-inline" role="form">
    <div class="row">
      <div class="col-xs-7">
        <input type="text" class="form-control" id="name" placeholder="Artikelname"  name="name" required style="width:100%;"/>
      </div>
      <div class="col-xs-3">
        <input type="text" class="form-control" id="quantity" placeholder="Anzahl / Menge"  name="quantity" style="width:100%;" />
      </div>
      <div class="col-xs-2">
        <button class="btn btn-default btn-block" type="submit" name="insert_button">Hinzufügen</button>
      </div>
    </div>
  </form>
  <span class="help-block"> </div>
<div class="content">
  <?php

	require_once("common/dbConfig.php");
	// Wurde das Formular abgesendet
	if ($_SERVER["REQUEST_METHOD"] == "POST") {


		if (isset($_POST['insert_button'])){


 			// Nachricht eintragen
 			// $var->prepare() bereitet die Anweisung für die Ausführung vor.
 			$kommando = $VERBINDUNG->prepare("INSERT INTO `shoppingList`
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


		if (isset($_POST['delete_button'])) {
			$VERBINDUNG->prepare("DELETE FROM shoppingList WHERE BOUGHT = 1")->execute();
			//$sql->execute();
			 				echo"<script>javascript: alert('Btn wirft!')</script>";

		}


	}

?>


  <?php

// Abrufen der Daten
$kommando = $VERBINDUNG->query("SELECT `id`, `name`, `quantity`, `bought`
                                FROM `shoppingList` ORDER BY  `id` DESC ");
$listitem = $kommando->fetchAll(PDO::FETCH_OBJ);

echo '<table class="table table-striped">
        <tr>
          <th width="70%">Artikel</th>
          <th style="text-align:center;">Anzahl</th>
		  <th style="text-align:center;">erledigt?</th>
        </tr>';
foreach ($listitem as $item) {
	$itemNumber = $item->id;
 echo '<tr>
 			<td>' .$item->name . '</td>
			<td style="text-align:center;">' .$item->quantity .'</td>
			<td style="text-align:center;">
				<button  type="button" class="btn btn-primary" id="'.$itemNumber.'" onSubmit="'.$VERBINDUNG->prepare("UPDATE shoppingList SET bought=1 WHERE id=$itemNumber")->execute().'">
				<span class="glyphicon glyphicon-shopping-cart"></span></button> '.$item->bought.'
			</td>
	   </tr>';
}
echo '</table>';

?>
  <form action="" method="POST"  class="form-inline" role="form">
    <button class="btn btn-default btn-block" type="submit" name="delete_button" onclick="return confirm('Möchtest du wirklich alle erledigten Einträge löschen?');">Liste leeren</button>
  </form>
</div>
