<header class="site-header">
    <div class="container sp-cont">
        <div class="site-logo">
            <h1><a href="http://www.illico-immat.fr"><img src="http://www.illico-immat.fr/images/illicoimmatlogo1.jpg" alt="Logo"></a></h1>
        </div>
        <?php
        if (!isset($_SESSION['user'])) {
            ?>
            <div class="header-right">
                <div class="user-login-panel">
                    <a href="#" class="user-login-btn" data-toggle="modal" data-target="#loginModal"><i class="icon-profile"></i></a>
                </div>
                <div class="topnav dd-menu"> 
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="header-right">
                <div class="user-login-panel logged-in-user">
                    <a href="#" class="user-login-btn" id="userdropdown" data-toggle="dropdown">

                        <span class="user-informa">
                            <span class="meta-data">Bienvenue</span>
                            <span class="user-name"><?php echo getNomUser($_SESSION['user']); ?></span>
                        </span>
                        <span class="user-dd-dropper"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="userdropdown">
                        <li><a href="<?php echo url;  ?>mon-compte">Mon compte</a></li>
                        <li><a href="<?php echo url;  ?>deconnexion">Déconnexion</a></li>
                    </ul>
                </div>
                <div class="topnav dd-menu">
                </div>
            </div>
            <?php
        }
        ?>        
    </div>
</header>