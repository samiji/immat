<?php
include("config.php");
include("include/util.php");
if (!isset($_SESSION['user']))
    header("location:connect.php");

$user = mysql_fetch_array(mysql_query("select * from immat_users where email='" . $_SESSION['user'] . "'"));

$id_cmd = $_SESSION["id_cmd"];
$oo = mysql_query("select * from immat_user_info_voiture where id=" . $id_cmd)or die(mysql_error());
$commande = mysql_fetch_array($oo);
$last_amount = number_format($commande['total'], 2, '.', ' ');
$chaine_cmd = $commande['matricule'];
?>

<?php
/* * ***************************************************************************
 *
 * "Open source" kit for Monetico Paiement (TM)
 *
 * File "Phase1Go.php":
 *
 * Author   : Euro-Information/e-Commerce
 * Version  : 4.0
 * Date     : 06/06/2014
 *
 * Copyright: (c) 2014 Euro-Information. All rights reserved.
 * License  : see attached document "License.txt".
 *
 * *************************************************************************** */

// =============================================================================================================================================================
// SECTION INCLUDE :  Cette section ne doit pas être modifié.
// Attention !! MoneticoPaiement_Config contient la clé, vous devez protéger ce fichier avec tous les mécanismes disponibles dans votre environnement de développement.
// Vous pouvez pour l'instance mettre ce fichier dans un autre répertoire et/ou changer son nom. Dans ce cas, n'oubliez pas d'adapter le chemin d'inclusion ci-dessous.
//
// INCLUDE SECTION :  This section must not be modified
// Warning !! MoneticoPaiement_Config contains the key, you have to protect this file with all the mechanism available in your development environment.
// You may for instance put this file in another directory and/or change its name. If so, don't forget to adapt the include path below.
// =============================================================================================================================================================

require_once("MoneticoPaiement_Config.php");

// PHP implementation of RFC2104 hmac sha1 ---
require_once("MoneticoPaiement_Ept.inc.php");

// =============================================================================================================================================================
// FIN SECTION INCLUDE
//
// END INCLUDE SECTION
// =============================================================================================================================================================
// =============================================================================================================================================================
// SECTION PAIEMENT : Cette section doit être modifiée
// Ci-après, vous trouverez un exemple des valeurs requises pour effectuer un paiement en utilisant la solution Monetico Paiement.
// L'ordre des variables et le format des valeurs doivent correspondre aux spécifications techniques.
//
// PAYMENT SECTION :  This section must be modified 
// Here after, you will find an example of the values needed to demand a payment using the Monetico paiement solution.
// The order of the variables and the format of the values must follow the technical specification. 
// =============================================================================================================================================================
// -------------------------------------------------------------------------------------------------------------------------------------------------------------
// SECTION PAIEMENT - Section générale
// 
// PAYMENT SECTION - General section
// -------------------------------------------------------------------------------------------------------------------------------------------------------------
// Reference: unique, alphaNum (A-Z a-z 0-9), 12 characters max
$sReference = $commande['ref_cmd'];

// Amount : format  "xxxxx.yy" (no spaces)
$sMontant = $last_amount;
$tranche = $last_amount / 3;
// Currency : ISO 4217 compliant
$sDevise = "EUR";

// free texte : a bigger reference, session context for the return on the merchant website
$sTexteLibre = "";

// transaction date : format d/m/y:h:m:s
$sDate = date("d/m/Y:H:i:s");

// Language of the company code
$sLangue = "FR";

// customer email
$sEmail = $_SESSION['user'];

$sOptions = "";

// -------------------------------------------------------------------------------------------------------------------------------------------------------------
// SECTION PAIEMENT FRACTIONNE - Section spécifique au paiement fractionné
// 
// INSTALMENT PAYMENT SECTION - Section specific to the installment payment
// -------------------------------------------------------------------------------------------------------------------------------------------------------------
// between 2 and 4
// entre 2 et 4
//$sNbrEch = "4";
$sNbrEch = 3;
$ladate = date("Y-m-d");
$ech1 = date('d/m/Y', strtotime('+0 month', strtotime($ladate)));
$ech2 = date('d/m/Y', strtotime('+1 month', strtotime($ladate)));
$ech3 = date('d/m/Y', strtotime('+2 month', strtotime($ladate)));
// date echeance 1 - format dd/mm/yyyy
//$sDateEcheance1 = date("d/m/Y");
$sDateEcheance1 = $ech1;

// montant �ch�ance 1 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance1 = "0.26" . $sDevise;
$sMontantEcheance1 = "$tranche"."EUR";

// date echeance 2 - format dd/mm/yyyy
$sDateEcheance2 = $ech2;

// montant �ch�ance 2 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance2 = "0.25" . $sDevise;
$sMontantEcheance2 = "$tranche"."EUR";

// date echeance 3 - format dd/mm/yyyy
$sDateEcheance3 = $ech3;

// montant �ch�ance 3 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance3 = "0.25" . $sDevise;
$sMontantEcheance3 = "$tranche"."EUR";

// date echeance 4 - format dd/mm/yyyy
$sDateEcheance4 = "";

// montant �ch�ance 4 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance4 = "0.25" . $sDevise;
$sMontantEcheance4 = "";

// =============================================================================================================================================================
// FIN SECTION PAIEMENT
//
// END PAYMENT SECTION 
// =============================================================================================================================================================
// =============================================================================================================================================================
// SECTION CODE : Cette section ne doit pas être modifiée
// 
// CODE SECTION : This section must not be modified
// =============================================================================================================================================================

$oEpt = new MoneticoPaiement_Ept($sLangue);
$oHmac = new MoneticoPaiement_Hmac($oEpt);

// Control String for support
$CtlHmac = sprintf(MONETICOPAIEMENT_CTLHMAC, $oEpt->sVersion, $oEpt->sNumero, $oHmac->computeHmac(sprintf(MONETICOPAIEMENT_CTLHMACSTR, $oEpt->sVersion, $oEpt->sNumero)));

// Data to certify
$phase1go_fields = sprintf(MONETICOPAIEMENT_phase1go_fields, $oEpt->sNumero, $sDate, $sMontant, $sDevise, $sReference, $sTexteLibre, $oEpt->sVersion, $oEpt->sLangue, $oEpt->sCodeSociete, $sEmail, $sNbrEch, $sDateEcheance1, $sMontantEcheance1, $sDateEcheance2, $sMontantEcheance2, $sDateEcheance3, $sMontantEcheance3, $sDateEcheance4, $sMontantEcheance4, $sOptions);

// MAC computation
$sMAC = $oHmac->computeHmac($phase1go_fields);

// =============================================================================================================================================================
// FIN SECTION CODE
//
// END CODE SECTION 
// =============================================================================================================================================================
?>
<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
          ================================================== -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Paiement sécurisé</title>
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
                                                    $detail_sql = mysql_query("select * from immat_cmd_detail where idcmd=" . $id_cmd);
                                                    while ($detail = mysql_fetch_array($detail_sql)) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <div class="search-find-results" style="padding-left: 20px;">
                                                                    <h5><?php echo stripslashes($detail['prestation']); ?></h5>   
                                                                </div>
                                                            </td>
                                                            <td><span class="price">€ <?php echo number_format($detail['montant'], 2, ',', ' '); ?></span></td>

                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 dealer-block">
                                            <h2>Adresse de Livraison</h2>
                                            <?php
                                            $sql_adr = mysql_query("select * from immat_adresselivraison where idcmd=" . $id_cmd);
                                            $adr = mysql_fetch_array($sql_adr);
                                            ?>
                                            <div style="font-size: 16px; line-height: 36px;">
                                                <div><?php echo $adr['nom']; ?></div>
                                                <div><?php echo $adr['rue'] . ", " . $adr['adresse']; ?></div>
                                                <div><?php echo $adr['cp'] . ", " . $adr['ville']; ?></div>

                                                <div>France</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 dealer-block"></div>
                                        <div class="col-md-4 col-sm-4 dealer-block">
                                            <div style="background-color:#ccc" class="dealer-block-inner">
                                                <div class="dealer-block-cont">
                                                    <div class="dealer-block-info" style="text-align: right; margin-top: 10px;">
                                                        <span class="label label-default" style="font-size: 30px ! important;">€ <?php echo number_format($last_amount, 2, ',', ' '); ?></span>
                                                    </div>
                                                    <div class="dealer-block-text">
                                                        <p>Vous pouvez procéder au paiement en cliquant sur le bouton Payer</p>

                                                    </div>
                                                    <div class="text-align-center">




                                                        <form action="<?php echo $oEpt->sUrlPaiement; ?>" method="post" id="PaymentRequest">
                                                            <input type="hidden" name="version"             id="version"        value="<?php echo $oEpt->sVersion; ?>" />
                                                            <input type="hidden" name="TPE"                 id="TPE"            value="<?php echo $oEpt->sNumero; ?>" />
                                                            <input type="hidden" name="date"                id="date"           value="<?php echo $sDate; ?>" />
                                                            <input type="hidden" name="montant"             id="montant"        value="<?php echo $sMontant . $sDevise; ?>" />
                                                            <input type="hidden" name="reference"           id="reference"      value="<?php echo $sReference; ?>" />
                                                            <input type="hidden" name="MAC"                 id="MAC"            value="<?php echo $sMAC; ?>" />
                                                            <input type="hidden" name="url_retour"          id="url_retour"     value="<?php echo $oEpt->sUrlKO; ?>" />
                                                            <input type="hidden" name="url_retour_ok"       id="url_retour_ok"  value="<?php echo $oEpt->sUrlOK; ?>" />
                                                            <input type="hidden" name="url_retour_err"      id="url_retour_err" value="<?php echo $oEpt->sUrlKO; ?>" />
                                                            <input type="hidden" name="lgue"                id="lgue"           value="<?php echo $oEpt->sLangue; ?>" />
                                                            <input type="hidden" name="societe"             id="societe"        value="<?php echo $oEpt->sCodeSociete; ?>" />
                                                            <input type="hidden" name="texte-libre"         id="texte-libre"    value="<?php echo HtmlEncode($sTexteLibre); ?>" />
                                                            <input type="hidden" name="mail"                id="mail"           value="<?php echo $sEmail; ?>" />

                                                            <input type="hidden" name="nbrech"              id="nbrech"         value="<?php echo $sNbrEch; ?>" />
                                                            <input type="hidden" name="dateech1"            id="dateech1"       value="<?php echo $sDateEcheance1; ?>" />
                                                            <input type="hidden" name="montantech1"         id="montantech1"    value="<?php echo $sMontantEcheance1; ?>" />
                                                            <input type="hidden" name="dateech2"            id="dateech2"       value="<?php echo $sDateEcheance2; ?>" />
                                                            <input type="hidden" name="montantech2"         id="montantech2"    value="<?php echo $sMontantEcheance2; ?>" />
                                                            <input type="hidden" name="dateech3"            id="dateech3"       value="<?php echo $sDateEcheance3; ?>" />
                                                            <input type="hidden" name="montantech3"         id="montantech3"    value="<?php echo $sMontantEcheance3; ?>" />
                                                            <input type="hidden" name="dateech4"            id="dateech4"       value="<?php echo $sDateEcheance4; ?>" />
                                                            <input type="hidden" name="montantech4"         id="montantech4"    value="<?php echo $sMontantEcheance4; ?>" />
                                                            <input type="checkbox" required="" value=""> <a href="CVG ILLICO IMMAT.pdf" target="_blanc"> J'accepte les conditions d'utilisations</a>
                                                            <button type="submit" class="btn btn-primary" id="payerfact">PAYER</button>
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