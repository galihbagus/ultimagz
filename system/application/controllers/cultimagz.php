<?php

class Cultimagz extends Controller {

	function Cultimagz()
	{
		parent::Controller();	
                session_start();
	}
	
	function index()
	{
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan');
            //print_r($this->session->userdata);
            //echo $this->session->userdata('username');
            //cek session
            if($this->session->userdata('username')==TRUE){    
                $data["session"] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $data['daftarlink'] = $this->mlink->daftarlink();
            $data['daftariklan'] = $this->miklan->daftariklan();
            $data['jenis'] = "home"; //halaman awal  
		
            $config['base_url'] = base_url().'index.php/cartikel/index/';
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 3;
            $config['num_links'] = 20;
            
	    //$this->pagination->initialize($config);
            //$data['jenis'] = 'artikel';
            $data['hasil'] =
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            //$this->load->view('template', $data);
            $this->load->view('home',$data);
            $this->load->view('footer');
	}
        
        function artikelutama()
	{
            $this->load->model('martikel');
            $this->load->model('mlink');
            $data['ambilisi'] = $this->martikel->ambilisi(2);
            $this->load->view('home',$data);
	}
        

}

/* End of file Cultimagz.php */
/* Location: ./system/application/controllers/cultimagz.php */