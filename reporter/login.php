<?php
session_start();
$_SESSION['signing']='';

$id = $_POST['id'];
$pass = $_POST['pass'];

require_once('db.inc.php');

$sql="SELECT * FROM user where username='$id' and password='$pass' and level=1";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
if(mysql_num_rows($result) == 1){
	echo '<meta http-equiv="refresh" content="0;url=dashboard.php">';
	$_SESSION['signing']= $row['username'];
}
else echo '<meta http-equiv="refresh" content="0;url=index.php">';
//echo $id . " " . $password;
mysql_close();
?>