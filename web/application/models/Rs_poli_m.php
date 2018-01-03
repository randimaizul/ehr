<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rs_poli_m extends CI_Model {
	private $table;

	public function __construct(){
		parent::__construct();
		$this->table = "rs_poli";
	}

	public function get_rs_poli($id_poli=null){
		$table = $this->table;
		$fields = "*";
		$where = " id_rs = '".$this->session->userdata('logged_in')['id_rs']."' AND  id_poli = '".$id_poli."' ";
		$object = $this->adapter->select($table, $join=null, $fields, $where);
		return $object;
	}

	public function get_all_poli(){
		$table = $this->table;
		$join = "poli AS p ON rs_poli.id_poli = p.id_poli";
		$fields = "*";
		$where = " rs_poli.id_rs = '".$this->session->userdata('logged_in')['id_rs']."' ";
		
		$object = $this->adapter->select($table, $join, $fields, $where);
		
		return $object;
	}

	public function insert_rs_poli(){
		#check sudah ada atau belum
		$table = $this->table;
		$join = "poli AS p ON rs_poli.id_poli = p.id_poli";
		$fields = "*";
		$rs_poli = $this->input->post();
		$where = " rs_poli.id_poli = '".$rs_poli['id_poli']."' AND rs_poli.id_rs = '".$rs_poli['id_rs']."' ";
		$object_poli = $this->adapter->select($table, $join, $fields, $where);

		#jika tidak ada yang sama
		if($object_poli['obj'] == 0 ){
			$table = $this->table;
			$fields = $this->input->post();		
			$object = $this->adapter->insert($table, $fields);
		} else {
			$object['status'] = false; 
			$object['msg'] = "Duplikasi data"; 
			$object['obj'] = "0"; 
		}
		return $object;
	}

	public function delete_rs_poli($id_rs_poli){
		$table = $this->table;
		$where = " id_rs_poli = '".$id_rs_poli."' ";
		
		$object = $this->adapter->delete($table, $where);
		
		return $object;
	}


}?>