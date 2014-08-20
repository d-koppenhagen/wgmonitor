<h2>Verwaltung des Infoscreens</h2>
<hr>
<h3>LVB-Anzeige:</h3>
<div class="row">
   <div class="col-lg-3">
    <p>Anzahl der Verbindungen:</p>
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-2">
    <div class="input-group">
      <input type="text" class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">OK</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /row -->


<h3>Farblayout ändern:</h3>
<button type="button" class="btn btn-primary btn-lg center-block" onclick="
$( 'html, head').css('background-color','#000037');

$( 'body , .table-striped' ).css('background-color','#000037');
$( '.table-striped > tbody > tr:nth-child(odd) > td, .table-striped > tbody > tr:nth-child(odd) > th' ).css('background-color','#004877');

" style="width:100%"><span class="glyphicon glyphicon-cog" ></span><br>Hintergundfarbe ändern</button>
