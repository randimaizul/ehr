<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rumahsakit extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('rumahsakit_m','rs'); 
	}

	public function index(){
		// $session = $this->admin_m->get_login_admin2('LabSatu | Labid', 'dashboard', 'dashboard');
		$session = $this->session->userdata();
		$filename['page']="rumahsakit";
		$filename['js']="js";
		$general['page'] = "Rumah Sakit";
		$general['rs'] = $this->rs->get_all_rs()['obj'];
		$this->template->backend($general,$filename,$session);
	}
}