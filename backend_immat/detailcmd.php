<?php
include("../config.php");
include("../include/util.php");
if (!isset($_SESSION['backend']))
    header("location:login.php");

$user = mysql_fetch_array(mysql_query("select user,ref_cmd,matricule from immat_user_info_voiture where id=" . $_GET['id']));
$client = mysql_fetch_array(mysql_query("select * from immat_users where email='" . $user['user'] . "'"));
$livraison = mysql_fetch_array(mysql_query("select * from immat_adresselivraison where user='" . $user['user'] . "'"));
?>
<!doctype html>
<html class="no-js">
    <head>
        <meta charset="UTF-8">
        <title>Détail commande</title>

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
                            <i class="fa fa-money"></i>&nbsp; Détail commande</h3>
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
                    <div class="inner bg-light lter">

                        <!--Begin Datatables-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box">
                                    <header>
                                        <div class="icons">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <h5>Détails commande</h5>
                                    </header>


                                    <div id="collapse4" class="body">
                                        <div class="col-md-6">
                                            <b>Nom :</b> <?php echo $client["nom"]; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <b>Prénom : </b><?php echo $client["prenom"]; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <b>Type : </b><?php echo $client["type"]; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <b>Société :</b><?php echo $client["societe"]; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <b> Adresse :</b> <?php echo $client["adresse"] . " " . $client['cp'] . " " . $client['ville']; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <b> SIREN :</b> <?php echo $client["siren"]; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <b> Num TVA :</b> <?php echo $client["numtva"]; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <b> Téléphone :</b> <?php echo $client["tel"]; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <b> Fax :</b> <?php echo $client["fax"]; ?>
                                        </div>

                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>Adresse Livraison</h3>
                                        </div>
                                        <div class="col-md-6">
                                            <b> Nom :</b> <?php echo $livraison["nom"]; ?>
                                        </div>
                                        <div class="col-md-12">
                                            <b> Adresse :</b> <?php echo $livraison["rue"] . ", " . $livraison["adresse"] . " - " . $livraison["cp"] . " " . $livraison["ville"] . " France." ?>
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-12">
                                            <h3 style="text-align: center"><?php echo $user["matricule"];  ?></h3>
                                        </div>

                                        <table  class="table table-bordered table-condensed table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Prestation</th>
                                                    <th>Montant</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = mysql_query("select * from immat_cmd_detail where idcmd=" . $_GET['id']);
                                                while ($data = mysql_fetch_array($sql)) {
                                                    ?>
                                                    <tr>

                                                        <td><?php echo $data['prestation']; ?></td>
                                                        <td><?php echo $data['montant']; ?></td>

                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.row -->
                        <!--End Datatables-->

                    </div><!-- /.inner -->
                </div><!-- /.outer -->
                <div class="row" style="color: #000">
                    <?php
                    if (isset($_POST["valider"])) {
                        $idcmd = $_POST['idcmd'];
                        $email = $user['user'];
                        $headers = 'From: info@illico-immat.fr' . "\r\n" .
                                'Reply-To: info@illico-immat.fr' . "\r\n" .
                                'X-Mailer: PHP/' . phpversion();
                        $message = "Bonjour,\n

Nous vous remercions pour votre commande passée sur le site  ico-immat.fr.\n

Votre commande n°28568601 du 09/12/2015 a bien été traitée.\n

Vous trouverez ci-dessous le récapitulatif de cette commande ainsi que les détails concernant votre paiement.\n

Etat de la commande : Traité\n

Date de la commande : 09 décembre 2015 à 10h24\n

N° de commande : 28568601\n

Adresse de livraison :\n

150 RUE DE CONSTANTINE\n

76000 ROUEN\n

Lister les articles avec prix + nom prestation\n

Afficher le prix livraison\n

Afficher le total\n

Mode de livraison :\n

Afficher les infos saisi par le fournisseur\n

Une question sur le suivi de votre commande : 02 35 76 52 80 (coût d'un appel local), du lundi au vendredi de 9h à 17h.\n

En dehors de ces horaires : nous contacter par courriel : contact@illico-immat,fr\n

Retrouvez toutes ces informations dans votre compte.\n

Nous vous remercions d'avoir passé commande sur illico-immat.fr.\n

A très bientôt sur illico-immat.fr.\n

L'équipe ILLICO IMMAT FRANCE\n

Ceci est un e-mail automatique, merci de ne pas y répondre directement. Vous pouvez nous contacter en cliquant sur ce lien.\n

METTRE EN PJ NOS CVG ET FACTURE DU CLIENT AUTOMATIQUEMENT STP";
                        mail($email, "Confirmation de votre commande sur ico-immat.fr.", $message, $headers);
                        mysql_query("update immat_user_info_voiture set status=1 where id=" . $idcmd);
                        echo '<script>alert("Modifications effectuées !");</script>';
                        echo '<script>window.location="commande.php"</script>';
                    }
                    ?>
                    <form method="post" action="">
                        <div class="col-md-12" style="background-color: rgb(255, 255, 255); padding-top: 10px; padding-bottom: 10px; margin-bottom: 80px;">
                            <?php
                            $sql1 = mysql_query("select * from immat_user_info_voiture where id=" . $_GET['id']);
                            $data = mysql_fetch_array($sql1)
                            ?>
                            <div class="col-md-5">

                                <?php if ($data['status'] == 0) { ?>
                                    La commande est en attente de validation,  <button type="submit" class="btn btn-success" name="valider">Valider la commande</button>
                                    <input type="hidden" name="idcmd" value="<?php echo $_GET['id']; ?>" />
                                    <?php
                                }
                                ?>

                            </div>

                        </div>
                    </form>
                </div>
            </div><!-- /#content -->


        </div><!-- /#wrap -->
        <footer class="Footer bg-dark dker">
            <p>2015 &copy; Illico-Immat</p>
        </footer><!-- /#footer -->

        <!-- #helpModal -->
        <div id="helpModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal --><!-- /#helpModal -->

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