<?php
session_start();
if($_SESSION['signing'] == "")
	echo '<meta http-equiv="refresh" content="0;url=index.php">';
$id = $_SESSION['signing'];
require_once('db.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Reporter</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style_report.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-georgia.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
<script type="text/javascript" src="js/flowplayer-3.2.6.min.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      
      <div class="logo">
        <p>
        	<h1><a href="../index.html">ulti<span>magz</span></a></h1>
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
          <h2><span>Upload</span></h2>
          <div class="clr"></div>
          
                <form action="upload_proses.php" method="post" enctype="multipart/form-data">
                <table>
                	<tr>
                    	
                    	<td>Upload </td>
                        <td>:</td>
                        <td> <input type="file" name="gambar" value="" /></td>
                    </tr>
                    <tr>
                    	<td>Title</td>
                        <td>:</td>
                        <td><input type="text" name="judul" /></td>
                    </tr>
                    <tr>
                    	<td>Caption</td>
                        <td>:</td>
                        <td> <textarea id="caption" name="caption" rows="8" cols="50"></textarea></td>
                    </tr>
                    <tr>
                    	<td >&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input width="100px" height="35px" type="image" name="imageField" id="imageField" src="images/upload.gif" class="send" />
                        	File PNG or JPEG (Max Size 500x500 pixels)
                        </td>
                    </tr>
                </table>
          	</form>
        </div>
        <div class="clr"></div>
        <div class="article">
          <h2><span>Foto</span></h2>
          <div class="clr"></div>
          <ul style="display:inline">
          
          <?php
		  	$pict = mysql_query("SELECT * FROM galeri WHERE author = '$id' AND tipe like 'image%'");
			while($pictelement = mysql_fetch_array($pict))
			{
				echo "<li style=\"display:inline\"><img width=\"60\" height=\"60\" title=".$pictelement['judul']." src=".$pictelement['gambar']."></li>";
			}
		  ?>
          </ul>
          
          <a href="view-photo.php" target="_self" ><h3>View As Slideshow</h3></a>
        </div>
        <div class="article">
          <h2><span>Video</span></h2>
          <div class="clr"></div>
          <?php
		  	$pict = mysql_query("SELECT * FROM galeri WHERE author = '$id' AND tipe like 'video%'");
			while($pictelement = mysql_fetch_array($pict))
			{
				echo "<p><h3>Title  : ".$pictelement['judul']."<br><h4>Author  : ".$pictelement['author']."</h4></h3>&nbsp;</p>";
				echo "<video src=".$pictelement['gambar']." width=\"520px\" height=\"330px\" controls=\"controls\"> </video>";
				echo "<br><br><br>";
				//echo "<a href=".$pictelement['gambar']."style=\"display:block;width:520px;height:330px\" id=\"player\"> </a> ";
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
            <input name="button_search" src="images/search.gif" class="button_search" type="image" />
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
