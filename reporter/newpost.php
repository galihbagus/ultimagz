<?php
session_start();
if($_SESSION['signing'] == "")
	echo '<meta http-equiv="refresh" content="0;url=index.php">';
$id = $_SESSION['signing'];

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
          <h2><span>Create New</span></h2>
          
          <div class="clr"></div>
            <br><br>
            

<form action="insert.php" method="post">
		<table>
            <tr>
            	<td width=" 100px">Judul Artikel :</td>
                <td><input type="text" name="judul"  style="width:100%"/><br/></td>
            </tr>
            <tr>
            	<td >Isi Artikel</td>
                <td>
                	<select name="category">
                    	<option ></option>
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
                <td colspan="2"><textarea name="artikel" style="width:600px; height:500px"></textarea></td>
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
<?php mysql_close();?>