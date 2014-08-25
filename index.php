<?php require_once( "Config.class.php"); Config::init(); ?>
<html lang="de" ng-app="todomvc" data-framework="angularjs">

<head>
    <!-- used to start like an app with google chrome on android -->
    <meta name="mobile-web-app-capable" content="yes">

    <?php require "head.html"; ?>

    <!-- using phonegap -->
    <script src="phonegap.js" type="text/javascript"></script>

</head>

<body>
    <?php require_once ( "menu.html");?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <!-- the following container will be filled with Ajax after loading...-->
                <div id="contentLeftColumn">
                    <script>
                        //preload after the rest is loading:
                        $(document).ready(function () {
                            $('#contentLeftColumn').load('start.php');
                        });
                    </script>
                </div>
                <!-- End of contentLeftColumn -->
            </div>
            <div class="col-md-4" id="sidebarRefresh">
                <?php require_once "sidebar.php";?>
            </div>
        </div>


        <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
        <div id="blueimp-gallery" class="blueimp-gallery">
            <!-- The container for the modal slides -->
            <div class="slides"></div>
            <!-- Controls for the borderless lightbox -->
            <h3 class="title"></h3>
            <a class="prev">‹</a>  <a class="next">›</a>  <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator">
            </ol>
            <!-- The modal dialog, which will be used to wrap the lightbox content -->
            <div class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body next"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left prev"> <i class="glyphicon glyphicon-chevron-left"></i> Previous</button>
                            <button type="button" class="btn btn-default play-pause" id="StartSlideshow" onclick="$('#StartSlideshow').toggleClass('active');">Slideshow <i class="glyphicon glyphicon-play-circle"></i>
                            </button>
                            <button type="button" class="btn btn-primary next">Next <i class="glyphicon glyphicon-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Bootstrap Image Gallery lightbox, should be a child element of the document body -->



        <!-- Blueimp Gallery -->
        <script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
        <script src="js/bootstrap-image-gallery.min.js"></script>

        <!-- Feeds (must be loaded after jQuery -->
        <script type="text/javascript" src="js/postillonFeed.js"></script>
        <script type="text/javascript" src="js/extra3Feed.js"></script>
        <script type="text/javascript" src="js/gagFeed.js"></script>

        <!-- ShoppingList -->
        <script src="js/buy/app.js"></script>
        <script src="js/buy/controllers/todoCtrl.js"></script>
        <script src="js/buy/services/todoStorage.js"></script>
        <script src="js/buy/directives/todoFocus.js"></script>
        <script src="js/buy/directives/todoBlur.js"></script>
        <script src="js/buy/directives/todoEscape.js"></script>


    </div>
</body>

</html>
