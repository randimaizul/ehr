<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penanganan_m extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->table = "penanganan";
	}

	public function get_all_penanganan($id_rekam_medis){
		$table = $this->table;
		$fields = "*";
		$where = " id_rekam_medis = '".$id_rekam_medis."' ";
		$object = $this->adapter->select($table, $join=null, $fields, $where);
		
		return $object;
	}

	public function insert_penanganan(){
		$penanganan = array();
		$penanganan['jenis_penanganan'] = $this->input->post('jenis_penanganan');
		$penanganan['keterangan'] = $this->input->post('keterangan');
		$penanganan['id_rekam_medis'] = $this->input->post('id_rekam_medis');

		$table = $this->table;
		$fields = $penanganan;
		$object = $this->adapter->insert($table, $fields);

		return $object;
	}

	

}?>