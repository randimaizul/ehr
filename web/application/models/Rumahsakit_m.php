<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rumahsakit_m extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_rs(){
		$sql = "SELECT * FROM rumah_sakit WHERE id_rs = '".$this->input->post('id_rs')."' ";
		return $this->db->query($sql);
	}

	public function get_all_rs(){
		$sql = "SELECT * FROM rumah_sakit ";
		return $this->db->query($sql);
	}

	public function create_rs(){
		$sql = "INSERT INTO rumah_sakit (nama_rs, alamat, akreditasi) VALUES ('".$this->input->post('nama_rs')."','".$this->input->post('alamat')."','".$this->input->post('akreditasi')."')";
		return $this->db->query($sql);
	}

	public function update_rs(){
		$sql = "UPDATE rumah_sakit SET nama_rs = '".$this->input->post('edit_nama_rs')."',
				alamat = '".$this->input->post('edit_alamat')."',
				akreditasi = '".$this->input->post('edit_akreditasi')."'
				WHERE id_poli = '".$this->input->post('edit_id_poli')."'";
		return $this->db->query($sql);
	}	

	public function delete_rs(){
		$sql = "DELETE FROM rumah_sakit WHERE id_rs = '".$this->input->post('id_rs')."' ";
		return $this->db->query($sql);
	}

}?>