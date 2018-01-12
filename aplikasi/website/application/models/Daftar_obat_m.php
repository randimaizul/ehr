<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar_obat_m extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->table = "daftar_obat";
	}

	public function get_all_daftar_obat($id_rekam_medis){
		$table = $this->table;
		$fields = "*";
		$join = " obat AS o ON daftar_obat.id_obat = o.id_obat ";
		$where = " id_rekam_medis = '".$id_rekam_medis."' ";
		$object = $this->adapter->select($table, $join, $fields, $where);
		
		return $object;
	}

	public function insert_daftar_obat(){
		$penanganan = array();
		$penanganan['id_obat'] = $this->input->post('id_obat');
		$penanganan['jumlah'] = $this->input->post('jumlah');
		$penanganan['id_rekam_medis'] = $this->input->post('id_rekam_medis');

		$table = $this->table;
		$fields = $penanganan;
		$object = $this->adapter->insert($table, $fields);

		return $object;
	}

	

}?>