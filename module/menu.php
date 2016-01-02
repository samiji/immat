<div class="navbar">
    <div class="container sp-cont">
        <div class="search-function">
            
            <span><i class="fa fa-phone"></i> Appelez-nous sur le  <strong>02 35 76 52 80</strong></span>
        </div>
        <a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i></a>
        <!-- Main Navigation -->
        <nav class="main-navigation dd-menu toggle-menu" role="navigation">
            <ul class="sf-menu">
                <li><a href="<?php echo url; ?>prestations">Prestations </a>

                </li>
               

                <li><a href="<?php echo url; ?>documents">Documents</a>

                </li>
                <li class="megamenu"><a href="<?php echo url; ?>annonces-illico-immat">Véhicule d'occasion</a>
                    <ul class="dropdown">
                        <li>
                            <div class="megamenu-container container">
                                <div class="row">

                                    <div class="col-md-12">
                                        <span class="megamenu-sub-title">Trouvez une annonce</span>
                                        <ul class="body-type-widget">
                                            <?php
                                            $sql = mysql_query("select * from immat_annonces where etat=1 order by id desc limit 3");
                                            while ($data = mysql_fetch_array($sql)) {
                                                ?>
                                                <li> <a href="<?php echo url; ?>detail-annonce/<?php echo $data['id'];  ?>"><img src="<?php echo url;  ?><?php echo str_replace("../", "", $data['img']); ?>" style="width: 82px; height: 43px" alt=""> <span><?php echo $data['nom'] ?></span></a></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                        <a href="<?php echo url; ?>annonces-illico-immat" class="basic-link">Voir toutes les annonces</a>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <li><a href="<?php echo url; ?>contact">Contact</a>

                </li>
            </ul>
        </nav> 

    </div>
</div>