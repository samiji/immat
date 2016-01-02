<?php

include("config.php");
include("include/util.php");


$nom = $_GET['nom'];
$rue = $_GET['rue'];
$adresse = $_GET['adresse'];
$cp = $_GET['cp'];
$ville = $_GET['ville'];
$user = $_SESSION['user'];
$idcmd = $_SESSION['id_cmd'];

mysql_query("insert into immat_adresselivraison(idcmd,user,nom,rue,adresse,cp,ville,dt)values(" . $idcmd . ",'" . $user . "','" . $nom . "','" . $rue . "','" . $adresse . "','" . $cp . "','" . $ville . "','" . date('Y-m-d H:i:s') . "')");

$rs = "[";

$rs.="{message:'ok'},";

$rs.="]";
echo $rs;
?>
