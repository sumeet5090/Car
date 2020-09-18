<?php


class Admin_model extends CI_Model
{
	private $table = 'admin';
	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * @param bool $data
	 * @return bool
	 *
	 * if the insert array is provided then insert into db and return true, otherwise return false in any case
	 */
	public function create_new_admin($data = false){
		if (is_array($data)) {
			$suc = $this->db->insert($this->table, $data);
			return ($suc) ? true : false;
		} else return false;
	}

	public function fetch_admins($condition = false, $limit = false, $offset= false){
		if (is_array($condition)){
			$rs = $this->db->get_where($this->table, $condition)->row_array();
			return ( !empty($rs) ) ? $rs : false;
		}
		return false;
	}

}
