<?php
		$flag=$_GET['id'];
          if($flag==0)echo "<script type='text/javascript'>alert('Registration Complete');window.location = 'index.php';</script>";
		  else if($flag==3) echo "<script type='text/javascript'>alert('Login Failed');window.location = 'index.php';</script>";
		  else echo "<script type='text/javascript'>alert('Registration Failed');window.location = 'index.php/cregister';</script>";

?>
