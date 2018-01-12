<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasien_m extends CI_Model {

	private $table;

	public function __construct(){
		parent::__construct();
		$this->table = "pasien";
	}

	public function get_pasien($id_pasien=null, $nama_pasien=null, $tanggal_lahir=null){
		$table = $this->table;
		$fields = "*";
		$join = "asuransi AS a ON pasien.id_asuransi = a.id_asuransi";
		$where = "";
		if($id_pasien){
			$where.= " id_pasien = '".$id_pasien."' ";
		} else {
			$where.= " nama_pasien = '".$nama_pasien."' AND  tanggal_lahir = '".$tanggal_lahir."' ";
		}
	
		$object = $this->adapter->select($table, $join, $fields, $where, $order = null, $limit = null, $offset = null);
		
		return $object;
	}

	public function insert_pasien($id_user=null){
		#jika ditemukan data user yg baru di masukan, insert ke tabel pasien
		if($id_user){
			$pasien = array();
			$pasien['nama_pasien'] = $this->input->post('nama_pasien');
			$pasien['nama_orangtua'] = $this->input->post('nama_orangtua');
			$pasien['golongan_darah'] = $this->input->post('golongan_darah');
			$pasien['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$pasien['agama'] = $this->input->post('agama');
			$pasien['no_telepon'] = $this->input->post('no_telepon');
			$pasien['id_asuransi'] = $this->input->post('id_asuransi');
			$pasien['no_asuransi'] = $this->input->post('no_asuransi');
			$pasien['alamat'] = $this->input->post('alamat');
			$pasien['id_user'] = $id_user;
			
			$table = 'pasien';
			$fields = $pasien;
			$object_pasien = $this->adapter->insert($table, $fields);

			#get data pasien
			if($object_pasien['status']){
				$get_pasien = $this->get_pasien($id_pasien=null, $this->input->post('nama_pasien'), $this->input->post('tanggal_lahir'));
				
				if ($get_pasien['obj'] != '0'){
					$object['status'] = true; 
					$object['msg'] = "Valid data pasien"; 				 
					foreach($get_pasien['obj'] as $key => $pasien){
						$object['obj'] = $pasien['id_pasien'];			
					}
				} else {
					$object['status'] = false; 
					$object['msg'] = "Invalid data input/get tabel pasien"; 
					$object['obj'] = "0"; 
				}			

			} else {
				$object['status'] = false; 
				$object['msg'] = "Invalid insert ke tabel pasien"; 
				$object['obj'] = "0"; 
			}
		} else {
			$object['status'] = false; 
			$object['msg'] = "Invalid get data baru users"; 
			$object['obj'] = "0"; 
		}
		return $object;
	}


}?>