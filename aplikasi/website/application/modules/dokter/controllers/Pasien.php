<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasien extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('dokter_m','dm'); 
		$this->load->model('rs_poli_m','rpm'); 
		$this->load->model('asuransi_m','am');
		$this->load->model('pendaftaran_m','pm');
		$this->load->model('user_m','um');
		$this->load->model('pasien_m','pasm');
		$this->load->model('rekam_medis_m','rmm');
		$this->load->model('obat_m','om');
		$this->load->model('penanganan_m','pem');
		$this->load->model('daftar_obat_m','dom');
		if($this->session->userdata('logged_in')['status']!="2"){redirect("login/logout");}
	}

	public function index(){
		redirect("dokter/pasien/get_pasien/all");
	}

	public function get_pasien($status){
		$this->session->set_userdata('url', 'dokter/pasien/get_pasien/'.$status);
		if($status == "booking"){$page = 'Booking'; $status = '0';}
		else if($status == "approve") {$page = 'Approve Pasien'; $status = '1';}
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
		$general['penanganan'] = $this->pem->get_all_penanganan($id_rekam_medis)['obj'];
		$general['daftar_obat'] = $this->dom->get_all_daftar_obat($id_rekam_medis)['obj'];
		// echo "<pre>";
		// print_r($general['pasien']);
		// print_r($general['pasien_history']);
		$this->template->backend($general,$filename,$session);
	}
	
	public function tambah_rekam($id_pendaftaran, $id_pasien){
		$this->session->set_userdata('url', 'dokter/pasien/tambah_rekam/'.$id_pendaftaran.'/'.$id_pasien);
		$session = $this->session->userdata();
		$filename['page']="tambah_rekam";
		$filename['js']="js";
		$general['page'] = "Rekam Medis";

		//Check data rekam sudah ada atau belum, jika belum insert
		$rekam = $this->rmm->get_rekam($id_pendaftaran,$id_pasien);
		if($rekam['obj'] == '0'){
			$insert_rekam = $this->rmm->insert_rekam($id_pendaftaran,$id_pasien);
			$general['rekam'] = $this->rmm->get_rekam($id_pendaftaran,$id_pasien)['obj'];
		} else {
			$general['rekam'] = $rekam['obj'];
		}
		foreach ($general['rekam'] as $key => $rek){$id_rekam_medis = $rek['id_rekam_medis'];}

		//get data pasien
		$general['pasien'] = $this->pasm->get_pasien($id_pasien)['obj'];
		//get penanganan
		$general['penanganan'] = $this->pem->get_all_penanganan($id_rekam_medis )['obj'];
		//get data semua obat
		$general['obat'] = $this->om->get_all_obat()['obj'];
		//get data daftar obat dari dokter
		$general['daftar_obat'] = $this->dom->get_all_daftar_obat($id_rekam_medis )['obj'];

		// echo "<pre>";
		// print_r($general['daftar_obat']);

		$this->template->backend($general,$filename,$session);
	}

	public function update_rekam(){
		$id_rekam_medis = $this->input->post('id_rekam_medis');
		$rekam = $this->rmm->update_rekam($id_rekam_medis);
		// echo "<pre>";
		// print_r($rekam);
		if($rekam['status']){
			$this->session->set_flashdata('true', 'Data kondisi pasien berhasil ditambahkan'); 
		} else {
			$this->session->set_flashdata('false', $rekam['msg']); 
		}
		redirect($this->session->userdata('url'));
	}

	public function insert_penanganan(){
		
		$penanganan = $this->pem->insert_penanganan();
		// echo "<pre>";
		// print_r($rekam);
		if($penanganan['status']){
			$this->session->set_flashdata('true', 'Data penanganan berhasil ditambahkan'); 
		} else {
			$this->session->set_flashdata('false', $penanganan['msg']); 
		}
		redirect($this->session->userdata('url'));
	}

	public function insert_daftar_obat(){
		
		$daftar_obat = $this->dom->insert_daftar_obat();
		// echo "<pre>";
		// print_r($rekam);
		if($daftar_obat['status']){
			$this->session->set_flashdata('true', 'Data daftar obat berhasil ditambahkan'); 
		} else {
			$this->session->set_flashdata('false', $daftar_obat['msg']); 
		}
		redirect($this->session->userdata('url'));
	}

	public function closed($id_pendaftaran){
		$pasien = $this->pm->closed($id_pendaftaran);
		if($pasien['status']){
			$this->session->set_flashdata('true', 'Data pendaftaran berhasil di approve'); 
		} else {
			$this->session->set_flashdata('false', $pasien['msg']); 
		}
		redirect("dokter/pasien/get_pasien/all");
	}


	
	
}