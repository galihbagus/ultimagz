<?php
session_start();
if($_SESSION['signing'] == "")
	echo '<meta http-equiv="refresh" content="0;url=index.php">';
$id = $_SESSION['signing'];
$idartikel = $_GET['id'];
require_once('db.inc.php');
?>
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
<script type="text/javascript" src="nicEdit/nicEdit.js"></script> <script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script>
  
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
          <h2><span>Edit</span></h2>
          
          <div class="clr"></div>
            <br><br>
            
<?php

$sql="SELECT * FROM artikel where IDartikel = $idartikel and author = '$id'";
$result=mysql_query($sql);
$row = mysql_fetch_array($result);
$judul = $row['judul'];
?>

<form action="update.php" method="post">
		<input type="hidden" name="idartikel" value="<?php echo $row['IDartikel']; ?>">
        <table>
            <tr>
            	<td width=" 100px">Judul Artikel :</td>
                <td><input type="text" name="judul" value="<?php echo $judul; ?>" style="width:100%"/><br/></td>
            </tr>
            <tr>
            	<td >Isi Artikel</td>
                <td>
                	<select name="category">
                    	<option ><?php echo ucfirst($row['kategori']);?></option>
                    <optgroup label="----Info----">
                        <option value="Nasional">Nasional</option>
                        <option value="Kampus">Kampus</option>
                        <option value="Resensi">Resensi</option>
                    </optgroup>
                    <optgroup label="----Sosok----">
                        <option value="Internal">Internal</option>
                        <option value="Eksternal">Eksternal</option>
                    </optgroup>
                    <optgroup label="----Lifestyle----">
                    	<option value="Hiburan">Hiburan</option>
                        <option value="Wisata">Wisata<</option>
                        <option value="Kuliner">Kuliner</option>
                        <option value="Susis">Susis</option>
                        <option value="Nongkrong">Nongkrong</option>
                        <option value="Tipstrik">Tips & Trik</option>
  					</optgroup>
                    <option value="Olahraga">Olahraga</option>
                    <option value="Teknologi">Teknologi</option>
                    <optgroup label="----Gallery----">
                        <option value="Coretan">Coretan</option>
                        <option value="Cerpen">CerpenBung</option>
                        <option value="Gagas">Gagas</option>
                    </optgroup>
               		</select>
                  </td>
                
            </tr>
            <tr>
                <td colspan="2"><textarea name="artikel" style="width:600px; height:500px" ><?php echo $row['isi']; ?></textarea></td>
            </tr>
          	<tr>
            	<td colspan="2"><input type="submit" name="submit" value="OK" /> </td>
            </tr>

           </table></form>

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
            <li><a href="" target="_self">Foto</a></li>
            <li><a href="" target="_self">Profile</a></li>
            <li><a href="logout.php" target="_self">Sign Out</a></li>
            </ul>	
            </div>
        </div>
        <div class="gadget">
          <h2 class="star"><span>Sponsors</span></h2>
          <div class="clr"></div>
          <ul class="ex_menu">
            <li><a href="http://www.dreamtemplate.com/">DreamTemplate</a><br />
              Over 6,000+ Premium Web Templates</li>
            <li><a href="http://www.templatesold.com/">TemplateSOLD</a><br />
              Premium WordPress &amp; Joomla Themes</li>
            <li><a href="http://www.imhosted.com/">ImHosted.com</a><br />
              Affordable Web Hosting Provider</li>
            <li><a href="http://www.megastockphotos.com/">MegaStockPhotos</a><br />
              Unlimited Amazing Stock Photos</li>
            <li><a href="http://www.evrsoft.com/">Evrsoft</a><br />
              Website Builder Software &amp; Tools</li>
            <li><a href="http://www.csshub.com/">CSS Hub</a><br />
              Premium CSS Templates</li>
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
