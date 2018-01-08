<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rs_poli extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('rs_poli_m','rpm');
		$this->load->model('poli_m','pm'); 
		if($this->session->userdata('logged_in')['status']!="1"){redirect("login/logout");}
	}

	public function index(){
		$session = $this->session->userdata();
		$filename['page']="poli";
		$filename['js']="js";
		$general['page'] = "Poli";
		$general['rsp'] = $this->rpm->get_all_poli()['obj'];
		$general['poli'] = $this->pm->get_all_poli()['obj'];
		$this->template->backend($general,$filename,$session);
	}

	public function insert_rs_poli(){		
		$data = $this->rpm->insert_rs_poli();
		if($data['status'] == true){
			$this->session->set_flashdata('true', 'Data berhasil ditambahkan'); 
		} else {
			$this->session->set_flashdata('false', 'Invalid data Poli / Duplikasi'); 
		}
		redirect('pegawai/rs_poli');
	}

	public function delete_rs_poli($id_rs_poli){
		$data = $this->rpm->delete_rs_poli($id_rs_poli);
		if($data['status'] == true){
			$this->session->set_flashdata('true', $data['msg']); 
		} else {
			$this->session->set_flashdata('false', $data['msg']);
		}
		redirect('pegawai/rs_poli');
	}
}