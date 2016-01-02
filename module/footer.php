<footer class="site-footer">
    <div class="site-footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 footer_widget widget widget_newsletter">
                    <h4 class="widgettitle">Newsletter</h4>
                    <form method="post" action="">
                        <div style="padding-bottom: 5px; color: green;" id="affiche_news"></div>
                        <input type="text" class="form-control" id="nom_news" placeholder="Nom">
                        <input type="email" required="" class="form-control" id="email_news" placeholder="Email">
                        <input type="button" class="btn btn-primary btn-lg" value="S'inscrire" onclick="newsletter()">
                    </form>
                </div>
                <div class="col-md-4 col-sm-6 footer_widget widget widget_custom_menu widget_links">
                    <h4 class="widgettitle">Navigation</h4>
                    <ul>
                        <li><a href="<?php echo url; ?>prestations">Prestations</a></li>
                       
                        <li><a href="<?php echo url; ?>documents">Documents</a></li>
                        <li><a href="<?php echo url; ?>annonces-illico-immat">Annonces</a></li>
                        <li><a href="<?php echo url; ?>contact">Contact</a></li>
                    </ul>
                </div>

                <div class="col-md-5 col-sm-6 footer_widget widget text_widget">
                    <h4 class="widgettitle">A propos</h4>
                    <p>Toutes nos plaques d'immatriculation sont fabriquées en <span class="accent-color">France</span>. Nos plaques sont fabriquées grâce aux dernières technologies dans des matériaux haut de gamme.</p>
              <img src="http://www.illico-immat.fr/images/paiement-securise.jpg" alt="" />
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 copyrights-left">
                    <p>&copy; 2015 Ilico-Immat. All Rights Reserved</p>
                </div>
                <div class="col-md-4 col-sm-4 copyrights-left">
                    
                </div>
                <div class="col-md-4 col-sm-4 copyrights-right">
                    <ul class="social-icons social-icons-colored pull-right">
                        <li class="facebook"><a href="https://www.facebook.com/Illico-IMMAT-1634396373440759/"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li class="facebook"><a href=""><i class="fa fa-instagram"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    function newsletter() {
        var nom = document.getElementById("nom_news").value;
        var email = document.getElementById("email_news").value;
        if (email != "") {
            $.ajax({
                url: 'http://www.illico-immat.fr/newsletter.php?nom=' + nom + '&email=' + email,
                success: function (data) {
                    var t = eval(data);
                    if (t[0]["exist"] == 0) {
                        alert("Vous êtes inscrit à notre newsletter !");
                    } else {
                        alert("Vous êtes déjà inscrit à notre newsletter !");
                    }
                    document.getElementById("nom_news").value = "";
                    document.getElementById("email_news").value = "";
                }
            });
        } else {
            alert("Veuillez saisir votre email");
        }
    }
</script>