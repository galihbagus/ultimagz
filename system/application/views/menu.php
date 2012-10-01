<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title></title>
	<link rel="stylesheet" href="menu_style.css" type="text/css" />
        <link href="<?php echo base_url() ?>menu/menu_style.css" media="screen,projection,print" rel="stylesheet" type="text/css" ></link>
</head>
<body>
    <div class="menubaru">
	<br>
	<br>
	<div class="menu">
		<ul>
			<li><?php echo anchor('../', 'Home'); ?></li>
			<li><?php echo anchor('../', 'Info'); ?>
				<ul>
					<li><?php echo anchor('cartikel/Nasional', 'Nasional'); ?></li>
					<li><?php echo anchor('cartikel/Kampus', 'Kampus'); ?></li>
					<li><?php echo anchor('cartikel/Resensi', 'Resensi'); ?></li>
			       </ul>
                        </li>
			<li><?php echo anchor('../', 'Sosok'); ?>
                                <ul>
                                        <li><?php echo anchor('cartikel/Internal', 'Internal'); ?></li>
                                        <li><?php echo anchor('cartikel/Eksternal', 'Eksternal'); ?></li>
                                </ul>
                        </li>
                        <li><?php echo anchor('../', 'Lifestyle'); ?>
                                <ul>
                                        <li><?php echo anchor('cartikel/Hiburan', 'Hiburan'); ?></li>
                                        <li><?php echo anchor('cartikel/Wisata', 'Wisata'); ?></li>
                                        <li><?php echo anchor('cartikel/Kuliner', 'Kuliner'); ?></li>
                                        <li><?php echo anchor('cartikel/Nongkrong', 'Nongkrong'); ?></li>
                                        <li><?php echo anchor('cartikel/Susis', 'Susis'); ?></li>
                                        <li><?php echo anchor('cartikel/TipsTrik', 'Tips & Trik'); ?></li>
                                </ul>
                        </li>
			<li><?php echo anchor('cartikel/Olahraga', 'Olahraga'); ?></li>
                        <li><?php echo anchor('cartikel/teknologi', 'Teknologi'); ?></li>
                        <li><?php echo anchor('../', 'Gallery'); ?>
                                <ul>
                                        <li><?php echo anchor('cartikel/Coretan', 'Coretan'); ?></li>
                                        <li><?php echo anchor('cartikel/Cerbung', 'Cerpen/Cerbung'); ?></li>
                                        <li><?php echo anchor('cartikel/Gagas', 'Gagas'); ?></li>
                                        <li><?php echo anchor('cartikel/Foto', 'Foto'); ?></li>
                                </ul>
                        </li>                        
		</ul>
	</div>
</div>
</body>
</html>
