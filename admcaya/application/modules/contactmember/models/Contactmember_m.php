<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Contactmember_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function all($per_page, $offset)
	{	
		if ($offset != 0) $offset = ($offset-1) * $per_page;
		$this->db->from('tbl_contactmember');
		$this->db->order_by("id", 'DESC');
		$this->db->limit($per_page, $offset);
		$res = $this->db->get();
		if ($res->num_rows() > 0) return $res->result_array();
		return false;
	}

	function total_data()
	{
		return $this->db->count_all_results('tbl_contactmember');
	}

	function downloadexel()
	{	
		$this->db->from('tbl_contactmember');
		$this->db->order_by("id", 'DESC');
		$res = $this->db->get();
		if ($res->num_rows() > 0) return $res->result_array();
		return false;
	}


}

/* End of file contactus_m.php */
/* Location: ./application/modules/contactmember/models/Contactmember_m.php */