<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai_m extends CI_Model {
	private $table;

	public function __construct(){
		parent::__construct();
		$this->table = "pegawai";
	}

	public function get_pegawai($id_user){
		$table = $this->table;
		$join = " rumah_sakit AS rs ON pegawai.id_rs = rs.id_rs ";
		$fields = "*";
		$where = " id_user = '".$id_user."' ";
		
		$object = $this->adapter->select($table, $join, $fields, $where);
		
		return $object;
	}

}?>