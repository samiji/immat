<?php
include("../config.php");
include("../include/util.php");
if (!isset($_SESSION['backend']))
    header("location:login.php");
?>
<!doctype html>
<html class="no-js">
    <head>
        <meta charset="UTF-8">
        <title>Ajouter une annonce</title>

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
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
                            <i class="fa fa-money"></i>&nbsp; Annonces</h3>
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
                                    <h5 style="color: #000">Nouvelle annonce</h5>
                                </header>
                                <div id="collapse4" class="body">
                                    <div class="row">
                                        <?php
                                        if (isset($_POST['nom'])) {
                                            $uploaddir = '../annonces/';

                                            $image = $uploaddir . basename($_FILES['photo']['name']);
                                            if (move_uploaded_file($_FILES['photo']['tmp_name'], $image)) {
                                                
                                            }

                                            $image2 = $uploaddir . basename($_FILES['photo2']['name']);
                                            if (move_uploaded_file($_FILES['photo2']['tmp_name'], $image2)) {
                                                
                                            }

                                            $image3 = $uploaddir . basename($_FILES['photo3']['name']);
                                            if (move_uploaded_file($_FILES['photo3']['tmp_name'], $image3)) {
                                                
                                            }

                                            $image4 = $uploaddir . basename($_FILES['photo4']['name']);
                                            if (move_uploaded_file($_FILES['photo4']['tmp_name'], $image4)) {
                                                
                                            }




                                            mysql_query("insert into immat_annonces(nom,description,prix,img,img2,img3,img4,dt,etat)values('" . addslashes($_POST['nom']) . "','" . addslashes($_POST['description']) . "','" . addslashes($_POST['prix']) . "','" . addslashes($image) . "','" . addslashes($image2) . "','" . addslashes($image3) . "','" . addslashes($image4) . "','" . date('Y-m-d') . "',1);");
                                            echo '<script>alert("Annonce ajouté !")</script>';
                                            echo '<script>window.location="annonces.php"</script>';
                                        }
                                        ?>
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="form-group" style="margin-bottom: 10px">
                                                <label for="text1" class="control-label col-lg-4">Nom</label>
                                                <div class="col-lg-8">
                                                    <input type="text" name="nom" placeholder="Nom"  class="form-control" style="margin-bottom: 10px">
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group" style="margin-bottom: 10px">
                                                <label for="text1" class="control-label col-lg-4">Description</label>
                                                <div class="col-lg-8">
                                                   
                                                    <textarea name="description"></textarea>
                                                    <script type="text/javascript">
                                                                CKEDITOR.replace('description');
                                                    </script>


                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group" style="margin-bottom: 10px">
                                                <label for="text1" class="control-label col-lg-4">Prix</label>
                                                <div class="col-lg-8">
                                                    <input type="text" name="prix" placeholder="Prix"  class="form-control" style="margin-bottom: 10px">
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group" style="margin-bottom: 10px">
                                                <label for="text1" class="control-label col-lg-4">Image</label>
                                                <div class="col-lg-8">
                                                    <input type="file" name="photo" class="form-control" style="margin-bottom: 10px">
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group" style="margin-bottom: 10px">
                                                <label for="text1" class="control-label col-lg-4">Image 2</label>
                                                <div class="col-lg-8">
                                                    <input type="file" name="photo2" class="form-control" style="margin-bottom: 10px">
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group" style="margin-bottom: 10px">
                                                <label for="text1" class="control-label col-lg-4">Image 3</label>
                                                <div class="col-lg-8">
                                                    <input type="file" name="photo3" class="form-control" style="margin-bottom: 10px">
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group" style="margin-bottom: 10px">
                                                <label for="text1" class="control-label col-lg-4">Image 4</label>
                                                <div class="col-lg-8">
                                                    <input type="file" name="photo4" class="form-control" style="margin-bottom: 10px">
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group" style="margin-bottom: 10px">
                                                <label for="text1" class="control-label col-lg-4"></label>
                                                <div class="col-lg-8">
                                                    <button type="submit" class="btn btn-primary" name="modif" style="margin-bottom: 10px">Ajouter</button>
                                                </div>
                                            </div><!-- /.form-group -->
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
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong>  Best check yo self, you're not looking too good.
                </div>

                <!-- .well well-small -->
                <div class="well well-small dark">
                    <ul class="list-unstyled">
                        <li>Visitor <span class="inlinesparkline pull-right">1,4,4,7,5,9,10</span> 
                        </li>
                        <li>Online Visitor <span class="dynamicsparkline pull-right">Loading..</span> 
                        </li>
                        <li>Popularity <span class="dynamicbar pull-right">Loading..</span> 
                        </li>
                        <li>New Users <span class="inlinebar pull-right">1,3,4,5,3,5</span> 
                        </li>
                    </ul>
                </div><!-- /.well well-small -->

                <!-- .well well-small -->
                <div class="well well-small dark">
                    <button class="btn btn-block">Default</button>
                    <button class="btn btn-primary btn-block">Primary</button>
                    <button class="btn btn-info btn-block">Info</button>
                    <button class="btn btn-success btn-block">Success</button>
                    <button class="btn btn-danger btn-block">Danger</button>
                    <button class="btn btn-warning btn-block">Warning</button>
                    <button class="btn btn-inverse btn-block">Inverse</button>
                    <button class="btn btn-metis-1 btn-block">btn-metis-1</button>
                    <button class="btn btn-metis-2 btn-block">btn-metis-2</button>
                    <button class="btn btn-metis-3 btn-block">btn-metis-3</button>
                    <button class="btn btn-metis-4 btn-block">btn-metis-4</button>
                    <button class="btn btn-metis-5 btn-block">btn-metis-5</button>
                    <button class="btn btn-metis-6 btn-block">btn-metis-6</button>
                </div><!-- /.well well-small -->

                <!-- .well well-small -->
                <div class="well well-small dark">
                    <span>Default</span> <span class="pull-right"><small>20%</small> </span> 
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-info" style="width: 20%"></div>
                    </div>
                    <span>Success</span> <span class="pull-right"><small>40%</small> </span> 
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-success" style="width: 40%"></div>
                    </div>
                    <span>warning</span> <span class="pull-right"><small>60%</small> </span> 
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
                    </div>
                    <span>Danger</span> <span class="pull-right"><small>80%</small> </span> 
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
                    </div>
                </div>
            </div><!-- /#right -->
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
</html>