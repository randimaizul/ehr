<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftaran_m extends CI_Model {

	private $table;

	public function __construct(){
		parent::__construct();
		$this->table = "pendaftaran";
	}

	public function get_all_pasien($status,$date=null){
		$table = $this->table;
		$fields = "*, pendaftaran.status AS status_daftar, pas.alamat AS alamat_pasien";
		$join = " pasien AS pas ON pendaftaran.id_pasien = pas.id_pasien
				  LEFT JOIN dokter AS d ON pendaftaran.id_dokter = d.id_dokter
				  LEFT JOIN rs_poli AS rsp ON pendaftaran.id_rs_poli = rsp.id_rs_poli
				  LEFT JOIN poli AS p ON rsp.id_poli = p.id_poli 
				  LEFT JOIN asuransi AS asu ON pas.id_asuransi = asu.id_asuransi ";
		if($status == "-1"){
			$where = " rsp.id_rs = '".$this->session->userdata('logged_in')['id_rs']."' ";			
		} else {
			$where = " rsp.id_rs = '".$this->session->userdata('logged_in')['id_rs']."' AND pendaftaran.status = '".$status."' ";
		}

		//get pasien hari ini untuk dashboard
		if($date){
			$where.="  AND date(tanggal_pendaftaran) = '".$date."' ";
		}

		//get pasien untuk level akses dokter (pasien yg udah di approve pegawai)
		if($this->session->userdata('logged_in')['status'] == '2'){
			$where.=" AND d.id_dokter = '".$this->session->userdata('logged_in')['id_dokter']."' AND (pendaftaran.status = 1 OR pendaftaran.status = 2) ";
		}
		
		$order = " id_pendaftaran DESC ";
		$object = $this->adapter->select($table, $join, $fields, $where, $order, $limit = null, $offset = null);
		
		return $object;
	}

	public function insert_pendaftaran($id_pasien){
		$pasien = array();
		$pasien['id_pasien'] = $id_pasien;
		$pasien['id_dokter'] = $this->input->post('id_dokter');
		$pasien['id_rs_poli'] = $this->input->post('id_rs_poli');
		$pasien['tanggal_pendaftaran'] = date("Y-m-d H:i:s");
		$pasien['nomor_pendaftaran'] = $this->get_nomor_pendaftaran();
		$pasien['status'] = "1";

		$table = $this->table;
		$fields = $pasien;
		$object = $this->adapter->insert($table, $fields);

		return $object;
	}

	public function approve($id_pendaftaran){
		$pasien = array();
		$pasien['status'] = '1';

		$table = $this->table;
		$fields = $pasien;
		$where = " id_pendaftaran = '".$id_pendaftaran."' ";
		$object = $this->adapter->update($table, $fields, $where);

		return $object;
	}

	public function closed($id_pendaftaran){
		$pasien = array();
		$pasien['status'] = '2';

		$table = $this->table;
		$fields = $pasien;
		$where = " id_pendaftaran = '".$id_pendaftaran."' ";
		$object = $this->adapter->update($table, $fields, $where);

		return $object;
	}

	public function get_nomor_pendaftaran (){
		$sql = "SELECT count(id_pendaftaran) as total from pendaftaran as p
				LEFT JOIN rs_poli as rsp ON p.id_rs_poli = rsp.id_rs_poli
				WHERE rsp.id_rs = '".$this->session->userdata('logged_in')['id_rs']."' AND date(tanggal_pendaftaran) = '".date("Y-m-d")."'";
		return $this->db->query($sql)->row('total')+1;
	}

	public function search_pasien(){
		$table = $this->table;
		$fields = "*, pendaftaran.status AS status_daftar, pas.alamat AS alamat_pasien";
		$join = " pasien AS pas ON pendaftaran.id_pasien = pas.id_pasien
				  LEFT JOIN dokter AS d ON pendaftaran.id_dokter = d.id_dokter
				  LEFT JOIN rs_poli AS rsp ON pendaftaran.id_rs_poli = rsp.id_rs_poli
				  LEFT JOIN poli AS p ON rsp.id_poli = p.id_poli 
				  LEFT JOIN asuransi AS asu ON pas.id_asuransi = asu.id_asuransi ";
		
		$where = " rsp.id_rs = '".$this->session->userdata('logged_in')['id_rs']."' AND pas.nama_pasien LIKE '%".$this->input->post('nama_pasien')."%' ";			
		$order = " pas.nama_pasien ASC ";
		$group = " pendaftaran.id_pasien ";
		$object = $this->adapter->select($table, $join, $fields, $where, $order, $limit = null, $offset = null, $group);
		
		return $object;
	}

}?>