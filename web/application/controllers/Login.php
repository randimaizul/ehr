<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_m','um'); 
		$this->load->model('pegawai_m','pm'); 
		$this->load->model('dokter_m','dm'); 
	}

	public function index(){
		$session_data = $this->session->userdata('logged_in');
		if($session_data['username']){
			redirect('pegawai'); 
		} else {
			$this->load->view('login');
		}
		
	}

	public function check_login(){
		$session_data = $this->session->userdata('logged_in');
		// echo $session_data['username']; 
		#check sessiom
		if($session_data['username']){
			if($session_data['status'] == '1'){
				redirect('pegawai');
			} else if($session_data['status'] == '2'){
				redirect('dokter');
			} else if($session_data['status'] == '3'){
				redirect('lab');
			}			 
		} else {
			#jika submit
			if($this->input->post('submit')){
				$data = $this->um->get_user($this->input->post('username'), md5($this->input->post('password')));
				# jika total data dari database = 1
				if ($data['obj'] != '0'){
					foreach($data['obj'] as $key => $user){
						$sess_array = array(
							'id_user' => $user['id_user'],
							'username' => $user['username'],
							'status' => $user['status']
						);						
					}
					if($sess_array['status'] == '1'){
						$pegawai = $this->pm->get_pegawai($sess_array['id_user']);
						foreach($pegawai['obj'] as $key => $pegawai){
							$sess_array['id_rs'] = $pegawai['id_rs'];
							$sess_array['nama_pegawai'] = $pegawai['nama_pegawai'];
							$sess_array['id_pegawai'] = $pegawai['id_pegawai'];
							$sess_array['nrp'] = $pegawai['nrp'];
							$sess_array['nama_rs'] = $pegawai['nama_rs'];
						}
						$redirect = "pegawai";
					} else if($sess_array['status'] == '2'){
						$dokter = $this->dm->get_dokter($sess_array['id_user']);
						foreach($dokter['obj'] as $key => $dokter){
							$sess_array['id_rs'] = $dokter['id_rs'];
							$sess_array['nama_dokter'] = $dokter['nama_dokter'];
							$sess_array['id_dokter'] = $dokter['id_dokter'];
							$sess_array['nama_rs'] = $dokter['nama_rs'];
						}
						$redirect = "dokter";
					} else if($sess_array['status'] == '3'){

					}

					// print_r($sess_array);
					$this->session->set_userdata('logged_in', $sess_array);
					redirect($redirect);
				} else {
					#jika user tidak di temukan
					$this->session->set_flashdata('false', 'Invalid email/ password'); 
					redirect('login');
				}
			} else {
				#jika tidak submit lewat form
				$this->session->set_flashdata('false', 'Invalid URL'); 
				redirect('login');
			}
		}		
	}

	function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
}