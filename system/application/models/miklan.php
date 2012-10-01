<?php
Class Miklan extends Model {
	var $gallerypath;
	var $gallery_path_url;

	function MIklan(){
		parent::Model();
                $this->load->database();
            //url ke galery artikel
            $this->gallerypath = realpath(APPPATH . '../artikel');
            $this->gallerypathurl = base_url().'system/artikel';
	}

	function daftariklan(){
		$this->db->select('IDiklan, url, gambar');
		$this->db->limit(1,0);
		$this->db->order_by("IDiklan", "desc");
		$this->db->from('iklan');
		$query = $this->db->get();
		return $query;
	}
	
	function ambil($id){
		$this->db->where('idiklan', $id);
		$this->db->select('id, url, gambar');
		$this->db->from('iklan');
		$query = $this->db->get();
		return $query;
	}
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
