<script type="text/javascript" src="<?php echo base_url() ?>js/validasi.js"></script>
<link href="<?php echo base_url() ?>css/style2.css" media="screen,projection,print" rel="stylesheet" type="text/css" ></link>
<link href="<?php echo base_url() ?>css/coin-slider.css" media="screen,projection,print" rel="stylesheet" type="text/css" ></link>
	 
<div>
            <ul id="menu">
            <!--
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
             -->
             <li><a>  Portal Pers Kampus</a></li>
            <li style="width:120px">&nbsp;</li>
            <form action="<?php echo site_url(); ?>/clogin/usermasuk" method="post">
                 <input type="hidden" value="<?php echo $_SERVER['SCRIPT_NAME']; ?>" name="url">
                 <input type="hidden" value="<?php echo $_SERVER['QUERY_STRING']; ?>" name="query"> 
            
            <?php
            if($session == "ada"){
                //session aktif
                echo "<li><h3>Welcome, ".$this->session->userdata('username')."</h3></li>"; 
                echo '<li><a href="'.site_url().'/clogin/logout" target="_self" ><img src="'. base_url().'/images/signout.gif" width="80px" height="25px" /></a></li>';
            }
            else{
                //sign in
                echo '
                 <li style="color:#0087c7">
                    Username : <input type="text" name="username" onkeypress="return letternumber(event)"/>
                 </li>
                 <li style="color:#0087c7">
                    &nbsp;&nbsp;Password : <input type="password" name="password" onkeypress="return letternumber(event)" />
                 </li>

                 <li style="width:80px">
                    <input style="width:80px; height:25px;"type="image" name="imageField" id="imageField" src="'.base_url().'/images/signin.gif" class="send" />
                 </li>';
                 
                echo ' <li style="width:80px">
             	<a style="padding:0;" href="'.site_url().'/cregister" target="_self" ><img src="'.base_url().'/images/register.gif" width="80px" height="25px" /></a>
                </li>';
             }

            ?>         
             </form>

            </ul>
</div>