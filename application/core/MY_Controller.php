<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

	public $data;

	function __construct()
	{
		parent::__construct();

		// Define
		@define('is_ajax', $this->input->is_ajax_request());
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */