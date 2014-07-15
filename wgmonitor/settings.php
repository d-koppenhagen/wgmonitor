<h2>Verwaltung des Infoscreens</h2>
<hr>
<h3>Farblayout ändern:</h3>
<button type="button" class="btn btn-primary btn-lg center-block" onclick="
$( 'html, head').css('background-color','#000037');

$( 'body , .table-striped' ).css('background-color','#000037');
$( '.table-striped > tbody > tr:nth-child(odd) > td, .table-striped > tbody > tr:nth-child(odd) > th' ).css('background-color','#004877');

" style="width:100%"><span class="glyphicon glyphicon-cog" ></span><br>Hintergundfarbe ändern</button>