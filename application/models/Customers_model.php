<?php


class Customers_model extends CI_Model{

	private $table;

	public function __construct(){

		parent::__construct();
		$this->table = 'customers';
	}

	public function create_new_customer( $data ){

		if (is_array( $data )) {

			$suc = $this->db->insert($this->table, $data);
			return ($suc) ? true : false;
		}
		else
			return false;
	}

	public function fetch_customers( $condition = false, $limit = false, $offset= false ){

		if( is_array($condition) ){

			$rs = $this->db->get_where( $this->table, $condition )->row_array();
			return ( !empty($rs) ) ? $rs : false;

		}
		return false;
	}
}
