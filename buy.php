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
                $kommando = $VERBINDUNG->query("SELECT `id`, `name`, `quantity`, `check`, `timestamp` FROM `shoppingList` ORDER BY  `timestamp` DESC ");
                $listitem = $kommando->fetchAll(PDO::FETCH_OBJ);

                foreach ($listitem as $item) {
	               $itemNumber = $item->id;
                   $checkAttribute = "";
                    //check if item is already checked
                    if ($item->check == "1"){
                        $checkAttribute = "checked";
                    }
                    echo '<tr>';
                    echo '<td>'.$item->name .'</td>';
                    echo '<td class="text-center">' .$item->quantity .'</td>';
                    echo '<td class="text-center"><input type="checkbox" '.$checkAttribute.'></td>';
                    echo '</tr>';
                }
              ?>
            </tbody>
        </table>
	</div>
</div>
<script>
$(document).ready(function(){
$("#shopform button[type=submit]").click(function(){
   	// read values from form fields
   	var name = $("#shopform #name");
	var quantity = $("#shopform #quantity");
    // create PHP query
    var data  = 'name=' + name.val() + '&quantity='  + quantity.val();
    // Disable elements while process is running
   	$("#shopform .webform").prop("disabled", true);
    // Send PHP query via ajax
    $.ajax({
        url: "common/shopentry.php",
        type: "POST",
        data: data,
        success: function (answer) {
            $("#shopform .webform").prop("disabled", false);
            if(answer == "success"){
                //if php echo is "success"
                $("#shopform input, #shopform input").val("");
                $("#shopform #btnSuccess").toggleClass("btn-success", 1000);
                $( '#contentLeftColumn' ).load( 'buy.php',1000);
            } else {
                //if fields are empty
                $("#" + answer).parent().addClass("has-error").addClass("has-feedback");
            }
        }
    });
    return false;   // return false to disable 'submit'
});
});
</script>
