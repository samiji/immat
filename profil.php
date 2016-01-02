<?php
include("config.php");
include("include/util.php");
if (!isset($_SESSION['user']))
    header("location:index.php");

$user = mysql_fetch_array(mysql_query("select * from immat_users where email='" . $_SESSION['user'] . "'"));


if (isset($_POST["ancien"])) {
    $ancien = md5($_POST["ancien"]);
    $pwd_verif = mysql_query("select * from immat_users where email= '" . $_SESSION['user'] . "' and pwd='" . $ancien . "'")or die(mysql_error());
    $nb = mysql_num_rows($pwd_verif);

    if ($nb == 0) {
        echo '<script>alert("Mot de passe érronée !");</script>';
    } else {
        $new = md5($_POST["new"]);
        $new2 = md5($_POST["new2"]);
        if (strcmp($new, $new2) !== 0) {
            echo '<script>alert("Nouvelles mots de passe non identiques !");</script>';
        } else {
            mysql_query("update immat_users set pwd='" . $new . "' where email='" . $_SESSION['user'] . "'");
            echo '<script>alert("Modifications effectuées avec succès !");</script>';
            echo '<script>window.location="http://www.illico-immat.fr/mon-compte"</script>';
        }
    }
}
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
                                <div class="col-md-3 col-sm-4">
                                    <!-- SIDEBAR -->
                                    <div class="users-sidebar tbssticky">
                                        <a href="http://www.illico-immat.fr" class="btn btn-block btn-primary add-listing-btn">Commander</a>
                                        <ul class="list-group">
                                            <li class="list-group-item active"> <a href="mon-compte"><i class="fa fa-user"></i> Mon profil</a></li>

                                            <li class="list-group-item"> <a href="deconnexion"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
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

                                            <div class="tab-content">
                                                <!-- PROFIE PERSONAL INFO -->
                                                <div id="personalinfo" class="tab-pane fade active in">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <?php
                                                            if (isset($_POST["prenom"])) {
                                                                $prenom = $_POST["prenom"];
                                                                $nom = $_POST["nom"];
                                                                $tel = $_POST["tel"];
                                                                $adresse = $_POST["adresse"];
                                                                $ville = $_POST["ville"];
                                                                $cp = $_POST["cp"];
                                                                $fax = $_POST["fax"];
                                                                $url = $_POST["url"];
                                                                $siren = $_POST["siren"];
                                                                $tva = $_POST["tva"];
                                                                mysql_query("update immat_users set prenom='" . $prenom . "', nom='" . $nom . "',tel='" . $tel . "',adresse='" . $adresse . "', ville='" . $ville . "', cp='" . $cp . "', fax='" . $fax . "', url='" . $url . "',siren='" . $siren . "',numtva='" . $tva . "' where email='" . $_SESSION['user'] . "'")or die(mysql_error());
                                                                echo '<script>alert("Modifications effectuées avec succès !");</script>';
                                                                echo '<script>window.location="http://www.illico-immat.fr/mon-compte"</script>';
                                                            }
                                                            ?>
                                                            <form method="post" action="">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Prénom*</label>
                                                                        <input type="text" class="form-control" name="prenom" placeholder="" value="<?php echo $user['prenom']; ?>">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Nom</label>
                                                                        <input type="text" class="form-control" name="nom" value="<?php echo $user['nom']; ?>" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Email*</label>
                                                                        <input type="text" class="form-control" value="<?php echo $user['email']; ?>" placeholder="mail@example.com" disabled="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Télephone</label>
                                                                        <input type="text" class="form-control" name="tel" value="<?php echo $user['tel']; ?>" placeholder="000-00-0000">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label>Adresse*</label>
                                                                        <textarea type="text" name="adresse" name="adresse" class="form-control" placeholder=""><?php echo $user['adresse']; ?></textarea>                
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Ville*</label>
                                                                        <input type="text" name="ville" class="form-control" value="<?php echo $user['ville']; ?>" placeholder="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Code postal</label>
                                                                        <input type="text" name="cp" class="form-control" value="<?php echo $user['cp']; ?>" placeholder="">
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


                                                                <button type="submit" class="btn btn-info">Modifier</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- PROFIE BILLING INFO -->
                                                <div id="billinginfo" class="tab-pane fade">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <?php
                                                                $sql_cmd = mysql_query("select * from immat_user_info_voiture where user='" . $_SESSION['user'] . "' and payer=1");
                                                                $nb_cmd = mysql_num_rows($sql_cmd);
                                                                if ($nb_cmd == 0) {
                                                                    ?>
                                                                    Vous n'avez aucune commande. cliquez <a href="http://www.illico-immat.fr">ici</a> pour commander.
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td>Commande</td>
                                                                            <td>Total</td>
                                                                            <td>Date</td>
                                                                            <td>Status</td>
                                                                        </tr>  
                                                                        <tbody>
                                                                            <?php
                                                                            while ($cmd_data = mysql_fetch_array($sql_cmd)) {
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?php echo $cmd_data['ref_cmd']; ?></td>
                                                                                    <td><?php echo $cmd_data['total']; ?></td>
                                                                                    <td><?php echo $cmd_data['date_add']; ?></td>
                                                                                    <td><?php
                                                                                        if ($cmd_data['status'] == 0)
                                                                                            echo '<span class="label label-warning">En attente</span>';
                                                                                        if ($cmd_data['status'] == 1)
                                                                                            echo '<span class="label label-success">Validée</span>';
                                                                                        if ($cmd_data['status'] == 2)
                                                                                            echo '<span class="label label-danger"Annulée</span>';
                                                                                        ?></td>
                                                                                </tr>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                    <?php
                                                                } // FIN IF
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- PROFIE CHANGE PASSWORD -->
                                                <div id="changepassword" class="tab-pane fade">

                                                    <div class="row">
                                                        <form method="post" action="">

                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Ancien mot de passe</label>
                                                                        <input type="password"  name="ancien" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Nouveau mot de passe</label>
                                                                        <input type="password" name="new" class="form-control" placeholder="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Confirmer nouveau mot de passe</label>
                                                                        <input type="password" name="new2" class="form-control" placeholder="">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-info">Modifier Mot de passe</button>
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
                    </div>
                </div>
            </div>
            <!-- End Body Content -->
            <!-- Start site footer -->
            <?php include("module/footer.php"); ?>
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