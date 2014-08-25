<script>
//plan table refresh
	$("#content").load("content.php");
 	var contentRefreshId = setInterval(function(){
 		$("#content").load('content.php');
    },
    <?php
        require_once("Config.class.php");
        Config::init();
        echo Config::$pref['refreshplan'] * 1000 ;
    ?>
    );
</script>
<div class="row" id="content">
    <h4 class="text-center">...loading, please Wait...</h4>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="btn-group btn-group-justified">
            <div class="btn-group btn-group-lg">
                <button type="button" class="btn btn-default btn-lg" onClick="$( '#contentLeftColumn' ).load( 'liniennetz.php' );">Liniennetz Tag</button>
            </div>
            <div class="btn-group btn-group-lg">
                <button type="button" class="btn btn-default btn-lg" onClick="$( '#contentLeftColumn' ).load( 'liniennetzNacht.php' );">Liniennetz Nacht</button>
            </div>
        </div>

    </div>
</div>
