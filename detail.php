<?php
include("config.php");
include("include/util.php");

$id_v = $_GET['id'];

$annonce = mysql_fetch_array(mysql_query("select * from immat_annonces where id=" . $id_v));
?>
<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
          ================================================== -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo $annonce['nom']; ?> | Ilico-Immat Annonces </title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <!-- Mobile Specific Metas
          ================================================== -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <!-- CSS
          ================================================== -->
        <link href="<?php echo url; ?>css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo url; ?>css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <link href="<?php echo url; ?>css/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo url; ?>vendor/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
        <link href="<?php echo url; ?>vendor/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="<?php echo url; ?>vendor/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
        <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
        <link href="<?php echo url; ?>css/custom.css" rel="stylesheet" type="text/css"><!-- CUSTOM STYLESHEET FOR STYLING -->
        <!-- Color Style -->
        <link href="<?php echo url; ?>colors/color1.css" rel="stylesheet" type="text/css">
        <!-- SCRIPTS
          ================================================== -->
        <script src="<?php echo url; ?>js/modernizr.js"></script><!-- Modernizr -->
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
                    <h1 class="page-title">Détail annonce</h1>
                </div>
            </div>
            <!-- Utiity Bar -->
            <div class="utility-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-6 col-xs-8">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo url; ?>">Accueil</a></li>
                                <li class="active"><?php echo $annonce['nom']; ?></li>
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
                        <!-- Vehicle Details -->
                        <article class="single-vehicle-details">
                            <div class="single-vehicle-title">
                                <span class="badge-premium-listing">Disponible</span>
                                <h2 class="post-title"><?php echo $annonce['nom']; ?></h2>
                            </div>
                            <div class="single-listing-actions">
                                <div class="btn-group pull-right" role="group">
                                    <a href="#" data-toggle="modal" data-target="#infoModal" class="btn btn-default" title="Demander plus d'info"><i class="fa fa-info"></i> <span>Demander plus d'info</span></a>
                                    <a href="javascript:void(0)" onclick="window.print();" class="btn btn-default" title="Imprimer"><i class="fa fa-print"></i> <span>Imprimer</span></a>
                                </div>
                                <div class="btn btn-info price"><?php echo $annonce['prix']; ?> €</div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="single-listing-images">
                                        <div class="featured-image format-image">
                                            <a href="<?php echo url; ?><?php echo str_replace("../", "", $annonce['img']); ?>" data-rel="prettyPhoto[gallery]" class="media-box"><img src="<?php echo url; ?><?php echo str_replace("../", "", $annonce['img']); ?>" alt=""></a>
                                        </div>
                                        <div class="additional-images">
                                            <ul class="owl-carousel" data-columns="4" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="4" data-items-desktop-small="4" data-items-tablet="3" data-items-mobile="3">
                                                <?php
                                                if (($annonce['img2'] != '../annonces/')&&($annonce['img2'] != '')) {
                                                    ?>
                                                    <li class="item format-video"> <a href="<?php echo url; ?><?php echo str_replace("../", "", $annonce['img2']); ?>" data-rel="prettyPhoto[gallery]" class="media-box"><img src="<?php echo url; ?><?php echo str_replace("../", "", $annonce['img2']); ?>" alt=""></a></li>
                                                    <?php
                                                }
                                                if (($annonce['img3'] != '../annonces/')&&($annonce['img3'] != '')) {
                                                    ?>

                                                    <li class="item format-image"> <a href="<?php echo url; ?><?php echo str_replace("../", "", $annonce['img3']); ?>" data-rel="prettyPhoto[gallery]" class="media-box"><img src="<?php echo url; ?><?php echo str_replace("../", "", $annonce['img3']); ?>" alt=""></a></li>
                                                    <?php
                                                }
                                                if (($annonce['img4'] != '../annonces/')&&($annonce['img4'] != '')) {
                                                    ?>
                                                    <li class="item format-image"> <a href="<?php echo url; ?><?php echo str_replace("../", "", $annonce['img4']); ?>" data-rel="prettyPhoto[gallery]" class="media-box"><img src="<?php echo url; ?><?php echo str_replace("../", "", $annonce['img4']); ?>" alt=""></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="sidebar-widget widget">
                                        <ul class="list-group">
                                            <li class="list-group-item"> <span class="badge">Ajoutée</span> <?php echo $annonce['dt']; ?></li>
                                            <li class="list-group-item"> <span class="badge">Libellé</span> <?php echo $annonce['nom']; ?></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="spacer-50"></div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="tabs vehicle-details-tabs">
                                        <ul class="nav nav-tabs">
                                            <li class="active"> <a data-toggle="tab" href="#vehicle-overview">Description</a></li>

                                        </ul>
                                        <div class="tab-content">
                                            <div id="vehicle-overview" class="tab-pane fade in active">
                                                <p><?php echo $annonce['description']; ?></p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="spacer-50"></div>
                                    <!-- Recently Listed Vehicles -->

                                </div>
                                <!-- Vehicle Details Sidebar -->

                            </div>
                        </article>
                        <div class="clearfix"></div>
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
        <!-- REQUEST MORE INFO POPUP -->
        <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Demande d'informations</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <p>Pour toute information, veuillez nous contacter sur l'un de nos coordonnées ci-dessous :</p>
                            <div>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <script src="<?php echo url; ?>js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call -->
        <script src="<?php echo url; ?>vendor/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin -->
        <script src="<?php echo url; ?>js/ui-plugins.js"></script> <!-- UI Plugins -->
        <script src="<?php echo url; ?>js/helper-plugins.js"></script> <!-- Helper Plugins -->
        <script src="<?php echo url; ?>vendor/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel -->
        <script src="<?php echo url; ?>vendor/password-checker.js"></script> <!-- Password Checker -->
        <script src="<?php echo url; ?>js/bootstrap.js"></script> <!-- UI -->
        <script src="<?php echo url; ?>js/init.js"></script> <!-- All Scripts -->
        <script src="<?php echo url; ?>vendor/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
                                        $('#timepicker').timepicker({defaultTime: false});
                                        $('#datepicker').datepicker();
        </script>
    </body>
</html>