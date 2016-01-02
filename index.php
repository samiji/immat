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
        <title>Illicot Immat</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Sami">
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
        <style>
            @media screen and (max-width: 767px) {
                .main{margin-top: 300px;}
            }
        </style>
    </head>
    <body class="home">
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
            <div class="hero-area">
                <!-- Search Form -->
                <div class="floated">
                    <div class="search-form">

                        <div class="search-form-inner hidden-xs" style="margin-top: 65px;">
                            <form method="post" action="<?php echo url; ?>valider-prestations" onsubmit="return verifier()">
                                <div class="hidden-xs">
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control" style="text-align: center; font-size: 33px; text-transform: uppercase" maxlength="9" placeholder="AA-123-AA" name="immat_num" id="immat_num" required="">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit" style="background-color: rgb(23, 146, 195);">Calculer le prix</button>
                                        </span>
                                    </div>

                                    <div class="row " style="margin-top: 20px;">
                                        <div class="col-md-12"> 
                                            <div class="col-md-4 col-sm-4 col-xs-6">
                                                <label style="font-weight:bold">Carte grise</label>
                                                <select class="form-control" name="prestation1" id="prestation1">
                                                    <option selected=""></option>
                                                    <option value="Demande de carte grise (neuf/occasion)">Demande de carte grise (neuf/occasion)</option>
                                                    <option value="Changement du statut matrimonial">Changement du statut matrimonial</option>
                                                    <option value="Changement du domicile de carte grise">Changement du domicile de carte grise</option>
                                                </select>


                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-6">
                                                <label style="font-weight:bold">Déclaration de cession&nbsp;&nbsp;&nbsp; <img src="images/interogation.jpg" style="width: 20px" alt="" title="Vous avez vendu votre véhicule mais en avez assez de recevoir des amendes ? Optez pour la déclaration de cession" /></label>
                                                <select class="form-control" name="prestation2" id="prestation2">
                                                    <option selected=""></option>
                                                    <option value="Déclaration de cession">Déclaration de cession</option>
                                                    <option value="Déclaration de Perte/Vol">Déclaration de Perte/Vol </option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-6">
                                                <label style="font-weight:bold">Plaques</label>
                                                <select class="form-control" name="prestation3" id="prestation3">
                                                    <option selected=""></option>
                                                    <option value="Jeu de plaque d\'immatriculation auto">Jeu de plaque d'immatriculation auto</option>
                                                    <option value="Jeu de plaque d\'immatriculation moto">Jeu de plaque d'immatriculation moto</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="search-form-inner hidden-lg hidden-md hidden-sm" style="height: 300px; margin-top: -75px;">
                            <form method="post" action="<?php echo url; ?>valider-prestations" onsubmit="return verifier1()">

                                <div class="col-xs-12">
                                    <input type="text" class="form-control" style="text-align: center; font-size: 33px; text-transform: uppercase" maxlength="9" placeholder="AA-123-AA" name="immat_num" id="immat_num" required="">
                                </div>
                                <div class="col-xs-12">
                                    <label style="font-weight:bold">Carte grise</label>
                                    <select class="form-control" name="prestation1" id="prestation11">
                                        <option selected=""></option>
                                        <option value="Demande de carte grise (neuf/occasion)">Demande de carte grise (neuf/occasion)</option>
                                        <option value="Changement du statut matrimonial">Changement du statut matrimonial</option>                                        
                                        <option value="Changement du domicile de carte grise">Changement du domicile de carte grise</option>
                                    </select>
                                </div>
                                <div class="col-xs-12">
                                    <label style="font-weight:bold">Déclaration de cession</label>
                                    <select class="form-control" name="prestation2" id="prestation21">
                                        <option selected=""></option>
                                        <option value="Déclaration de cession">Déclaration de cession</option>
                                        <option value="Déclaration de Perte/Vol">Déclaration de Perte/Vol </option>
                                    </select>
                                </div>
                                <div class="col-xs-12">
                                    <label style="font-weight:bold">Plaques</label>
                                    <select class="form-control" name="prestation3" id="prestation31">
                                        <option selected=""></option>
                                        <option value="Jeu de plaque d\'immatriculation auto">Jeu de plaque d'immatriculation auto</option>
                                        <option value="Jeu de plaque d\'immatriculation moto">Jeu de plaque d'immatriculation moto</option>
                                    </select>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Calculer le prix</button>
                                    </span>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <!-- Start Hero Slider -->
                <div class="hero-slider heroflex flexslider clearfix hidden-xs" data-autoplay="yes" data-pagination="no" data-arrows="yes" data-style="fade" data-speed="7000" data-pause="yes">
                    <ul class="slides">
                        <li class="parallax" style="background-image:url(images/slide3.jpg);"></li>

                    </ul>
                </div>
                <!-- End Hero Slider -->
            </div>
            <!-- Utiity Bar -->

            <!-- Start Body Content -->
            <div class="main" role="main">
                <div id="content" class="content full padding-b0">
                    <div class="container">
                        <!-- Welcome Content and Services overview -->
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <div class="icon-box ibox-outline ibox-center ibox-dark">
                                    <div class="ibox-icon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <h3>Commandez en 1 minute</h3>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="icon-box ibox-outline ibox-center ibox-dark">
                                    <div class="ibox-icon">
                                        <i class="fa fa-truck"></i>
                                    </div>
                                    <h3>Livraison en 24h/48h</h3>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="icon-box ibox-outline ibox-center ibox-dark">
                                    <div class="ibox-icon">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <h3>Paiement en 3X CB</h3>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="icon-box ibox-outline ibox-center ibox-dark">
                                    <div class="ibox-icon">
                                        <i class="fa fa-bank"></i>
                                    </div>
                                    <h3>Habilitation du Ministère</h3>

                                </div>
                            </div>
                        </div>

                        <div class="spacer-75"></div>
                        <!-- Recently Listed Vehicles -->
                        <hr>
                        <h1 style="text-align: center">Votre carte grise en 4 étapes</h1>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="icon-box ibox-border ibox-center ibox-light">
                                    <div class="ibox-icon">
                                        <i class="fa fa-euro" style="color: rgb(46, 157, 201);"></i>
                                    </div>
                                    <h3>Calculez le prix</h3>
                                    <p>Inscrivez votre numéro d'immatriculation afin de calculer le prix de votre carte grise en quelques secondes.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="icon-box ibox-border ibox-center ibox-light">
                                    <div class="ibox-icon">
                                        <i class="fa fa-align-justify" style="color: rgb(46, 157, 201);"></i>
                                    </div>
                                    <h3>Validez vos formulaires</h3>
                                    <p>Nous vous offrons la possibilité de créer gratuitement vos documents cerfa pré-remplis en quelques clics.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="icon-box ibox-border ibox-center ibox-light">
                                    <div class="ibox-icon">
                                        <i class="fa fa-bus" style="color: rgb(46, 157, 201);"></i>
                                    </div>
                                    <h3>Roulez immédiatement</h3>
                                    <p>Vous recevez un certificat provisoire par email sous 24h à réception de votre dossier complet par courrier.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="icon-box ibox-border ibox-center ibox-light">
                                    <div class="ibox-icon">
                                        <i class="fa fa-file-o" style="color: rgb(46, 157, 201);"></i>
                                    </div>
                                    <h3>La commande chez vous</h3>
                                    <p>La carte grise originale est envoyée en courrier recommandé par l'Imprimerie Nationale sous 2 à 4 jours.</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h2  style="color: rgb(46, 157, 201);">Pourquoi faire sa demande de carte grise en ligne ?</h2>
                        <div class="row">
                            <p>Depuis la mise en place du nouveau système d'immatriculation en 2009, vous n'avez plus besoin de vous rendre à la Préfecture pour faire votre demande de carte grise. Vous pouvez faire votre changement d'immatriculation en ligne auprès de notre service d'immatriculation. Ce service est amené à se répandre : il est recommandé par les préfectures et sous-préfectures vu qu'elles ne cessent de réduire les horaires d'ouverture de leurs guichets, ou suppriment purement et simplement le service. Les demandes de carte grise par courrier, si elles ont l'avantage de vous dispenser des déplacements, ne règlent pas le problème du délai : dans certains départements, l'instruction des dossiers peut prendre des semaines. Avec Illico-Immat, votre demande d'immatriculation est traitée immédiatement.</p>
                            <p>Illico-Immat a obtenu une<strong> habilitation du Ministère de l'Intérieur pour enregistrer vos demandes de carte grise</strong> dans le système de l'Etat et un agrément du Trésor Public pour encaisser les taxes d'immatriculation. Que ce soit pour l'immatriculation de tout véhicule neuf ou d'occasion, nous traiterons votre demande de carte grise dans les meilleurs délais pour vous permettre de rouler rapidement avec votre nouvelle voiture, moto, quad, etc.</p>
                            <p>Illico-Immat est non affilié au gouvernement, nous effectuons vos démarches d'immatriculation à votre place en 24h et vous recevez votre nouvelle carte grise directement chez vous. Toutefois vous pouvez toujours vous déplacer à la Préfecture pour faire votre demande de carte grise sans frais (hors taxe régionale + frais de gestion).</p>
                            
                        </div>
                        <hr>
                        <h2  style="color: rgb(46, 157, 201);">Commandez vos plaques d'immatriculation en ligne</h2>
                        <div class="row">
                            <p>Toutes nos plaques d'immatriculation sont fabriquées en France. Nos plaques sont fabriquées grâce aux dernières technologies dans des matériaux haut de gamme.<br>Nous vous proposons un large choix de plaques pour tous vos véhicules : plaques auto, moto, cyclo, 4x4 etc...<br><br>Nouveau : nous vous proposons également les plaques d'immatriculation pour les véhicules collection, les plaques diplomatiques ainsi que les plaques pour les véhicules en transit temporaire.</p>
                        </div>
                        <div class="spacer-60"></div>

                    </div>
                    <div class="spacer-50"></div>

                </div>
            </div>
            <!-- End Body Content -->
            <!-- Start site footer -->
            <?php include("module/footer.php"); ?>
            <!-- End site footer -->
            <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>  
        </div>
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
        <script>
                                function reinit() {
                                    document.getElementById("immat_num").value = "";

                                }
                                function verifier() {
                                    var prestation1 = document.getElementById("prestation1").value;
                                    var prestation2 = document.getElementById("prestation2").value;
                                    var prestation3 = document.getElementById("prestation3").value;
                                    if ((prestation1 === "") && (prestation2 === "") && (prestation3 === "")) {
                                        alert("Veuillez choisir au moins une prestation ! ");
                                        return false;
                                    } else {
                                        return true;
                                    }
                                }
                                function verifier1() {
                                    var prestation1 = document.getElementById("prestation11").value;
                                    var prestation2 = document.getElementById("prestation21").value;
                                    var prestation3 = document.getElementById("prestation31").value;
                                    if ((prestation1 === "") && (prestation2 === "") && (prestation3 === "")) {
                                        alert("Veuillez choisir au moins une prestation ! ");
                                        return false;
                                    } else {
                                        return true;
                                    }
                                }
        </script>
    </body>
</html>