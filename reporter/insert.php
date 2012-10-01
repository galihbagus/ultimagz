<?php
session_start();
$id = $_SESSION['signing'];
$judul = $_POST['judul']; 
$cat = $_POST['category'];

require_once('db.inc.php');

mysql_query("INSERT INTO artikel (judul, kategori, isi, tanggal, author, flag) VALUES ('$judul','$cat','$_POST[artikel]',CURDATE(),'$id','0')");

if(mysql_affected_rows()==1)
	echo '<meta http-equiv="refresh" content="0;url=dashboard.php">';
mysql_close();
?>

		
