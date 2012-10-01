<?php
session_start();
$id = $_SESSION['signing'];
$idartikel = $_POST['idartikel'];
$judul = $_POST['judul']; 
$cat = $_POST['category'];

require_once('db.inc.php');

$sql = mysql_query("update artikel set judul = '$judul',kategori = '$cat',isi = '$_POST[artikel]' where IDartikel = $idartikel and author = '$id'");
if(mysql_affected_rows()==1)
	echo '<meta http-equiv="refresh" content="0;url=dashboard.php">';
mysql_close();
?>

		
