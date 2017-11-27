<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
require APPPATH . 'libraries/REST_Controller.php';
class Dokter extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index_get()
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