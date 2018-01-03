<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekam_medis_m extends CI_Model {

	private $table;

	public function __construct(){
		parent::__construct();
		$this->table = "rekam_medis";
	}

	public function get_rekam($id_pendaftaran, $id_pasien){
		$table = $this->table;
		$fields = "*";
		$where ="  id_pendaftaran = '".$id_pendaftaran."' AND id_pasien = '".$id_pasien."' ";
	
		$object = $this->adapter->select($table, $join=null, $fields, $where);
		
		return $object;
	}

	public function insert_rekam($id_pendaftaran,$id_pasien){
		$rekam = array();
		$rekam['id_pasien'] = $id_pasien;
		$rekam['id_pendaftaran'] = $id_pendaftaran;
		$rekam['tgl_periksa'] = date("Y-m-d H:i:s");

		$table = $this->table;
		$fields = $rekam;
		$object = $this->adapter->insert($table, $fields);

		return $object;
	}

	public function update_rekam($id_rekam_medis){
		$rekam = array();
		$rekam['keluhan_utama'] = $this->input->post('keluhan_utama');
		$rekam['riwayat_alergi'] = $this->input->post('riwayat_alergi');
		$rekam['tanda_vital'] = $this->input->post('tanda_vital');

		$table = $this->table;
		$fields = $rekam;
		$where = " id_rekam_medis = '".$id_rekam_medis."' ";
		$object = $this->adapter->update($table, $fields, $where);

		return $object;
	}
	

}?>