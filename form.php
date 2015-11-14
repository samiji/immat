<?php
include("config.php");
include("include/util.php");
if (!isset($_SESSION['user']))
    header("location:inscription.php");
if (!isset($_POST['choix']))
    header("location:index.php");
?>
<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
          ================================================== -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Inscription</title>
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
            <div class="page-header parallax" style="background-image:url(images/back.jpg);">
                <div class="container">
                    <h1 class="page-title">Identification de la véhicule</h1>
                </div>
            </div>
            <div class="main" role="main">
                <div id="content" class="content full dashboard-pages">
                    <div class="container">
                        <div class="dashboard-wrapper">
                            <div class="row">


                                <div class="col-md-12 col-sm-12">

                                    <div class="dashboard-block" style="margin-top: 0px;">
                                        <div class="tabs profile-tabs">
                                            <?php
                                            $choix = $_POST['choix'];
                                            if (isset($_POST['immatricultion']))
                                                $immat = $_POST['immatricultion'];
                                            else
                                                $immat = "";
                                            ?>
                                            <form method="post" action="">
                                                <div class="tab-content">
                                                    <!-- PROFIE PERSONAL INFO -->
                                                    <div id="personalinfo" class="tab-pane fade active in">

                                                        <div class="row">

                                                            <div class="col-md-8">
                                                                <div class="signup-form">
                                                                    <div class="row"><h4 class="result-item-title"><a>Votre matricule est <i><b style="text-transform: uppercase"><?php echo $_POST['immat_num']; ?></b></i></a></h4></div>
                                                                    <div class="row"><h4 class="result-item-title"><a>Vous avez choisi : <i><?php echo $choix; ?></i> <?php if (isset($_POST['immatricultion'])) { ?>avec l'option <i><?php echo $immat; ?></i><?php } ?></a></h4></div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label>Marque</label>
                                                                            <select class="form-control" id="marque" name="marque" onchange="getModele()">
                                                                                <option selected=""></option>
                                                                                <?php
                                                                                $sql_marque = mysql_query("select distinct marque from immat_marque");
                                                                                while ($data_marque = mysql_fetch_array($sql_marque)) {
                                                                                    ?>
                                                                                    <option value="<?php echo $data_marque['marque']; ?>"><?php echo $data_marque['marque']; ?></option>
                                                                                    <?php
                                                                                }
                                                                                ?>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 ">
                                                                            <label>Modele</label>
                                                                            <select class="form-control" id="modele" name="modele" ></select>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 ">
                                                                            <label>Genre</label>
                                                                            <input type="text" name="genre" id="genre" class="form-control" placeholder="" required>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 ">
                                                                            <label>Puissance fiscale</label>
                                                                            <input type="text" name="puissance" id="puissance" class="form-control" placeholder="" required>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 ">
                                                                            <label>Energie</label>
                                                                            <select class="form-control" id="energie" name="energie">
                                                                                <option></option>
                                                                                <option value="GAZOLE">GAZOLE</option>
                                                                                <option value="ESSENCE">ESSENCE</option>
                                                                            </select>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 ">
                                                                            <label>Taux de CO2</label>
                                                                            <input type="text" name="puissance" id="puissance" class="form-control" placeholder="" required>


                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 ">
                                                                            <label>Email</label>
                                                                            <input type="email" name="email" id="email" class="form-control" placeholder="" required>


                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 ">
                                                                            <label>Code postal</label>
                                                                            <input type="text" name="cp" id="cp" class="form-control" placeholder="" required>


                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <button type="submit" class="btn btn-info">Calculer le prix</button>
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
        <script>
                                                                                function getModele() {
                                                                                    var marque = document.getElementById("marque").value;
                                                                                    $.ajax({
                                                                                        url: 'getListModele.php?marque=' + marque,
                                                                                        success: function (data) {
                                                                                            var t = eval(data);
                                                                                            for (var i = 0; i < document.getElementById("modele").options.length; i++) {
                                                                                                document.getElementById("modele").remove(i);
                                                                                            }
                                                                                            for (var i = 0; i < t.length; i++) {
                                                                                                document.getElementById("modele").options[i] = new Option(
                                                                                                        t[i]["modele"], t[i]["modele"]);
                                                                                            }
                                                                                        }
                                                                                    });
                                                                                }
        </script>
    </body>
</html>