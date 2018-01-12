<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asuransi_m extends CI_Model {

	private $table;

	public function __construct(){
		parent::__construct();
		$this->table = "asuransi";
	}

	public function get_all_asuransi(){
		$table = $this->table;
		$fields = "*";
		
		$object = $this->adapter->select($table, $join=null, $fields);
		
		return $object;
	}

}?>