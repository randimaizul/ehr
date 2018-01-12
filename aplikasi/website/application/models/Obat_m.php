<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obat_m extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->table = "obat";
	}

	public function get_all_obat(){
		$table = $this->table;
		$fields = "*";
	
		$object = $this->adapter->select($table, $join=null, $fields);
		
		return $object;
	}

	

}?>