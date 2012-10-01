<?php
session_start();
$isi = $_POST['message'];
$url = "-"; //profil user
$nama = $_SESSION['user']; //profil user
$idartikel = $_POST['idartikel'];
$iduser= $_SESSION['userid']; //profil user
//echo "$isi <br>  ";
//echo $idartikel;

mysql_connect('localhost','root','');
mysql_select_db('blogci2');
mysql_query("INSERT INTO komentar(nama,url,komentar,tgl,userID,artikelID) VALUES ('$nama','$url','$isi',CURDATE(),$iduser,$idartikel)");

echo '<meta http-equiv="refresh" content="0;url=show.php?id='.$idartikel.'">';
	
?>
