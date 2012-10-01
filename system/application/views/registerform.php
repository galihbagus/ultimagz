

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Register</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="<?php echo base_url() ?>css/style3.css" media="screen,projection,print" rel="stylesheet" type="text/css" ></link>
<link href="<?php echo base_url() ?>css/coin-slider.css" media="screen,projection,print" rel="stylesheet" type="text/css" ></link>

<script type="text/javascript" src="<?php echo base_url() ?>js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/cufon-georgia.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/script.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/coin-slider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/validasi.js"></script>
<script type="text/javascript">
function checkUserName(usercheck)
{
	$('#usercheck').html('<img src="<?php echo base_url() ?>js/loader.gif" />');
	$.post("<?php echo base_url() ?>js/checkuser.php", {user_name: usercheck} , function(data)
		{			
			   if (data != '' || data != undefined || data != null) 
			   {				   
				  $('#usercheck').html(data);	
			   }
          });
}

</script>








</head>
<body>
<div class="main">
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        
        <div class="article">
          <h2 align="left">Register</h2>
          <div class="clr"></div>
          <form action="<?php echo site_url(); ?>/cregister/submit" method="post" id="register" onsubmit="">
            <ol>
              <li>
                <label for="username">Username</label>
                <input id="username" name="username" class="text" maxlength="32" onkeypress="return letternumber(event)" onblur="checkUserName(this.value)"/>
               <p id="usercheck"></p>
              </li>
              <li>
                <label for="password">Password</label>
                <input id="password" name="password" class="text" type="password" onblur="checkpass();" onkeypress="return letternumber(event)" />
                <p></p>
              </li>
              <li>
                <label for="password">Confirm Password</label>
                <input id="cpassword" name="cpassword" class="text" type="password" onblur="checkpass();" onkeypress="return letternumber(event)" />
                <p id="passwordcheck"></p>
              </li>
              <li>
                <label for="nama">Nama</label>
                <input id="nama" name="nama" class="text" maxlength="50" onkeypress="return letter(event);" onblur="checknama();" />
                <p id="namacheck"></p>
              </li>
              <li>
                <label for="nim">NIM</label>
                <input id="nim" name="nim" class="text" maxlength="11" onkeypress="return numbersonly(event);" onblur="checknim();" />
                <p id="nimcheck"></p>
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
					
					mysql_select_db("blogci3", $con);

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
                <center><input style="width:100px; height:35px;"type="image" name="imageField" id="imageField" src="<?php echo base_url(); ?>images/submit.gif" class="send"  /></center>
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
