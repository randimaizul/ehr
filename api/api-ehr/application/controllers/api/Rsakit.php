<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
require APPPATH . 'libraries/REST_Controller.php';
class Rsakit extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index_get(){
		$id = $this->get('id');
		if ($id == NULL) {
            $rsakit = $this->db->get('rumah_sakit')->result();
        } else {
            $this->db->where('id_rs', $id);
            $rsakit = $this->db->get('rumah_sakit')->result();
        }
        $this->response($rsakit, REST_Controller::HTTP_OK);
	}

	function poli_get()
	{
		$id = $this->get('id_rs');
		if ($id == NULL) {
            $this->response(['status' => FALSE,'message'=>'Wrong parameter'], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $this->db->select('rp.id,p.nama_poli,p.keterangan');
            $this->db->from('rs_poli rp');
            $this->db->join('rumah_sakit rs','rs.id_rs=rp.id_rs');
            $this->db->join('poli p','p.id_poli=rp.id_poli');
            $this->db->where('rp.id_rs',$id);
            $poli = $this->db->get()->result();
            if($poli != NULL){
            	$this->response($poli, REST_Controller::HTTP_OK);
            }else {
            	$this->response(['status' => FALSE,'message'=>'Wrong parameter'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
	}
	function doktor_get()
	{
		$id = $this->get('idRsPoli');
		if ($id == NULL) {
            $this->response(['status' => FALSE,'message'=>'Wrong parameter'], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $this->db->select('d.id_dokter,d.nama_dokter,d.no_telp,d.alamat');
            $this->db->from('dokter d');
            $this->db->join('rs_poli rp','rp.id=d.id_rs_poli');
            $this->db->where('rp.id',$id);
            $dokter = $this->db->get()->result();
            if($dokter != NULL){
            	$this->response($dokter, REST_Controller::HTTP_OK);
            }else {
            	$this->response(['status' => FALSE,'message'=>'Wrong parameter'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
	}
}
?>