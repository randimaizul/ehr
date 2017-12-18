<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poli_m extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_poli(){
		$sql = "SELECT * FROM poli WHERE id_poli = '".$this->input->post('id_poli')."' ";
		return $this->db->query($sql);
	}

	public function get_all_poli(){
		$sql = "SELECT * FROM poli ";
		return $this->db->query($sql);
	}

	public function create_poli(){
		$sql = "INSERT INTO poli (nama_poli, keterangan) VALUES ('".$this->input->post('nama_poli')."','".$this->input->post('keterangan')."')";
		return $this->db->query($sql);
	}

	public function update_dokter(){
		$sql = "UPDATE poli SET nama_poli = '".$this->input->post('edit_nama_poli')."',
				keterangan = '".$this->input->post('edit_keterangan')."'
				WHERE id_poli = '".$this->input->post('edit_id_poli')."'";
		return $this->db->query($sql);
	}	

	public function delete_poli(){
		$sql = "DELETE FROM poli WHERE id_poli = '".$this->input->post('id_poli')."' ";
		return $this->db->query($sql);
	}

}?>