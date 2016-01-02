<?php

include("config.php");
include("include/util.php");
$exist = 0;

$nom = $_GET['nom'];
$email = $_GET['email'];
$adresse = $_GET['adresse'];
$dt = date("Y-m-d H:i:d");
$headers = 'From: illico-immat@gmail.com' . "\r\n" .
        'Reply-To: illico-immat@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

$verif = mysql_query("select * from immat_newsletter where email='" . $email . "'");
$nb = mysql_num_rows($verif);
if ($nb == 0) {
    $exist = 0;
    mysql_query("insert into immat_newsletter(nom,email,dt)values('" . $nom . "','" . $email . "','" . date('Y-m-d H:i:s') . "')");
    mail($email, "Inscription newsletter Illico-Immat.Fr", "Bonjour $nom, \n Vous êtes inscrit à notre newsletter.\n Vous recevez nos offres PRO sur votre messagerie.\n Cordialement, \n Equipe Illico-Immat.\n ", $headers);
} else {
    $exist = 1;
}
$rs = "[";

$rs.="{exist:'" . $exist . "'},";

$rs.="]";
echo $rs;
?>