<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>itSimple | Blog</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style_login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-georgia.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
</head>
<body>
<div class="main">
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        
        <div class="article">
          <h2 align="center">User Ultimagz</h2>
          <div class="clr"></div>
          <form action="postuser.php" method="post" id="register">
            <ol>
              <li>
                <label for="username">Username</label>
                <input id="username" name="username" class="text" />
              </li>
              <li>
                <label for="password">Password</label>
                <input id="password" name="password" class="text" />
              </li>
              <li>
                <label for="password">Confirm Password</label>
                <input id="password" name="cpassword" class="text" />
              </li>
              <li>
                <label for="nama">Nama</label>
                <input id="nama" name="nama" class="text" />
              </li>
              <li>
                <label for="nim">NIM</label>
                <input id="nim" name="nim" class="text" />
              </li>
               <li>
                <label for="prodi">Program Studi</label>
                <select name="prodi">
                	<optgroup label="---ICT---">
                    	<option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Sistem Komputer">Sistem Komputer</option>
                    </optgroup>
                    <optgroup label="---Ilmu Komunikasi---">
                    	<option value="Public Relation">Public Relation</option>
                        <option value="Jurnalist">Jurnalist</option>
                    </optgroup>
                    <optgroup label="---Ekonomi---">
                    	<option value="Managemenet">Managemenet</option>
                        <option value="Accounting">Accounting</option>
                    </optgroup>
                    <optgroup label="---Desain Komunikasi Visual---">
                    	<option value="Animasi">Animasi</option>
                        <option value="Sinematography">Sinematography</option>
                        <option value="Design Grafis">Design Grafis</option>
                    </optgroup>
                 </select>
                 <select name="angkatan">
                 <?php
				 	$con = mysql_connect("localhost","root","");
					if (!$con)
					  {
					  die('Could not connect: ' . mysql_error());
					  }
					
					mysql_select_db("blogci2", $con);

				    $result = mysql_query("SELECT * FROM angkatan");
					while($row = mysql_fetch_array($result))
                  	{
                    	echo "<option value=".$row['tahun'].">".$row['tahun']."</option>";
					}
					mysql_close();
				?>
                 </select>       
              </li>
              <li>
                <input style="width:100px; height:35px;"type="image" name="imageField" id="imageField" src="images/submit.gif" class="send" />
                <div class="clr"></div>
              </li>
            </ol>
          </form>
           <div class="clr"></div>
        </div>
      </div>
      </div>
      </div>
      </div>

  
  
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>