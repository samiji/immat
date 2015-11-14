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
        <title>Illicot Immat</title>
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
    <body class="home">
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
            <div class="hero-area">
                <!-- Search Form -->
                <div class="floated">
                    <div class="search-form">
                        <h2>Indiquez votre numéro d'immatriculation</h2>
                        <p>Service en ligne d’immatriculation habilité par l’Etat</p>
                        <div class="search-form-inner">
                            <form method="post" action="form.php">
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control" style="text-align: center; font-size: 33px; text-transform: uppercase" maxlength="9" placeholder="AA-123-AA" name="immat_num" required="">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Calculer le prix</button>
                                    </span>
                                </div>


                                <div class="row " style="margin-top: 20px;">
                                    <div class="col-md-6"> 
                                        <div class="col-md-12">
                                            <input type="radio" name="choix" value="Changement de propriétaire" checked="">  <label style="font-size: 13px;">Changement de propriétaire</label>  
                                        </div>
                                        <div class="col-md-12">
                                            <input type="radio" name="choix" value="Changement de domicile">  <label style="font-size: 13px;">Changement de domicile</label>  
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="immatricultion" value="Plaque d'immatriculation">  <label style="font-size: 13px;">Plaque d'immatriculation</label>  
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <!-- Start Hero Slider -->
                <div class="hero-slider heroflex flexslider clearfix" data-autoplay="yes" data-pagination="no" data-arrows="yes" data-style="fade" data-speed="7000" data-pause="yes">
                    <ul class="slides">
                        <li class="parallax" style="background-image:url(images/bann.jpg);"></li>

                    </ul>
                </div>
                <!-- End Hero Slider -->
            </div>
            <!-- Utiity Bar -->
            <div class="utility-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-8">
                            <div class="toggle-make">
                                <a href="#"><i class="fa fa-navicon"></i></a>
                                <span>Browse by body style</span>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-4">
                            <ul class="utility-icons social-icons social-icons-colored">
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="by-type-options">
                    <div class="container">
                        <div class="row">
                            <ul class="owl-carousel carousel-alt" data-columns="6" data-autoplay="" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="6" data-items-desktop-small="4" data-items-mobile="3" data-items-tablet="4">
                                <li class="item"> <a href="results-list.html"><img src="images/body-types/wagon.png" alt=""> <span>Wagon</span></a></li>
                                <li class="item"> <a href="results-list.html"><img src="images/body-types/minivan.png" alt=""> <span>Minivan</span></a></li>
                                <li class="item"> <a href="results-list.html"><img src="images/body-types/coupe.png" alt=""> <span>Coupe</span></a></li>
                                <li class="item"> <a href="results-list.html"><img src="images/body-types/convertible.png" alt=""> <span>Convertible</span></a></li>
                                <li class="item"> <a href="results-list.html"><img src="images/body-types/crossover.png" alt=""> <span>Crossover</span></a></li>
                                <li class="item"> <a href="results-list.html"><img src="images/body-types/suv.png" alt=""> <span>SUV</span></a></li>
                                <li class="item"> <a href="results-list.html#"><img src="images/body-types/minicar.png" alt=""> <span>Minicar</span></a></li>
                                <li class="item"> <a href="results-list.html"><img src="images/body-types/sedan.png" alt=""> <span>Sedan</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Body Content -->
            <div class="main" role="main">
                <div id="content" class="content full padding-b0">
                    <div class="container">
                        <!-- Welcome Content and Services overview -->
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="uppercase strong">Welcome to AutoStars<br>Listing portal</h1>
                                <p class="lead">AutoStars is the world's leading portal for<br>easy and quick <span class="accent-color">car buying and selling</span></p>
                            </div>
                            <div class="col-md-6">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, <span class="accent-color">consectetur adipiscing</span> elit. Nulla convallis egestas rhoncus.</p>
                            </div>
                        </div>
                        <div class="spacer-75"></div>
                        <!-- Recently Listed Vehicles -->
                        <section class="listing-block recent-vehicles">
                            <div class="listing-header">
                                <h3>Recently Listed Vehicles</h3>
                            </div>
                            <div class="listing-container">
                                <div class="carousel-wrapper">
                                    <div class="row">
                                        <ul class="owl-carousel carousel-fw" id="vehicle-slider" data-columns="4" data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="4" data-items-desktop-small="3" data-items-tablet="2" data-items-mobile="1">
                                            <li class="item">
                                                <div class="vehicle-block format-standard">
                                                    <a href="vehicle-details.html" class="media-box"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                    <div class="vehicle-block-content">
                                                        <span class="label label-default vehicle-age">2014</span>
                                                        <span class="label label-success premium-listing">Premium Listing</span>
                                                        <h5 class="vehicle-title"><a href="vehicle-details.html">Mercedes-benz SL 300</a></h5>
                                                        <span class="vehicle-meta">Mercedes, Grey color, by <abbr class="user-type" title="Listed by an individual user">Individual</abbr></span>
                                                        <a href="results-list.html" title="View all Sedans" class="vehicle-body-type"><img src="images/body-types/sedan.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$48500</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item">
                                                <div class="vehicle-block format-standard">
                                                    <a href="vehicle-details.html" class="media-box"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                    <div class="vehicle-block-content">
                                                        <span class="label label-primary vehicle-age">Brand New</span>
                                                        <h5 class="vehicle-title"><a href="vehicle-details.html">Nissan Terrano first hand</a></h5>
                                                        <span class="vehicle-meta">Nissan, Brown beige, by <abbr class="user-type" title="Listed by an dealer">Dealer</abbr></span>
                                                        <a href="results-list.html" title="View all SUVs" class="vehicle-body-type"><img src="images/body-types/suv.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$28000</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item">
                                                <div class="vehicle-block format-standard">
                                                    <a href="vehicle-details.html" class="media-box"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                    <div class="vehicle-block-content">
                                                        <span class="label label-default vehicle-age">2013</span>
                                                        <h5 class="vehicle-title"><a href="vehicle-details.html">Mercedes Benz E Class</a></h5>
                                                        <span class="vehicle-meta">Mercedes, Silver Blue, by <abbr class="user-type" title="Listed by an individual">Individual</abbr></span>
                                                        <a href="results-list.html" title="View all convertibles" class="vehicle-body-type"><img src="images/body-types/convertible.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$76000</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item">
                                                <div class="vehicle-block format-standard">
                                                    <a href="vehicle-details.html" class="media-box"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                    <div class="vehicle-block-content">
                                                        <span class="label label-default vehicle-age">2014</span>
                                                        <h5 class="vehicle-title"><a href="vehicle-details.html">Newly launched Nissan Sunny</a></h5>
                                                        <span class="vehicle-meta">Nissan, Brown beige, by <abbr class="user-type" title="Listed by Autostars">Autostars</abbr></span>
                                                        <a href="results-list.html" title="View all coupes" class="vehicle-body-type"><img src="images/body-types/coupe.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$31999</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item">
                                                <div class="vehicle-block format-standard">
                                                    <a href="vehicle-details.html" class="media-box"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                    <div class="vehicle-block-content">
                                                        <span class="label label-default vehicle-age">2014</span>
                                                        <span class="label label-success premium-listing">Premium Listing</span>
                                                        <h5 class="vehicle-title"><a href="vehicle-details.html">Mercedes-benz SL 300</a></h5>
                                                        <span class="vehicle-meta">Mercedes, Grey color, by <abbr class="user-type" title="Listed by an individual user">Individual</abbr></span>
                                                        <a href="results-list.html" title="View all Sedans" class="vehicle-body-type"><img src="images/body-types/sedan.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$48500</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item">
                                                <div class="vehicle-block format-standard">
                                                    <a href="vehicle-details.html" class="media-box"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                    <div class="vehicle-block-content">
                                                        <span class="label label-primary vehicle-age">Brand New</span>
                                                        <h5 class="vehicle-title"><a href="vehicle-details.html">Nissan Terrano first hand</a></h5>
                                                        <span class="vehicle-meta">Nissan, Brown beige, by <abbr class="user-type" title="Listed by an dealer">Dealer</abbr></span>
                                                        <a href="results-list.html" title="View all SUVs" class="vehicle-body-type"><img src="images/body-types/suv.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$28000</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item">
                                                <div class="vehicle-block format-standard">
                                                    <a href="vehicle-details.html" class="media-box"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                    <div class="vehicle-block-content">
                                                        <span class="label label-default vehicle-age">2013</span>
                                                        <h5 class="vehicle-title"><a href="vehicle-details.html">Mercedes Benz E Class</a></h5>
                                                        <span class="vehicle-meta">Mercedes, Silver Blue, by <abbr class="user-type" title="Listed by an individual">Individual</abbr></span>
                                                        <a href="results-list.html" title="View all convertibles" class="vehicle-body-type"><img src="images/body-types/convertible.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$76000</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item">
                                                <div class="vehicle-block format-standard">
                                                    <a href="vehicle-details.html" class="media-box"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                    <div class="vehicle-block-content">
                                                        <span class="label label-default vehicle-age">2014</span>
                                                        <h5 class="vehicle-title"><a href="vehicle-details.html">Newly launched Nissan Sunny</a></h5>
                                                        <span class="vehicle-meta">Nissan, Brown beige, by <abbr class="user-type" title="Listed by Autostars">Autostars</abbr></span>
                                                        <a href="results-list.html" title="View all coupes" class="vehicle-body-type"><img src="images/body-types/coupe.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$31999</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="spacer-60"></div>
                        <div class="row">
                            <!-- Latest News -->
                            <div class="col-md-8 col-sm-6">
                                <section class="listing-block latest-news">
                                    <div class="listing-header">
                                        <a href="blog.html" class="btn btn-sm btn-default pull-right">All news</a>
                                        <h3>Latest auto news</h3>
                                    </div>
                                    <div class="listing-container">
                                        <div class="carousel-wrapper">
                                            <div class="row">
                                                <ul class="owl-carousel" id="news-slider" data-columns="2" data-autoplay="" data-pagination="yes" data-arrows="yes" data-single-item="no" data-items-desktop="2" data-items-desktop-small="1" data-items-tablet="2" data-items-mobile="1">
                                                    <li class="item">
                                                        <div class="post-block format-standard">
                                                            <a href="single-post.html" class="media-box post-image"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                            <div class="post-actions">
                                                                <div class="post-date">December 05, 2014</div>
                                                                <div class="comment-count"><a href="single-post.html"><i class="icon-dialogue-text"></i> 12</a></div>
                                                            </div>
                                                            <h3 class="post-title"><a href="single-post.html">Suspendisse eget ligula in nulla iaculis interdum nec</a></h3>
                                                            <div class="post-content">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus...</p>
                                                            </div>
                                                            <div class="post-meta">
                                                                Posted in: <a href="blog-masonry.html">Financial</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="post-block format-standard">
                                                            <a href="single-post.html" class="media-box post-image"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                            <div class="post-actions">
                                                                <div class="post-date">November 29, 2014</div>
                                                                <div class="comment-count"><a href="#"><i class="icon-dialogue-text"></i> 0</a></div>
                                                            </div>
                                                            <h3 class="post-title"><a href="single-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h3>
                                                            <div class="post-content">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus...</p>
                                                            </div>
                                                            <div class="post-meta">
                                                                Posted in: <a href="blog-masonry.html">New Launch</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="post-block format-standard">
                                                            <a href="single-post.html" class="media-box post-image"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                            <div class="post-actions">
                                                                <div class="post-date">November 27, 2014</div>
                                                                <div class="comment-count"><a href="#"><i class="icon-dialogue-text"></i> 0</a></div>
                                                            </div>
                                                            <h3 class="post-title"><a href="single-post.html">2015 Proin enim quam, vulputate</a></h3>
                                                            <div class="post-content">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus...</p>
                                                            </div>
                                                            <div class="post-meta">
                                                                Posted in: <a href="blog-masonry.html">Trial run</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="spacer-40"></div>
                                <!-- Latest Testimonials -->
                                <section class="listing-block latest-testimonials">
                                    <div class="listing-header">
                                        <h3>Testimonials</h3>
                                    </div>
                                    <div class="listing-container">
                                        <div class="carousel-wrapper">
                                            <div class="row">
                                                <ul class="owl-carousel carousel-fw" id="testimonials-slider" data-columns="2" data-autoplay="5000" data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="2" data-items-desktop-small="1" data-items-tablet="1" data-items-mobile="1">
                                                    <li class="item">
                                                        <div class="testimonial-block">
                                                            <blockquote>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                                            </blockquote>
                                                            <div class="testimonial-avatar"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt="" width="60" height="60"></div>
                                                            <div class="testimonial-info">
                                                                <div class="testimonial-info-in">
                                                                    <strong>Arthur Henry</strong><span>Carsales Inc</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="testimonial-block">
                                                            <blockquote>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                                            </blockquote>
                                                            <div class="testimonial-avatar"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt="" width="60" height="60"></div>
                                                            <div class="testimonial-info">
                                                                <div class="testimonial-info-in">
                                                                    <strong>Lori Bailey</strong><span>My car Experts</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="testimonial-block">
                                                            <blockquote>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                                            </blockquote>
                                                            <div class="testimonial-avatar"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt="" width="60" height="60"></div>
                                                            <div class="testimonial-info">
                                                                <div class="testimonial-info-in">
                                                                    <strong>Willie &amp; Heather Obrien</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <!-- Latest Reviews -->
                            <div class="col-md-4 col-sm-6 sidebar">
                                <section class="listing-block latest-reviews">
                                    <div class="listing-header">
                                        <a href="blog-masonry.html" class="btn btn-sm btn-default pull-right">All reviews</a>
                                        <h3>Recent reviews</h3>
                                    </div>
                                    <div class="listing-container">
                                        <div class="post-block post-review-block">
                                            <div class="review-status">
                                                <strong>3.6</strong>
                                                <span>Out of 5</span>
                                            </div>
                                            <h3 class="post-title"><a href="single-post-review.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h3>
                                            <div class="post-content">
                                                <div class="post-actions">
                                                    <div class="post-date">November 29, 2014</div>
                                                    <div class="comment-count"><i class="fa fa-thumbs-o-up"></i> 3 <i class="fa fa-thumbs-o-down"></i> 0</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-block post-review-block">
                                            <div class="review-status">
                                                <strong>4.1</strong>
                                                <span>Out of 5</span>
                                            </div>
                                            <h3 class="post-title"><a href="single-post-review.html">Curabitur nec nulla lectus, non hendrerit lorem porttitor</a></h3>
                                            <div class="post-content">
                                                <div class="post-actions">
                                                    <div class="post-date">November 14, 2014</div>
                                                    <div class="comment-count"><i class="fa fa-thumbs-o-up"></i> 7 <i class="fa fa-thumbs-o-down"></i> 1</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-block post-review-block">
                                            <div class="review-status">
                                                <strong>5.0</strong>
                                                <span>Out of 5</span>
                                            </div>
                                            <h3 class="post-title"><a href="single-post-review.html">2014 Proin enim quam, vulputate at lobortis quis</a></h3>
                                            <div class="post-content">
                                                <div class="post-actions">
                                                    <div class="post-date">October 31, 2014</div>
                                                    <div class="comment-count"><i class="fa fa-thumbs-o-up"></i> 11 <i class="fa fa-thumbs-o-down"></i> 0</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="spacer-40"></div>
                                <!-- Connect with us -->
                                <section class="connect-with-us widget-block">
                                    <h4><i class="fa fa-rss"></i> Connect with us</h4>
                                    <form role="form">
                                        <label for="NewsletterInput" class="sr-only">Email</label>
                                        <input type="email" class="form-control" id="NewsletterInput" placeholder="Subscribe via email">
                                        <button type="submit" class="btn btn-sm btn-primary">Subscribe</button>
                                        <span class="meta-data">Don't worry, we won't spam you</span>
                                    </form>
                                    <hr>
                                    <h4><i class="fa fa-twitter"></i> Twitter feed</h4>
                                    <div class="twitter-widget" data-tweets-count="2"></div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="spacer-50"></div>
                    <div class="lgray-bg make-slider">
                        <div class="container">
                            <!-- Search by make -->
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <h3>Search by make </h3>
                                    <a href="#" class="btn btn-default btn-lg">All make &amp; models</a>
                                </div>
                                <div class="col-md-9 col-sm-8">
                                    <div class="row">
                                        <ul class="owl-carousel" id="make-carousel" data-columns="5" data-autoplay="6000" data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="5" data-items-desktop-small="4" data-items-tablet="3" data-items-mobile="3">
                                            <li class="item"> <a href="results-grid.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a></li>
                                            <li class="item"> <a href="results-grid.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a></li>
                                            <li class="item"> <a href="results-grid.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a></li>
                                            <li class="item"> <a href="results-grid.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a></li>
                                            <li class="item"> <a href="results-grid.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a></li>
                                            <li class="item"> <a href="results-grid.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a></li>
                                            <li class="item"> <a href="results-grid.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a></li>
                                            <li class="item"> <a href="results-grid.html"><img src="http://placehold.it/100x100&amp;text=IMAGE+PLACEHOLDER" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Body Content -->
            <!-- Start site footer -->
            <footer class="site-footer">
                <div class="site-footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 footer_widget widget widget_newsletter">
                                <h4 class="widgettitle">Sign up for our newsletter</h4>
                                <form>
                                    <input type="text" class="form-control" placeholder="Name">
                                    <input type="email" class="form-control" placeholder="Email">
                                    <input type="submit" class="btn btn-primary btn-lg" value="Sign up now">
                                </form>
                            </div>
                            <div class="col-md-2 col-sm-6 footer_widget widget widget_custom_menu widget_links">
                                <h4 class="widgettitle">Blogroll</h4>
                                <ul>
                                    <li><a href="blog.html">Car News</a></li>
                                    <li><a href="blog-masonry.html">Car Reviews</a></li>
                                    <li><a href="about.html">Car Insurance</a></li>
                                    <li><a href="about-html">Bodyshop</a></li>
                                </ul>
                            </div>
                            <div class="col-md-2 col-sm-6 footer_widget widget widget_custom_menu widget_links">
                                <h4 class="widgettitle">Help &amp; Support</h4>
                                <ul>
                                    <li><a href="results-list.html">Buying a car</a></li>
                                    <li><a href="joinus.html">Selling a car</a></li>
                                    <li><a href="about.html">Online safety</a></li>
                                    <li><a href="contact.html">Contact us</a></li>
                                </ul>
                            </div>
                            <div class="col-md-5 col-sm-6 footer_widget widget text_widget">
                                <h4 class="widgettitle">About AutoStars</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="site-footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 copyrights-left">
                                <p>&copy; 2014 AutoStars. All Rights Reserved</p>
                            </div>
                            <div class="col-md-6 col-sm-6 copyrights-right">
                                <ul class="social-icons social-icons-colored pull-right">
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="youtube"><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li class="flickr"><a href="#"><i class="fa fa-flickr"></i></a></li>
                                    <li class="vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                                    <li class="digg"><a href="#"><i class="fa fa-digg"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End site footer -->
            <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>  
        </div>
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