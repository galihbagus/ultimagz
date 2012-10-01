
<table>
<tr>
	<td colspan="2">
	<h2><?php echo anchor('cartikel/view/'.$row->IDartikel, $row->judul); ?></h2>
        <p class="infopost">Posted <span class="date"><?php echo $row->tanggal; ?></span> by <a href="#"><?php echo $row->author; ?></a> &nbsp;&nbsp;| ultimagz </p>
        <div class="clr"></div>               
        <font size="2"><?php echo $row->tanggal; ?></font></td>
</tr>
<tr>
	<td><img src="<?php echo base_url();?>system/artikel/thumbnails/<?php echo $row->gambar;?>"/> </td>
	<td valign="top"> <font size="2">
            <div class="post_content">
            <?php echo $isi; ?> .. 
            </div>
        </td>
        
        
</tr>
<tr>
	<td colspan="2"></td>
</tr>
</table>

