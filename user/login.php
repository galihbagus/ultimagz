<?php
session_start();

$id = $_POST['username'];
$pass = $_POST['password'];
$url = $_POST['url'];
$query = $_POST['query'];
$url = "http://" . $_SERVER['HTTP_HOST'] . $url;
if(!empty($query)) $url .= "?".$query;
require_once('db.inc.php');

$sql="SELECT * FROM user where username='$id' and password='$pass' and level=2";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
if(mysql_num_rows($result) == 1){
	echo "<meta http-equiv=\"refresh\" content=\"0;url=" . $url . "\">";
	$_SESSION['user']= $row['username'];
	$_SESSION['userid']= $row['userID'];
}
else echo '<meta http-equiv="refresh" content="0;url=index.php">';
//echo $id . " " . $password;
mysql_close();
?>