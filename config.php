<?php
session_start();
$dbroot='localhost';
$dbuser='root';
$dbpass='';
$dbname='immat';



$link =@mysql_connect($dbroot,$dbuser,$dbpass);
mysql_select_db("$dbname");
mysql_query("SET NAMES 'utf8'");
?>