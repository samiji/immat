<?php

include("../config.php");
$id = $_GET['id'];
$prix = $_GET['prix'];

$sql = mysql_query("update immat_cp_cheval_fiscal set prix='" . $prix . "' where id=" . $id)or die(mysql_error());

$rs = "[";

$rs.="{message:'ok'},";

$rs.="]";



echo $rs;
?>