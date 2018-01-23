<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq extends Authorize_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->data['current_page'] = 'dashboard';	
		$this->load->model(array('faq_m','global_m'));
		$this->template->set_layout('dashboard');
	}

	public function listfaq()
	{

		$this->data['totaldata'] = $this->faq_m->total_data();
        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
        $config['base_url'] = base_url('listfaq/page/');
        $config['total_rows'] = $this->faq_m->total_data();
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
        $this->data['listdata'] = $this->faq_m->allfaq($config['per_page'], $offset);
        $this->data['number'] = $offset + ($offset - 1) * ($config['per_page'] - 1);
        
        $this->template->set($this->data);
        $this->template->build('list');


	}

	function addfaq()
	{
	
		$this->data['listcategory'] = $this->faq_m->listcategory();
		$this->template->build('add', $this->data);
	
	}

	function savefaq()
	{

		if (is_ajax)
		{
			// title
			$this->form_validation->set_rules('title', 'Title','trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			//category content
			$this->form_validation->set_rules('catcontent', 'Category', 'trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			//content
			$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean|addslashes|htmlspecialchars|strip_tags');
			if ($this->form_validation->run($this))
			{
				if ($this->faq_m->createfaq($this->input->post(NULL, TRUE)))
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
					'catcontent' => form_error('catcontent'),
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

	function edit($id = false)
	{
		
		if ( ! $this->data['dataslide'] = $this->faq_m->get_one($id)) show_404();
		$this->data['listcategory'] = $this->faq_m->categoryid($id);
		$this->template->build('edit', $this->data);
	}

	function editdata($id = false)
	{

		if (is_ajax)
		{
			// title
			$this->form_validation->set_rules('title', 'Title','trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			//category content
			$this->form_validation->set_rules('catcontent', 'Category', 'trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			//content
			$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean|addslashes|htmlspecialchars|strip_tags');
			if ($this->form_validation->run($this))
			{
				if ($this->faq_m->update($id,$this->input->post(NULL, TRUE)))
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
					'catcontent' => form_error('catcontent'),
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


	function delete($id = false){

		if (is_ajax)
		{
			if ($this->faq_m->delfaq($id))
			{

				$this->session->set_flashdata('success', 'Data has been Delete.');

					$response = array(
						'status'=>'success',
						'message'=>'Data has been delete.',
					);

				$response = array('status'=>'success', 'message'=>'Data has been deleted.');
				
			}
			else
			{
				
				$response = array('status'=>'success', 'message'=>'Data failed deleted.');
			}
			
			echo json_encode($response);
		}
	}

	function category()
	{

	$this->data['listcat'] = $this->faq_m->allcat();
	$this->template->build('listcat', $this->data);
	
	}

	function delcat($id = false)
	{
		if (is_ajax)
		{

			$this->data['content'] = $this->faq_m->get_onecat($id);
			
			if ($this->faq_m->delcategory($id))
			{

				$this->session->set_flashdata('success', 'Category has been Delete.');

					$response = array(
						'status'=>'success',
						'message'=>'Category has been delete.',
					);

				$response = array('status'=>'success', 'message'=>'Category has been deleted.');
				
			}
			else
			{
				
				$response = array('status'=>'success', 'message'=>'Category failed deleted.');
			}
			
			echo json_encode($response);
		}


	}

	function editSavecat($idcat = false)
	{
		if (is_ajax)
		{
			$this->form_validation->set_rules('catname', 'Category','trim|required|xss_clean');
			if ($this->form_validation->run($this))
			{
				if ($this->faq_m->updateCategory($idcat, $this->input->post(NULL, TRUE)))
				{

					$this->session->set_flashdata('success_update', 'Category has been Update.');
					$response = array(
						'status'=>'success',
						'message'=>'Category has been Update.',
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
					'catname' => form_error('catname'),
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

	
	function editcat($id = false)
	{
		if ( ! $this->data['dataslide'] = $this->faq_m->get_onecat($id)) show_404();
		$this->template->build('editCategory', $this->data);
	}

	function addcategory()
	{

		$this->template->build('addCategory', $this->data);
	}

	function savecategory()
	{

		if (is_ajax)
		{
			$this->form_validation->set_rules('catname', 'Category','trim|required|xss_clean');
			if ($this->form_validation->run($this))
			{
				if ($this->faq_m->savecategory($this->input->post(NULL, TRUE)))
				{

					$this->session->set_flashdata('success', 'Category has been added.');
					$response = array(
						'status'=>'success',
						'message'=>'Category has been added.',
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
					'catname' => form_error('catname'),
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

/* End of file faq.php */
/* Location: ./application/modules/faq/controllers/faq.php */