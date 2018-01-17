<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_Controller extends MX_Controller {

	public $data;
	
	function __construct()
	{
		parent::__construct();
		
		//if ($this->session->userdata('sess_user')) redirect(base_url('../'));
		
		/* Define */
		@define('is_ajax', $this->input->is_ajax_request());	

	}
	
}

/* End of file Welcome_Controller.php */
/* Location: ./application/core/Welcome_Controller.php */