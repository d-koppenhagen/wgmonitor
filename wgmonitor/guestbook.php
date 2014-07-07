 <span class="help-block"></span>
 
 <form  role="form" method="post" class="form-inline" id="gbform">
    <div class="row">
      <div class="col-xs-6">
        <input type="text" class="webform form-control" id="name" placeholder="Dein Name"  name="name" required style="width:100%" onfocus="jsKeyboard.focus(this);clean(this);placeholder=''" />
      </div>
      <div class="col-xs-6">
        <button class="webform btn btn-default btn-block" type="submit" id="btnSuccess">Einen neuen Eintrag Hinzufügen</button>
      </div>
    </div>
    <span class="help-block"></span>
    <div class="row">
      <div class="col-xs-12">
        <textarea type="text" class="webform form-control" id="nachricht" placeholder="Dein Text"  name="nachricht" required  rows="6" style="width:100%" onfocus="jsKeyboard.focus(this);clean(this);placeholder=''"  />
      </div>
    </div>
  </form>
	
<hr>
<div class="row">
  <div class="col-md-12">
<?php
	require_once("common/dbConfig.php");

// Abrufen der Daten
$kommando = $VERBINDUNG->query("SELECT `id`, `name`, `text`, `timestamp`
                                FROM `guestbook` ORDER BY  `timestamp` DESC ");
$listitem = $kommando->fetchAll(PDO::FETCH_OBJ);

foreach ($listitem as $item) {
	$itemNumber = $item->id;
 echo '
 
 <div class="panel panel-default">
  <div class="panel-heading">
  	<div class="row">
		<div class="col-md-9">
    		<h2 class="panel-title">'.$item->name .'</h2>
		</div>
		<div class="col-md-3 text-right">
			am ' .date('d.m.Y', strtotime($item->timestamp)) .'
			um ' .date('H:i', strtotime($item->timestamp)) .'
		</div>
	</div>
  </div>
  <div class="panel-body">
    ' .$item->text .'
  </div>
</div>
';
}

?>
	</div>
</div>



<script>
			$(document).ready(function(){
				//$("button").click(function(){
				$("#gbform button[type=submit]").click(function(){
				//$("#quickcontact").submit(function(){
			    	// Felder aus dem Formular auslesen

			    	var name = $("#gbform #name");
					var nachricht = $("#gbform #nachricht");

			    	// Aus den Daten die Anfrage für das PHP-Skript zusammensetzen
					var data  = 'name=' + name.val() + '&nachricht='  + encodeURIComponent(nachricht.val());

			    	// Die Formularelemente deaktivieren und dem Benutzer 
			    	// anzeigen, dass das Formular versendet wird
			    	$("#gbform .webform").prop("disabled", true);
			    	// Die Anfrage an das PHP-Skript abschicken

			    	$.ajax({
						
			        	url: "common/gbentry.php", // Der Pfad des PHP-Skriptes
			        	type: "POST",        
			        	data: data,
                        success: function (answer) {
								//alert(answer);
								
								$("#gbform .webform").prop("disabled", false);
                          		if(answer == "success"){ // Nachricht wurde erfolgreich verschickt								
                           				// Die Eingabefelder leeren
										//alert("Success kommt zurück");
                          				$("#gbform input, #gbform textarea").val("");

			                			$("#gbform #btnSuccess").toggleClass("btn-success", 1000);
										$( '#contentLeftColumn' ).load( 'guestbook.php',1000);

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
