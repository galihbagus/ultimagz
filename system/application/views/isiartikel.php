<!-- javascript SDK FB -->
<div id="fb-root"></div>
<script>
 (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<?php
foreach($ambilisi->result() as $row) {
	$gambar = $row->gambar;
	echo "<h2>$row->judul </h2> <br><br>";
        ?>
        <p class="infopost">
        Write by  <?php echo $row->author; ?>  &nbsp;&nbsp;| ultimagz          
        </p>
	
        <div class="clr"></div>               
        <?php
        if ($gambar!=''){
	?>
	<img src="<?php echo base_url();?>/system/artikel/<?php echo $gambar;?>">
	<?php
	}
        //cetak isi artikel
	echo $row->isi;
}
?>
        <br /><hr /><br />
<!-- tweet button -->
        <a href="https://twitter.com/share" class="twitter-share-button" data-via="ultimagz">Tweet</a>
        <script>
        !function(d,s,id){
            var js,fjs=d.getElementsByTagName(s)[0];
            if(!d.getElementById(id)){js=d.createElement(s);
                js.id=id;js.src="//platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
        </script>
<!-- fb button -->
        <div class="fb-like" data-send="true" data-layout="button_count" data-width="150" data-show-faces="true"></div>
<!-- Google+ button  -->
        <g:plusone size="medium"></g:plusone>
        <script type="text/javascript">
          (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
        </script>       
        <br />        
        
<!-- MENAMPILKAN KOMENTAR   -->
<br><br>
<h2>Komentar</h2>
<table border="0" width="600" align="center">
<?php
//ambil komentar
foreach($dafkomen->result() as $row){
?>
<tr>
	<td> <font size="2"><b><a href="http://<?php echo $row->url; ?>" target="_blank"> <?php echo $row->nama; ?> </a></b> | <?php echo $row->tgl; ?> <br>
	<?php echo $row->komentar; ?> <hr>
	<?php } ?> </font></td>
</tr>
</table>

<!-- FORM KOMENTAR -->
<h3>Kirim Komentar Anda</h3>
<table border="0" width="600" align="center">
	<tr>
		<td colspan="2"></td>
	<tr>
            <!--
	<tr valign="top">
		<td> <font size="2">Nama </font></td>
		<td> <input name="nama" type="text" value="<?php echo set_value('nama'); ?>">
		<?php echo form_error('nama'); ?></td>
	</tr> 
	<tr valign="top">
		<td><font size="2">Alamat Email</font></td>
		<td> <input name="email" type="text" value="<?php echo set_value('email'); ?>">
		<?php echo form_error('email'); ?></td>
	</tr>
            -->
        <?php
		echo '<input name="nama" type="hidden" value="'; echo $this->session->userdata('username'); echo '"> ';
        //echo $this->session->userdata('username');
		?>
	<tr valign="top">
		<td><font size="2">Komentar</font></td>
		<td><textarea type="text" cols="40" rows="6" name="komentar" value="<?php echo set_value('komentar'); ?>" /></textarea>
		<?php echo form_error('komentar'); ?></td>
	</tr>
	<tr>
		<td><font size="2">Verifikasi</font></td>
		<td><span id="captchaImage"><?php echo $captcha['image']; ?></span>
		<?php echo $kesalahan; ?></td>
	</tr>
	<tr>
		<td><font size="2">Masukkan kode</font></td>
		<td><input name="confirmCaptcha" id="confirmCaptcha" type="text" value=""></td>
	</tr>
	<tr>
		<td>
                <?php 
                      if($session == "ada")
                         echo form_submit("kirim","Kirim Data");
                      else {
                         echo "<font size='2'color='#666666'>Silahkan 
                               <a href='".site_url()."' target='_blank'>login</a> atau <a href='".site_url()."/cregister' target='_blank'>register</a> terlebih dahulu untuk menambahkan komentar</font>";                           
                      }
                ?>
                </td>
	</tr>
</table>
<?php echo form_close(); ?>
<center>
<a href=javascript:history.go(-1)><font size="2"> Back </font></a><p>&nbsp;</p>
</center>

