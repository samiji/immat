<?php
include("config.php");
include("include/util.php");
if (isset($_SESSION['user']))
    header("location:profil.php");
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
            <div class="main" role="main">
                <div id="content" class="content full dashboard-pages">
                    <div class="container">
                        <div class="dashboard-wrapper">
                            <div class="row">


                                <div class="col-md-12 col-sm-12">
                                    <h2>Espace d'inscription</h2>
                                    <div class="dashboard-block">
                                        <div class="tabs profile-tabs">
                                            <?php
                                            if (isset($_POST['login'])) {
                                                $login = mysql_real_escape_string($_POST["login"]);
                                                $pwd = mysql_real_escape_string($_POST["pwd"]);
                                                $prenom = mysql_real_escape_string($_POST["prenom"]);
                                                $nom = mysql_real_escape_string($_POST["nom"]);
                                                $adresse = mysql_real_escape_string($_POST["adresse"]);
                                                $cp = mysql_real_escape_string($_POST["cp"]);
                                                $ville = mysql_real_escape_string($_POST["ville"]);
                                                $tel = mysql_real_escape_string($_POST["tel"]);
                                                $fax = mysql_real_escape_string($_POST["fax"]);
                                                $url = mysql_real_escape_string($_POST["url"]);
                                                $siren = mysql_real_escape_string($_POST["siren"]);
                                                $tva = mysql_real_escape_string($_POST["tva"]);
                                                $societe = mysql_real_escape_string($_POST["societe"]);
                                                $type_user = mysql_real_escape_string($_POST["type_user"]);
                                                $password = md5($pwd);
                                                $headers = 'From: info@illico-immat.fr' . "\r\n" .
                                                        'Reply-To: info@illico-immat.fr' . "\r\n" .
                                                        'X-Mailer: PHP/' . phpversion();
                                                $sql_exist = mysql_query("select * from immat_users where email='" . $login . "'");
                                                $nb = mysql_num_rows($sql_exist);
                                                if ($nb == 0) {

                                                    if ($type_user == "Professionnel") {
                                                        mysql_query("insert into immat_users(nom,prenom,adresse,cp,ville,tel,email,pwd,societe,fax,url,siren,numtva,date_add,status,type)values('" . $nom . "','" . $prenom . "','" . $adresse . "','" . $cp . "','" . $ville . "','" . $tel . "','" . $login . "','" . $password . "','" . $societe . "','" . $fax . "','" . $url . "','" . $siren . "','" . $tva . "','" . date('Y-m-d H:i:s') . "',0,'" . $type_user . "')")or die(mysql_error());
                                                        $message = "Bonjour Mr " . $prenom . ", <br>Merci pour votre inscription à notre site Illico-Immat.<br>Veuillez completer votre inscription avec l'envoie des docuement necessaire à l'adresse postal : <br>Cordialement,<br>Illico-Immat Team ";
                                                        mail($login, "Inscription au site Illico-Immat", $message, $headers);
                                                        echo '<script>window.location="valid_inscription_pro.php"</script>';
                                                    } else {
                                                        mysql_query("insert into immat_users(nom,prenom,adresse,cp,ville,tel,email,pwd,societe,fax,url,siren,numtva,date_add,status,type)values('" . $nom . "','" . $prenom . "','" . $adresse . "','" . $cp . "','" . $ville . "','" . $tel . "','" . $login . "','" . $password . "','" . $societe . "','" . $fax . "','" . $url . "','" . $siren . "','" . $tva . "','" . date('Y-m-d H:i:s') . "',1,'" . $type_user . "')")or die(mysql_error());
                                                        $message = "Bonjour Mr " . $prenom . ", <br>Merci pour votre inscription à notre site Illico-Immat.<br>Cordialement,<br>Illico-Immat Team ";
                                                        mail($login, "Inscription au site Illico-Immat", $message, $headers);
                                                        echo '<script>window.location="valid_inscription.php"</script>';
                                                    }
                                                } else {
                                                    echo '<script>alert("Adresse mail déjà existante !")</script>';
                                                    echo '<script>history.back()</script>';
                                                }
                                            }
                                            ?>
                                            <form method="post" action="">
                                                <div class="tab-content">
                                                    <!-- PROFIE PERSONAL INFO -->
                                                    <div id="personalinfo" class="tab-pane fade active in">

                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="signup-form">
                                                                    <div class="row">
                                                                        <div class="input-group">
                                                                            <label style="padding-left: 15px;">Vous êtes?</label><br>
                                                                            <label class="checkbox-inline registeredv" style="font-weight: bold; font-size: 15px"><input type="radio" name="type_user" value="Professionnel" checked=""> Professionnel</label>
                                                                            <label class="checkbox-inline noregisteredv" style="font-weight: bold; font-size: 15px"><input type="radio" name="type_user" value="Particulier"> Particulier</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">

                                                            <div class="col-md-8">
                                                                <div class="signup-form">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label>Nom d'utilisateur</label>
                                                                            <input type="email" class="form-control" name="login" placeholder="mail@example.com" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 ">
                                                                            <div class="" style="position: relative; display: block; vertical-align: baseline; margin: 0px 0px 5px;"><input type="password" name="pwd" placeholder="Saisir un mot de passe" class="form-control password-input margin-5 hideShowPassword-field" style="margin: 0px; padding-right: 46px;"></div>
                                                                            <a class="password-generate pass-actions" href="javascript:void(0);"><i class="fa fa-refresh"></i></a>
                                                                            <div class="progress"><div style="width: 0%" class="progress-bar password-output"></div></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Prénom *</label>
                                                                        <input type="text" name="prenom" class="form-control" placeholder="" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Nom</label>
                                                                        <input type="text" name="nom" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Société *</label>
                                                                        <input type="text" name="societe" class="form-control" placeholder="" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Téléphone</label>
                                                                        <input type="text" name="tel" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label>Adresse *</label>
                                                                        <textarea type="text" name="adresse" class="form-control" placeholder="" required></textarea>
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Code postal *</label>
                                                                        <input type="text" name="cp" class="form-control" placeholder="" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Ville</label>
                                                                        <input type="text" name="ville" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Fax</label>
                                                                        <input type="text" name="fax" class="form-control" placeholder="" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Site web</label>
                                                                        <input type="text" name="url" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>SIREN</label>
                                                                        <input type="text" name="siren" class="form-control" placeholder="" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Numéro TVA</label>
                                                                        <input type="text" name="tva" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <button type="submit" class="btn btn-info">Créer mon compte</button>
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