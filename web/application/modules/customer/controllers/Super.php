<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Super extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_m');
		$this->load->model('super/super_m','sm');
		if($this->session->userdata('administrator')['level']!="super"){redirect("controlPanel/login/logout");}
	}
	function index()
	{
		$session = $this->admin_m->get_login_admin2('LabSatu | Super', 'dashboard', 'dashboard');
		$filename['page']="index";
		$filename['js']="js";
		$general['page'] = "dashboard";
		$this->template->backend($general,$filename,$session);
	}
	function user()
	{
		$session = $this->admin_m->get_login_admin2('LabSatu | Super', 'dashboard', 'dashboard');
		$filename['page']="user";
		$filename['js']="js";
		$general['page'] = "All User";
		$general['user'] = $this->sm->allUser();
		$this->template->backend($general,$filename,$session);
	}
	function addUser()
	{
		$session = $this->admin_m->get_login_admin2('LabSatu | Super', 'dashboard', 'dashboard');
		$filename['page']="addUser";
		$filename['js']="js";
		$general['page'] = "Add User";
		$this->template->backend($general,$filename,$session);
	}
	function saveUser()
	{
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		$check = $this->checkPassword($password,$password2);
		if($check){
			$addUser = $this->sm->add_user();
			if($addUser){
				$this->session->set_flashdata('benar', 'Data has been added');
				redirect('super/user/'.$status);	
			}else {
				$this->session->set_flashdata('salah', 'Error, check again');
				redirect('super/addUser/'.$status);
			}
		}else{
			$this->session->set_flashdata('salah', 'Password not match');
			redirect('super/addUser/'.$status);
		}
	}
	function changeLevel()
	{
		$updateL = $this->sm->changeLevel();
		if($updateL){
			$this->session->set_flashdata('benar', 'Users Level changed');
			redirect('super/user/'.$status);
		}else{
			$this->session->set_flashdata('salah', 'Error, check again');
			redirect('super/user/'.$status);
		}
	}
	function changePassword()
	{
		$pass1 = $this->input->post('newPassword');
		$pass2 = $this->input->post('newPassword2');
		$check = $this->checkPassword($pass1,$pass2);
		if($check){
			$updateP = $this->sm->changePassword($pass1);
			if($updateP){
				$this->session->set_flashdata('benar', 'Password changed');
				redirect('super/user/'.$status);	
			}else {
				$this->session->set_flashdata('salah', 'Error, check again');
				redirect('super/user/'.$status);
			}
		}else{
			$this->session->set_flashdata('salah', 'New password not match');
			redirect('super/user/'.$status);	
		}
	}
	function checkPassword($pass1,$pass2)
	{
		if($pass1 == $pass2){
			return 1;
		} else return 0;
	}
	function deleteUser()
	{
		$id = $this->uri->segment(4);
		$delete = $this->sm->deleteUser($id);
		if($delete){
			$this->session->set_flashdata('benar', 'User has been deleted');
			redirect('super/user/'.$status);
		}else {
			$this->session->set_flashdata('salah', 'Error, please try again');
			redirect('super/user/'.$status);
		}
	}
}