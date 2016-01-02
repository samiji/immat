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
        <title>Annonces</title>
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
            <div class="page-header parallax" style="background-image:url(<?php echo url; ?>images/immat_banner_car.jpg);">
                <div class="container">
                    <h1 class="page-title">Annonces pour des véhicules d'occasion</h1>
                </div>
            </div>
            <!-- Utiity Bar -->
            <div class="utility-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-6 col-xs-8">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo url;  ?>">Accueil</a></li>
                                <li class="active">Annonces</li>
                            </ol>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-4">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Body Content -->
            <div class="main" role="main">
                <div id="content" class="content full padding-b0">
                    <div class="container">
                        <div class="dealers-search-result">
                            <div class="row">
                                <?php
                                $sql = mysql_query("select * from immat_annonces where etat=1 order by id desc");
                                while ($data = mysql_fetch_array($sql)) {
                                    ?>
                                <div class="col-md-3 col-sm-3 dealer-block" style="margin-top: 20px;">
                                        <div class="dealer-block-inner" style="background-color: #cccccc">
                                            <div class="dealer-block-cont">
                                                <div class="dealer-block-info">

                                                    <span class="dealer-avatar"><img src="<?php echo str_replace("../", "", $data['img']); ?>" alt=""></span>
                                                    <h5><a href="detail-annonce/<?php echo $data['id'];  ?>"><?php echo $data['nom']; ?></a></h5>

                                                </div>
                                                <div class="dealer-block-text">
                                                    <div style="height: 45px; color: rgb(85, 102, 102);"><?php
                                                        $tab = explode(" ", strip_tags($data['description']));
                                                        $ch = "";
                                                        for ($i = 0; $i < 5; $i++) {
                                                            $ch.=$tab[$i] . " ";
                                                        }
                                                        echo $ch;
                                                        ?></div>
                                                    <div class="dealer-block-add">
                                                        <span>Annonce le  <strong><?php echo $data['dt']; ?></strong></span>
                                                        <span>Prix <strong><?php echo $data['prix']; ?></strong></span>
                                                    </div>
                                                </div>
                                                <div class="text-align-center"><a href="detail-annonce/<?php echo $data['id'];  ?>" class="btn btn-default">voir détail</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>
                            <div class="spacer-40"></div>

                        </div>
                    </div>
                    <div class="spacer-40"></div>

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

    </body>
</html>