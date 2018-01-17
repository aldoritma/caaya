<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->template->set_layout('welcome');
		$this->template->build('welcome_message', $this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/modules/controllers/welcome.php */