<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity_m extends CI_Model {

	function __construct() {

	}

	function saveactivity($input = '')
	{
		$create = $this->db->insert('tbl_contactmember', array(
			'name' => $input['name'],
			'phone' => $input['phone'],
			'address' => $input['address'],
			'email' => $input['email'],
			'ipaddres' => $this->input->ip_address(),
			'user_agent' => $this->input->user_agent(),
			'created' => date('Y-m-d H:i:s'),
		));
		return $create;
	}


}