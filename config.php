<?php
session_start();
$dbroot='localhost';
$dbuser='root';
$dbpass='';
$dbname='immat';


/*$dbroot='193.37.145.62';
$dbuser='illic543667';
$dbpass='Xr9q4YZy';
$dbname='illic543667';*/



$link =@mysql_connect($dbroot,$dbuser,$dbpass);
mysql_select_db("$dbname");
mysql_query("SET NAMES 'utf8'");
?>