<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_m extends CI_Model {
	private $table;

	public function __construct(){
		parent::__construct();
		$this->table = "users";
	}

	public function get_user($username, $password){
		$table = $this->table;
		$fields = "*";
		$where = " username = '".$username."' AND password = '".$password."' ";
		
		$object = $this->adapter->select($table, $join=null, $fields, $where);
		
		return $object;
	}

	public function insert_user_pasien($username, $password, $status){
		#insert tabel users
		$table = $this->table;
		$data = array();
		$user['username'] = $username;
		$user['password'] = $password;
		$user['status'] = $status;
		$fields = $user;		
		$object_user = $this->adapter->insert($table, $fields);

		#get id_user
		if($object_user['status']){
			$get_user = $this->get_user($username, $password);
			if ($get_user['obj'] != '0'){
				$object['status'] = true; 
				$object['msg'] = "Valid data user"; 				 
				foreach($get_user['obj'] as $key => $user){
					$object['obj'] = $user['id_user'];			
				}
			} else {
				$object['status'] = false; 
				$object['msg'] = "Invalid data input tabel users"; 
				$object['obj'] = "0"; 
			}
		} else {
			$object['status'] = false; 
			$object['msg'] = "Invalid data input tabel users"; 
			$object['obj'] = "0"; 
		}

		return $object;
	}

}?>