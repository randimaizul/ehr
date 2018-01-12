<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasien extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')['status']!="1"){redirect("login/logout");}
		$this->load->model('dokter_m','dm'); 
		$this->load->model('rs_poli_m','rpm'); 
		$this->load->model('asuransi_m','am');
		$this->load->model('pendaftaran_m','pm');
		$this->load->model('user_m','um');
		$this->load->model('pasien_m','pasm');
		$this->load->model('penanganan_m','pen');
		$this->load->model('daftar_obat_m','do');
	}

	public function index(){
		redirect("pegawai/pasien/get_pasien/all");
	}

	public function get_pasien($status){
		$this->session->set_userdata('url', 'pegawai/pasien/get_pasien/'.$status);
		if($status == "booking"){$page = 'Booking'; $status = '0';}
		else {$page = 'Semua Pasien'; $status = '-1';}
		$session = $this->session->userdata();
		$filename['page']="pasien";
		$filename['js']="js";
		$general['page'] = $page;
		$general['pasien'] = $this->pm->get_all_pasien($status)['obj'];
		$this->template->backend($general,$filename,$session);
	}

	public function show_history($id_pasien){
		$session = $this->session->userdata();
		$filename['page']="rekam_medis";
		$filename['js']="js";
		$general['page'] = "Riwayat Pasien";
		$general['pasien'] = $this->pasm->get_pasien($id_pasien)['obj'];
		$general['pasien_history'] = $this->pm->get_all_pasien($status=null,$date=null,$id_pasien)['obj'];
		// echo "<pre>";
		// print_r($general['pasien']);
		// print_r($general['pasien_history']);
		$this->template->backend($general,$filename,$session);
	}

	public function show_history_detail($id_pasien,$id_rekam_medis,$id_pendaftaran){
		$session = $this->session->userdata();
		$filename['page']="rekam_medis_detail";
		$filename['js']="js";
		$general['page'] = "Riwayat Pasien";
		$general['pasien'] = $this->pasm->get_pasien($id_pasien)['obj'];
		$status = '-1';
		$general['pasien_history'] = $this->pm->get_all_pasien($status=$status,$date=null,$id_pasien=null,$id_pendaftaran)['obj'];
		$general['penanganan'] = $this->pen->get_all_penanganan($id_rekam_medis)['obj'];
		$general['daftar_obat'] = $this->do->get_all_daftar_obat($id_rekam_medis)['obj'];
		// echo "<pre>";
		// print_r($general['pasien']);
		// print_r($general['pasien_history']);
		$this->template->backend($general,$filename,$session);
	}

	public function tambah_pasien(){
		$session = $this->session->userdata();
		$filename['page']="tambah_pasien";
		$filename['js']="js";
		$general['page'] = "Tambah Pasien";
		$general['asuransi'] = $this->am->get_all_asuransi()['obj'];
		$general['rsp'] = $this->rpm->get_all_poli()['obj'];
		$this->template->backend($general,$filename,$session);
	}

	public function insert_pasien(){
		#insert tabel user 
		$data_user = $this->um->insert_user_pasien($this->input->post('username'), md5($this->input->post('password')), $status = '3');

		if($data_user['status']){
			$id_user = $data_user['obj'];
			#insert tabel tabel pasien
			$data_pasien = $this->pasm->insert_pasien($id_user);
			
			if($data_pasien['status']){
				$id_pasien = $data_pasien['obj'];
				#insert data pendaftaran
				$daftar = $this->pm->insert_pendaftaran($id_pasien);
				if($daftar['status']){
					$this->session->set_flashdata('true', 'Data pendaftaran berhasil ditambahkan'); 
					redirect('pegawai/pasien/get_pasien/all');
				} else {
					$this->session->set_flashdata('false', 'insert data pendaftaran'); 
				}
			} else {
				$this->session->set_flashdata('false', 'insert atau get data user'); 
			}
		} else {
			$this->session->set_flashdata('false', 'insert atau get data user'); 
		}
	}

	public function insert_pasien_dashboard(){
		$id_pasien = $this->input->post('id_pasien');
		#insert data pendaftaran
		$daftar = $this->pm->insert_pendaftaran($id_pasien);
		if($daftar['status']){
			$this->session->set_flashdata('true', 'Data pendaftaran berhasil ditambahkan'); 
			redirect('pegawai/dashboard');
		} else {
			$this->session->set_flashdata('false', 'insert data pendaftaran'); 
		}
	}

	public function approve($id_pendaftaran){
		$status = '1';
		$pasien = $this->pm->approve($id_pendaftaran, $status);
		if($pasien['status']){
			$this->session->set_flashdata('true', 'Data pendaftaran berhasil di approve'); 
		} else {
			$this->session->set_flashdata('false', $pasien['msg']); 
		}
		redirect($this->session->userdata('url'));
	}

	public function ignore($id_pendaftaran){
		$status = "3";
		$pasien = $this->pm->approve($id_pendaftaran, $status);
		if($pasien['status']){
			$this->session->set_flashdata('true', 'Data pendaftaran berhasil di approve'); 
		} else {
			$this->session->set_flashdata('false', $pasien['msg']); 
		}
		redirect($this->session->userdata('url'));
	}
	
	public function search_pasien(){
		if(!$this->input->is_ajax_request()){
       	 	show_404();
      	} else {
      		$pasien = $this->pm->search_pasien();
			if($pasien['status']){
				$status = true;
      			$msg = 'Data successfully grabing'; 
      			$obj = $pasien['obj'];
			} else {
				$status = false;
      			$msg = 'Data is not corect';
      			$obj = '';
			}	        
	    	$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>$status,'msg'=>$msg, 'obj'=>$obj)));
      	}
	}

	
}