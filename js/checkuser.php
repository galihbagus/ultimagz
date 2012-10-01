<?php 
$con = mysql_connect("localhost","root","");
					if (!$con)
					  {
					  die('Could not connect: ' . mysql_error());
					  }
					
mysql_select_db("blogci3", $con);
$result = mysql_query("SELECT username FROM user");
$arr_user=array();
while($row = mysql_fetch_array($result))
                  	{
                    	array_push($arr_user, $row[0]);
						
					}
				
mysql_close();


$username=$_POST['user_name'];


if(in_array($username,$arr_user)) 
{echo '<span style="color:#ff6666";>Username already exists.</span>';exit;}

else if(strlen($username) < 4 || strlen($username) > 12){echo '<span style="color:#ff6666";>Username must be 4 to 12 character</span>';}
else if (preg_match("/^[a-zA-Z1-9]+$/", $username)) 
{
       echo '<span style="color:#66cc66";>Username is available.</span>';
} 

?>