<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function login()
	{
		$this->load->library('form_validation');
		
		// Username
		$this->form_validation->set_rules('_username', 'Username', 'trim|required');
		// Password
		$this->form_validation->set_rules('_password', 'Password', 'trim|required');
		
		if (is_ajax)
		{
			if( $this->form_validation->run($this) == FALSE)
			{
				$response = array('status'=>'error', 'message'=>'Validation Error. Access Denied');
			}
			else
			{
				if ($this->authentication->login_admin($this->input->post('_username'), $this->input->post('_password'))) 
				{
					$response = array('status'=>'success', 'message'=>'Welcome, '.$this->session->userdata('nama_lengkap'));
				}
				else
				{
					$log_data = array(
						'username'=>$this->input->post('_username'),
						'activity_type'=>'login',
						'account_type' => 'admin',
						'level'=>'',
						'status'=>'failed',
						'message'=>'',
						'ip_address'=>$this->input->ip_address(),
						'user_agent'=>$this->input->user_agent(),
						'created'=>date('Y-m-d H:i:s')
					);

					$this->db->insert('tbl_log', $log_data);
					
					$response = array('status'=>'error', 'message'=>'Access Denied');
				}	
			}	
		}
		else
		{
			show_error('No direct script access allowed');
		}
		
		echo json_encode($response);
	}
	
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */