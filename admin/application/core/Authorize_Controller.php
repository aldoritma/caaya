<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authorize_Controller extends Admin_Controller {

	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('sess_admin') == FALSE || $this->session->userdata('sess_admin') == '0' ) redirect();
	}
	
}



