<?php


class Insurance_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_ins_coverage(){
		return $this->db->get('ins_coverage')->result_array();
	}
}
