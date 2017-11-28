<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Users extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index_get()
	{
		
	}

    function index_post()
    {
        $dataUser = array(
            'username' => $this->post('email'),
            'password' => md5($this->post('password')),
            'status' => '2',
            'api_key' => md5(uniqid(rand(),TRUE))
            );
        $insert = $this->db->insert('users',$dataUser);
        if($insert){
            $idUser = $this->db->query("SELECT id FROM users where api_key='".$dataUser['api_key']."'")->result_array();
            $data = array(
                'nama_pasien' => $this->post('nama'),
                'alamat' => $this->post('alamat'),
                'no_telepon' => $this->post('telp'),
                'id_user' => $idUser[0]['id']
                );
            $insertPasien = $this->db->insert('pasien',$data);
            if($insertPasien){
                $this->response($data,REST_Controller::HTTP_OK);
            }else {
                $this->response(['status' => FALSE], REST_Controller::HTTP_BAD_GATEWAY);    
            }
            
        }else{
            $this->response(['status' => FALSE], REST_Controller::HTTP_BAD_GATEWAY);
        }
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

    function login_post()
    {
        $username = $this->post('username');
        $password = md5($this->post('password'));

        $login = $this->db->query("SELECT * FROM users WHERE username='$username' AND password='$password' AND status='2'");
        if($login->result_array()!=NULL){
            // echo "ADA";
            $this->response($login->result(),REST_Controller::HTTP_OK);
        }else {
            // echo "KOSONG";
            $this->response(['status' => 'Wrong username or password'], REST_Controller::HTTP_NOT_FOUND);
        }

    }
}
?>