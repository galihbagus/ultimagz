<?php
Class Mlink extends Model {
    
    function Mlink(){
        parent::Model();
        $this->load->database();
        //url ke galery artikel
        $this->gallerypath = realpath(APPPATH . '../artikel');
        $this->gallerypathurl = base_url().'system/artikel';
    }
    
    //cek artikel
    function cek($judul){
	$this->db->select('judul');
	$this->db->from('link');
	$this->db->where('judul', $judul);
	$query = $this->db->get();
	if ($query->num_rows() > 0) {
		return TRUE;
	}
	else {
		return FALSE;
	}
    }
	
    function daftarlink(){
	$this->db->select('judul, url, gambar');
	$this->db->from('link');
	$query = $this->db->get();
	return $query;
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
