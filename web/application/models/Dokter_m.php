<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter_m extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_dokter(){
		$sql = "SELECT * FROM dokter WHERE id_dokter = '".$this->input->post('id_dokter')."' ";
		return $this->db->query($sql);
	}

	public function get_all_dokter(){
		$sql = "SELECT * FROM dokter ";
		return $this->db->query($sql);
	}

	public function create_dokter(){
		$sql = "INSERT INTO dokter (nama_dokter, alamat, no_telp) VALUES ('".$this->input->post('nama_dokter')."','".$this->input->post('alamat')."','".$this->input->post('no_telp')."')";
		return $this->db->query($sql);
	}

	public function update_dokter(){
		$sql = "UPDATE dokter SET nama_dokter = '".$this->input->post('edit_nama_dokter')."',
				alamat = '".$this->input->post('edit_alamat')."', 
				no_telp = '".$this->input->post('edit_no_telp')."'
				WHERE id_dokter = '".$this->input->post('edit_id_dokter')."'";
		return $this->db->query($sql);
	}	

	public function delete_dokter(){
		$sql = "DELETE FROM dokter WHERE id_dokter = '".$this->input->post('id_dokter')."' ";
		return $this->db->query($sql);
	}

}?>