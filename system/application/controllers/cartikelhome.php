<?php
	function index() {
		$this->load->model('martikel');
		$this->load->model('mlink');
		$this->load->model('miklan');
		$data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
		$data['daftarlink'] = $this->mlink->daftarlink();
		$data['daftariklan'] = $this->miklan->daftariklan();
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'index.php/cartikel/index/';
		$config['total_rows'] = $this->db->count_all('artikel');
		$config['per_page'] = 5;
		$config['num_links'] = 20;
		$this->pagination->initialize($config);
		$data['jenis'] = 'artikelhome';
		$data['hasil'] =
		$this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
		$this->load->view('template', $data);
	}
	
	function artikelhome($id){
                //echo "test";
		$this->load->model('martikel');
		$this->load->model('mlink');
		$this->load->model('miklan');
		$data['ambilisi'] = $this->martikel->ambilisi($id);
		$data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
		$data['daftarlink'] = $this->mlink->daftarartikel();
		$data['daftariklan'] = $this->miklan->daftarartikel();
		$data['jenis'] = 'isi_artikel';
		$this->load->view('template', $data);
	}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
