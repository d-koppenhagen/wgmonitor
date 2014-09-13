<html lang="de">
<head>
    <title>Infoscreen</title>

    <!-- used to start like an app with google chrome on android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

    <!-- Favicon -->
    <link rel="icon" href="img/favicon.ico">

    <!-- Bootstrap Layout -->
    <link id="pagestyle" rel="stylesheet" href="css/slate.min.css" type="text/css" />

    <!-- Own Stylesheets  Layout -->
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/lvb.css" type="text/css" />

    <!-- Gallery Layout -->
    <link rel="stylesheet" href="css/bootstrap-image-gallery.min.css" />
    <link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css" />

    <!-- AngularJS -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.21/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.20/angular-route.js"></script>

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <!-- Javascript -->
    <script src="js/main.js"></script>
    <script src="js/wlanconfig.js"></script>

</head>
<body>
    <!-- // Navigation Start -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
      </button>
    </div>
            <div class="collapse navbar-collapse">
                <!-- // left navigation part Start -->
                <ul class="nav navbar-nav">
                    <!-- for colorate active link use: <li class="active"> -->
                    <li id="home_btn">
                        <a href="#home"> <span class="glyphicon glyphicon-home"></span> Übersicht</a>
                    </li>
                    <li id="LVB_btn">
                        <a href="#lvb"> <span class="glyphicon glyphicon-th-list"></span> LVB Info</a>
                    </li>
                    <li id="cal_btn">
                        <a href="#cal"> <span class="glyphicon glyphicon-calendar"></span> Kalender</a>
                    </li>
                    <li id="pic_btn">
                        <a href="#pictures"> <span class="glyphicon glyphicon-camera"></span> Bilder</a>
                    </li>
                    <li id="feed_btn">
                        <a href="#feeds"> <span class="glyphicon glyphicon-bullhorn"></span> Feeds</a>
                    </li>
                    <li id="gb_btn">
                        <a href="#gb"> <span class="glyphicon glyphicon-comment"></span> Gästebuch</a>
                    </li>

                </ul>
                <!-- // left navigation part End -->
                <!-- // Version Number Start -->
                <p class="navbar-text">
                    <small>WG Monitor Version 0.8.6</small>
                </p>
                <!-- // Version Number End -->
                <!-- // right navigation part Start -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a id="temp"></a></li>
                    <li><a><span class="glyphicon glyphicon-time"></span><span id="curTime"></span> Uhr</a></li>
                </ul>
                <!-- // right navigation part End -->
            </div>
        </div>
    </nav>
    <!-- // Navigation End -->

    <!-- // content start -->
    <div class="container-fluid">
        <div class="row">
            <!-- // left content part starts here -->
            <div class="col-md-8">
                <!-- the following container will be filled with Ajax after loading...-->
                <div id="contentLeftColumn">
                    <script>
                        $(document).ready(function () {
                            $('#contentLeftColumn').load('start.php');
                        });
                    </script>
                </div>
                <!-- End of contentLeftColumn -->
            </div>
            <!-- // left content part ends here -->
            <!-- // sidebar part starts here -->
            <div class="col-md-4" id="sidebarRefresh"></div>
            <!-- // sidebar part ends here -->
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
            <!-- End of the modal dialog -->
        </div>
        <!-- End of Bootstrap Image Gallery lightbox -->
        <!-- Start: Blueimp Gallery Scripts -->
        <script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
        <script src="js/bootstrap-image-gallery.min.js"></script>
        <!-- End: Blueimp Gallery Scripts -->

    </div>
    <!-- // content end -->

<!-- // Start: Button Click functions -->
<script>
    $('#home_btn').click(function () {
        $('#contentLeftColumn').load('start.php');
    });
    $('#LVB_btn').click(function () {
        $('#contentLeftColumn').load('lvb.php');
    });
    $('#cal_btn').click(function () {
        $('#contentLeftColumn').load('timetable.php');
    });
    $('#pic_btn').click(function () {
        $('#contentLeftColumn').load('gallery.php');
    });
    $('#feed_btn').click(function () {
        $('#contentLeftColumn').load('feeds.html');
    });
    $('#gb_btn').click(function () {
        $('#contentLeftColumn').load('guestbook.php');
    });
</script>
<!-- // End: Button Click functions -->


</body>
</html>
