<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rumahsakit_m extends CI_Model {
	private $table;

	public function __construct(){
		parent::__construct();
		$this->table = "rumah_sakit";
	}


	public function get_all_rs(){
		$table = $this->table;
		$fields = "*";
		
		$object = $this->adapter->select($table, $join=null, $fields);
		
		return $object;
	}


}?>