 <span class="help-block"></span>
 
 <form  role="form" method="post" id="gbform" class="form-horizontal" >
    <div class="row">
      <div class="col-xs-10">
        <div class="form-group">
        <label for="name"  class="col-sm-2 control-label">Dein Name:</label>
        <div class="col-sm-10">
        <input type="text" class="webform form-control" id="name" placeholder="Whitey Wei&szlig;mann"  name="name" required style="width:100%" onfocus="jsKeyboard.focus(this);clean(this);placeholder=''" />
      	</div>
        </div>
        <div class="form-group">
        <label for="nachricht"  class="col-sm-2 control-label">Deine Nachricht</label>
        <div class="col-sm-10">
        <textarea type="text" class="webform form-control" id="nachricht" placeholder="Hier könnte deine Nachricht stehen"  name="nachricht" required  rows="4" style="width:100%" onfocus="jsKeyboard.focus(this);clean(this);placeholder=''"  />
        </div>
        </div>
      </div>
      <div class="col-xs-2">
        <button class="webform btn btn-primary btn-block btn-lg" type="submit" id="btnSuccess" style="height:152px;"><span class="glyphicon glyphicon-plus"></span><br><br>Eintrag<br>hinzufügen</span></button>
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
<div class="well">
  	<div class="row">
		<div class="col-md-3" style="border-right:dashed;">
    			<h4>'.$item->name .'</h4>
				am ' .date('d.m.Y', strtotime($item->timestamp)) .'
				um ' .date('H:i', strtotime($item->timestamp)) .'
		</div>
		<div class="col-md-9">
			   ' .$item->text .'
		</div>
	</div>
 </div>
 

';
}



/*<div class="panel panel-default">
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
</div>*/


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
