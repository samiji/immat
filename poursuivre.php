<?php
include("config.php");
include("include/util.php");
if (!isset($_SESSION['user']))
    header("location:connect.php");

$user = mysql_fetch_array(mysql_query("select * from immat_users where email='" . $_SESSION['user'] . "'"));
$id_cmd = $_SESSION['id_cmd'];
$oo = mysql_query("select * from immat_user_info_voiture where id=" . $id_cmd)or die(mysql_error());
$commande = mysql_fetch_array($oo);
$last_amount = $commande['total'];
$code = $_POST['reduction'];
$dt = date("Y-m-d");
$chaine_cmd = $commande['matricule'];
$totalpayer = $last_amount;
$identifiant = $_SESSION['identifiant'];
?>
<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
          ================================================== -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Validation de la commande</title>
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

                                    <div class="tab-content">
                                        <!-- PROFIE PERSONAL INFO -->
                                        <div id="personalinfo" class="tab-pane fade active in">

                                            <div class="row">

                                                <div class="col-md-12">

                                                    <div class="signup-form">
                                                        <?php
                                                        if ($commande['marque'] != '') {
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Marque</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="<?php echo $commande['marque']; ?>" disabled="">
                                                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                    </div> 
                                                                </div>

                                                                <div class="col-md-6 ">
                                                                    <label>Modèle</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="<?php
                                                                        echo $commande['modele'];
                                                                        ;
                                                                        ?>" disabled="">
                                                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 ">
                                                                    <label>Energie</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="<?php
                                                                        echo $commande['energie'];
                                                                        ;
                                                                        ?>" disabled="">
                                                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                    </div> 

                                                                </div>


                                                                <div class="col-md-6 ">
                                                                    <label>Puissance fiscale</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="<?php
                                                                        echo $commande['puissance'];
                                                                        ;
                                                                        ?>" disabled="">
                                                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                    </div> 

                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-6 ">
                                                                <label>Email</label>
                                                                <input type="email" name="email" id="email" class="form-control" placeholder="" value="<?php echo $_SESSION['user']; ?>" disabled="">
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <label>Departement</label>
                                                                <?php
                                                                $sql_marque = mysql_query("select * from immat_cp_cheval_fiscal where id='" . $commande['cp'] . "'")or die(mysql_error());
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
                                                    $sql_cmd = mysql_query("select * from immat_cmd_detail where idcmd=" . $id_cmd);
                                                    while ($dat_cmd = mysql_fetch_array($sql_cmd)) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <div class="search-find-results" style="padding-left: 20px;">
                                                                    <h5><?php echo $dat_cmd['prestation']; ?></h5>   
                                                                </div>
                                                            </td>
                                                            <td><span class="price"><?php if ($dat_cmd["prestation"] == "Coupon de réduction") echo "-"; ?>€ <?php echo $dat_cmd['montant']; ?></span></td>
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
                                        <div class="col-md-4 col-sm-4 dealer-block">
                                            <h2>Adresse de Livraison</h2>
                                            <input type="text" id="raison" class="form-control" placeholder="Entrer votre nom ou votre raison social" />
                                            <input type="text" id="rue" class="form-control" placeholder="Numéro de la rue" />
                                            <input type="text" id="adresse" class="form-control" placeholder="Adresse postale" />
                                            <input type="text" id="cp" maxlength="5" class="form-control" placeholder="Code postal" />
                                            <input type="text" id="ville" class="form-control" placeholder="Ville" />
                                            <input type="text" id="pays" class="form-control"  value="France" disabled="" />
                                            <button type="button" class="btn btn-danger" onclick="saveadresse()">Valider avant de payer</button>
                                        </div>
                                        <div class="col-md-4 col-sm-4 dealer-block"></div>
                                        <div class="col-md-4 col-sm-4 dealer-block">
                                            <div>
                                                <div class="dealer-block-cont">
                                                    <div class="dealer-block-info" style="text-align: right; margin-top: 10px;">
                                                        <span class="label label-default" style="font-size: 30px ! important;">€ <?php echo number_format($totalpayer, 2, ',', ' '); ?></span>
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