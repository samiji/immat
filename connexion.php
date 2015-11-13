<?php

include("config.php");
$login = $_GET['login'];
$pwd = $_GET['pwd'];
$password = md5($pwd);
$sql = mysql_query("select *  from immat_users where email='" . $login . "' and pwd='" . $password . "'")or die(mysql_error());
$nb = mysql_num_rows($sql);
if ($nb > 0) {
    $_SESSION['user'] = $login;
    $rs = "[";

    $rs.="{message:'ok'},";

    $rs.="]";
} else {
    $rs = "[";

    $rs.="{message:'ko'},";

    $rs.="]";
}


echo $rs;
?>