<?php
include("config.php");
include("include/util.php");
if (!isset($_SESSION['user']))
    header("location:inscription.php");
if (!isset($_POST['choix']))
    header("location:index.php");

$user = mysql_fetch_array(mysql_query("select * from immat_users where email='" . $_SESSION['user'] . "'"));

$choix_selected = addslashes($_POST['choix']);
$immatriculation = addslashes($_POST['immatriculation']);
$num_immat = addslashes($_POST['num_immat']);
$marque = addslashes($_POST['marque']);
$modele = addslashes($_POST['modele']);
$genre = addslashes($_POST['genre']);
$puissance = addslashes($_POST['puissance']);
$energie = addslashes($_POST['energie']);
$taux = addslashes($_POST['taux']);
$email_user = $_SESSION['user'];
$cp = addslashes($_POST['cp']);
$date_add = date("Y-m-d H:i:s");
mysql_query("INSERT INTO `immat_user_info_voiture` (`matricule`, `choix`, `immat`, `marque`, `modele`, `genre`, `puissance`, `energie`, `taux`, `cp`, `user`, `date_add`) VALUES ('" . $num_immat . "', '" . $choix_selected . "', '" . $immatriculation . "', '" . $marque . "', '" . $modele . "', '" . $genre . "', '" . $puissance . "', '" . $energie . "', '" . $taux . "', '" . $cp . "', '" . $email_user . "', '" . $date_add . "');")or die(mysql_error());

/*
 * Frais de dossier
 */
$frais_dossier = mysql_fetch_array(mysql_query("select frais from immat_frais_dossier where id=1"));


/*
 * Prix de la plaque d'immatriculation
 */
if ($immatriculation != "")
    $prix_plaque = mysql_fetch_array(mysql_query("select prix from immat_plaque_immat where id=1"));
else
    $prix_plaque = 0;


/*
 * Calculer Changement de propriétaire
 */
$ville = mysql_fetch_array(mysql_query("select * from immat_cp_cheval_fiscal where id='" . $cp . "'"));
$prix_cheval_fiscal = $ville['prix'];
$total_prix_chevaux = $prix_cheval_fiscal * $puissance;

/*
 * Prix total
 */

$prix_total_payer = $frais_dossier['frais'] + $prix_plaque['prix'] + $total_prix_chevaux;

/*
 * Calculer réduction
 */
if ($user['type'] == "Professionnel") {
    $reduction = mysql_fetch_array(mysql_query("select * from immat_pourcentage_pro where id=1"));
    $pourcentage = $reduction['pourcentage'];
    $montant_a_reduire = (($prix_total_payer * $pourcentage) / 100);
    $reduction_prix = $prix_total_payer - (($prix_total_payer * $pourcentage) / 100);
} else {
    $reduction_prix = $prix_total_payer;
}
?>




<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
          ================================================== -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Montant</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Sami Jilani">
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
            <!-- Start Body Content -->
            <div class="main" role="main">
                <div id="content" class="content full dashboard-pages">
                    <div class="container">
                        <div class="dashboard-wrapper">
                            <div class="row">

                                <div class="col-md-12 col-sm-12">
                                    <h2>Récapitulatif</h2>

                                    <div class="tab-content">
                                        <!-- PROFIE PERSONAL INFO -->
                                        <div id="personalinfo" class="tab-pane fade active in">

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="signup-form">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Marque</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" value="<?php echo $marque; ?>" disabled="">
                                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                </div> 
                                                            </div>

                                                            <div class="col-md-6 ">
                                                                <label>Modele</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" value="<?php echo $modele; ?>" disabled="">
                                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 ">
                                                                <label>Genre</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" value="<?php echo $genre; ?>" disabled="">
                                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                </div> 
                                                            </div>

                                                            <div class="col-md-6 ">
                                                                <label>Puissance fiscale</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" value="<?php echo $puissance; ?>" disabled="">
                                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                </div> 

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 ">
                                                                <label>Energie</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" value="<?php echo $energie; ?>" disabled="">
                                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                </div> 

                                                            </div>

                                                            <div class="col-md-6 ">
                                                                <label>Taux de CO2</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" value="<?php echo $taux; ?>" disabled="">
                                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                </div> 

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 ">
                                                                <label>Email</label>
                                                                <input type="email" name="email" id="email" class="form-control" placeholder="" value="<?php echo $_SESSION['user']; ?>" disabled="">
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <label>Departement</label>
                                                                <?php
                                                                $sql_marque = mysql_query("select * from immat_cp_cheval_fiscal where id=" . $cp);
                                                                while ($data_marque = mysql_fetch_array($sql_marque)) {
                                                                    ?>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="<?php echo $data_marque['ville']; ?>" disabled="">
                                                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                    </div> 
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                    <div class="dashboard-block">
                                        <div class="dashboard-block-head">
                                            <h3>Ma commande</h3>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered dashboard-tables saved-cars-table">
                                                <thead>
                                                    <tr>
                                                        <td>Description</td>
                                                        <td>Prix</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="search-find-results" style="padding-left: 20px;">
                                                                <h5><?php echo $choix_selected; ?></h5>   
                                                            </div>
                                                        </td>
                                                        <td><span class="price">€ <?php echo number_format($total_prix_chevaux, 2, ',', ' '); ?></span></td>

                                                    </tr>
                                                    <?php
                                                    if ($immatriculation != "") {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <div class="search-find-results" style="padding-left: 20px;">
                                                                    <h5><?php echo stripslashes($immatriculation); ?></h5>   
                                                                </div>
                                                            </td>
                                                            <td><span class="price">€ <?php echo number_format($prix_plaque["prix"], 2, ',', ' '); ?></span></td>

                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div class="search-find-results" style="padding-left: 20px;">
                                                                <h5>Frais de dossier</h5>   
                                                            </div>
                                                        </td>
                                                        <td><span class="price">€ <?php echo number_format($frais_dossier['frais'], 2, ',', ' '); ?></span></td>

                                                    </tr>
                                                    <?php
                                                    if ($user['type'] == "Professionnel") {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <div class="search-find-results" style="padding-left: 20px;">
                                                                    <h5>Réduction</h5>   
                                                                </div>
                                                            </td>
                                                            <td><span class="price"> - € <?php echo number_format($montant_a_reduire, 2, ',', ' '); ?></span></td>

                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 dealer-block"></div>
                                        <div class="col-md-4 col-sm-4 dealer-block"></div>
                                        <div class="col-md-4 col-sm-4 dealer-block">
                                            <div style="background-color:#ccc" class="dealer-block-inner">
                                                <div class="dealer-block-cont">
                                                    <div class="dealer-block-info" style="text-align: right; margin-top: 10px;">
                                                        <span class="label label-default" style="font-size: 30px ! important;">€ <?php echo number_format($reduction_prix, 2, ',', ' '); ?></span>
                                                    </div>
                                                    <div class="dealer-block-text">
                                                        <p>Vous pouvez procéder au paiement en cliquant sur le bouton Payer</p>

                                                    </div>
                                                    <div class="text-align-center"><a class="btn btn-primary" href="payer.php">Payer</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Body Content -->
            <!-- Start site footer -->
            <footer class="site-footer">
                <div class="site-footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 footer_widget widget widget_newsletter">
                                <h4 class="widgettitle">Sign up for our newsletter</h4>
                                <form>
                                    <input type="text" class="form-control" placeholder="Name">
                                    <input type="email" class="form-control" placeholder="Email">
                                    <input type="submit" class="btn btn-primary btn-lg" value="Sign up now">
                                </form>
                            </div>
                            <div class="col-md-2 col-sm-6 footer_widget widget widget_custom_menu widget_links">
                                <h4 class="widgettitle">Blogroll</h4>
                                <ul>
                                    <li><a href="blog.html">Car News</a></li>
                                    <li><a href="blog-masonry.html">Car Reviews</a></li>
                                    <li><a href="about.html">Car Insurance</a></li>
                                    <li><a href="about-html">Bodyshop</a></li>
                                </ul>
                            </div>
                            <div class="col-md-2 col-sm-6 footer_widget widget widget_custom_menu widget_links">
                                <h4 class="widgettitle">Help &amp; Support</h4>
                                <ul>
                                    <li><a href="results-list.html">Buying a car</a></li>
                                    <li><a href="joinus.html">Selling a car</a></li>
                                    <li><a href="about.html">Online safety</a></li>
                                    <li><a href="contact.html">Contact us</a></li>
                                </ul>
                            </div>
                            <div class="col-md-5 col-sm-6 footer_widget widget text_widget">
                                <h4 class="widgettitle">About AutoStars</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="site-footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 copyrights-left">
                                <p>&copy; 2014 AutoStars. All Rights Reserved</p>
                            </div>
                            <div class="col-md-6 col-sm-6 copyrights-right">
                                <ul class="social-icons social-icons-colored pull-right">
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="youtube"><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li class="flickr"><a href="#"><i class="fa fa-flickr"></i></a></li>
                                    <li class="vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                                    <li class="digg"><a href="#"><i class="fa fa-digg"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End site footer -->
            <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>  
        </div>
        <!-- LOGIN POPUP -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Login to your account</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Login">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-block btn-facebook btn-social"><i class="fa fa-facebook"></i> Login with Facebook</button>
                        <button type="button" class="btn btn-block btn-twitter btn-social"><i class="fa fa-twitter"></i> Login with Twitter</button>
                    </div>
                </div>
            </div>
        </div>
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