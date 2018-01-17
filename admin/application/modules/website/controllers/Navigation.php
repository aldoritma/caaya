<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Navigation extends Authorize_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		$this->data['current_page'] = 'website';
		
		$this->load->model('website_m');
		$this->load->library('pagination');
	}
	
	function back_end()
	{
		$uri_menu_type = $this->uri->segment(3);
		
		$this->make_bread->add('Menu List', '#', 0, 1);
		
		$this->data['breadcrumb'] = $this->make_bread->output();

		// $this->breadcrumb->append_crumb('<i class="iconfa-home"></i> ', base_url('dashboard'));
		// $this->breadcrumb->append_crumb('Website ', '#');
		// $this->breadcrumb->append_crumb('Navigation ', '#');
		// $this->breadcrumb->append_crumb('Back End', '#');
		// $this->data['breadcrumb'] = $this->breadcrumb->output();
		
		$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		
		$config['base_url'] = base_url().'website/navigation/front-end/page/';
		$config['total_rows'] = $this->website_m->total_menu($uri_menu_type);
		$config['per_page'] = 100;
		$config['uri_segment'] = 3;
		$config['first_url'] = 1;
		$config['num_links'] = 5;
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = '&larr;';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '&rarr;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] =  '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		$this->data['paging'] = $this->pagination->create_links();
		$this->data['navigation'] = $this->website_m->get_menu($uri_menu_type, $config['per_page'], $offset);
		
		if ($this->data['navigation'])
		{
			foreach ($this->data['navigation'] as $key => $val)
			{
				$this->data['navigation'][$key]['parent'] = $this->website_m->get_parent($uri_menu_type, $val['parent_id']);
			}
		}
		
		$this->data['page_title'] = array(
			'span'=>'iconfa-link',
			'tag_line_small'=>'Website navigation',
			'tag_line_bold' =>'Navigation',
		);
		
		$this->template->set_layout('dashboard');
		$this->template->append_metadata('<script src="'. base_url(). 'website/asset/website.js"></script>');
		$this->template->build('navigation_backend', $this->data);
	}
	
	function front_end()
	{
		$uri_menu_type = $this->uri->segment(3);
		
		$this->breadcrumb->append_crumb('<i class="iconfa-home"></i> ', base_url('dashboard'));
		$this->breadcrumb->append_crumb('Website ', '#');
		$this->breadcrumb->append_crumb('Navigation ', '#');
		$this->breadcrumb->append_crumb('Front End', '#');
		$this->data['breadcrumb'] = $this->breadcrumb->output();
		
		$offset = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
		
		$config['base_url'] = base_url().'website/navigation/front-end/page/';
		$config['total_rows'] = $this->website_m->total_menu($uri_menu_type);
		$config['per_page'] = 100;
		$config['uri_segment'] = 5;
		$config['first_url'] = 1;
		$config['num_links'] = 5;
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = '&larr;';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '&rarr;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] =  '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		$this->data['paging'] = $this->pagination->create_links();
		$this->data['navigation'] = $this->website_m->get_menu($uri_menu_type, $config['per_page'], $offset);
		
		if ($this->data['navigation'])
		{
			foreach ($this->data['navigation'] as $key => $val)
			{
				$this->data['navigation'][$key]['parent'] = $this->website_m->get_parent($uri_menu_type, $val['parent_id']);
			}
		}
		$this->data['sort_number'] = $offset + ($offset - 1) * ($config['per_page'] - 1);
		
		$this->data['page_title'] = array(
			'span'=>'iconfa-link',
			'tag_line_small'=>'Website navigation',
			'tag_line_bold' =>'Navigation',
		);
		
		$this->template->set_layout('dashboard');
		$this->template->append_metadata('<script src="'. base_url(). 'website/asset/website.js"></script>');
		$this->template->build('navigation_frontend', $this->data);
	}
	
	function add()
	{
		if (is_ajax)
		{
			$this->data['app_menu'] = $this->uri->segment(3);
			$this->data['type_menu_title'] = ucwords(str_replace("-", " ", $this->data['app_menu']));
			$this->data['modal_header'] = 'Add '.$this->data['type_menu_title'].' Navigation';
			$this->data['parent'] = $this->website_m->navigation_option($this->data['app_menu']);
			$this->data['category'] = $this->website_m->get_category();
			$this->data['magazine'] = $this->website_m->get_magazine();
			
			
			$this->load->view('navigation_create', $this->data);
		}
		else
		{
			show_error('No direct script access allowed');
		}
	}
	
	function create()
	{
		if (is_ajax)
		{
			// parent id
			$this->form_validation->set_rules('parent_id', 'Parent','trim|required|xss_clean');
			// title
			$this->form_validation->set_rules('title', 'Title','trim|required|ucwords|xss_clean');
			// url
			$this->form_validation->set_rules('url', 'Url','trim|xss_clean');
			
			// type menu
			$this->form_validation->set_rules('app_menu', '','trim|xss_clean');
			
			if ($this->form_validation->run($this))
			{
				if ($this->website_m->navigation_create($this->input->post(NULL, TRUE)))
				{
					$response = array(
						'status'=>'success',
						'message'=>'New menu has been added.',
					);
				}
				else
				{
					$response = array(
						'status'=>'error',
						'message'=>'There is something went wrong while inserting new menu.',
					);
				}
			}
			else
			{
				$response = array(
					'status'=>'error',
					'message'=> array(
						'parent_id' => form_error('parent_id'),
						'title' => form_error('title'),
						'url' => form_error('url'),
					)	
				);
			}
			
			echo json_encode($response);
		}
		else
		{
			show_error('No direct script access allowed');
		}
	}
	
	function edit($navi_id = '')
	{
		if (is_ajax)
		{
			if ( ! $this->data['navigation'] = $this->website_m->get_one_navigation($navi_id)) show_404();
			
			$this->data['app_menu'] = $this->uri->segment(3);
			$this->data['type_menu_title'] = ucwords(str_replace("-", " ", $this->data['app_menu']));
			$this->data['modal_header'] = 'Edit '.$this->data['type_menu_title'].' Navigation';
			$this->data['parent'] = $this->website_m->navigation_option($this->data['app_menu']);
			$this->data['category'] = $this->website_m->get_category();
			$this->data['magazine'] = $this->website_m->get_magazine();
			$this->data['explode_url'] = explode("/", $this->data['navigation']['url']);
			
			$this->load->view('navigation_edit', $this->data);
		}
		else
		{
			show_error('No direct script access allowed');
		}
	}
	
	function update($navi_id = false)
	{
		if (is_ajax)
		{
			// parent id
			$this->form_validation->set_rules('parent_id', 'Parent','trim|required|xss_clean');
			// title
			$this->form_validation->set_rules('title', 'Title','trim|required|ucwords|xss_clean');
			// url
			$this->form_validation->set_rules('url', 'Url','trim|xss_clean');
			// icon
			$this->form_validation->set_rules('icon', 'Icon','trim|xss_clean');
			// type menu
			$this->form_validation->set_rules('app_menu', '','trim|xss_clean');
			
			if ($this->form_validation->run($this))
			{
				if ($this->website_m->navigation_update($navi_id, $this->input->post(NULL, TRUE)))
				{
					$response = array(
						'status'=>'success',
						'message'=>'Menu has been updated.',
					);
				}
				else
				{
					$response = array(
						'status'=>'error',
						'message'=>'There is something went wrong while updating menu.',
					);
				}
			}
			else
			{
				$response = array(
					'status'=>'error',
					'message'=> array(
						'title' => form_error('title'),
						'parent_id' => form_error('parent_id'),
						'category_id' => form_error('category_id'),
						'magazine' => form_error('magazine')
					)	
				);
			}
			
			echo json_encode($response);
		}
		else
		{
			show_error('No direct script access allowed');
		}
	}
	
	function get_slug_parent()
	{
		$category = $this->website_m->get_slug_parent($this->input->post('parent_id', TRUE));
		
		if ($category)
		{
			echo json_encode($category);
		}
		else
		{
			echo json_encode('');
		}
	}
	
}

/* End of file user.php */
/* Location: ./application/modules/controllers/user.php */