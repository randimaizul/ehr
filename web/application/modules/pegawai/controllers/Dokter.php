<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('dokter_m','dm'); 
		$this->load->model('rs_poli_m','rpm'); 
	}

	public function index(){
		// $session = $this->admin_m->get_login_admin2('LabSatu | Labid', 'dashboard', 'dashboard');
		$session = $this->session->userdata();;
		$filename['page']="dokter";
		$filename['js']="js";
		$general['page'] = "Dokter";
		$general['d'] = $this->dm->get_all_dokter()['obj'];
		$general['rsp'] = $this->rpm->get_all_poli()['obj'];
		$this->template->backend($general,$filename,$session);
	}

	public function insert_dokter(){
		$data = $this->dm->insert_dokter();
		if($data['status'] == true){
			$this->session->set_flashdata('true', 'Data berhasil ditambahkan'); 
		} else {
			$this->session->set_flashdata('false', 'Invalid data Poli / Duplikasi'); 
		}
		redirect('pegawai/dokter');
	}

	public function delete_dokter($id_dokter,$id_user){
		$data = $this->dm->delete_dokter($id_dokter,$id_user);
		if($data['status'] == true){
			$this->session->set_flashdata('true', $data['msg']); 
		} else {
			$this->session->set_flashdata('false', $data['msg']);
		}
		redirect('pegawai/dokter');
	}

	public function get_dokter_poli(){
		if(!$this->input->is_ajax_request()){
       	 	show_404();
      	} else {
      		$dokter = $this->dm->get_dokter_poli();
			if($dokter['status']){
				$status = true;
      			$msg = 'Data successfully grabing'; 
      			$obj = $dokter['obj'];
			} else {
				$status = false;
      			$msg = 'Data is not corect';
      			$obj = '';
			}	        
	    	$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>$status,'msg'=>$msg, 'obj'=>$obj)));
      	}
	}
	
}