<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends Authorize_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->data['current_page'] = 'dashboard';	
		$this->load->model(array('member_m','global_m'));
		$this->template->set_layout('dashboard');
	}


	function listmember()
	{
		$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		
		$config['base_url'] = base_url('member/listmember/page/');
		$config['total_rows'] = $this->member_m->total_data();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['first_url'] = 1;
		$config['num_links'] = 5;
		$config['full_tag_open'] = '<div class="grayr">';
		$config['full_tag_close'] = '</div>';
		$config['first_link'] = '&larr;';
		$config['first_tag_open'] = '<span class="disabled">';
		$config['first_tag_close'] = '</span>';
		$config['last_link'] = '&rarr;';
		$config['last_tag_open'] = '';
		$config['last_tag_close'] = '';
		$config['prev_link'] = 'Sebelumnya';
		$config['prev_tag_open'] = '';
		$config['prev_tag_close'] = '</a>';
		$config['next_link'] = 'Berikutnya';
		$config['next_tag_open'] = '';
		$config['next_tag_close'] = '';
		$config['last_tag_open'] = '';
		$config['last_tag_close'] = '';
		$config['cur_tag_open'] =  '<span class="current">';
		$config['cur_tag_close'] = '</span>';
		$config['num_tag_open'] = '';
		$config['num_tag_close'] = '';
		
		$this->pagination->initialize($config);
		$this->data['paging'] = $this->pagination->create_links();
		$this->data['data'] = $this->member_m->all($config['per_page'], $offset);
		$this->data['number'] = $offset + ($offset - 1) * ($config['per_page'] - 1);
		$this->template->set($this->data);
		$this->template->build('list');
	
	}
	
}

/* End of file member.php */
/* Location: ./application/modules/member/controllers/member.php */