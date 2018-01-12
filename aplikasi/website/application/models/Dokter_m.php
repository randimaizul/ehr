<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter_m extends CI_Model {

	private $table;

	public function __construct(){
		parent::__construct();
		$this->table = "dokter";
	}

	public function get_dokter($id_user){
		$table = $this->table;
		$fields = "*";
		$join = "rs_poli AS rp ON dokter.id_rs_poli = rp.id_rs_poli
				LEFT JOIN poli AS p ON rp.id_poli = p.id_poli 
				LEFT JOIN rumah_sakit AS rs ON rp.id_rs = rs.id_rs  ";
		$where = " dokter.id_user = '".$id_user."' ";
		
		$object = $this->adapter->select($table, $join, $fields, $where);

		return $object;
	}

	public function get_dokter_poli(){
		$table = $this->table;
		$fields = "*";
		$join = "rs_poli AS rp ON dokter.id_rs_poli = rp.id_rs_poli
				LEFT JOIN poli AS p ON rp.id_poli = p.id_poli 
				LEFT JOIN rumah_sakit AS rs ON rp.id_rs = rs.id_rs ";
		$where = " rp.id_poli = '".$this->input->post('id_poli')."' AND rp.id_rs = '".$this->session->userdata('logged_in')['id_rs']."' ";
		
		$object = $this->adapter->select($table, $join, $fields, $where);

		return $object;
	}

	public function get_all_dokter(){
		$table = $this->table;
		$fields = "*";
		$join = " rs_poli AS rp ON dokter.id_rs_poli = rp.id_rs_poli
				  LEFT JOIN poli AS p ON rp.id_poli = p.id_poli
				  LEFT JOIN rumah_sakit AS rs ON rp.id_rs = rs.id_rs  ";
		$where = " rp.id_rs = '".$this->session->userdata('logged_in')['id_rs']."' ";
		$object = $this->adapter->select($table, $join, $fields, $where, $order = null, $limit = null, $offset = null);
		
		return $object;
	}

	public function insert_dokter(){
		#insert tabel users
		$table = "users";
		$data = array();
		$user['username'] = $this->input->post('username');
		$user['password'] = md5($this->input->post('password'));
		$user['status'] = "2";
		$fields = $user;		
		$object_user = $this->adapter->insert($table, $fields);

		#get id_user
		if($object_user['status']){
			$table = 'users';
			$fields = "*";
			$where = " username = '".$this->input->post('username')."' ";
			$get_user = $this->adapter->select($table, $join=null, $fields, $where);

			#jika ditemukan data user yg baru di masukan, insert ke tabel dokter
			if($get_user['status']){
				$dokter = array();
				$dokter['nama_dokter'] = $this->input->post('nama_dokter');
				$dokter['no_telp'] = $this->input->post('no_telp');
				$dokter['alamat'] = $this->input->post('alamat');
				$dokter['id_rs_poli'] = $this->input->post('id_poli');
				// $dokter['id_rs'] = $this->session->userdata('logged_in')['id_rs'];
				foreach($get_user['obj'] as $key => $value){
					$dokter['id_user'] = $value['id_user'];
				}
				$table = $this->table;
				$fields = $dokter;
				$object = $this->adapter->insert($table, $fields);
			} else {
				$object['status'] = false; 
				$object['msg'] = "Invalid get data baru users"; 
				$object['obj'] = "0"; 
			}
		} else {
			$object['status'] = false; 
			$object['msg'] = "Invalid data input tabel users"; 
			$object['obj'] = "0"; 
		}

		return $object;
	}

	public function delete_dokter($id_dokter, $id_user){
		#delete tabel dokter
		$table = $this->table;
		$where = " id_dokter = '".$id_dokter."' ";
		$object_dokter = $this->adapter->delete($table, $where);

		#jika berhasil haspus subclass dokter, delete tabel user
		if($object_dokter['status']){
			$table = 'users';
			$where = " id_user = '".$id_user."' ";
			$object_user = $this->adapter->delete($table, $where);
			$object = $object_user;
		} else {
			$object = $object_dokter;
		}
		return $object;
	}





}?>