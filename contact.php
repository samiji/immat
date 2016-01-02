<?php
include("config.php");
include("include/util.php");
?>
<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
          ================================================== -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Contact</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <!-- Mobile Specific Metas
          ================================================== -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <!-- CSS
          ================================================== -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="vendor/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
        <link href="vendor/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="vendor/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
        <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
        <link href="css/custom.css" rel="stylesheet" type="text/css"><!-- CUSTOM STYLESHEET FOR STYLING -->
        <!-- Color Style -->
        <link href="colors/color1.css" rel="stylesheet" type="text/css">
        <!-- SCRIPTS
          ================================================== -->
        <script src="js/modernizr.js"></script><!-- Modernizr -->
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-71574959-1', 'auto');
            ga('send', 'pageview');

        </script>
    </head>
    <body>
        <!--[if lt IE 7]>
                <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
        <div class="body">
            <!-- Start Site Header -->
            <div class="site-header-wrapper">
                <?php include("module/header.php"); ?>
                <!-- End Site Header -->

                <?php include("module/menu.php"); ?>

            </div>
            <!-- Start Page header -->
            <div class="page-header parallax">
                <div id="contact-map" style="width:100%;height:300px"></div>
            </div>
            <!-- Utiity Bar -->
            <div class="utility-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-6 col-xs-8">
                            <ol class="breadcrumb">
                                <li><a href="http://www.illico-immat.fr">Accueil</a></li>
                                <li class="active">Contact</li>
                            </ol>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-4">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Body Content -->
            <div class="main" role="main">
                <div id="content" class="content full">
                    <div class="container">
                        <div class="listing-header margin-40">
                            <h2>Contact</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <i class="fa fa-home"></i></span> <b>Illico-Immat.fr</b><br>
                                41, RUE AUGUSTIN HENRY <br>
                                Elbeuf France<br><br>
                                <i class="fa fa-phone"></i> <b>02 35 76 52 80</b><br>

                                <i class="fa fa-envelope"></i> <a href="mailto:illico-immat@gmail.com">Illico-Immat@gmail.com</a><br><br>
                                <i class="fa fa-home"></i>Horaires :<br><b><span style="font-weight: bold">Lundi</span> <br>14:00 – 18:30</b><br>
                                <b><span style="font-weight: bold">Mardi - Vendredi</span> <br>09:30 – 12:30, 14:00 – 18:30</b><br>
                                <b><span style="font-weight: bold">Samedi</span> <br>10:00 – 12:30, 13:30 – 16:30</b><br>
                                <b><span style="font-weight: bold">Dimanche</span> <br>Fermé</b><br>


                            </div>
                            <div class="col-md-9 col-sm-8">

                                <form method="post" id="contactform" name="contactform" class="contact-form clearfix" action="mail/contact.php">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" id="fname" name="fname"  class="form-control input-lg" placeholder="Prénom *" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="lname" name="lname"  class="form-control input-lg" placeholder="Nom *" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" id="email" name="email"  class="form-control input-lg" placeholder="Email *" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="phone" name="phone" class="form-control input-lg" placeholder="Téléphone *" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <textarea cols="6" rows="8" id="comments" name="comments" class="form-control input-lg" placeholder="Message"></textarea>
                                            </div>
                                            <input id="submit" name="submit" type="submit" class="btn btn-primary btn-lg pull-right" value="Envoyer">
                                        </div>
                                    </div>
                                </form>
                                <div class="clearfix"></div>
                                <div id="message"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Body Content -->
            <!-- Start site footer -->
            <?php include("module/footer.php") ?>
            <!-- End site footer -->
            <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>  
        </div>
        <!-- LOGIN POPUP -->
        <?php include("module/login.php") ?>
        <script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call -->
        <script src="vendor/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin -->
        <script src="js/ui-plugins.js"></script> <!-- UI Plugins -->
        <script src="js/helper-plugins.js"></script> <!-- Helper Plugins -->
        <script src="vendor/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel -->
        <script src="vendor/password-checker.js"></script> <!-- Password Checker -->
        <script src="js/bootstrap.js"></script> <!-- UI -->
        <script src="js/init.js"></script> <!-- All Scripts -->
        <script src="vendor/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
            var geocoder = new google.maps.Geocoder();
            var address = "41, RUE AUGUSTIN HENRY Elbeuf France"; //Add your address here, all on one line.
            var latitude;
            var longitude;
            var color = "#ffffff"; //Set your tint color. Needs to be a hex value.

            function getGeocode() {
                geocoder.geocode({'address': address}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        latitude = results[0].geometry.location.lat();
                        longitude = results[0].geometry.location.lng();
                        initGoogleMap();
                    }
                });
            }

            function initGoogleMap() {
                var styles = [
                    {
                        stylers: [
                            {saturation: -100}
                        ]
                    }
                ];

                var options = {
                    mapTypeControlOptions: {
                        mapTypeIds: ['Styled']
                    },
                    center: new google.maps.LatLng(latitude, longitude),
                    zoom: 13,
                    scrollwheel: false,
                    navigationControl: false,
                    mapTypeControl: false,
                    zoomControl: true,
                    disableDefaultUI: true,
                    mapTypeId: 'Styled'
                };
                var div = document.getElementById('contact-map');
                var map = new google.maps.Map(div, options);
                marker = new google.maps.Marker({
                    map: map,
                    draggable: false,
                    animation: google.maps.Animation.DROP,
                    position: new google.maps.LatLng(latitude, longitude)
                });
                var styledMapType = new google.maps.StyledMapType(styles, {name: 'Styled'});
                map.mapTypes.set('Styled', styledMapType);

                var infowindow = new google.maps.InfoWindow({
                    content: "<div class='iwContent'>" + address + "</div>"
                });
                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });


                bounds = new google.maps.LatLngBounds(
                        new google.maps.LatLng(-49.29104050000001, -1.0055671999999731),
                        new google.maps.LatLng(49.29104050000001, 1.0055671999999731));

                rect = new google.maps.Rectangle({
                    bounds: bounds,
                    fillColor: color,
                    fillOpacity: 0.2,
                    strokeWeight: 0,
                    map: map
                });
            }
            google.maps.event.addDomListener(window, 'load', getGeocode);
        </script>
    </body>
</html>