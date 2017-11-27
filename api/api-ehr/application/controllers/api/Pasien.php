<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
require APPPATH . 'libraries/REST_Controller.php';
class Pasien extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function index_get()
	{
		
	}
    function index_put()
    {
        $id = $this->put('id');
        $data = array(
            'nama_pasien' => $this->post('nama'),
            'alamat' => $this->post('alamat'),
            'jenis_asuransi' => $this->post('asuransi'),
            'no_asuransi' => $this->post('no_asuransi'),
            'umur' => $this->post('umur'),
            'no_telepon' => $this->post('telp'),
            'agama' => $this->post('agama'),
            'nama_orangtua' => $this->post('orang_tua'),
            'golongan_darah' => $this->post('goldar'),
            );
        $this->db->where('id_pasien',$id);
        $update = $this->db->update('pasien',$data);
        if($update){
            $this->response($data,REST_Controller::HTTP_OK);
        }else{
            $this->response(['status' => FALSE], REST_Controller::HTTP_BAD_GATEWAY);
        }
    }
    function daftar_post()
    {
        
    }

}
?>