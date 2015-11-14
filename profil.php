<?php
include("config.php");
include("include/util.php");
if (!isset($_SESSION['user']))
    header("location:index.php");
?>
<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
          ================================================== -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Mon compte</title>
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
                                <div class="col-md-3 col-sm-4">
                                    <!-- SIDEBAR -->
                                    <div class="users-sidebar tbssticky">
                                        <a href="user-dashboard.html" class="btn btn-block btn-primary add-listing-btn">New Ad listing</a>
                                        <ul class="list-group">
                                            <li class="list-group-item"> <span class="badge">5</span> <a href="user-dashboard.html"><i class="fa fa-home"></i> Dashboard</a></li>
                                            <li class="list-group-item"> <span class="badge">5</span> <a href="user-dashboard-saved-searches.html"><i class="fa fa-folder-o"></i> Saved Searches</a></li>
                                            <li class="list-group-item"> <span class="badge">12</span> <a href="user-dashboard-saved-cars.html"><i class="fa fa-star-o"></i> Saved Cars</a></li>
                                            <li class="list-group-item"> <a href="add-listing-form.html"><i class="fa fa-plus-square-o"></i> Create new Ad</a></li>
                                            <li class="list-group-item"> <span class="badge">2</span> <a href="user-dashboard-manage-ads.html"><i class="fa fa-edit"></i> Manage Ads</a></li>
                                            <li class="list-group-item active"> <a href="user-dashboard-profile.html"><i class="fa fa-user"></i> My Profile</a></li>
                                            <li class="list-group-item"> <a href="user-dashboard-settings.html"><i class="fa fa-cog"></i> Account Settings</a></li>
                                            <li class="list-group-item"> <a href="javascript:void(0)"><i class="fa fa-sign-out"></i> Log Out</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-8">
                                    <h2>Mon compte</h2>
                                    <div class="dashboard-block">
                                        <div class="tabs profile-tabs">
                                            <ul class="nav nav-tabs">
                                                <li class="active"> <a data-toggle="tab" href="#personalinfo" aria-controls="personalinfo" role="tab">Personal Info</a></li>
                                                <li> <a data-toggle="tab" href="#billinginfo" aria-controls="billinginfo" role="tab">Billing Info</a></li>
                                                <li> <a data-toggle="tab" href="#changepassword" aria-controls="changepassword" role="tab">Change Password</a></li>
                                            </ul>
                                            <form>
                                                <div class="tab-content">
                                                    <!-- PROFIE PERSONAL INFO -->
                                                    <div id="personalinfo" class="tab-pane fade active in">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>First name*</label>
                                                                        <input type="text" class="form-control" placeholder="" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Last name</label>
                                                                        <input type="text" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Email*</label>
                                                                        <input type="text" class="form-control" placeholder="mail@example.com" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Phone</label>
                                                                        <input type="text" class="form-control" placeholder="000-00-0000">
                                                                    </div>
                                                                </div>

                                                                <h3>Security Question</h3>
                                                                <div class="lighter"><p>Please choose a security question so we can better identify you if you forget your password, or in regard to your ad.</p></div>
                                                                <label>Question</label>
                                                                <select name="Security Questions" class="form-control selectpicker">
                                                                    <option selected>What is your maiden name?</option>
                                                                    <option selected>What is your pet's name?</option>
                                                                    <option selected>What is your first school name?</option>
                                                                    <option selected>What is your place of birth name?</option>
                                                                    <option selected>Who is your favourite actor?</option>
                                                                </select>
                                                                <label>Answer</label>
                                                                <input type="password" class="form-control">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- PROFIE BILLING INFO -->
                                                    <div id="billinginfo" class="tab-pane fade">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>City*</label>
                                                                        <input type="text" class="form-control" placeholder="" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Zip*</label>
                                                                        <input type="text" class="form-control" placeholder="" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>State*</label>
                                                                        <select name="State" class="form-control selectpicker" required>
                                                                            <option selected>Select</option>
                                                                            <option value="AL">Alabama</option>
                                                                            <option value="AK">Alaska</option>
                                                                            <option value="AZ">Arizona</option>
                                                                            <option value="AR">Arkansas</option>
                                                                            <option value="CA">California</option>
                                                                            <option value="CO">Colorado</option>
                                                                            <option value="CT">Connecticut</option>
                                                                            <option value="DE">Delaware</option>
                                                                            <option value="DC">District Of Columbia</option>
                                                                            <option value="FL">Florida</option>
                                                                            <option value="GA">Georgia</option>
                                                                            <option value="HI">Hawaii</option>
                                                                            <option value="ID">Idaho</option>
                                                                            <option value="IL">Illinois</option>
                                                                            <option value="IN">Indiana</option>
                                                                            <option value="IA">Iowa</option>
                                                                            <option value="KS">Kansas</option>
                                                                            <option value="KY">Kentucky</option>
                                                                            <option value="LA">Louisiana</option>
                                                                            <option value="ME">Maine</option>
                                                                            <option value="MD">Maryland</option>
                                                                            <option value="MA">Massachusetts</option>
                                                                            <option value="MI">Michigan</option>
                                                                            <option value="MN">Minnesota</option>
                                                                            <option value="MS">Mississippi</option>
                                                                            <option value="MO">Missouri</option>
                                                                            <option value="MT">Montana</option>
                                                                            <option value="NE">Nebraska</option>
                                                                            <option value="NV">Nevada</option>
                                                                            <option value="NH">New Hampshire</option>
                                                                            <option value="NJ">New Jersey</option>
                                                                            <option value="NM">New Mexico</option>
                                                                            <option value="NY">New York</option>
                                                                            <option value="NC">North Carolina</option>
                                                                            <option value="ND">North Dakota</option>
                                                                            <option value="OH">Ohio</option>
                                                                            <option value="OK">Oklahoma</option>
                                                                            <option value="OR">Oregon</option>
                                                                            <option value="PA">Pennsylvania</option>
                                                                            <option value="RI">Rhode Island</option>
                                                                            <option value="SC">South Carolina</option>
                                                                            <option value="SD">South Dakota</option>
                                                                            <option value="TN">Tennessee</option>
                                                                            <option value="TX">Texas</option>
                                                                            <option value="UT">Utah</option>
                                                                            <option value="VT">Vermont</option>
                                                                            <option value="VA">Virginia</option>
                                                                            <option value="WA">Washington</option>
                                                                            <option value="WV">West Virginia</option>
                                                                            <option value="WI">Wisconsin</option>
                                                                            <option value="WY">Wyoming</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>&nbsp;</label>
                                                                        <input type="text" class="form-control" disabled value="US">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- PROFIE CHANGE PASSWORD -->
                                                    <div id="changepassword" class="tab-pane fade">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Old Password</label>
                                                                        <input type="password" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>New password</label>
                                                                        <input type="password" class="form-control" placeholder="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Confirm new password</label>
                                                                        <input type="password" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-info">Update details</button>
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