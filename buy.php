 <span class="help-block"></span>

 <form  role="form" method="post" id="shopform" class="form-horizontal" >

    <div class="input-group">
      <input type="text" class="webform form-control" id="name" name="name" style="width: 80%" required placeholder="Was wird benötigt?">
      <input type="text" class="webform form-control" id="quantity" name="quantity" style="width: 20%;"  placeholder="Anzahl">
      <span class="input-group-btn">
        <button class="webform btn btn-primary" type="submit" id="btnSuccess" >Hinzufügen</button>
      </span>
    </div><!-- /input-group -->
  </form>

<hr>
<div class="row">
  <div class="col-md-12">
      <table class="table table-striped">
          <thead>
            <tr>
                <th style="width: 70%">Artikel</th>
                <th style="width: 20%" class="text-center">Anzahl</th>
                <th style="width: 10%" class="text-center">Erledigt?</th>
            </tr>
          </thead>
          <tbody>
<?php
	require_once("common/dbConfig.php");

// Abrufen der Daten
$kommando = $VERBINDUNG->query("SELECT `id`, `name`, `quantity`, `check`, `timestamp`
                                FROM `shoppingList` ORDER BY  `timestamp` DESC ");
$listitem = $kommando->fetchAll(PDO::FETCH_OBJ);

foreach ($listitem as $item) {
	$itemNumber = $item->id;

    $checkAttribute = "";

    if ($item->check == "1"){
        $checkAttribute = "checked";
    }

 echo ' <tr>
            <td>'.$item->name .'</td>
		    <td class="text-center">' .$item->quantity .'</td>
            <td class="text-center"><input type="checkbox" '.$checkAttribute.'></td>
        </tr>';
}
?>
              </tbody>
          </table>
	</div>

</div>



<script>
			$(document).ready(function(){
				//$("button").click(function(){
				$("#shopform button[type=submit]").click(function(){
				//$("#quickcontact").submit(function(){
			    	// Felder aus dem Formular auslesen

			    	var name = $("#shopform #name");
					var quantity = $("#shopform #quantity");

			    	// Aus den Daten die Anfrage für das PHP-Skript zusammensetzen
					var data  = 'name=' + name.val() + '&quantity='  + quantity.val();

			    	// Die Formularelemente deaktivieren und dem Benutzer
			    	// anzeigen, dass das Formular versendet wird
			    	$("#shopform .webform").prop("disabled", true);
			    	// Die Anfrage an das PHP-Skript abschicken

			    	$.ajax({

			        	url: "common/shopentry.php", // Der Pfad des PHP-Skriptes
			        	type: "POST",
			        	data: data,
                        success: function (answer) {
								//alert(answer);

								$("#shopform .webform").prop("disabled", false);
                          		if(answer == "success"){ // Nachricht wurde erfolgreich verschickt
                           				// Die Eingabefelder leeren
										//alert("Success kommt zurück");
                          				$("#shopform input, #shopform input").val("");

			                			$("#shopform #btnSuccess").toggleClass("btn-success", 1000);
										$( '#contentLeftColumn' ).load( 'buy.php',1000);

            					} else {// Es wurden nicht alle Felder ausgefüllt
                        				// Entsprechendes Feld rot markieren
										// $("#" + answer).css({"border": "#F00 1px solid"});
                        				$("#" + answer).parent().addClass("has-error").addClass("has-feedback");
                        		}
                		}
            		});
			    	// Eigentliches Abschicken des Formulars verhindern,
			    	// damit die Seite nicht neu lädt
			    	return false;
				});
			});
</script>
