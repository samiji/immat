<?php
include("config.php");
include("include/util.php");
?>
<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
          ================================================== -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Simulation</title>
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
                                    <h2>Simulation</h2>
                                    <div class="dashboard-block">
                                        <div class="tabs profile-tabs">
                                            <?php
                                            if (isset($_POST['puissance'])) {
                                                $prestation1 = addslashes($_POST['prestation1']);
                                                $prestation2 = addslashes($_POST['prestation2']);
                                                $prestation3 = addslashes($_POST['prestation3']);
                                                $puissance = addslashes($_POST['puissance']);
                                                $cp = addslashes($_POST['cp']);

                                                $frais_dossier_prestation1 = mysql_fetch_array(mysql_query("select frais from immat_frais_dossier_status where id=1"));
                                                $frais_dossier_prestation2 = mysql_fetch_array(mysql_query("select frais from immat_frais_dossier where id=1"));
                                                $frais_dossier_prestation3 = mysql_fetch_array(mysql_query("select frais from immat_frais_dossier_domicile where id=1"));
                                                $frais_dossier_prestation4 = mysql_fetch_array(mysql_query("select frais from immat_frais_dossier_cession where id=1"));
                                                $frais_dossier_prestation5 = mysql_fetch_array(mysql_query("select frais from immat_frais_dossier_auto where id=1"));
                                                $frais_dossier_prestation6 = mysql_fetch_array(mysql_query("select frais from immat_frais_dossier_moto where id=1"));

                                                $frais1 = 0;
                                                $frais2 = 0;
                                                $frais3 = 0;

                                                if ($prestation1 == "Changement du statut matrimonial") {
                                                    $frais1 = $frais_dossier_prestation1['frais'];
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

                                                if ($prestation3 == "Jeu de plaque d\'immatriculation auto") {
                                                    $frais3 = $frais_dossier_prestation5['frais'];
                                                }
                                                if ($prestation3 == "Jeu de plaque d\'immatriculation moto") {
                                                    $frais3 = $frais_dossier_prestation6['frais'];
                                                }

                                                $frais = $frais1 + $frais2 + $frais3;


                                                /*
                                                 * Calculer Changement du statut matrimonial
                                                 */
                                                $ville = mysql_fetch_array(mysql_query("select * from immat_cp_cheval_fiscal where id='" . $cp . "'"));
                                                $prix_cheval_fiscal = $ville['prix'];
                                                if ($prestation1 == "Demande de carte grise (neuf/occasion)") {
                                                    $total_prix_chevaux = $prix_cheval_fiscal * $puissance;
                                                }
                                                if ($prestation1 == "Changement du statut matrimonial") {
                                                    $total_prix_chevaux = $prix_cheval_fiscal;
                                                }
                                                if ($prestation1 == "Changement du domicile de carte grise") {
                                                    $total_prix_chevaux = $prix_cheval_fiscal;
                                                }

                                                /*
                                                 * Prix total
                                                 */

                                                $prix_total_payer = $frais + $total_prix_chevaux;
                                            }
                                            ?>
                                            <form method="post" action="">
                                                <div class="tab-content">
                                                    <!-- PROFIE PERSONAL INFO -->
                                                    <div id="personalinfo" class="tab-pane fade active in">
                                                        <div class="row">

                                                            <div class="col-md-12" style="margin-bottom: 15px;"> 
                                                                <div class="col-md-4">
                                                                    <label style="padding-left: 0px;" class="checkbox-inline registeredv"><input type="radio" value="Changement du statut matrimonial" name="prestation1"> Changement du statut matrimonial  </label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label style="padding-left: 0px;" class="checkbox-inline registeredv"><input type="radio" value="Demande de carte grise (neuf/occasion)" name="prestation1">Demande de carte grise (neuf/occasion)  </label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label style="padding-left: 0px;" class="checkbox-inline registeredv"> <input type="radio" value="Changement du domicile de carte grise" name="prestation1">  Changement du domicile de carte grise </label>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="col-md-12" style="margin-bottom: 15px;">
                                                                <div class="col-md-12">
                                                                    <label style="padding-left: 0px;" class="checkbox-inline registeredv"> <input type="radio" value="Déclaration de cession" name="prestation2"> Déclaration de cession</label> 
                                                                </div>    
                                                            </div>
                                                            <hr>
                                                            <div class="col-md-12" style="margin-bottom: 15px;">
                                                                <div class="col-md-4">
                                                                    <label style="padding-left: 0px;" class="checkbox-inline registeredv"><input type="radio" value="Jeu de plaque d'immatriculation auto" name="prestation3">  Jeu de plaque d'immatriculation auto</label> 
                                                                </div>    
                                                                <div class="col-md-4">
                                                                    <label style="padding-left: 0px;" class="checkbox-inline registeredv"> <input type="radio" value="Jeu de plaque d'immatriculation moto" name="prestation3"> Jeu de plaque d'immatriculation moto  </label>
                                                                </div>    
                                                            </div>

                                                            <hr>

                                                        </div>


                                                        <div class="row">

                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-md-6 ">
                                                                        <label>Departement</label>
                                                                        <select class="form-control" id="cp" name="cp" required="">
                                                                            <option selected=""></option>
                                                                            <?php
                                                                            $sql_marque = mysql_query("select * from immat_cp_cheval_fiscal");
                                                                            while ($data_marque = mysql_fetch_array($sql_marque)) {
                                                                                ?>
                                                                                <option value="<?php echo $data_marque['id']; ?>"><?php echo $data_marque['ville']; ?></option>
                                                                                <?php
                                                                            }
                                                                            ?>

                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-6 ">
                                                                        <label>Puissance fiscale</label>
                                                                        <div class="input-group">
                                                                            <input type="text" required="" name="puissance" accept="puissance" placeholder="" class="form-control">
                                                                            <span class="input-group-addon">Chevaux fiscaux</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <button type="submit" class="btn btn-info">Simuler</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (isset($_POST['puissance'])) {
                                $pour=  mysql_fetch_array(mysql_query("select * from immat_pourcentage_pro where id=1"));
                                $region=  mysql_fetch_array(mysql_query("select * from immat_cp_cheval_fiscal where id=".$_POST["cp"]));
                                ?>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 dealer-block"></div>
                                    <div class="col-md-4 col-sm-4 dealer-block"></div>
                                    <div class="col-md-4 col-sm-4 dealer-block">
                                        <div style="background-color:#ccc" class="dealer-block-inner">
                                            <div class="dealer-block-cont">
                                                <div><?php echo $_POST["prestation1"]; ?></div>
                                                <div><?php echo $_POST["prestation2"]; ?></div>
                                                <div><?php echo $_POST["prestation3"]; ?></div>
                                                <div><?php echo $region["ville"]; ?></div>
                                                <div><?php if($_POST["puissance"]!="") echo $_POST["puissance"]." cheveaux fiscaux."; ?></div>
                                                <hr>
                                                <div class="dealer-block-info" style="text-align: right; margin-top: 10px;">
                                                    <span class="label label-default" style="font-size: 30px ! important;">€ <?php echo number_format($prix_total_payer, 2, ',', ' '); ?></span>
                                                </div>
                                                <div class="dealer-block-text" >
                                                    <p style="color: #000">Vous pouvez s'inscrire à notre site pour valider votre commnde.<br>
                                                    Un compte professionnel vous permet de gagner <?php echo $pour['pourcentage']; ?> % du total de la commande.
                                                    </p>

                                                </div>
                                                
                                            </div>
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