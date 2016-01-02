<?php

function getNomUser($login) {
    $sql = mysql_query("select * from immat_users where email='" . $login . "'");
    $data = mysql_fetch_array($sql);
    return ucfirst($data['prenom']) . " " . strtoupper($data['nom']);
}
define("url","http://www.illico-immat.fr/");
?>