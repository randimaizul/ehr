<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter extends MY_Controller {

	function __construct()
	{
		parent::__construct();  
		$this->load->model('pendaftaran_m','pm');
		$this->load->model('dokter_m','dm');
		$this->load->model('rs_poli_m','rpm'); 
		if($this->session->userdata('logged_in')['status']!="2"){redirect("login/logout");}
	}

	function index(){
		// $session = $this->admin_m->get_login_admin2('LabSatu | Labid', 'dashboard', 'dashboard');
		redirect("dokter/dashboard");
		// echo "halo dokter";
	}

	public function dashboard(){
		$this->session->set_userdata('url', 'dokter/dashboard');
		$session = $this->session->userdata();
		$filename['page']="index";
		$filename['js']="js";
		$general['page'] = "dashboard";

		$general['pasien_booking'] = $this->pm->get_all_pasien($status='0',date("Y-m-d"))['obj'];
		$general['pasien_approve'] = $this->pm->get_all_pasien($status='1',date("Y-m-d"))['obj'];
		$general['pasien_closed'] = $this->pm->get_all_pasien($status='2',date("Y-m-d"))['obj'];

		$general['dokter'] = $this->dm->get_all_dokter()['obj'];
		$general['rsp'] = $this->rpm->get_all_poli()['obj'];

		$this->template->backend($general,$filename,$session);
	}



}