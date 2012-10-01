<?php
session_start();
if($_SESSION['signing'] == "")
	echo '<meta http-equiv="refresh" content="0;url=index.php">';
$id = $_SESSION['signing'];
require_once('db.inc.php');
?>
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
<?php
	
	
	function uploadfile()
	{
		$gambartype = $_FILES['gambar']['type'];
		$gambartemp = $_FILES['gambar']['tmp_name'];
		$gambarname = $_FILES['gambar']['name'];
		$gambarsize = $_FILES['gambar']['size'];
		$judul = $_POST['judul'];
		$author = $_POST['author'];
		$caption = $_POST['caption'];
		$max_height = "502"; // This is in pixels
		$max_width = "502"; // This is in pixels
		
		/*if ($max_width && $max_height) 
		{
			list($width, $height, $type, $w) = getimagesize($_FILES['gambar']['tmp_name']);
			if($width > $max_width || $height > $max_height)
			{
				echo "<h2><span>Please Try Again</span></h2>
         			 	<div class=\"clr\"></div>";
				echo "<p>File height and/or width are too big!</p>";
				echo '<a href="upload.php" target="_self"><img src="images/ok.gif" width="100px" height="35px"/></a>';
				exit;
			}
		}*/
		
		if (is_uploaded_file($gambartemp))
		{
			$id = $_SESSION['signing'];
			if ($gambartype == "image/jpeg" || $gambartype == "image/png") 
			{
				
				if ($max_width && $max_height) 
				{
					list($width, $height, $type, $w) = getimagesize($_FILES['gambar']['tmp_name']);
					if($width > $max_width || $height > $max_height)
					{
						echo "<h2><span>Please Try Again</span></h2>
								<div class=\"clr\"></div>";
						echo "<p>File height and/or width are too big!</p>";
						echo '<a href="upload.php" target="_self"><img src="images/ok.gif" width="100px" height="35px"/></a>';
						exit;
					}
				}
				
				$result = move_uploaded_file($gambartemp, "../upload/" . $gambarname);
				$location = "../upload/" . $gambarname;
				if ($result) 
				{
					$query = mysql_query("INSERT INTO galeri (judul,tipe,gambar,author,caption) VALUES ('$judul','$gambartype','$location','$id','$caption')");
					if($query)
					{
						echo "<h2><span>Upload</span></h2>
         			 	<div class=\"clr\"></div>";
						echo "<p>Upload Success</p>";
						//echo "<meta http-equiv=\"refresh\" content=\"0;url=upload.php>";
						echo '<a href="upload.php" target="_self"><img src="images/ok.gif" width="100px" height="35px"/></a>';
						
					}
				}
				else
				{
					echo "<h2><span>Please Try Again</span></h2>
         			 	<div class=\"clr\"></div>";
					echo "<p>There is an error while uploading</p>";
					echo '<a href="upload.php" target="_self"><img src="images/ok.gif" width="100px" height="35px"/></a>';
				}
				
			} 
			else if ($gambartype == "video/mp4" || $gambartype == "video/flv")
			{
				
				$result = move_uploaded_file($gambartemp, "../upload/" . $gambarname);
				$location = "../upload/" . $gambarname;
				if ($result) 
				{
					$query = mysql_query("INSERT INTO galeri (judul,tipe,gambar,author,caption) VALUES ('$judul','$gambartype','$location','$id','$caption')");
					if($query)
					{
						echo "<h2><span>Upload</span></h2>
         			 	<div class=\"clr\"></div>";
						echo "<p>Upload Success</p>";
						//echo "<meta http-equiv=\"refresh\" content=\"0;url=upload.php>";
						echo '<a href="upload.php" target="_self"><img src="images/ok.gif" width="100px" height="35px"/></a>';
						
					}
					else
					{
						echo "<h2><span>Please Try Again</span></h2>
							<div class=\"clr\"></div>";
						echo "<p>There is an error while uploading</p>";
						echo '<a href="upload.php" target="_self"><img src="images/ok.gif" width="100px" height="35px"/></a>';
					}
				}
			}
			else
			{
				echo "<h2><span>Please Try Again</span></h2>
         			 	<div class=\"clr\"></div>";
				echo "<p>Your File must support format</p>";
				echo "<ul> 
						<li>Picture (JPEG/PNG)</li>
						<li>Video (MP4/FLV)</li>
					  </ul>";
						
				echo '<a href="upload.php" target="_self"><img src="images/ok.gif" width="100px" height="35px"/></a>';
			}
		}
		
		
	}
	uploadfile();

?>
</div>
<div class="clr"></div>
</div>
</body>
</html>