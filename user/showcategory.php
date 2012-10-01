<?php
session_start();
$category = $_GET['category'];
require_once('db.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>itSimple</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
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
      <div>
            <ul id="menu">
            <li><a href="index.php" target="_self" >Home</a></li>
            <li><a href="" target="_self" >Category</a>
                <ul>
                    <li><a href="" target="_self" >Info</a>
                        <ul>
                            <li><a href="showcategory.php?category=Nasional" target="_self">Nasional</a></li>
                            <li><a href="showcategory.php?category=Kampus" target="_self">Kampus</a></li>
                            <li><a href="showcategory.php?category=Resensi" target="_self">Resensi</a></li>
                        </ul>
                    </li>
                    <li><a href="" target="_self" >Sosok</a>
                        <ul>
                            <li><a href="showcategory.php?category=Eksternal" target="_self">Eksternal</a></li>
                            <li><a href="showcategory.php?category=Internal" target="_self">Internal</a></li>
                        </ul>
                    </li>
                    <li><a href="" target="_self" >Lifestyle</a>
                        <ul>
                            <li><a href="showcategory.php?category=Hiburan" target="_self">Hiburan</a></li>
                            <li><a href="showcategory.php?category=Wisata" target="_self">Wisata</a></li>
                            <li><a href="showcategory.php?category=Kuliner" target="_self">Kuliner</a></li>
                            <li><a href="showcategory.php?category=Nongkrong" target="_self">Nongkrong</a></li>
                            <li><a href="showcategory.php?category=Susis" target="_self">Susis</a></li>
                            <li><a href="showcategory.php?category=Tipstrik" target="_self">Tips & Trik</a></li>
                        </ul>
                    </li>
                    <li><a href="showcategory.php?category=Olahraga" target="_self" >Olahraga</a></li>
                    <li><a href="showcategory.php?category=Teknologi" target="_self" >Teknologi</a></li>
                    <li><a href="showcategory.php?category=Gallery" target="_self" >Gallery</a>
                        <ul>
                            <li><a href="showcategory.php?category=Coretan" target="_self">Coretan</a></li>
                            <li><a href="showcategory.php?category=Cerpenbung" target="_self">CerpenBung</a></li>
                            <li><a href="showcategory.php?category=Gagas" target="_self">Gagas</a></li>
                            <li><a href="showcategory.php?category=Foto" target="_self">Foto</a></li>
                        </ul>
                    </li>
                 </ul>
             </li>
             <?php
			if($_SESSION['user']==""){
			?>
            <li style="width:120px">&nbsp;</li>
             <form action="login.php" method="post">
             <input type="hidden" value="<?php echo $_SERVER['SCRIPT_NAME']; ?>" name="url">
             <input type="hidden" value="<?php echo $_SERVER['QUERY_STRING']; ?>" name="query"> 
             <li style="color:#0087c7">
                Username : <input type="text" name="username"/>
             </li>
             <li style="color:#0087c7">
                &nbsp;&nbsp;Password : <input type="password" name="password" />
             </li>
             <li style="width:80px">
                <input style="width:80px; height:25px;"type="image" name="imageField" id="imageField" src="images/signin.gif" class="send" />
             </li>
             </form>
             <li style="width:80px; padding:0;">
             	<a style="padding:0;" href="regist_user.php" target="_self" ><img src="images/register.gif" width="80px" height="25px" /></a>
             </li>
             <?php } else{?>
             <li style="width:525px">&nbsp;</li>
			 <li style="color:#0087c7; text-align:center">
                <p align="center" style="font-size:14px; padding-top:3px">Welcome, <?php echo $_SESSION['user']; ?></p></li>
             <li><a href="logout.php" target="_self" ><img src="images/signout.gif" width="80px" height="25px" /></a></li>
			 <?php }?>
            </ul>
        </div>
      <div class="logo">
        <h1><a href="index.html">ulti<span>magz</span></a></h1>
      </div>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider"> <a href="#"><img src="images/slide1.jpg" width="960" height="360" alt="" /> </a> <a href="#"><img src="images/slide2.jpg" width="960" height="360" alt="" /> </a> <a href="#"><img src="images/slide3.jpg" width="960" height="360" alt="" /> </a> </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
        <?php
		echo "<h2>".$category." </h2> <br><br>";
		$sql="SELECT * FROM artikel where Kategori = '$category'";
		$result=mysql_query($sql);
		echo "<ul>";
		while($row = mysql_fetch_array($result)) {
			$gambar = $row['gambar'];
			echo "<li><a href='show.php?id=".$row['IDartikel']."'>".$row['judul']."</a>";
        ?>
        	<p class="infopost">Posted by <a href="#"><?php echo $row['author'];?></a>  <span>&nbsp;&bull;&nbsp;</span> Category &nbsp;&nbsp; <a href="#"><?php echo $row['kategori'];?></a> <a href="#" class="com"></a></p>
	               
        
		<?php
	
        //cetak isi artikel
			echo $row['isi'] . "</li><br><br>";
			
		?>
    
		<?php
		}
		?>
        </ul>
		</div>
      </div>
      <div class="sidebar">
        <div class="searchform">
          <form id="formsearch" name="formsearch" method="post" action="search.php">
            <span>
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search article :" type="text" />
            </span>
            <input name="button_search" src="images/search.gif" class="button_search" type="image" />
          </form>
        </div>
        <div class="gadget">
           <h2>Recent Article</h2>
           <ul>
           <?php
		   		$sql="SELECT * FROM artikel";
				$result=mysql_query($sql);
				while($row = mysql_fetch_array($result)) {
					echo "<li>" . "<a href='show.php?id=".$row['IDartikel']."'>".$row['judul']."</a>";
				}
		   ?>
           </ul>
        </div>
        
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image</span> Gallery</h2>
        <a href="#"><img src="images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div>
      <div class="col c2">
        <h2><span>Services</span> Overview</h2>
        <p>Curabitur sed urna id nunc pulvinar semper. Nunc sit amet tortor sit amet lacus sagittis posuere cursus vitae nunc.Etiam venenatis, turpis at eleifend porta, nisl nulla bibendum justo.</p>
        <ul class="fbg_ul">
          <li><a href="#">Lorem ipsum dolor labore et dolore.</a></li>
          <li><a href="#">Excepteur officia deserunt.</a></li>
          <li><a href="#">Integer tellus ipsum tempor sed.</a></li>
        </ul>
      </div>
      <div class="col c3">
        <h2><span>Contact</span> Us</h2>
        <p>Nullam quam lorem, tristique non vestibulum nec, consectetur in risus. Aliquam a quam vel leo gravida gravida eu porttitor dui.</p>
        <p class="contact_info"> <span>Address:</span> 1458 TemplateAccess, USA<br />
          <span>Telephone:</span> +123-1234-5678<br />
          <span>FAX:</span> +458-4578<br />
          <span>Others:</span> +301 - 0125 - 01258<br />
          <span>E-mail:</span> <a href="#">mail@yoursitename.com</a> </p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; Copyright <a href="#">MyWebSite</a>.</p>
      <p class="rf">Design by Dream <a href="http://www.dreamtemplate.com/">Web Templates</a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
<?php mysql_close(); ?>
