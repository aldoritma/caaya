<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Authorize_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->data['current_page'] = 'dashboard';	
		$this->load->model(array('home_m','global_m'));
		$this->template->set_layout('dashboard');
	}

	public function index()
	{

		$this->data['totaldata'] = $this->home_m->total_data();
        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
        $config['base_url'] = base_url('listfaq/page/');
        $config['total_rows'] = $this->home_m->total_data();
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
        $this->data['listdata'] = $this->home_m->alllist($config['per_page'], $offset);
        $this->data['number'] = $offset + ($offset - 1) * ($config['per_page'] - 1);
        $this->template->set($this->data);
        $this->template->build('list');


	}

	function edit($id = false)
	{
		
		if ( ! $this->data['dataslide'] = $this->home_m->get_one($id)) show_404();
		$this->template->build('edit', $this->data);
	}

	function editdata($id = false)
	{

		if (is_ajax)
		{
			// title
			$this->form_validation->set_rules('title', 'Title','trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			// sub title
			$this->form_validation->set_rules('subtitle', 'Sub Title','trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			// sub title
			$this->form_validation->set_rules('subtitle2', 'Sub Title 2','trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			//content
			$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean|addslashes|htmlspecialchars|strip_tags');
			if ($this->form_validation->run($this))
			{
				if ($this->home_m->update($id,$this->input->post(NULL, TRUE)))
				{

					$this->session->set_flashdata('success', 'Data has been added.');
					$response = array(
						'status'=>'success',
						'message'=>'Data has been added.',
					);
			
				}
				else
				{
					$response = array(
						'status'=>'error',
						'message'=>'There is something went wrong.',
					);
				}
			}
			else
			{
				$response = array(
					'status'=>'error',
					'message'=> array(
					'title' => form_error('title'),
					'subtitle' => form_error('subtitle'),
					'subtitle2' => form_error('subtitle2'),
					'description' => form_error('description'),
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


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/home.php */