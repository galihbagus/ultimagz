<?php
	mysql_connect('localhost','root','');
	mysql_select_db('blogci2');
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$nama = $_POST['nama'];
	$nim = $_POST['nim'];
	$jurusan = $_POST['prodi'];
	$angkatan = $_POST['angkatan'];
	$result = mysql_query("select * from user where username='$username'");
	if(mysql_num_rows($result) > 0 || $password != $cpassword)
		echo '<meta http-equiv="refresh" content="0;url=regist_user.php">';
	else{	
		mysql_query("INSERT INTO user(username,password,nama,nim,jurusan,angkatan,level) VALUES ('$username','$password','$nama','$nim','$jurusan',$angkatan,2)");
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
	}
?>
