<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('dokter_m','dm'); 
	}

	public function index(){
		// $session = $this->admin_m->get_login_admin2('LabSatu | Labid', 'dashboard', 'dashboard');
		$session = "";
		$filename['page']="dokter";
		$filename['js']="js";
		$general['page'] = "Dokter";
		$general['d'] = $this->dm->get_all_dokter()['obj'];
		$this->template->backend($general,$filename,$session);
	}
}