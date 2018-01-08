<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Template {
	protected $ci;
        
	function __construct(){
	 $this->ci =& get_instance();
	}
	
	public function backend($general,$filename,$session=null){
		if($session['logged_in']['status'] == '1'){
			$level = "pegawai";
		} else if($session['logged_in']['status'] == '2'){
			$level = "dokter";
		}
		$this->ci->load->view('template/backend/'.$level.'/header', $session);
		$this->ci->load->view('template/backend/'.$level.'/top_menu_admin', $session);
		$this->ci->load->view('template/backend/'.$level.'/left_menu_admin', $session);
		$this->ci->load->view($level.'/'.$filename['page'], $general);
		$this->ci->load->view('template/backend/'.$level.'/footer');
		$this->ci->load->view($level.'/'.$filename['js']);
	}	

	public function merchant($general,$filename,$session=null){
		$level = 'labid';
		$this->ci->load->view('template/backend/'.$level.'/header', $session);
		$this->ci->load->view('template/backend/'.$level.'/top_menu_merchant', $session);
		$this->ci->load->view('template/backend/'.$level.'/left_menu_merchant', $session);
		$this->ci->load->view($level.'/merchant/'.$filename['page'], $general);
		$this->ci->load->view('template/backend/'.$level.'/footer');
		$this->ci->load->view($level.'/merchant/'.$filename['js']);
	}	

	public function labid_frontend($general,$filename){
		$this->ci->load->view('template/frontend/labid/header', $general);
		$this->ci->load->view('labid/frontend/'.$filename);
		$this->ci->load->view('template/frontend/labid/footer');
		$this->ci->load->view('labid/frontend/js', $general);
	}
	 
}
?>