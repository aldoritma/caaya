<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hash_pass extends Welcome_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->config('auth', TRUE);
		
		$user_pass = "user";
		
		$this->data['user_pass_hashed'] = md5(sha1($user_pass . $this->config->item('password_key', 'auth')));
		
		echo 'Show Password : ' . $user_pass . '<br>';
		echo 'Hashed Password : ' . $this->data['user_pass_hashed'] . '';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */