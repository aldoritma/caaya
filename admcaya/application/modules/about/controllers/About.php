<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends Authorize_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->data['current_page'] = 'dashboard';	
		$this->load->model(array('about_m','global_m'));
		$this->template->set_layout('dashboard');
	}

	public function index()
	{

		$this->data['totaldata'] = $this->about_m->total_data();
        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
        $config['base_url'] = base_url('about/index/page/');
        $config['total_rows'] = $this->about_m->total_data();
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
        $this->data['listdata'] = $this->about_m->allabout($config['per_page'], $offset);
        $this->data['number'] = $offset + ($offset - 1) * ($config['per_page'] - 1);
        $this->template->set($this->data);
        $this->template->build('list');


	}

	function addabout()
	{
	
		$this->template->build('add', $this->data);
	
	}

	function saveabout()
	{

		if (is_ajax)
		{
			// title
			$this->form_validation->set_rules('button', 'Button','trim|required|addslashes|htmlentities|htmlspecialchars|strip_tags');
			// title
			$this->form_validation->set_rules('title', 'Title','trim|required|addslashes|htmlentities|htmlspecialchars|strip_tags');
			//description
			$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean|addslashes|htmlspecialchars|strip_tags');
			
			$this->form_validation->set_rules('userfile', 'Image','trim|xss_clean');

			$config['upload_path']		= "../assets/about/";
			$config['allowed_types']	= 'gif|jpg|png|jpeg|x-png';
			$config['max_size']     	= '10249';
			$config['max_width']  		= '6000';
			$config['min_width']		= '417';
			$config['min_height']		= '417';
			$config['max_height']  		= '6000';
			$config['remove_spaces']  	= TRUE;
			$config['encrypt_name']  	= TRUE;
			
			$this->load->library('upload', $config);
			
			if ($this->form_validation->run($this))
			{
				if (isset($_FILES['userfile']))
				{
					if ($this->upload->do_upload('userfile')) 
					{
						$data = $this->upload->data();
						
						/* PATH */
						$source             = "../assets/about/" . $data['file_name'];
						$new_destination	= "../assets/about/";

						$this->load->library('image_lib');

						 /* 1 size */
						 $configSize1['image_library']   = 'gd2';
						 $configSize1['source_image']    = $source;
						 $configSize1['create_thumb']    = FALSE;
						 $configSize1['remove_spaces']   = TRUE;
						 $configSize1['encrypt_name']  	 = TRUE;
						 $configSize1['new_image']   = 'original_'.$data['file_name'];

						 $this->image_lib->initialize($configSize1);
						 $this->image_lib->resize();
						 $this->image_lib->clear();


						 /* 2 size */
						 $configSize2['image_library']   = 'gd2';
						 $configSize2['source_image']    = $source;
						 $configSize2['create_thumb']    = FALSE;
						 $configSize2['width']           = 417;
						 $configSize2['height']          = 417;
						 $configSize2['remove_spaces']   = TRUE;
						 $configSize2['encrypt_name']  	 = TRUE;
						 $configSize2['new_image']   = '417x417_'.$data['file_name'];

						 $this->image_lib->initialize($configSize2);
						 $this->image_lib->resize();
						 $this->image_lib->clear();

						// /* Delete original file to save space */
						unlink($source);
						
						/* Insert data Content with image into table */
						if ($this->about_m->create($this->input->post(NULL, TRUE), $data['file_name']))
						{
							
							$this->session->set_flashdata('success', 'Data been added successful.');
							$response = array(
								'status'=>'success',
								'message'=> 'Content has been created successful.', 
								'image' => $data['file_name'],
							);
						}
						else
						{
							$response = array(
								'status' => 'error',
								'message' => 'Something went wrong when inserting data into database',
							);
						}
					}
					else
					{
						$response = array(
							'status' => 'error',
							'message'=> array(
								'title' => form_error('title'),
								'description' => form_error('description'),
								'userfile' => $this->upload->display_errors(),
							)
						);
					}
				}
				else
				{
					
					if ($this->about_m->create($this->input->post(NULL, TRUE)))
					{	
						// Flash message
						$this->session->set_flashdata('success', 'Data has been added successful.');
						
						$response = array(
							'status'=>'success',
							'message'=> 'Data has been created successful.', 
							'image' => '',
						);
					}
					else
					{
						$response = array(
							'status' => 'error',
							'message' => 'Something went wrong when inserting data into database',
						);
					}
				}
			}
			else
			{
				$response = array(
					'status' => 'error',
					'message'=> array(
								'title' => form_error('title'),
								'button' => form_error('button'),
								'description' => form_error('description'),
								'userfile' => $this->upload->display_errors(),

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
		
		if ( ! $this->data['dataslide'] = $this->about_m->get_one($id)) show_404();
		$this->template->build('edit', $this->data);
	}

	function editdata($id = false)
	{

		if (is_ajax)
		{
			$this->data['image'] = $this->about_m->get_image($id);

			// title
			$this->form_validation->set_rules('button', 'Button','trim|required|addslashes|htmlentities|htmlspecialchars|strip_tags');

			// title
			$this->form_validation->set_rules('title', 'Title','trim|required');
			//description
			$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean|addslashes|htmlspecialchars|strip_tags');
			
			$this->form_validation->set_rules('userfile', 'Image','trim|xss_clean');

			$config['upload_path']		= "../assets/about/";
			$config['allowed_types']	= 'gif|jpg|png|jpeg|x-png';
			$config['max_size']     	= '10249';
			$config['max_width']  		= '6000';
			$config['min_width']		= '417';
			$config['min_height']		= '417';
			$config['max_height']  		= '6000';
			$config['remove_spaces']  	= TRUE;
			$config['encrypt_name']  	= TRUE;
			
			$this->load->library('upload', $config);
			
			if ($this->form_validation->run($this))
			{
				if (isset($_FILES['userfile']))
				{
					if ($this->upload->do_upload('userfile')) 
					{
						$data = $this->upload->data();
						
						// Klo image diganti, hapus image sebelumnya biar hemat space
						if ($data['file_name'])
						{
							$image = $data['file_name'];

							@unlink("../assets/about/original_".$this->data['image']['img']);
							@unlink("../assets/about/417x417_".$this->data['image']['img']);
						}
						else
						{
							$image = $this->data['image']['img'];
						}
						
						/* PATH */
						$source             = "../assets/about/" . $data['file_name'];
						$new_destination	= "../assets/about/";

						$this->load->library('image_lib');

						 /* 1 size */
						 $configSize1['image_library']   = 'gd2';
						 $configSize1['source_image']    = $source;
						 $configSize1['create_thumb']    = FALSE;
						 $configSize1['remove_spaces']   = TRUE;
						 $configSize1['encrypt_name']  	 = TRUE;
						 $configSize1['new_image']   = 'original_'.$data['file_name'];

						 $this->image_lib->initialize($configSize1);
						 $this->image_lib->resize();
						 $this->image_lib->clear();


						 /* 2 size */
						 $configSize2['image_library']   = 'gd2';
						 $configSize2['source_image']    = $source;
						 $configSize2['create_thumb']    = FALSE;
						 $configSize2['width']           = 417;
						 $configSize2['height']          = 417;
						 $configSize2['remove_spaces']   = TRUE;
						 $configSize2['encrypt_name']  	 = TRUE;
						 $configSize2['new_image']   = '417x417_'.$data['file_name'];

						 $this->image_lib->initialize($configSize2);
						 $this->image_lib->resize();
						 $this->image_lib->clear();

						// /* Delete original file to save space */
						unlink($source);
						
						/* Insert data Content with image into table */
						if ($this->about_m->update($id,$this->input->post(NULL, TRUE), $data['file_name']))
						{
							
							$this->session->set_flashdata('update_success', 'Data been added successful.');
							$response = array(
								'status'=>'success',
								'message'=> 'Content has been created successful.', 
								'image' => $data['file_name'],
							);
						}
						else
						{
							$response = array(
								'status' => 'error',
								'message' => 'Something went wrong when inserting data into database',
							);
						}
					}
					else
					{
						$response = array(
							'status' => 'error',
							'message'=> array(
								'title' => form_error('title'),
								'button' => form_error('button'),
								'description' => form_error('description'),
								'userfile' => $this->upload->display_errors(),
							)
						);
					}
				}
				else
				{
					
					if ($this->about_m->update($id,$this->input->post(NULL, TRUE),$this->data['image']['img']))
					{	

						// Flash message
						$this->session->set_flashdata('update_success', 'Data has been added successful.');
						
						$response = array(
							'status'=>'success',
							'message'=> 'Data has been created successful.', 
							'image' => '',
						);
					}
					else
					{
						$response = array(
							'status' => 'error',
							'message' => 'Something went wrong when inserting data into database',
						);
					}
				}
			}
			else
			{
				$response = array(
					'status' => 'error',
					'message'=> array(
								'title' => form_error('title'),
								'button' => form_error('button'),
								'description' => form_error('description'),
								'userfile' => $this->upload->display_errors(),

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
			$this->data['content'] = $this->about_m->get_one($id);
			if ($this->about_m->delabout($id))
			{

				@unlink("../assets/about/original_".$this->data['content']['img']);
				@unlink("../assets/about/417x417_".$this->data['content']['img']);
				$this->about_m->delslideall($this->data['content']['id']);
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

	public function slidedata($id = false)
	{
		if ( ! $this->data['dataslide'] = $this->about_m->get_aboutid($id)) show_404();
		$this->data['totaldata'] = $this->about_m->total_dataslide($id);
        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
        $config['base_url'] = base_url('slidedata/page/');
        $config['total_rows'] = $this->about_m->total_data();
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
        $this->data['slidedata'] = $this->about_m->allslide($id,$config['per_page'], $offset);
        $this->data['number'] = $offset + ($offset - 1) * ($config['per_page'] - 1);
        
        $this->template->set($this->data);
        $this->template->build('slidedata');


	}


	function delslide($id = false)
	{
		if (is_ajax)
		{

			if ($this->about_m->delslide($id))
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

	function editSaveslide($idcat = false)
	{
		if (is_ajax)
		{
			$this->form_validation->set_rules('description', 'Description','trim|required|xss_clean');
			if ($this->form_validation->run($this))
			{
				if ($this->about_m->updateSlide($idcat, $this->input->post(NULL, TRUE)))
				{

					$this->session->set_flashdata('success_update', 'Data has been Update.');
					$response = array(
						'status'=>'success',
						'message'=>'Data has been Update.',
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

	
	function editslide($id = false)
	{
		if ( ! $this->data['dataslide'] = $this->about_m->get_slideid($id)) show_404();
		$this->template->build('editslide', $this->data);
	}

	function addslide($id = false)
	{
		if ( ! $this->data['dataslide'] = $this->about_m->get_aboutid($id)) show_404();
		$this->template->build('addslide', $this->data);
	}

	function saveslide($id = false)
	{

		if (is_ajax)
		{
			if ( ! $this->data['dataslide'] = $this->about_m->get_aboutid($id)) show_404();
			$this->form_validation->set_rules('description', 'Description','trim|required|xss_clean');
			if ($this->form_validation->run($this))
			{
				if ($this->about_m->saveslide($id,$this->input->post(NULL, TRUE)))
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

/* End of file about.php */
/* Location: ./application/modules/about/controllers/about.php */