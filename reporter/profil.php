<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>itSimple | Blog</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style_report.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/coin-slider.css" />
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/cufon-georgia.js"></script>
<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/coin-slider.min.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      
      <div class="logo">
        <p>
        	<h1><a href="../index.html">ulti<span>magz</span></a></h1>
        	Welcome Reporter
        </p>
      </div>
      <div class="clr"></div>
     
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
      	
        <div class="article">
          <h2><span>Profile</span></h2>
          <div class="clr"></div>

          <?php
		  	mysql_connect('localhost','root','');
		  	mysql_select_db('blogci2');
			$username = "irfandipta"; //username user
			$password = "1234"; //password user
		  	$result  = mysql_query("SELECT * FROM user WHERE username =  '$username' AND password = '$password'");
			
			while ($row = mysql_fetch_array($result))
			{
				echo "<p>". 
						'Nama 			 : '.$row['nama']."<br>".
						'NIM  			 : '.$row['nim']."<br>".
						'Program Studi   : '.$row['jurusan']."<br>".
						'Angkatan		 : '.$row['angkatan']."<br></p>";
			}
		  	
		  ?>
        </div>
        
        
      </div>
      <div class="sidebar">
        <div class="searchform">
          <form id="formsearch" name="formsearch" method="post" action="#">
            <span>
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our ste:" type="text" />
            </span>
            <input name="button_search" src="../images/search.gif" class="button_search" type="image" />
          </form>
        </div>
        <div class="gadget">
          <h2 class="star"><span>Sidebar</span> Menu</h2>
          <div class="clr"></div>
          <div class="menu">
            <ul>
            <li><a href="dashboard.php" target="_self">Dashboard</a></li>
            <li><a href="manage.php" target="_self">Manage Artikel</a></li>
            <li><a href="newpost.php" target="_self">Post Artikel</a></li>
            <li><a href="upload.php" target="_self">Foto</a></li>
            <li><a href="logout.php" target="_self">Sign Out</a></li>
            </ul>	
            </div>
        </div>
        
      </div>
      <div class="clr"></div>
    </div>
  </div>
  
</div>
</body>
</html>
