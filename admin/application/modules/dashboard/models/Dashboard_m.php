<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Dashboard_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

	
	function member_activities()
	{
		$this->db->select('a.username, a.activity_type, a.status, a.message, a.url, a.ip_address, a.user_agent, a.created, b.fullname');
		$this->db->from('tbl_log a');
		$this->db->join('tbl_member b', 'b.email = a.screen_name', 'left');
		$this->db->where(array('account_type' => 'user', 'DATE_FORMAT(a.created,"%Y-%m-%d")' => date('Y-m-d')));
		$this->db->order_by('a.id', 'desc');
		$this->db->limit(50, 0);
		$res = $this->db->get();
		
		if ($res->num_rows() > 0) return $res->result_array();
		return false;
	}

	


	function client_activities()
	{
		$this->db->select('a.username, a.activity_type, a.status, a.message, a.url, a.ip_address, a.user_agent, a.created, b.fullname');
		$this->db->from('tbl_log a');
		$this->db->join('tbl_member b', 'b.email = a.screen_name', 'left');
		$this->db->where(array('account_type' => 'client', 'DATE_FORMAT(a.created,"%Y-%m-%d")' => date('Y-m-d')));
		$this->db->order_by('a.id', 'desc');
		$this->db->limit(50, 0);
		$res = $this->db->get();
		
		if ($res->num_rows() > 0) return $res->result_array();
		return false;
	}
	

	function admin_activities()
	{
		$this->db->select('a.username, a.activity_type, a.status, a.message, a.url, a.ip_address, a.user_agent, a.created');
		$this->db->from('tbl_log a');
		// $this->db->join('users b', 'b.username = a.username', 'left');
		$this->db->where(array('account_type' => 'admin', 'DATE_FORMAT(a.created,"%Y-%m-%d")' => date('Y-m-d')));
		$this->db->order_by('a.id', 'desc');
		$this->db->limit(50, 0);
		$res = $this->db->get();
		if ($res->num_rows() > 0) return $res->result_array();
		return false;
	}
	
	function data_admin($username = '')
	{
		$this->db->select('nama_lengkap, level');
		$this->db->from('tbl_users');
		$this->db->where(array('username' => $username));
		$res = $this->db->get();
		
		if ($res->num_rows() > 0) return $res->row_array();
		return false;
	}


	

	
}

/* End of file dashboard_m.php */
/* Location: ./application/modules/dashboard/models/dashboard_m.php */