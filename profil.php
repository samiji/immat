<?php
include("config.php");
include("include/util.php");
if (!isset($_SESSION['user']))
    header("location:index.php");

$user = mysql_fetch_array(mysql_query("select * from immat_users where email='" . $_SESSION['user'] . "'"));
?>
<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
          ================================================== -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Mon compte</title>
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
                                <div class="col-md-3 col-sm-4">
                                    <!-- SIDEBAR -->
                                    <div class="users-sidebar tbssticky">
                                        <a href="index.php" class="btn btn-block btn-primary add-listing-btn">Commander</a>
                                        <ul class="list-group">
                                            <li class="list-group-item active"> <a href="profil.php"><i class="fa fa-user"></i> Mon profil</a></li>
                                            
                                            <li class="list-group-item"> <a href="logout.php"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-8">
                                    <h2>Mon compte</h2>
                                    <div class="dashboard-block">
                                        <div class="tabs profile-tabs">
                                            <ul class="nav nav-tabs">
                                                <li class="active"> <a data-toggle="tab" href="#personalinfo" aria-controls="personalinfo" role="tab">Informations personnelles</a></li>
                                                <li> <a data-toggle="tab" href="#billinginfo" aria-controls="billinginfo" role="tab">Mes commandes</a></li>
                                                <li> <a data-toggle="tab" href="#changepassword" aria-controls="changepassword" role="tab">Changer mot de passe</a></li>
                                            </ul>
                                            <form>
                                                <div class="tab-content">
                                                    <!-- PROFIE PERSONAL INFO -->
                                                    <div id="personalinfo" class="tab-pane fade active in">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Prénom*</label>
                                                                        <input type="text" class="form-control" placeholder="" value="<?php echo $user['prenom']; ?>" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Nom</label>
                                                                        <input type="text" class="form-control" value="<?php echo $user['nom']; ?>" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Email*</label>
                                                                        <input type="text" class="form-control" value="<?php echo $user['email']; ?>" placeholder="mail@example.com" disabled="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Télephone</label>
                                                                        <input type="text" class="form-control" value="<?php echo $user['tel']; ?>" placeholder="000-00-0000">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label>Adresse*</label>
                                                                        <textarea type="text" name="adresse" class="form-control" placeholder="" required><?php echo $user['adresse']; ?></textarea>                
                                                                    </div>
                                                                </div>
                                                                 <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Ville*</label>
                                                                        <input type="text" class="form-control" value="<?php echo $user['ville']; ?>" placeholder="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Code postal</label>
                                                                        <input type="text" class="form-control" value="<?php echo $user['cp']; ?>" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Fax</label>
                                                                        <input type="text" name="fax" class="form-control" value="<?php echo $user['fax']; ?>" placeholder="" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Site web</label>
                                                                        <input type="text" name="url" class="form-control" value="<?php echo $user['url']; ?>" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>SIREN</label>
                                                                        <input type="text" name="siren" class="form-control" value="<?php echo $user['siren']; ?>" placeholder="" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Numéro TVA</label>
                                                                        <input type="text" name="tva" class="form-control" value="<?php echo $user['numtva']; ?>" placeholder="">
                                                                    </div>
                                                                </div>
                                                                

                                                               <button type="submit" class="btn btn-info">Update details</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- PROFIE BILLING INFO -->
                                                    <div id="billinginfo" class="tab-pane fade">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    Votre commande est sous traitement.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- PROFIE CHANGE PASSWORD -->
                                                    <div id="changepassword" class="tab-pane fade">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Ancien mot de passe</label>
                                                                        <input type="password" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Nouveau mot de passe</label>
                                                                        <input type="password" class="form-control" placeholder="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Confirmer nouveau mot de passe</label>
                                                                        <input type="password" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </form>
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