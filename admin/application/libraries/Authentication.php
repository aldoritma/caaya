<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Authentication
{
	var $CI;
	var $user_table = 'tbl_users';
	
	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->config('auth', TRUE);
		$this->CI->load->database();
	}
	
	function create($input = '') 
	{
		
		if ($input['fullname'] == '' OR $input['username'] == '' OR $input['password'] == '' OR $input['roles'] == '') {
			return false;
		}
		
		// Check against user table
		$this->CI->db->where('username', $input['username']); 
		$query = $this->CI->db->get_where($this->user_table);
		
		if ($query->num_rows() > 0) // User_email already exists
		return false;
		
		// Insert account into the database
		$data = array(
			'nama_lengkap' 	=> $input['fullname'],
			'email' 	=> $input['email'],
			'username'		=> $input['username'],
			'password' 		=> md5(sha1($input['password'] . $this->CI->config->item('password_key', 'auth'))),
			'level'			=> $input['roles']
		);

		$this->CI->db->set($data); 
		
		if( ! $this->CI->db->insert($this->user_table)) // If register have a problem!
		return false;						
		
		return true;
	}
	
	function login_admin($username = '', $password = '') 
	{
		if ($username == '' OR $password == '')
		return false;

		// Check if already logged in
		if($this->CI->session->userdata('username') == $username)
		return true;
		
		// Check against user table
		$this->CI->db->where(array(
			'username' => $username, 
			'password' => md5(sha1($password . $this->CI->config->item('password_key', 'auth'))),
			'blokir' => 'N'
		));
		$query = $this->CI->db->get_where($this->user_table);

		if ($query->num_rows() > 0) 
		{
			$user_data = $query->row_array(); 

			// Destroy old session
			// $this->CI->session->sess_destroy();
			

			// Create a fresh, brand new session
			// $this->CI->session->sess_create();

			// Set session data
			unset($user_data['password']);
			$user_data['id_user'] = $user_data['id_user'];
			$user_data['username'] = $user_data['username'];
			$user_data['nama_lengkap'] = $user_data['nama_lengkap'];
			$user_data['level'] = $user_data['level'];
			$user_data['sess_admin'] = TRUE;
			$this->CI->session->set_userdata($user_data);
			
			// note to activity
			$this->CI->db->insert('tbl_log', array('username'=>$user_data['username'], 'activity_type'=>'login', 'account_type' => 'admin', 'level'=>$user_data['level'], 'status'=>'success', 'message'=>'', 'ip_address'=>$this->CI->input->ip_address(), 'user_agent'=>$this->CI->input->user_agent(), 'created' => date('Y-m-d H:i:s')));
			
			return true;
		} 
		else 
		{
			return false;
		}	
	}
	
	function logout_admin()
	{
		$this->CI->session->unset_userdata(array(
			'id_user'=>'', 
			'username'=>'', 
			'nama_lengkap'=>'',
			'level'=>'', 
			'sess_admin'=>false
		));
		$this->CI->session->sess_destroy();
	}
	
}
