<?php

class Mlogin extends Model {
	
	function cekdb(){
	$user = $this->input->POST('username');
	$pass = $this->input->POST('password');

	$this->db->where('username', $user);
	$this->db->where('password', $pass);
	$query = $this->db->get('user'); 
	return $query->result();
	}
	
	public function submit()
	{
		$flag=0;
		
		
		$uname=$this->input->post('username');
		if(strlen($uname)<4)$flag=1;
		$password=$this->input->post('password');
		if(strlen($password)<6)$flag=1;
		$nama=$this->input->post('nama');
		if(strlen($nama)<3)$flag=1;
		$nim=$this->input->post('nim');
		if(strlen($nim)<10)$flag=1;
		$prodi=$this->input->post('prodi');
		if(strlen($prodi)<4)$flag=1;
		$angkatan=$this->input->post('angkatan');
	
		$level=2;
		if($flag==0){
			$data= array(
					 'username'=>$uname,
					 'password'=>$password,
					 'nama'=>$nama,
					 'nim'=>$nim,
					 'jurusan'=>$prodi,
					 'angkatan'=>$angkatan,
					 'level'=>$level,
					 );
			$this->db->insert('user',$data);
		
		}
		return $flag;
	}

}