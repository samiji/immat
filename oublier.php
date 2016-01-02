<?php
include("config.php");
include("include/util.php");

function genererMDP($longueur = 8) {
    // initialiser la variable $mdp
    $mdp = "";

    // Définir tout les caractères possibles dans le mot de passe, 
    // Il est possible de rajouter des voyelles ou bien des caractères spéciaux
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";

    // obtenir le nombre de caractères dans la chaîne précédente
    // cette valeur sera utilisé plus tard
    $longueurMax = strlen($possible);

    if ($longueur > $longueurMax) {
        $longueur = $longueurMax;
    }

    // initialiser le compteur
    $i = 0;

    // ajouter un caractère aléatoire à $mdp jusqu'à ce que $longueur soit atteint
    while ($i < $longueur) {
        // prendre un caractère aléatoire
        $caractere = substr($possible, mt_rand(0, $longueurMax - 1), 1);

        // vérifier si le caractère est déjà utilisé dans $mdp
        if (!strstr($mdp, $caractere)) {
            // Si non, ajouter le caractère à $mdp et augmenter le compteur
            $mdp .= $caractere;
            $i++;
        }
    }

    // retourner le résultat final
    return $mdp;
}
?>

<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
          ================================================== -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Mot de passe oublié</title>
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
            <!-- Start Body Content -->
            <div class="main" role="main">
                <div id="content" class="content full dashboard-pages">
                    <div class="container">
                        <div class="text-align-center error-404">
                            <h3>Ré-initialisation de mot de passe</h3>
                            <hr class="sm">
                            <?php
                            if (isset($_POST['f1_email'])) {
                                $email = $_POST['f1_email'];
                                $sql = mysql_query("select * from immat_users where email='" . $email . "'");
                                $nb = mysql_num_rows($sql);
                                if ($nb > 0) {
                                    $headers = 'From: info@illico-immat.fr' . "\r\n" .
                                            'Reply-To: info@illico-immat.fr' . "\r\n" .
                                            'X-Mailer: PHP/' . phpversion();
                                    $new_pwd = genererMDP();
                                    $pwd = md5($new_pwd);
                                    mysql_query("update immat_users set pwd='" . $pwd . "' where email='" . $email . "'");
                                    $msg = "Bonjour,\n\nVous avez demandé de ré-initialiser votre mot de passe.\n\nVotre nouvelle mot de passe est : " . $new_pwd . "\n\nCordialement,\nIllico-Immat Team. ";
                                    mail($email, "Re-initialisation de mot de passe Illico-Immat", $msg, $headers);
                                    echo "<div style='clear: both; margin-bottom: 10px; color: rgb(68, 147, 186); font-style: italic;'>Un email vient d'être envoyer à votre boite de réception.</div>";
                                } else {
                                    echo '<script>alert("Veuillez vérifier votre adresse mail ! ");</script>';
                                }
                            }
                            ?>
                            <form action="" method="post">
                                <div style="margin-left: 0px; padding-left: 0px; padding-right: 10px;" class="col-md-9 col-xs-12">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon" style="color:rgb(64, 131, 196)">@</div>
                                            <input class="form-control" type="email" name="f1_email" placeholder="Email" required="">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success" name="f1_button">Réinitialiser</button>
                            </form>    
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
    </body>
</html>