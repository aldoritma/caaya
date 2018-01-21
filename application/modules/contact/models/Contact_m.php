<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_m extends CI_Model {

	function __construct() {

	}

	function savecontact($input = '')
	{
		$create = $this->db->insert('tbl_contactus', array(
			'name' => $input['name'],
			'ponsel' => $input['ponsel'],
			'category' => $input['category'],
			'address' => $input['address'],
			'email' => $input['email'],
			'phone' => $input['phone'],
			'message' => $input['message'],
			'ipaddres' => $this->input->ip_address(),
			'user_agent' => $this->input->user_agent(),
			'created' => date('Y-m-d H:i:s'),
		));
		return $create;
	}


}