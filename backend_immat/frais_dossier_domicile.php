<?php
include("../config.php");
include("../include/util.php");
if (!isset($_SESSION['backend']))
    header("location:login.php");

$frais1 = mysql_fetch_array(mysql_query("select * from immat_frais_dossier_domicile where id=1"));
$frais2 = mysql_fetch_array(mysql_query("select * from immat_frais_dossier_auto where id=1"));
$frais3 = mysql_fetch_array(mysql_query("select * from immat_frais_dossier_cession where id=1"));
$frais4 = mysql_fetch_array(mysql_query("select * from immat_frais_dossier where id=1"));
$frais5 = mysql_fetch_array(mysql_query("select * from immat_frais_dossier_moto where id=1"));
$frais6 = mysql_fetch_array(mysql_query("select * from immat_frais_dossier_status where id=1"));
$frais7 = mysql_fetch_array(mysql_query("select * from immat_frais_perte where id=1"));
?>
<!doctype html>
<html class="no-js">
    <head>
        <meta charset="UTF-8">
        <title>Frais Dossier</title>

        <!--IE Compatibility modes-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!--Mobile first-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">

        <!-- Metis core stylesheet -->
        <link rel="stylesheet" href="assets/css/main.min.css">

        <!-- metisMenu stylesheet -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <!--[if lt IE 9]>
          <script src="assets/lib/html5shiv/html5shiv.js"></script>
          <script src="assets/lib/respond/respond.min.js"></script>
          <![endif]-->

        <!--For Development Only. Not required -->
        <script>
            less = {
                env: "development",
                relativeUrls: false,
                rootpath: "../assets/"
            };
        </script>
        <link rel="stylesheet" href="assets/css/style-switcher.css">
        <link rel="stylesheet/less" type="text/css" href="assets/less/theme.less">
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.2.0/less.min.js"></script>

        <!--Modernizr-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    </head>
    <body class="  ">
        <div class="bg-dark dk" id="wrap">
            <div id="top">
                <!-- .navbar -->
                <header class="head">
                    <div class="search-bar">
                        <img src="../images/illicoimmatlogo1.jpg" class="img-responsive" style="width: 160px; margin-left: 12px;" alt="">
                    </div><!-- /.search-bar -->
                    <div class="main-bar">
                        <h3>
                            <i class="fa fa-money"></i>&nbsp; Frais de dossier pour le changement de domicile</h3>
                    </div><!-- /.main-bar -->
                </header><!-- /.head -->
            </div><!-- /#top -->
            <div id="left">
                <div class="media user-media bg-dark dker">
                    <div class="user-media-toggleHover">
                        <span class="fa fa-user"></span> 
                    </div>

                </div>

                <!-- #menu -->
                <?php include("menu.php"); ?><!-- /#menu -->
            </div><!-- /#left -->
            <div id="content">
                <div class="outer">


                    <!--Begin Datatables-->
                    <div class="row" style="color: #000">
                        <div class="col-lg-12">
                            <div class="box">
                                <header>
                                    <div class="icons" style="color: #000">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <h5 style="color: #000">Frais de dossier</h5>
                                </header>
                                <div id="collapse4" class="body">
                                    <div class="row">
                                        <?php
                                        if (isset($_POST['frais_domicile'])) {
                                            mysql_query("update immat_frais_dossier_domicile set frais='" . $_POST['frais_domicile'] . "' where id=1");
                                            echo '<script>alert("Montant modifié !")</script>';
                                            echo '<script>window.location="frais_dossier_domicile.php"</script>';
                                        }
                                        ?>
                                        <form method="post" action="">
                                            <div class="col-md-12">
                                                <div class="col-md-5">Changement du domicile de carte grise</div>
                                                <div class="col-md-2"><input type="text" class="form-control" name="frais_domicile" value="<?php echo $frais1['frais'] ?>" /></div>
                                                <div class="col-md-1">€</div>
                                                <div class="col-md-4"><button type="submit" class="btn btn-primary" name="modif">Modifier</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="collapse4" class="body">
                                    <div class="row">
                                        <?php
                                        if (isset($_POST['frais_auto'])) {
                                            mysql_query("update immat_frais_dossier_auto set frais='" . $_POST['frais_auto'] . "' where id=1");
                                            echo '<script>alert("Montant modifié !")</script>';
                                            echo '<script>window.location="frais_dossier_domicile.php"</script>';
                                        }
                                        ?>
                                        <form method="post" action="">
                                            <div class="col-md-12">
                                                <div class="col-md-5">Frais des plaques</div>
                                                <div class="col-md-2"><input type="text" class="form-control" name="frais_auto" value="<?php echo $frais2['frais'] ?>" /></div>
                                                <div class="col-md-1">€</div>
                                                <div class="col-md-4"><button type="submit" class="btn btn-primary" name="modif">Modifier</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="collapse4" class="body">
                                    <div class="row">
                                        <?php
                                        if (isset($_POST['frais_cession'])) {
                                            mysql_query("update immat_frais_dossier_cession set frais='" . $_POST['frais_cession'] . "' where id=1");
                                            echo '<script>alert("Montant modifié !")</script>';
                                            echo '<script>window.location="frais_dossier_domicile.php"</script>';
                                        }
                                        ?>
                                        <form method="post" action="">
                                            <div class="col-md-12">
                                                <div class="col-md-5">Déclaration de cession</div>
                                                <div class="col-md-2"><input type="text" class="form-control" name="frais_cession" value="<?php echo $frais3['frais'] ?>" /></div>
                                                <div class="col-md-1">€</div>
                                                <div class="col-md-4"><button type="submit" class="btn btn-primary" name="modif">Modifier</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="collapse4" class="body">
                                    <div class="row">
                                        <?php
                                        if (isset($_POST['frais_dossier'])) {
                                            mysql_query("update immat_frais_dossier set frais='" . $_POST['frais_dossier'] . "' where id=1");
                                            echo '<script>alert("Montant modifié !")</script>';
                                            echo '<script>window.location="frais_dossier_domicile.php"</script>';
                                        }
                                        ?>
                                        <form method="post" action="">
                                            <div class="col-md-12">
                                                <div class="col-md-5">Demande de carte grise (neuf/occasion)</div>
                                                <div class="col-md-2"><input type="text" class="form-control" name="frais_dossier" value="<?php echo $frais4['frais'] ?>" /></div>
                                                <div class="col-md-1">€</div>
                                                <div class="col-md-4"><button type="submit" class="btn btn-primary" name="modif">Modifier</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="collapse4" class="body">
                                    <div class="row">
                                        <?php
                                        if (isset($_POST['frais_perte'])) {
                                            mysql_query("update immat_frais_perte set frais='" . $_POST['frais_perte'] . "' where id=1");
                                            echo '<script>alert("Montant modifié !")</script>';
                                            echo '<script>window.location="frais_dossier_domicile.php"</script>';
                                        }
                                        ?>
                                        <form method="post" action="">
                                            <div class="col-md-12">
                                                <div class="col-md-5">Déclaration de Perte/Vol </div>
                                                <div class="col-md-2"><input type="text" class="form-control" name="frais_perte" value="<?php echo $frais7['frais'] ?>" /></div>
                                                <div class="col-md-1">€</div>
                                                <div class="col-md-4"><button type="submit" class="btn btn-primary" name="modif">Modifier</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <div id="collapse4" class="body">
                                    <div class="row">
                                        <?php
                                        if (isset($_POST['modifstatus1'])) {
                                            mysql_query("update immat_matrimonial set prix='" . $_POST['status1'] . "' where id=1");
                                            echo '<script>alert("Montant modifié !")</script>';
                                            echo '<script>window.location="frais_dossier_domicile.php"</script>';
                                        }
                                        ?>
                                        <form method="post" action="">
                                            <?php
                                            $sql_status = mysql_query("select * from immat_matrimonial where id=1");
                                            while ($status = mysql_fetch_array($sql_status)) {
                                                ?>
                                                <div class="col-md-12">
                                                    <div class="col-md-5"><?php echo $status['nom']; ?></div>
                                                    <div class="col-md-2"><input type="text" class="form-control" name="status1" value="<?php echo $status['prix']; ?>" /></div>
                                                    <div class="col-md-1">€</div>
                                                    <div class="col-md-4"><button type="submit" class="btn btn-primary" name="modifstatus1">Modifier</button></div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                                <div id="collapse4" class="body">
                                    <div class="row">
                                        <?php
                                        if (isset($_POST['modifstatus2'])) {
                                            mysql_query("update immat_matrimonial set prix='" . $_POST['status2'] . "' where id=2");
                                            echo '<script>alert("Montant modifié !")</script>';
                                            echo '<script>window.location="frais_dossier_domicile.php"</script>';
                                        }
                                        ?>
                                        <form method="post" action="">
                                            <?php
                                            $sql_status = mysql_query("select * from immat_matrimonial where id=2");
                                            while ($status = mysql_fetch_array($sql_status)) {
                                                ?>
                                                <div class="col-md-12">
                                                    <div class="col-md-5"><?php echo $status['nom']; ?></div>
                                                    <div class="col-md-2"><input type="text" class="form-control" name="status2" value="<?php echo $status['prix']; ?>" /></div>
                                                    <div class="col-md-1">€</div>
                                                    <div class="col-md-4"><button type="submit" class="btn btn-primary" name="modifstatus2">Modifier</button></div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                                <div id="collapse4" class="body">
                                    <div class="row">
                                        <?php
                                        if (isset($_POST['modifstatus3'])) {
                                            mysql_query("update immat_matrimonial set prix='" . $_POST['status2'] . "' where id=3");
                                            echo '<script>alert("Montant modifié !")</script>';
                                            echo '<script>window.location="frais_dossier_domicile.php"</script>';
                                        }
                                        ?>
                                        <form method="post" action="">
                                            <?php
                                            $sql_status = mysql_query("select * from immat_matrimonial where id=3");
                                            while ($status = mysql_fetch_array($sql_status)) {
                                                ?>
                                                <div class="col-md-12">
                                                    <div class="col-md-5"><?php echo $status['nom']; ?></div>
                                                    <div class="col-md-2"><input type="text" class="form-control" name="status3" value="<?php echo $status['prix']; ?>" /></div>
                                                    <div class="col-md-1">€</div>
                                                    <div class="col-md-4"><button type="submit" class="btn btn-primary" name="modifstatus3">Modifier</button></div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                                <div id="collapse4" class="body">
                                    <div class="row">
                                        <?php
                                        if (isset($_POST['modifstatus4'])) {
                                            mysql_query("update immat_matrimonial set prix='" . $_POST['status2'] . "' where id=4");
                                            echo '<script>alert("Montant modifié !")</script>';
                                            echo '<script>window.location="frais_dossier_domicile.php"</script>';
                                        }
                                        ?>
                                        <form method="post" action="">
                                            <?php
                                            $sql_status = mysql_query("select * from immat_matrimonial where id=4");
                                            while ($status = mysql_fetch_array($sql_status)) {
                                                ?>
                                                <div class="col-md-12">
                                                    <div class="col-md-5"><?php echo $status['nom']; ?></div>
                                                    <div class="col-md-2"><input type="text" class="form-control" name="status4" value="<?php echo $status['prix']; ?>" /></div>
                                                    <div class="col-md-1">€</div>
                                                    <div class="col-md-4"><button type="submit" class="btn btn-primary" name="modifstatus4">Modifier</button></div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.row -->

                    <!--End Datatables-->


                </div><!-- /.outer -->
            </div><!-- /#content -->
            <div id="right" class="bg-light lter">

            </div><!-- /#right -->
        </div><!-- /#wrap -->
        <footer class="Footer bg-dark dker">
            <p>2015 &copy; Illico-Immat</p>
        </footer><!-- /#footer -->

        <!-- #helpModal -->
        

        <!--jQuery -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.4/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.18.4/js/jquery.tablesorter.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

        <!--Bootstrap -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

        <!-- MetisMenu -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.js"></script>

        <!-- Screenfull -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/screenfull.js/2.0.0/screenfull.min.js"></script>

        <!-- Metis core scripts -->
        <script src="assets/js/core.min.js"></script>

        <!-- Metis demo scripts -->
        <script src="assets/js/app.js"></script>
        <script>
            $(function () {
                Metis.MetisTable();
                Metis.metisSortable();
            });
        </script>
        <script src="assets/js/style-switcher.min.js"></script>
    </body>