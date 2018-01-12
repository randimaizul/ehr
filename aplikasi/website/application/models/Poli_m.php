<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poli_m extends CI_Model {
	private $table;

	public function __construct(){
		parent::__construct();
		$this->table = "poli";
	}

	public function get_all_poli(){
		$table = $this->table;
		$fields = "*";
		
		$object = $this->adapter->select($table, $join=null, $fields);
		
		return $object;
	}

}?>