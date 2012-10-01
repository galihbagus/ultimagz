<?php

class Cregister extends Controller {
    
	function Cregister(){
            parent::Controller();	
            $this->load->model('mlogin');
            $this->load->helper('html');
            $this->load->library('session');
            session_start();
	}
	
	function index(){
		$this->load->view('registerform');
	}
	
	function submit(){
		$flag=$this->mlogin->submit();
	 	redirect(base_url()."hasil.php?id=".$flag);
	}
	
	function usermasuk(){
            
             if($this->cekuser()=="yes"){
                 $data['username'] = $this->input->post('username');
                 $newdata = array ('username' => $data['username'], 'status'=>'ok');
                 $this->session->set_userdata($newdata);
                 redirect(site_url());
            }
            else{
                echo "gagal";
            }
	}
        
	function cekuser(){
	$data['user'] = $this->input->post('username');
	$data['pass'] = $this->input->post('password');
	//cheking di database
	$data['temukan']=$this->mlogin->cekdb();
            if($data['temukan']==null){
                return "no";
            }else{		
                return "yes";
            }
	}
	
	function gagallogin(){
	if($this->cekuser()=="yes"){
	redirect('login');
	}
	else{
	echo 'sukses';}
	}
	
	function logout(){
	$this->session->sess_destroy();
	echo "Anda telah berhasil logout";
	}
	
	}