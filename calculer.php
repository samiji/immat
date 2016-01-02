<?php
include("config.php");
include("include/util.php");


$user = mysql_fetch_array(mysql_query("select * from immat_users where email='" . $_SESSION['user'] . "'"));

$prestation1 = addslashes($_POST['prestation1']);
$prestation2 = addslashes($_POST['prestation2']);
$prestation3 = addslashes($_POST['prestation3']);
$prestation31 = str_replace("\\", "", ($_POST['prestation3']));

$num_immat = addslashes($_POST['num_immat']);

$marque = addslashes($_POST['marque']);
$modele = addslashes($_POST['modele']);
$puissance = addslashes($_POST['puissance']);
$energie = addslashes($_POST['energie']);
$rivet = addslashes($_POST['rivet']);
if ($rivet == "Kit pose") {
    $sql_rivet = mysql_fetch_array(mysql_query("select * from immat_rivet where nom='Kit pose'"));
    $rivet_prix = $sql_rivet['prix'];
} else {
    $rivet_prix = 0;
}

$sticker = addslashes($_POST['sticker']);
if ($sticker != "") {
    $sql_sticker = mysql_fetch_array(mysql_query("select * from immat_sticker where id=1"));
    $sticker_prix = $sql_sticker['prix'];
} else {
    $sticker_prix = 0;
}



if (isset($_POST['matrimoniale'])) {
    $matrimoniale = addslashes($_POST['matrimoniale']);
} else {
    $matrimoniale = "";
}
if (isset($_POST['type_mat'])) {
    $type_mat = addslashes($_POST['type_mat']);
} else {
    $type_mat = "";
}
if ($type_mat != "") {
    $sql_type_mat = mysql_fetch_array(mysql_query("select * from immat_plaque where nom='" . $type_mat . "'"));
    $type_immat_prix = $sql_type_mat['prix'];
} else {
    $type_immat_prix = 0;
}



$email_user = $_SESSION['user'];
$cp = addslashes($_POST['cp']);

$date_add = date("Y-m-d H:i:s");

/*
 * nom de la commande
 */
$chaine_cmd = $num_immat;




/*
 * Frais de dossier
 */
if ($matrimoniale != "")
    $frais_dossier_prestation1 = mysql_fetch_array(mysql_query("select * from immat_matrimonial where id=" . $matrimoniale));
else {
    $frais_dossier_prestation1 = 0;
}
$frais_dossier_prestation2 = mysql_fetch_array(mysql_query("select frais from immat_frais_dossier where id=1"));
$frais_dossier_prestation3 = mysql_fetch_array(mysql_query("select frais from immat_frais_dossier_domicile where id=1"));
$frais_dossier_prestation4 = mysql_fetch_array(mysql_query("select frais from immat_frais_dossier_cession where id=1"));
$frais_dossier_prestation5 = mysql_fetch_array(mysql_query("select frais from immat_frais_dossier_auto where id=1"));
$frais_dossier_prestation7 = mysql_fetch_array(mysql_query("select frais from immat_frais_perte where id=1"));

$frais1 = 0;
$frais2 = 0;
$frais3 = 0;
$frais7 = 0;

if ($prestation1 == "Changement du statut matrimonial") {
    $frais1 = 0;
}
if ($prestation1 == "Demande de carte grise (neuf/occasion)") {
    $frais1 = $frais_dossier_prestation2['frais'];
}
if ($prestation1 == "Changement du domicile de carte grise") {
    $frais1 = $frais_dossier_prestation3['frais'];
}

if ($prestation2 == "Déclaration de cession") {
    $frais2 = $frais_dossier_prestation4['frais'];
}

if (($prestation31 == "Jeu de plaque d'immatriculation auto")||($prestation31 == "Jeu de plaque d'immatriculation moto")) {
    $frais3 = $frais_dossier_prestation5['frais'];
}



/*
 * Calculer Changement du statut matrimonial
 */
$ville = mysql_fetch_array(mysql_query("select * from immat_cp_cheval_fiscal where id='" . $cp . "'"));
$prix_cheval_fiscal = $ville['prix'];

if ($prestation1 == "Demande de carte grise (neuf/occasion)") {
    $total_prix_chevaux = $prix_cheval_fiscal * $puissance;
}
if ($prestation1 == "Changement du statut matrimonial") {
    $total_prix_chevaux = $frais_dossier_prestation1['prix'];
}
if ($prestation1 == "Changement du domicile de carte grise") {
    $total_prix_chevaux = $prix_cheval_fiscal;
}
if ($prestation2 == "Déclaration de Perte/Vol") {
    $frais7 = $frais_dossier_prestation7['frais'] + $prix_cheval_fiscal;
}

$frais = $frais1 + $frais2 + $frais7 + $frais3;

/*
 * Prix total
 */

$prix_total_payer = $frais + $total_prix_chevaux + ($type_immat_prix * 2) + $rivet_prix + $sticker_prix + $total_prix_chevaux_cession;
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

function random($car) {
    $string = "";
    $chaine = "abcdefghijklmnpqrstuvwxy";
    srand((double) microtime() * 1000000);
    for ($i = 0; $i < $car; $i++) {
        $string .= $chaine[rand() % strlen($chaine)];
    }
    return $string;
}

function random1($car) {
    $string = "";
    $chaine = "123456789";
    srand((double) microtime() * 1000000);
    for ($i = 0; $i < $car; $i++) {
        $string .= $chaine[rand() % strlen($chaine)];
    }
    return $string;
}

// APPEL
// Génère une chaine de longueur 20
$identifiant = random1(3) . "-" . random(5) . "/" . random1(3);
$_SESSION['identifiant'] = $identifiant;

mysql_query("INSERT INTO `immat_user_info_voiture` (`matricule`,  `marque`, `modele`,  `puissance`, `energie`,  `cp`, `user`, `date_add`,ref_cmd,total,status) VALUES ('" . $num_immat . "',  '" . $marque . "', '" . $modele . "', '" . $puissance . "', '" . $energie . "', '" . $cp . "', '" . $email_user . "', '" . $date_add . "','" . $identifiant . "','" . $reduction_prix . "',0);")or die(mysql_error());

$new_id = mysql_insert_id();
$_SESSION['id_cmd'] = $new_id;

if ($prestation1 != "") {
    if ($prestation1 == "Changement du statut matrimonial") {
        $chaine_prestation1 = "Changement du statut matrimonial";
        $prestation1 = $prestation1 . "/" . $frais_dossier_prestation1["nom"];
        mysql_query("insert into immat_cmd_detail(idcmd,prestation,montant)values(" . $new_id . ",'" . $prestation1 . "','" . $total_prix_chevaux . "')");
    } else {
        $chaine_prestation1 = $prestation1;
        mysql_query("insert into immat_cmd_detail(idcmd,prestation,montant)values(" . $new_id . ",'" . $prestation1 . "','" . $total_prix_chevaux . "')");
        mysql_query("insert into immat_cmd_detail(idcmd,prestation,montant)values(" . $new_id . ",'Frais dossier','" . $frais1 . "')");
    }
}
if ($prestation2 == "Déclaration de cession") {
    mysql_query("insert into immat_cmd_detail(idcmd,prestation,montant)values(" . $new_id . ",'" . $prestation2 . "','" . $frais2 . "')");
}
if ($prestation2 == "Déclaration de Perte/Vol") {
    mysql_query("insert into immat_cmd_detail(idcmd,prestation,montant)values(" . $new_id . ",'" . $prestation2 . "','" . $frais7 . "')");
}
if ($prestation3 != "") {

    mysql_query("insert into immat_cmd_detail(idcmd,prestation,montant)values(" . $new_id . ",'" . $type_mat . "','" . $type_immat_prix . "')");
    mysql_query("insert into immat_cmd_detail(idcmd,prestation,montant)values(" . $new_id . ",'Frais de livraison','" . $frais3 . "')");
}
if ($rivet == "Kit pose") {
    mysql_query("insert into immat_cmd_detail(idcmd,prestation,montant)values(" . $new_id . ",'Kit pose','" . $rivet_prix . "')");
}
if ($sticker != "") {
    mysql_query("insert into immat_cmd_detail(idcmd,prestation,montant)values(" . $new_id . ",'Sticker - $sticker','" . $rivet_prix . "')");
}
if ($user['type'] == "Professionnel") {
    mysql_query("insert into immat_cmd_detail(idcmd,prestation,montant)values(" . $new_id . ",'Réduction','" . $montant_a_reduire . "')");
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
    <body style="padding-top: 0px;">
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
                                                        <?php
                                                        if (($prestation1 == "Demande de carte grise (neuf/occasion)") || ($prestation1 == "Changement du domicile de carte grise")|| ($prestation2 == "Déclaration de Perte/Vol")) {
                                                            ?>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Marque</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="<?php echo $marque; ?>" disabled="">
                                                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                    </div> 
                                                                </div>

                                                                <div class="col-md-6 ">
                                                                    <label>Modèle</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="<?php echo $modele; ?>" disabled="">
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
                                                                    <label>Puissance fiscale</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="<?php echo $puissance; ?>" disabled="">
                                                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                    </div> 

                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                    <?php
                                                    if ($prestation1 != "") {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <div class="search-find-results" style="padding-left: 20px;">
                                                                    <h5><?php echo $prestation1; ?></h5>   
                                                                </div>
                                                            </td>
                                                            <td><span class="price">€ <?php echo number_format($total_prix_chevaux, 2, ',', ' '); ?></span></td>

                                                        </tr>
                                                        <?php
                                                        if ($chaine_prestation1 != "Changement du statut matrimonial") {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="search-find-results" style="padding-left: 20px;">
                                                                        <h5><i>Frais de dossier</i> de <?php echo $prestation1; ?></h5>   
                                                                    </div>
                                                                </td>
                                                                <td><span class="price">€ <?php echo number_format($frais1, 2, ',', ' '); ?></span></td>

                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($prestation2 == "Déclaration de cession") {
                                                        ?>

                                                        <tr>
                                                            <td>
                                                                <div class="search-find-results" style="padding-left: 20px;">
                                                                    <h5><?php echo $prestation2; ?></h5>   
                                                                </div>
                                                            </td>
                                                            <td><span class="price">€ <?php echo number_format($frais2, 2, ',', ' '); ?></span></td>

                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($prestation2 == "Déclaration de Perte/Vol") {
                                                        ?>

                                                        <tr>
                                                            <td>
                                                                <div class="search-find-results" style="padding-left: 20px;">
                                                                    <h5><?php echo $prestation2; ?></h5>   
                                                                </div>
                                                            </td>
                                                            <td><span class="price">€ <?php echo number_format($frais7, 2, ',', ' '); ?></span></td>

                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($prestation3 != "") {
                                                        if ($prestation31 != "") {
                                                            ?>

                                                            <tr>
                                                                <td>
                                                                    <div class="search-find-results" style="padding-left: 20px;">
                                                                        <h5><?php echo stripslashes($prestation31 . " / " . $type_mat); ?></h5>   
                                                                    </div>
                                                                </td>
                                                                <td><span class="price">€ <?php echo $type_immat_prix * 2; ?></span></td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="search-find-results" style="padding-left: 20px;">
                                                                        <h5><i>Frais de livraison (livraison colissimo 48h)</i> </h5>   
                                                                    </div>
                                                                </td>
                                                                <td><span class="price">€ <?php echo $frais3; ?></span></td>

                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($sticker != "") {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <div class="search-find-results" style="padding-left: 20px;">
                                                                    <h5>Sticker - <?php echo $sticker ?></h5>   
                                                                </div>
                                                            </td>
                                                            <td><span class="price"> € <?php echo number_format($sticker_prix, 2, ',', ' '); ?></span></td>

                                                        </tr>

                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($rivet == "Kit pose") {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <div class="search-find-results" style="padding-left: 20px;">
                                                                    <h5>Kit pose</h5>   
                                                                </div>
                                                            </td>
                                                            <td><span class="price"> € <?php echo number_format($rivet_prix, 2, ',', ' '); ?></span></td>

                                                        </tr>

                                                        <?php
                                                    }
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
                                        <?php
                                        if (isset($_SESSION['user'])) {
                                            ?>
                                            <form method="post" action="<?php echo url; ?>code-reduction">
                                                <div class="row">
                                                    <div class="col-md-2" style="padding-top: 5px;">Votre code de réduction</div>
                                                    <div class="col-md-3"><input type="text" name="reduction" class="form-control" placeholder="Tapez votre code de réduction" required=""><input type="hidden" value="<?php echo $_SESSION['id_cmd']; ?>" name="id_cmd" /></div>
                                                    <div class="col-md-3"><button class="btn btn-success" type="submit">Re-calculer</button></div>

                                                </div>
                                            </form>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 dealer-block">
                                            <?php
                                            if (isset($_SESSION['user'])) {
                                                ?>
                                                <h2>Adresse de Livraison</h2>
                                                <input type="text" id="raison" class="form-control" placeholder="Entrer votre nom ou votre raison social" />
                                                <input type="text" id="rue" class="form-control" placeholder="Numéro de la rue" />
                                                <input type="text" id="adresse" class="form-control" placeholder="Adresse postale" />
                                                <input type="text" id="cp" maxlength="5" class="form-control" placeholder="Code postal" />
                                                <input type="text" id="ville" class="form-control" placeholder="Ville" />
                                                <input type="text" id="pays" class="form-control"  value="France" disabled="" />
                                                <button type="button" class="btn btn-danger" onclick="saveadresse()">Valider avant de payer</button>
                                                <?php
                                            } else {
                                                ?>
                                                <div>Vous devez vous <a href="<?php echo url; ?>espace-connexion">connecter</a> pour passer votre commande.</div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-3 col-sm-3 dealer-block"></div>
                                        <div class="col-md-4 col-sm-4 dealer-block">
                                            <div>
                                                <div class="dealer-block-cont">
                                                    <div class="dealer-block-info" style="text-align: right; margin-top: 10px;">
                                                        <span class="label label-default" style="font-size: 30px ! important;">€ <?php echo number_format($reduction_prix, 2, ',', ' '); ?></span>
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
                                                    function saveadresse() {
                                                        var nom = document.getElementById("raison").value;
                                                        var rue = document.getElementById("rue").value;
                                                        var adresse = document.getElementById("adresse").value;
                                                        var cp = document.getElementById("cp").value;
                                                        var ville = document.getElementById("ville").value;
                                                        if ((nom != "") && (rue != "") && (adresse != "") && (ville != "")) {
                                                            $.ajax({
                                                                url: 'saveadresse.php?nom=' + nom + '&rue=' + rue + '&adresse=' + adresse + '&ville=' + ville + '&cp=' + cp,
                                                                success: function (data) {
                                                                    var t = eval(data);
                                                                    alert('Adresse de livraison enregistrée');
                                                                    window.location = "http://www.illico-immat.fr/paiement-securise";
                                                                }
                                                            });
                                                        } else {
                                                            alert("Veuillez remplir tous les champs");
                                                        }
                                                    }
        </script>
    </body>
</html>