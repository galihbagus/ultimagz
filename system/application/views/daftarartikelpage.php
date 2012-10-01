
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php  echo $kate; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="<?php echo base_url() ?>css/style.css" media="screen,projection,print" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url() ?>css/coin-slider.css" media="screen,projection,print" rel="stylesheet" type="text/css" >
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
    <?php include("header2.php"); ?>
    
      <div class="logo">
        <h1><a href="index.html">ulti<span>magz</span></a></h1>
      </div>
    
        <?php include("menu.php");?>

      <div class="clr"></div>
      <div class="clr"></div>
    </div>
  </div>
  
  <!--end of header-->
  
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
  
          <div class="article">
          <h2><?php echo $kate; ?></h2>
          <?php 
             include "daftarartikel.php"; 
          ?> 
          </div>   
         
            
          
        <!--  
        <div class="article">
          <h2><span>We'll Make Sure Template</span> Works For You</h2>
          <p class="infopost">Posted <span class="date">on 29 aug 2016</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a> <a href="#" class="com"><span>7</span></a></p>
          <div class="clr"></div>
          <div class="img"><img src="images/img2.jpg" width="620" height="154" alt="" class="fl" /></div>
          <div class="post_content">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. <a href="#">Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo.</a> Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque. Curabitur vel urna. In tristique orci porttitor ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam.</p>
            <p><strong>Aenean consequat porttitor adipiscing. Nam pellentesque justo ut tortor congue lobortis. Donec venenatis sagittis fringilla.</strong> Etiam nec libero magna, et dictum velit. Proin mauris mauris, mattis eu elementum eget, commodo in nulla. Mauris posuere venenatis pretium. Maecenas a dui sed lorem aliquam dictum. Nunc urna leo, imperdiet eu bibendum ac, pretium ac massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Quisque condimentum luctus ullamcorper.</p>
            <p class="spec"><a href="#" class="rm">Read more &raquo;</a></p>
          </div>
          <div class="clr"></div>
        </div>
        <p class="pages"><small>Page 1 of 2</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>
      -->
        </div>
	  <!--end of content-->
	  
	  <!--sidebar-->
          
      <div class="sidebar">
        <div class="searchform">
            
            <?php
             echo form_open('cartikel/cari');
             echo form_input('search');
             $submit = array('name'=>'cari','value'=>'GO','class'=>'button');
             echo form_submit($submit);
             echo form_close();
             ?>
            <!--
          <form id="formsearch" name="formsearch" method="post" action="#">
            <span>
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our ste:" type="text" />
            </span>
            <input name="button_search" src="images/search.gif" class="button_search" type="image" />
          </form>
            -->
        </div>
        <div class="gadget">
          <h2 class="star"><span>Recent Artikel</span></h2>
          <div class="clr"></div>
          <ul class="sb_menu">
              
         <!--RECENT ARTIKEL-->
              
             <?php foreach($daftarartikel->result() as $row): ?>
    		<table><tr valign="top">
                   <td>&bull; </td>
                   <td><font size=2>
                    <?php 
                    //echo "test";
                    //panggil controller untuk menampilkan judul recent artikel
                    echo anchor('cartikel/view/'.$row->IDartikel, $row->judul);
                    ?>
                    </font></td></tr>
                </table>
              <?php endforeach; ?>
              
          </ul>
        </div>
        <div class="gadget">
          <h2 class="star"><span>Advertising</span></h2>
          <div class="clr"></div>
          <!--kosooong :)-->

          
        </div>
      </div>  
      <div class="clr"></div>
	  
    </div>
  </div>
  	  <!--/sidebar-->
	  
	  <!--footer-->
	  <!--bagian item-->

	<!--/footer-->
	
  </div>
</div>
</body>
</html>
