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
        <title>Connexion à Illico-Immat.fr</title>
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
                                    <h2>Espace de connexion</h2>
                                    <div class="dashboard-block">
                                        <div class="tabs profile-tabs">
                                            <?php
                                            if (isset($_POST['login'])) {
                                                $login = mysql_real_escape_string($_POST["login"]);
                                                $pwd = mysql_real_escape_string($_POST["pwd"]);
                                                $password = md5($pwd);

                                                $sql_exist = mysql_query("select * from immat_users where email='" . $login . "' and pwd='" . $password . "'")or die(mysql_error);
                                                $nb = mysql_num_rows($sql_exist);
                                                if ($nb > 0) {
                                                    $data = mysql_fetch_array($sql_exist);

                                                    $etat = $data['status'];
                                                    if ($etat == 1) {
                                                        $_SESSION['user'] = $login;
                                                        echo "<script>window.location='poursuivre-mon-panier'</script>";
                                                    }else{
                                                        echo "<script>window.location='compte-inactif'</script>";
                                                    }
                                                } else {
                                                    echo "<script>alert('Veuillez vérifier vos paramètres de connexion');</script>";
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
                                                                        <div class="col-md-6">
                                                                            <label>Nom d'utilisateur *</label>
                                                                            <input type="email" class="form-control" name="login" placeholder="mail@example.com" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 ">
                                                                            <label>Mot de passe *</label>
                                                                                   <input type="password" name="pwd" placeholder="Saisir un mot de passe" class="form-control" style="margin: 0px; padding-right: 46px;">
                                                                           
                                                                             </div>

                                                                    </div>
                                                                </div>
                                                                <hr
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <button type="submit" class="btn btn-info">Connexion</button>
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
        <script>
                                                                                function hide_bloc() {
                                                                                    $("#bloc_pro").hide();
                                                                                }
                                                                                function show_bloc() {
                                                                                    $("#bloc_pro").show();
                                                                                }
        </script>
    </body>
</html>