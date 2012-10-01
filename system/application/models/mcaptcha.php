<?php
Class Mcaptcha extends Model {
	
	function Mcaptcha(){
		parent::Model();
	}

	function GenerateCaptcha(){
		$captcha = array(
		'word'		=> '',
		'img_path'	 	=> realpath('captcha').'/',
		'img_url'	 	=>  base_url().'captcha/',
		'font_path'	 	=> './system/fonts/mvboli.ttf',
		'img_width'	=> '150',
		'img_height' 	=> 60,
		'expiration' 	=> 3600
		 );
		return create_captcha($captcha);
	}
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
