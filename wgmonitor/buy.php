    <span class="help-block"></span>

    <div class="content">
    <form action="" method="post"  class="form-inline" role="form">
		<div class="row">
  			<div class="col-xs-7">
  				<input type="text" class="form-control" id="name" placeholder="Artikelname"  name="name" required autofocus style="width:100%;" onfocus="jsKeyboard.focus(this);clean(this);placeholder=''" ontouchstart="jsKeyboard.focus(this);clean(this);placeholder=''" >
            </div>
  			<div class="col-xs-3">
    			<input type="text" class="form-control" id="quantity" placeholder="Anzahl / Menge"  name="quantity" style="width:100%;" >
  			</div>
       		<div class="col-xs-2">
        		<button class="btn btn-default btn-block" type="submit" name="update_button">Hinzufügen</button>     
        	</div>
        </div>
    </form>
    <span class="help-block">
    </div>
    <div class="content">
    
	
	<?php
	
	require_once("common/dbConfig.php");

	// Wurde das Formular abgesendet
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	
	
		if (isset($_POST['update_button'])){
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
		
		
		if (isset($_POST['delete_button'])) {	
			$VERBINDUNG->prepare("DELETE FROM liste WHERE BOUGHT = 1")->execute();
			//$sql->execute();	
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
				<button  type="button" class="btn btn-primary" id="'.$itemNumber.'" onSubmit="'.$VERBINDUNG->prepare("UPDATE liste SET bought=1 WHERE id=$itemNumber")->execute().'">
				<span class="glyphicon glyphicon-shopping-cart"></span></button> '.$item->bought.'
			</td>
	   </tr>';
}
echo '</table>';

?>

<form action="" method="post"  class="form-inline" role="form">
    <button class="btn btn-default btn-block" type="submit" name="delete_button" onclick="return confirm('Möchtest du wirklich alle erledigten Einträge löschen?');">Liste leeren</button>
</form>
  </div>


<!-- for Keyboard -->
    <!-- show keyboard  -->
    <div id="keyboardIcon" onclick="showKeyboard('txtContent');"></div>

    <!-- Script zum erkennen mobiler Endgeräte -->
	<script type="text/javascript">    
        // check wether to enable onscreeenkeyboard or not
        var keyboardEnabled = localStorage.getItem("EnableOnscreenKeyboard");
        if (keyboardEnabled == "true") {
            document.write("<div id=\"virtualKeyboard\"></div>");
        }
	</script>
    
    <script type="text/javascript" src="js/jsKeyboard.js"></script>

    <script type="text/javascript">
        $(function () {
            jsKeyboard.init("virtualKeyboard");
            $("#txtContent").val(initText);
        });

        function focusIt(t) {
            // define where the cursor is to write character clicked.
            jsKeyboard.currentElement = $(t);
            jsKeyboard.show();
        }

        function showKeyboard(id) {
            clean($("#" + id));
            jsKeyboard.currentElement = $("#" + id);
            jsKeyboard.show();
        }
        var isCleaned = false;
        function clean(t) {
            if (!isCleaned) {
                $(t).text("");
                isCleaned = true;
            }
        }
        var initText = "click to here to start writing...";
	</script>
