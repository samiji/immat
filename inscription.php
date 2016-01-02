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
                                                        $message = "Bonjour Madame, Monsieur,\n

Nous vous remercions de votre visite sur le site illico-immat.fr. Vous recevrez une réponse à votre demande dans les meilleurs délais.\n

Attention : ce message étant envoyé automatiquement, vous ne pouvez y répondre. Nous vous 

invitons à vous reconnecter sur le site illico-immat.fr pour toute autre demande.\n

L'Équipe ILLICO IMMAT FRANCE.\n

La lettre d'information de ILLICO IMMAT FRANCE Particuliers :\n

Rendez-vous à l'adresse suivante : http://illico-immat.fr/newsletter-presentation/ pour tout savoir chaque mois de l'actualité de nos produits et promotions.\n

Information sécurité:\n

Lorsque ILLICO IMMAT FRANCE vous adresse un courriel (e.mail), nous appliquons les règles de sécurité suivantes :\n

- le courriel est référencé avec ILLICO IMMAT comme expéditeur,\n

- le courriel ne vous invite pas à communiquer vos codes personnels ou des informations personnelles ou bancaires.\n

Attention : si ces règles ne sont pas respectées, il s'agit très probablement d'un courriel frauduleux.\n

En cas de doute sur l'origine du courriel : ne répondez pas, ne tenez pas compte des informations 

qu'il contient, ne cliquez sur aucun lien, n'appelez pas les éventuels numéros indiqués. Faites suivre 

le courriel que vous avez reçu à l'adresse e-mail que vous trouverez dans notre dossier de sécurité 

sur la page : https://informations.illico-immat.fr/securite/.\n

Enfin, détruisez le courriel suspect.";
                                                        mail($login, "Inscription au site Illico-Immat", $message, $headers);
                                                        echo '<script>window.location="http://www.illico-immat.fr/validation-inscription-pro"</script>';
                                                    } else {
                                                        mysql_query("insert into immat_users(nom,prenom,adresse,cp,ville,tel,email,pwd,societe,fax,url,siren,numtva,date_add,status,type)values('" . $nom . "','" . $prenom . "','" . $adresse . "','" . $cp . "','" . $ville . "','" . $tel . "','" . $login . "','" . $password . "','" . $societe . "','" . $fax . "','" . $url . "','" . $siren . "','" . $tva . "','" . date('Y-m-d H:i:s') . "',1,'" . $type_user . "')")or die(mysql_error());
                                                        $message = "Bonjour Madame, Monsieur,\n

Nous vous remercions de votre inscription sur le site illico-immat.fr. Vous pouvez des-à-présent profiter des prestations de l'équipe ILLICO IMMAT FRANCE.\n

Attention : ce message étant envoyé automatiquement, vous ne pouvez y répondre. \n

L'Équipe ILLICO IMMAT FRANCE.\n

La lettre d'information de ILLICO IMMAT FRANCE Particuliers :\n

Rendez-vous à l'adresse suivante : http://illico-immat.fr/newsletter-presentation/ pour tout savoir chaque mois de l'actualité de nos produits et promotions.\n

Information sécurité :\n

Lorsque ILLICO IMMAT FRANCE vous adresse un courriel (e.mail), nous appliquons les règles de sécurité suivantes :\n

- le courriel est référencé avec ILLICO IMMAT comme expéditeur,\n

- le courriel ne vous invite pas à communiquer vos codes personnels ou des informations personnelles ou bancaires.\n

Attention : si ces règles ne sont pas respectées, il s'agit très probablement d'un courriel frauduleux.\n

En cas de doute sur l'origine du courriel : ne répondez pas, ne tenez pas compte des informations qu'il contient, ne cliquez sur aucun lien, n'appelez pas les éventuels numéros indiqués. Faites suivre 

le courriel que vous avez reçu à l'adresse e-mail que vous trouverez dans notre dossier de sécurité sur la page : https://informations.illico-immat.fr/securite/.\n

Enfin, détruisez le courriel suspect.";
                                                        mail($login, "Inscription au site Illico-Immat", $message, $headers);
                                                        echo '<script>window.location="http://www.illico-immat.fr/validation-inscription"</script>';
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
                                                                            <label class="checkbox-inline registeredv" style="font-weight: bold; font-size: 15px" onclick="show_bloc()"><input type="radio" name="type_user" value="Professionnel" checked=""> Professionnel</label>
                                                                            <label class="checkbox-inline noregisteredv" style="font-weight: bold; font-size: 15px" onclick="hide_bloc()"><input type="radio" name="type_user" value="Particulier"> Particulier</label>
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
                                                                            <label>Nom d'utilisateur *</label>
                                                                            <input type="email" class="form-control" name="login" placeholder="mail@example.com" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 ">
                                                                            <label>Mot de passe *</label>
                                                                            <div class="" style="position: relative; display: block; vertical-align: baseline; margin: 0px 0px 5px;"><input type="password" name="pwd" placeholder="Saisir un mot de passe" class="form-control password-input margin-5 hideShowPassword-field" style="margin: 0px; padding-right: 46px;"></div>
                                                                            <a class="password-generate pass-actions" href="javascript:void(0);"><i class="fa fa-refresh"></i></a>
                                                                            <div class="progress"><div style="width: 0%" class="progress-bar password-output"></div></div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <label>Confirmer mot de passe *</label>
                                                                            <input type="password" class="form-control" name="pwd2" placeholder="Confirmer mot de passe" required>
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
                                                                        <label>Nom *</label>
                                                                        <input type="text" name="nom" class="form-control" placeholder="" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Adresse</label>
                                                                        <input type="text" name="adresse" class="form-control" placeholder="" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Téléphone</label>
                                                                        <input type="text" name="tel" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>  
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Code postal</label>
                                                                        <input type="text" name="cp" class="form-control" placeholder="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Ville</label>
                                                                        <input type="text" name="ville" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>


                                                                <div class="row" id="bloc_pro">
                                                                    <div class="col-md-6">

                                                                        <label>Société</label>
                                                                        <input type="text" name="societe" class="form-control" placeholder="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Fax</label>
                                                                        <input type="text" name="fax" class="form-control" placeholder="">
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label>Site web</label>
                                                                        <input type="text" name="url" class="form-control" placeholder="">
                                                                    </div>


                                                                    <div class="col-md-6">
                                                                        <label>SIREN</label>
                                                                        <input type="text" name="siren" class="form-control" placeholder="">
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