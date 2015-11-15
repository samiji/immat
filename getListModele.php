<?php

include("config.php");
$marque = $_GET['marque'];


$sql = mysql_query("select *  from immat_marque where marque='" . $marque . "' order by modele")or die(mysql_error());
$nb = mysql_num_rows($sql);
$rs = "[";
while($data=  mysql_fetch_array($sql)) {
   
    

    $rs.="{modele:'".$data['modele']."'},";
}
    $rs.="]";



echo $rs;
?>