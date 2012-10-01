<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ultimagz</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="<?php echo base_url() ?>css/style2.css" media="screen,projection,print" rel="stylesheet" type="text/css" ></link>
<link href="<?php echo base_url() ?>menu/menu_style.css" media="screen,projection,print" rel="stylesheet" type="text/css" ></link>
<link href="<?php echo base_url() ?>css/coin-slider.css" media="screen,projection,print" rel="stylesheet" type="text/css" ></link>
	
<!--<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
-->


</head>
<script type="text/javascript" src="<?php echo base_url() ?>js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/cufon-georgia.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/script.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/coin-slider.min.js"></script>
</head>

<body>


<div class="main">
    
  <div class="header">
      
    <div class="header_resize">
        
    <?php include("header2.php"); ?>
      <div class="logo">
      <h1><a>ulti<span>magz</span></a></h1>
      </div>
    <?php include("menu.php"); ?>
       
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider"> <a href="#"><img src="images/1.jpg" width="960" height="360" alt="" /><span font size="20px">Wisuda Perdana UMN</span> </a> <a href="#"><img src="images/2.jpg" width="960" height="360" alt="" /> <span font size="20px">Pidato Wisuda Perdana UMN oleh Bapak Jacob Oetama</span></a> </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <!--end of header-->

  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
          
          <?php
          foreach($hasil->result() as $row) :
          $isi = $row->isi;
          $isi = substr($isi, 0, 480);
          ?>     
       
          <div class="article">
          <?php include "homeartikel.php"; ?> 
          </div>   
          
          <?php 
          endforeach;
          ?>
            
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
          <h2 class="star"><span>@ultimagz</span></h2>
          <div class="clr"></div>
          <!--kosooong :)-->
       
          

<!-- start tweetswind code -->
<script type="text/javascript">
<!--
var twitterwind_option     = '{"isOnlyMe":true,"twitterwind_logo":"none","twitterwind_logo_bgcolor":"FFFFFF","twitterwind_logo_color":"333303","followers_color":"000000","followers_bgcolor":"FFFFFF","twitterwind_max_length":"39","twitterwind_username":"none","twitterwind_username_color":"333333","twitterwind_username_bgcolor":"FFFFFF","twitterwind_twit":"block","twitterwind_twit_color":"333333","twitterwind_twit_bgcolor":"f8f8f8","twitterwind_twit_link_color":"0084B4","twitterwind_twit_scroll_color":"C0DEED","twitterwind_twit_scroll_bg_color":"FFFFFF","twitterwind_follower":"none","twitterwind_follower_bgcolor":"FFFFFF","twitterwind_frame_width":220,"twitterwind_frame_height":380,"twitterwind_frame_border":"false","twitterwind_frame_border_color":"C0DEED","twitterwind_base_font_size":"12","twitterwind_me_font_size":14,"twitterwind_caption_font_size":16,"twitterwind_scroll_height":380,"eusn":"wvkTvHzwiGI="}';
var twitterwind_url        = 'http://www.tweetswind.com/en/twitterwind.php';
//-->
</script>
<script type="text/javascript" src="http://www.tweetswind.com/en/js/twitterwind.js"></script>
<!--In accordance with the Terms of Service, please display the link within the page.-->
<div style="font-size:12px; text-align:right; width:220px"></div>
<!-- end tweetswind code -->
    
          
        </div>
      </div>  
      <div class="clr"></div>
	  <!-- iklan -->
      <script src="../../../../Scripts/swfobject_modified.js" type="text/javascript"></script>
      
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="728" height="90" id="FlashID" accesskey="visa" title="visa">
  <param name="movie" value="../../../iklan/iklanvisa.swf" />
  <param name="quality" value="high" />
  <param name="wmode" value="opaque" />
  <param name="swfversion" value="9.0.45.0" />
  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
  <param name="expressinstall" value="../../../../Scripts/expressInstall.swf" />
  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
  <!--[if !IE]>-->
  <object type="application/x-shockwave-flash" data="<?php base_url()?>iklan/iklanvisa.swf" width="660" height="85">
    <!--<![endif]-->
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="9.0.45.0" />
    <param name="expressinstall" value="../../../../Scripts/expressInstall.swf" />
    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
    <div>
      <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
      <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
    </div>
    <!--[if !IE]>-->
  </object>
  <!--<![endif]-->
</object>
    </div>
  </div>
	
  </div>
</div>
<!-- Google Analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24784876-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>
