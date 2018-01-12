<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poli extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('poli_m','pm'); 
	}

	public function index(){
		// $session = $this->admin_m->get_login_admin2('LabSatu | Labid', 'dashboard', 'dashboard');
		$session = "";
		$filename['page']="poli";
		$filename['js']="js";
		$general['page'] = "Poli";
		$general['p'] = $this->pm->get_all_poli()['obj'];
		$this->template->backend($general,$filename,$session);
	}
}