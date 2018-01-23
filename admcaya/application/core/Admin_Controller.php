<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends Welcome_Controller {

	protected $admin_table = 'tbl_users';

	function __construct()
	{
		parent::__construct();

		$this->load->model('global_m');

		$this->data['menu'] = $this->global_m->get_menu($parent_id = 0, $this->session->userdata('level'));
		//var_dump($this->data['menu']); exit();
		$this->data['uri_segment'] = $this->uri->segment(1);
		$this->template->set('title', 'Halaman Administrator');
		$this->template->set_partial('header', 'partials/header');
		$this->template->set_partial('navigation', 'partials/navigation');
		$this->template->set_partial('footer', 'partials/footer');
		$this->template->set_theme('dedirome');
		// Init
		$this->data['admin'] = false;
		$this->data['logged_in'] = $this->is_logged_in();

		if ($this->is_logged_in())
		{
			$result = $this->db->get_where($this->admin_table, array('id_user' => $this->session->userdata('id_user')))->row_array();
			return $this->data['admin'] = $result;
		}
	}

	function is_logged_in()
	{
		return $this->session->userdata('sess_admin');
	}

}

/* End of file Admin_Controller.php */
/* Location: ./application/core/Admin_Controller.php */