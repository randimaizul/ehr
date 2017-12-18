<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Super_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function allUser()
	{
		$this->db->select('*');
		$this->db->from('administrator');
		$this->db->where_not_in('level','super');
		$user = $this->db->get();
		return $user->result_array();
	}
	function add_user()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'no_hp' => $this->input->post('phone'),
			'password' => md5($this->input->post('password')),
			'status' => 'administrator',
			'level' => $this->input->post('level'),
			'created' => date('d-m-Y', NOW())
			);
		$insert = $this->db->insert('administrator',$data);
		if($insert){
			return 1;
		}else {
			return 0;
		}
	}
	function changePassword($pass)
	{
		$id = $this->input->post('idUser');
		$this->db->where('id',$id);
		$this->db->update('administrator',array('password'=>md5($pass)));
		return true;
	}
	function changeLevel()
	{
		$id = $this->input->post('idUser');
		$level = $this->input->post('level');
		if($level == '0'){
			$level = "";
		}else {
			$level = $level;
		}
		$data = array(
			'level' => $level
			);
		$this->db->where('id',$id);
		$this->db->update('administrator',$data);
		return true;
	}
	function deleteUser($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('administrator');
		return true;
	}
}