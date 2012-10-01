<?php
session_start();
if($_SESSION['signing'] == "")
	echo '<meta http-equiv="refresh" content="0;url=index.php">';
$id = $_SESSION['signing'];
$idartikel = $_GET['id'];
require_once('db.inc.php');

mysql_query("delete FROM artikel where IDartikel = '$idartikel' and author = '$id'");
echo '<meta http-equiv="refresh" content="0;url=manage.php">';
mysql_close();
?>