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
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      
      <div class="logo">
        <p>
        	<h1><a href="index.html">ulti<span>magz</span></a></h1>
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
          <h2><span>Dashboard</span></h2>
          <div class="clr"></div>
          <?php
		  	
		  	$result  = mysql_query("SELECT judul,isi,tanggal, IDartikel, kategori,author FROM artikel where author = '$id' and flag = '1'");
			
			while ($row = mysql_fetch_row($result))
			{
				$countcom = 0;
				$isi = $row[1] ;
				$judul = $row[0];
				$idArtikel = $row[3];
				$cat = $row[4];
				$author = $row[5];
				$comment = mysql_query("SELECT * FROM komentar WHERE artikelID = '$idArtikel'");
				while ($row = mysql_fetch_row($comment))
				{
					$countcom++;
				}
				echo "
					<div class=\"article\">
					  <a href=\"artikel.php?id=".$idArtikel."\"><h3><span>".$judul."</h3></a>
					 <div class=\"clr\"></div>
					<p>Posted by <a href=\"#\">$author</a> <span>&nbsp;&bull;&nbsp;</span> Category &nbsp;&nbsp; <a href=\"#\">$cat</a></p>
          			<p>".$isi."</p>
					</div>";	
					
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
