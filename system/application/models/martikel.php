<?php
Class Martikel extends Model {
    
    function Martikel(){
        parent::Model();
        $this->load->database();
        //url ke galery artikel
        $this->gallerypath = realpath(APPPATH . '../../upload');
        $this->gallerypathurl = base_url().'upload';
    }
    
    function daftarartikel($limit, $offset){
	$this->db->select('IDartikel, judul, isi, gambar');
	$this->db->from('artikel');
	$this->db->limit($limit, $offset);
	$this->db->order_by("tanggal", "desc"); 
	$query = $this->db->get();
	return $query;
    }
    
    function cariartikel($limit, $offset, $keyword){
	$this->db->select('IDartikel, judul, isi, gambar, tanggal');
	$this->db->from('artikel');
        //$this->db->where('judul',$keyword);
        $this->db->like('judul', $keyword);
// Produces: WHERE title LIKE '%match%
	$this->db->limit($limit, $offset);
	$this->db->order_by("tanggal", "desc"); 
	$query = $this->db->get();
	return $query;
    }    
    
    function kategori($limit, $offset, $kategori){
        
        //echo $kategori;
        $this->db->select('IDartikel, judul, isi, gambar, tanggal');
	$this->db->from('artikel');
        $this->db->where('kategori', $kategori);
	$this->db->limit($limit, $offset);
	$this->db->order_by("tanggal", "desc"); 
	$query = $this->db->get();
	return $query;
        
    }
    
    function daftarartikelall(){
        $this->db->select('judul');
	$this->db->from('artikel');
	$this->db->order_by("tgl", "asc"); 
	$query = $this->db->get();
	return $query;        
    }
    
    function getauthor($id){
        $this->db->select('author');
	$this->db->from('artikel');
	$this->db->where('IDartikel', $id);
	$query = $this->db->get();
	return $query;
    }
     
    
    /*
    function geteditor($id){
        $this->db->select('username');
	$this->db->from('user');
	$this->db->where('IDartikel', $id);
	$query = $this->db->get();
	return $query;
    }
    */ 
    function judul($id){
        //echo "test";
	$this->db->select('judul');
	$this->db->from('artikel');
	$this->db->where('IDartikel', $id);
	$query = $this->db->get();
	return $query;
    }
    
    function ambilisi($id){
        //echo "test";
	$this->db->select('judul, isi, gambar, author');
	$this->db->from('artikel');
	$this->db->where('IDartikel', $id);
	$query = $this->db->get();
	return $query;
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
