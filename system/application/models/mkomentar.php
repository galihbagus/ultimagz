<?php
Class Mkomentar extends Model {
	
	function Mkomentar() {
		parent::Model();
	}

	function getkomentar($limit, $offset, $artikelID){
            
		$this->db->select('komentarID,artikelID, nama, url, komentar, tgl');
		$this->db->from('komentar');
                //$this->db->where('name', $name);
                // Produces: WHERE name = 'Joe' 
                $this->db->where('artikelID', $artikelID);
		$this->db->limit($limit, $offset);
		$this->db->order_by("komentarID", "asc");
		$query = $this->db->get();
		return $query;
	}
        
        function insert(){
		/*
		$sql = "INSERT INTO mahasiswa (nim, nama) VALUES (".$this->db->escape($nim).",".$this->db->escape($nama).")";
		$this->db->query($sql);
		$this->db->insert('mahasiswa',$this);
		echo $this->db->affected_rows(); 
		*/
		date_default_timezone_set('America/Los_Angeles');
		$this->nama = $this->input->post('nama');
		$this->komentar = $this->input->post('komentar');
        $this->artikelID = $this->input->post('id');
        $this->tgl = date("Y-m-d");
		$this->db->insert('komentar',$this);
		//redirect('mahasiswa/sukses');
	}

	function input($nama, $url, $komentar){
		$this->db->set('nama', $nama);
		$this->db->set('url', $url);
		$this->db->set('komentar', $komen);
		$tgl = date("Y-m-d");
		$this->db->set('tgl', $tgl);
		$this->db->insert('komentar');
	}

	function jumtotal(){
		return $this->db->count_all('komentar');
	}
}
?>
