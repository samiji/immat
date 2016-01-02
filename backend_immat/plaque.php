<?php
include("../config.php");
include("../include/util.php");
if (!isset($_SESSION['backend']))
    header("location:login.php");

$frais1 = mysql_fetch_array(mysql_query("select * from immat_plaque where id=1"));
$frais2 = mysql_fetch_array(mysql_query("select * from immat_plaque where id=2"));
$frais3 = mysql_fetch_array(mysql_query("select * from immat_rivet where id=1"));
$frais4 = mysql_fetch_array(mysql_query("select * from immat_sticker where id=1"));
?>
<!doctype html>
<html class="no-js">
    <head>
        <meta charset="UTF-8">
        <title>Plaques</title>

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
                            <i class="fa fa-money"></i>&nbsp; Frais des plaques</h3>
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
                                    <h5 style="color: #000">Plaques</h5>
                                </header>
                                <div id="collapse4" class="body">
                                    <div class="row">
                                        <?php
                                        if (isset($_POST['plexiglass'])) {
                                            mysql_query("update immat_plaque set prix='" . $_POST['plexiglass'] . "' where id=1");
                                            echo '<script>alert("Montant modifié !")</script>';
                                            echo '<script>window.location="plaque.php"</script>';
                                        }
                                        ?>
                                        <form method="post" action="">
                                            <div class="col-md-12">
                                                <div class="col-md-5">Plaque plexiglass</div>
                                                <div class="col-md-2"><input type="text" class="form-control" name="plexiglass" value="<?php echo $frais1['prix'] ?>" /></div>
                                                <div class="col-md-1">€</div>
                                                <div class="col-md-4"><button type="submit" class="btn btn-primary" name="modif">Modifier</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="collapse4" class="body">
                                    <div class="row">
                                        <?php
                                        if (isset($_POST['aluminium'])) {
                                            mysql_query("update immat_plaque set prix='" . $_POST['aluminium'] . "' where id=2");
                                            echo '<script>alert("Montant modifié !")</script>';
                                            echo '<script>window.location="plaque.php"</script>';
                                        }
                                        ?>
                                        <form method="post" action="">
                                            <div class="col-md-12">
                                                <div class="col-md-5">Plaque aluminium</div>
                                                <div class="col-md-2"><input type="text" class="form-control" name="aluminium" value="<?php echo $frais2['prix'] ?>" /></div>
                                                <div class="col-md-1">€</div>
                                                <div class="col-md-4"><button type="submit" class="btn btn-primary" name="modif">Modifier</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>                                
                                <div id="collapse4" class="body">
                                    <div class="row">
                                        <?php
                                        if (isset($_POST['kit'])) {
                                            mysql_query("update immat_rivet set prix='" . $_POST['kit'] . "' where id=1");
                                            echo '<script>alert("Montant modifié !")</script>';
                                            echo '<script>window.location="plaque.php"</script>';
                                        }
                                        ?>
                                        <form method="post" action="">
                                            <div class="col-md-12">
                                                <div class="col-md-5">Kit Pose</div>
                                                <div class="col-md-2"><input type="text" class="form-control" name="kit" value="<?php echo $frais3['prix'] ?>" /></div>
                                                <div class="col-md-1">€</div>
                                                <div class="col-md-4"><button type="submit" class="btn btn-primary" name="modif">Modifier</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>                                
                                <div id="collapse4" class="body">
                                    <div class="row">
                                        <?php
                                        if (isset($_POST['sticker'])) {
                                            mysql_query("update immat_sticker set prix='" . $_POST['sticker'] . "' where id=1");
                                            echo '<script>alert("Montant modifié !")</script>';
                                            echo '<script>window.location="plaque.php"</script>';
                                        }
                                        ?>
                                        <form method="post" action="">
                                            <div class="col-md-12">
                                                <div class="col-md-5">Sticker</div>
                                                <div class="col-md-2"><input type="text" class="form-control" name="sticker" value="<?php echo $frais4['prix'] ?>" /></div>
                                                <div class="col-md-1">€</div>
                                                <div class="col-md-4"><button type="submit" class="btn btn-primary" name="modif">Modifier</button></div>
                                            </div>
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