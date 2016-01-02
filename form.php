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
        <title>Information vihécule</title>
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
                                            if (isset($_POST['prestation1']))
                                                $prestation1 = $_POST['prestation1'];
                                            else
                                                $prestation1 = "";
                                            if (isset($_POST['prestation2']))
                                                $prestation2 = $_POST['prestation2'];
                                            else
                                                $prestation2 = "";
                                            if (isset($_POST['prestation3']))
                                                $prestation3 = $_POST['prestation3'];
                                            else
                                                $prestation3 = "";
                                            ?>
                                            <form method="post" action="<?php echo url; ?>mon-panier">
                                                <div class="tab-content">
                                                    <!-- PROFIE PERSONAL INFO -->
                                                    <div id="personalinfo" class="tab-pane fade active in">

                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="signup-form">

                                                                    <div class="row text-center">
                                                                        <label class="btn btn-info active" style="font-size: 25px;">
                                                                            <?php echo $_POST['immat_num']; ?>
                                                                        </label>
                                                                    </div>
                                                                    <div class="row">
                                                                        <h4 class="result-item-title" style="font-weight: normal; font-size: 15px; margin-top: 5px; margin-bottom: 5px;">
                                                                            <a>
                                                                                <ul class="inline">
                                                                                    <?php if ($prestation1 != "") { ?>
                                                                                        <li> <?php echo $prestation1; ?> </li>
                                                                                    <?php } ?>
                                                                                    <?php if ($prestation2 != "") { ?>
                                                                                        <li> <?php echo $prestation2; ?> </li>
                                                                                    <?php } ?>
                                                                                    <?php if ($prestation3 != "") { ?>
                                                                                        <li> <?php echo stripslashes($prestation3); ?> </li>
                                                                                    <?php } ?>
                                                                                </ul>

                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                    <?php
                                                                    if ($prestation1 == "Changement du statut matrimonial") {
                                                                        ?>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <label>Statut matrimonial</label>

                                                                                <select class="form-control" id="matrimoniale" name="matrimoniale" required="">
                                                                                    <option selected=""></option>
                                                                                    <?php
                                                                                    $sql_mat = mysql_query("select *  from immat_matrimonial");
                                                                                    while ($data_mat = mysql_fetch_array($sql_mat)) {
                                                                                        ?>
                                                                                        <option value="<?php echo $data_mat['id']; ?>"><?php echo $data_mat['nom']; ?></option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    <input type="hidden" name="num_immat" id="num_immat" value="<?php echo $_POST['immat_num'] ?>" />
                                                                    <input type="hidden" name="prestation1" id="prestation1" value="<?php echo $prestation1 ?>" />
                                                                    <input type="hidden" name="prestation2" id="prestation2" value="<?php echo $prestation2 ?>" />
                                                                    <input type="hidden" name="prestation3" id="prestation3" value="<?php echo $prestation3 ?>" />
                                                                    <?php
                                                                    if (($prestation1 == "Demande de carte grise (neuf/occasion)") || ($prestation1 == "Changement du domicile de carte grise")|| ($prestation2 == "Déclaration de Perte/Vol")) {
                                                                        ?>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label>Marque</label>
                                                                                <select class="form-control" id="marque" name="marque" onchange="getModele()" required="">
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
                                                                            <div class="col-md-6 ">
                                                                                <label>Modèle</label>
                                                                                <select class="form-control" id="modele" name="modele" required=""<></select>
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
                                                                            <div class="col-md-6 ">
                                                                                <label>Puissance fiscale</label>
                                                                                <div class="input-group">
                                                                                    <input type="text" required="" name="puissance" accept="puissance" placeholder="" class="form-control">
                                                                                    <span class="input-group-addon">Chevaux fiscaux</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    <div class="row">

                                                                        <div class="col-md-6 ">
                                                                            <label>Département</label>
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
                                                                    </div>
                                                                    <?php
                                                                    if ($prestation3 != "") {
                                                                        ?>



                                                                        <div class="row">
                                                                            <div class="col-md-6" style="margin-top: 10px; margin-bottom: 10px;">
                                                                                <div class="icon-box ibox-center ibox-rounded">
                                                                                    <div>
                                                                                        <img src="images/pautoplexi.png" alt="">
                                                                                    </div>
                                                                                    <h3 style="margin-top: 15px;">Plaque plexiglass x2</h3>
                                                                                    <p style="color: rgb(233, 108, 76); font-size: 16px; margin-top: 0px;"><input type="radio" name="type_mat" value="Plaque plexiglass x2" checked=""> 13,90 €</p> 
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6" style="margin-top: 10px; margin-bottom: 10px;">
                                                                                <div class="icon-box ibox-center ibox-rounded">
                                                                                    <div>
                                                                                        <img src="images/pautoalu.png" alt="">
                                                                                    </div>
                                                                                    <h3 style="margin-top: 15px;">Plaque aluminium x2</h3>
                                                                                    <p style="color: rgb(233, 108, 76); font-size: 16px; margin-top: 0px;"><input type="radio" name="type_mat" value="Plaque aluminium x2"> 9,90 €</p> 
                                                                                </div>
                                                                            </div>  
                                                                        </div>
                                                                        <hr>
                                                                        <div class="row" style="margin-top: 20px; font-size: 15px;">
                                                                            <div class="col-md-3">Ajouter un sticker sur votre plaque </div>

                                                                            <div class="col-md-4">
                                                                                <select class="form-control" id="cp" name="sticker">
                                                                                    <option selected=""></option>
                                                                                    <?php
                                                                                    $sql_marque = mysql_query("select * from immat_cp_cheval_fiscal");
                                                                                    while ($data_marque = mysql_fetch_array($sql_marque)) {
                                                                                        ?>
                                                                                        <option value="<?php echo $data_marque['ville']; ?>"><?php echo $data_marque['ville']; ?></option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>

                                                                            </div>
                                                                            <div class="col-md-4"><img src="images/stickers.jpg" alt="" class="img-responsive"></div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="row" style="margin-top: 20px; font-size: 15px;">
                                                                            <div class="col-md-3" style="border: 1px solid rgb(85, 85, 85); border-radius: 6px; padding-top: 10px; padding-bottom: 10px;"><input type="radio" name="rivet" value="Rivet offert" checked=""> Rivet offert</div>
                                                                            <div class="col-md-1"></div>
                                                                            <div class="col-md-3" style="border: 1px solid rgb(85, 85, 85); border-radius: 6px; padding-top: 10px; padding-bottom: 10px;"><input type="radio" name="rivet" value="Kit pose"> Kit pose +9,00 €</div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>
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