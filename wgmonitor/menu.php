<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
 				<!-- for colorate active link use: <li class="active"> -->
  				<li id="Home"><a onClick="$( '#contentLeftColumn' ).load( 'start.php' ); $( '#Home' ).addClass('active');"> <span class="glyphicon glyphicon-home"></span> Übersicht </a></li>
  				<li id="LVB"><a onClick="$( '#contentLeftColumn' ).load( 'lvb.php' );"> <span class="glyphicon glyphicon-th-list"></span> LVB Info </a></li>
  				<li id="Kalender"><a onClick="$( '#contentLeftColumn' ).load( 'timetable.php' );"> <span class="glyphicon glyphicon-calendar"></span> Kalender </a></li>
  				<li id="Bilder"><a onClick="$( '#contentLeftColumn' ).load( 'gallery.php' );"> <span class="glyphicon glyphicon-camera"></span> Bilder </a></li>
  				<!--<li id="Einkaufsliste"><a onClick="$( '#contentLeftColumn' ).load( 'buy.php' );"> <span class="glyphicon glyphicon-shopping-cart"></span> Einkaufsliste </a></li>
        		<li id="Chefkoch"><a onClick="$( '#contentLeftColumn' ).load( 'chefkoch.php' );"> <span class="glyphicon glyphicon-cutlery"></span> Chefkoch </a></li>-->
        
  				<li id="Guestbook"><a onClick="$( '#contentLeftColumn' ).load( 'guestbook.php' );"> <span class="glyphicon glyphicon-comment"></span> Gästebuch </a></li>
  
  				<!--<li id="test"><a onClick="$( '#contentLeftColumn' ).load( 'test.php' );"> Test </a></li>-->
			</ul>
            <p class="navbar-text"><small>WG Monitor Version 0.7.1</small></p>
            <ul class="nav navbar-nav navbar-right">
            	<li><a href=""> Aktuelle Temperatur: <span id="temp"></span> </a></li>
  				<li><a href=""> <span id="curTime"></span> Uhr </a></li>
            </ul>
		</div>
	</div>
</nav>