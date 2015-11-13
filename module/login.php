<div class="modal fade" id="loginModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Connexion à votre compte</h4>
            </div>
            <div class="modal-body">

                <form method="post" action="">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" id="login_user" placeholder="Nom d'utilisateur" required="">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" class="form-control" id="pwd_user" placeholder="Mot de passe" required="">
                    </div>
                    <input type="button" class="btn btn-primary" value="Connexion" onclick="connexion()">
                </form>
            </div>
            <div class="modal-footer">
                <a href="inscription.php" type="button" class="btn btn-block btn-facebook btn-social"><i class="fa fa-lock"></i> Créer mon compte</a>

            </div>
        </div>
    </div>
</div>
<script>
    function connexion() {
        var login = document.getElementById("login_user").value;
        var pwd = document.getElementById("pwd_user").value;
        $.ajax({
            url: 'connexion.php?login=' + login + '&pwd=' + pwd,
            success: function (data) {
                var t = eval(data);
                if (t[0]["message"] == "ok") {
                    window.location = "profil.php";
                } else {
                    alert("Veuillez vérifier vos paramètres de connexion !");
                   
                }
            }
        });
    }
</script>