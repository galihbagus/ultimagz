<?php

class Clogin extends Controller {
    
	function Clogin(){
            parent::Controller();	
            $this->load->model('mlogin');
            //$this->load->model('m_blog');
            $this->load->helper('html');
            $this->load->library('session');
            session_start();
	}

	function usermasuk(){
            
             if($this->cekuser()=="yes"){
                 $data['username'] = $this->input->post('username');
                 $newdata = array ('username' => $data['username'], 'status'=>'ok');
                 $this->session->set_userdata($newdata);
                 redirect(site_url());
            }
            else{
                redirect(base_url()."hasil.php?id=3");
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
        redirect(site_url());
	}
	
	}