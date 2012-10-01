<?php
class Cartikel extends Controller {
    
    	function Cartikel()
	{
		parent::Controller();
                $this->load->library('form_validation');
		$this->load->library('pagination');
                $this->load->plugin('captcha');
                $this->load->model('mcaptcha');
                session_start();
	}
        
	function index() {
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan');
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }            
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $data['daftarlink'] = $this->mlink->daftarlink();
            $data['daftariklan'] = $this->miklan->daftariklan();
            $this->load->library('pagination');
            $data['kate'] = "Show All Artikel";
            //$data['ambilisi'] = $this->martikel->ambilisi($id);
            $config['base_url'] = base_url().'index.php/cartikel/index/';
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            //$data['jenis'] = 'artikel';
            $data['hasil'] = 
            //$data['kate'] = "Show All Artikel";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
	}
        
        function cari(){
            
            $keyword = $this->input->post('search');
            //echo "HAIIII = ".$keyword;
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->cariartikel(6,0,$keyword);
            $data['kate'] = "Search";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }        
        
        function cari2(){  
            $keyword = $this->input->post('cari');
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan');  
            $this->db->like('judul', $keyword);
            $data['kate'] = "Search";
            $data['dapat'] = $this->db->get('artikel');
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $data['daftarlink'] = $this->mlink->daftarlink();
            $data['daftariklan'] = $this->miklan->daftariklan();
            $this->martikel->daftarartikel(6,0);
            $this->load->view('daftarartikelpage', $data); 
            
        }
        
	
        //function buat nampilin artikel
	function view($id){
        
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan');
            //cek ada session
            //print_r($this->session->userdata); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            
            echo form_open('cartikel/input');
            echo '<input name="id" type="hidden" value=';
            echo $id;
            echo ">";
            
            $data['judul'] = $this->martikel->judul($id);
            $data['ambilisi'] = $this->martikel->ambilisi($id);
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            //$data['author'] = $this->martikel->getauthor($id);
            //$data['editor'] = $this->martikel->geteditor($id);
            $data['daftarlink'] = $this->mlink->daftarlink();
            //$data['daftariklan'] = $this->miklan->daftarartikel();
            $data['jenis'] = 'isi_artikel';
            $this->load->model('mkomentar');
            $nilai=0;
            $data['dafkomen'] = $this->mkomentar->getkomentar('20', $nilai, $id);
/*
          //isset
            $this->form_validation->set_rules('nama', 'nama', 'required');
            $this->form_validation->set_rules('komentar', 'komentar', 'required');
            $this->form_validation->set_rules('url', 'url', 'required');

            if (empty($_POST['nama'])) {
                    $data['kesalahan']='';
            }
            else {
                  
                
                if(strcasecmp($_SESSION['captchaWord'], $_POST['confirmCaptcha']) == 0) {
                            $nama = $this->db->escape($this->input->Post('nama', TRUE));
                            $email = $this->db->escape($this->input->Post('email', TRUE));
                            $komentar = $this->db->escape($this->input->Post('komentar', TRUE));
                            $data['kesalahan'] = 'Kode Benar';
                    }
                    else {
                            $data['kesalahan'] = 'Kode Salah';
                    }


            }
            */
            
            $captcha = $this->mcaptcha->GenerateCaptcha();
            $_SESSION['captchaWord'] = $captcha['word'];
            $data['captcha'] = $captcha;
            
            echo '<input name="captcha" type="hidden" value=';
            echo $captcha['word'];
            echo ">";
            
            $config['base_url'] = base_url()."index.php/ckomentar/komentar";
            $config['total_rows'] = $this->mkomentar->jumtotal();
            $config['per_page'] = '5';
            $config['num_links'] ='5';
            $config['first_link'] = 'Pertama';
            $config['last_link'] = 'Terakhir';
            $config['cur_page'] = '1';
            $this->pagination->initialize($config);
            $data['page']=$this->pagination->create_links();

            if ($this->form_validation->run() == FALSE) {
                    $data['kesalahan'] = '';
            }
            else {
                    if ($data['kesalahan'] == 'Kode Benar') {
                            $data['kesalahan'] = 'Terkirim';
                            $this->mkomentar->input($nama, $email, $komentar);
                    }
                    else {
                            $data['kesalahan'] = 'Kode yang Anda Masukkan Salah';
                    }
            }
            
            
            $this->load->view('isiartikelpage', $data);
            $this->load->view('footer');
	}
        
        function input(){
            //session
            //print_r($this->session->userdata);  
			$link = site_url()."/cartikel/view/".$_POST['id'];
			//echo $link;
            if($this->session->userdata('username')==TRUE){    
               
                
            }
            else{
              
            }
            $this->form_validation->set_rules('nama', 'nama', 'required');
            $this->form_validation->set_rules('komentar', 'komentar', 'required');
            //$this->form_validation->set_rules('url', 'url', 'required');
            //echo $_POST['confirmCaptcha'];
            //echo "<br/>";
            //echo $_SESSION['captchaWord'];
            if(strcasecmp($_POST['captcha'], $_POST['confirmCaptcha']) == 0) {
            
            $this->load->model('mkomentar');
            $this->mkomentar->insert();
            
            }
            
            else {
			
			if($this->session->userdata('username')==TRUE)echo '<script type="text/javascript">alert("masukkan kode captcha dengan benar")</script>';
            //echo "javascript:history.go(-1)";
            
            
            }
            //$link = "/cartikel/view/" . $_POST['id'];
            
			echo "<script type='text/javascript'>window.location='$link'</script>";
            /*
            $nama = $this->db->escape($this->input->Post('nama', TRUE));
            $email = $this->db->escape($this->input->Post('email', TRUE));
            $komentar = $this->db->escape($this->input->Post('komentar', TRUE));
            */  
        }
        
        function Foto(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Foto');
            $data['kate'] = "Foto";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('gallery', $data);
            $this->load->view('footer');
        }
        
        function Nasional(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'nasional');
            $data['kate'] = "Nasional";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }
		
		function Kampus(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Kampus');
            $data['kate'] = "Nasional";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }
        
        function Kampus2(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Kampus');
            $data['kate'] = "Kampus";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }
        
        function Resensi(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Resensi');
            $data['kate'] = "Resensi";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }
        
        function Internal(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Internal');
            $data['kate'] = "Internal";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }
        
        function Eksternal(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Eksternal');
            $data['kate'] = "Eksternal";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }
        
        function Hiburan(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Hiburan');
            $data['kate'] = "Hiburan";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }
        function Wisata(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Wisata');
            $data['kate'] = "Wisata";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }     

        function Kuliner(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Kuliner');
            $data['kate'] = "Kuliner";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }           
        
        function Nongkrong(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Nongkrong');
            $data['kate'] = "Nongkrong";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        } 
        
        function Susis(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Susis');
            $data['kate'] = "Susis";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }
        
        function TipsTrik(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'TipsTrik');
            $data['kate'] = "TipsTrik";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }
        
        function Olahraga(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Olahraga');
            $data['kate'] = "Olahraga";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }
        
        function Teknologi(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Teknologi');
            $data['kate'] = "Teknologi";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }        

        function Coretan(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Coretan');
            $data['kate'] = "Coretan";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }

        function Cerbung(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Cerbung');
            $data['kate'] = "Cerbung";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }
        
        function Gagas(){
            $this->load->model('martikel');
            $this->load->model('mlink');
            $this->load->model('miklan'); 
            if($this->session->userdata('username')==TRUE){    
                $data['session'] = "ada";
            }
            else{
                $data['session'] = "error";
            }
            $data['daftarartikel'] = $this->martikel->daftarartikel(6,0);
            $this->load->library('pagination');
            $config['total_rows'] = $this->db->count_all('artikel');
            $config['per_page'] = 5;
            $config['num_links'] = 20;
            $this->pagination->initialize($config);
            $data['hasil'] = $this->martikel->kategori(6,0,'Gagas');
            $data['kate'] = "Gagas";
            $this->db->get('artikel', $config['per_page'], $this->uri->segment(3));
            $this->load->view('daftarartikelpage', $data);
            $this->load->view('footer');
        }
        
}
        
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
