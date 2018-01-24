<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Authorize_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		$this->data['current_page'] = 'dashboard';
		$this->load->model('dashboard_m');
	}
	
	function index()
	{
		
		//$this->data['member_activities'] = $this->dashboard_m->member_activities();
		$this->data['admin_activities'] = $this->dashboard_m->admin_activities();
		
		if ($this->data['admin_activities'])
		{
			foreach ($this->data['admin_activities'] as $key => $val)
			{
				$this->data['admin_activities'][$key]['data_admin'] = $this->dashboard_m->data_admin($val['username']);

			} //die;
		}
		
		if ($this->data['admin']['level'] == "user")
		{

		}

		if ($this->data['admin']['level'] == "client")
		{
				
		}

		$this->template->set_layout('dashboard');
		$this->template->build('default_'.$this->data['admin']['level'], $this->data);
	}
	
	function signout()
	{
		$this->authentication->logout_admin();
		redirect();
	}

	function test()
	{
		$data = $this->dashboard_m->getRecentPublished();

		echo "<pre>";
		print_r ($data);
		echo "</pre>";
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */