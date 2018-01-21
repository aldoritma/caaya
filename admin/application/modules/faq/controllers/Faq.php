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



	function addproduct()
	{
	
		$this->data['listcategory'] = $this->faq_m->listcategory();
		$this->template->build('add', $this->data);
	
	}

	function saveproduct()
	{

		if (is_ajax)
		{
			$this->load->library('image_moo');
			// title
			$this->form_validation->set_rules('title', 'Title','trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			// price
			$this->form_validation->set_rules('price', 'Price','trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			// stock
			$this->form_validation->set_rules('stock', 'Stock','trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			//category content
			$this->form_validation->set_rules('catcontent', 'Category', 'trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			//content
			$this->form_validation->set_rules('description', 'Indonesian Description', 'trim|required|xss_clean|addslashes|htmlspecialchars|strip_tags');
			
			$this->form_validation->set_rules('userfile', 'Image','trim|xss_clean');

			$config['upload_path']		= "../assets/product/";
			$config['allowed_types']	= 'gif|jpg|png|jpeg|x-png';
			$config['max_size']     	= '10249';
			$config['max_width']  		= '6000';
			$config['min_width']		= '500';
			$config['min_height']		= '325';
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
						$source             = "../assets/product/" . $data['file_name'];
						$new_destination	= "../assets/product/";

						$this->load->library('image_lib');

						 /* 1 size */
						 $configSize1['image_library']   = 'gd2';
						 $configSize1['source_image']    = $source;
						 $configSize1['create_thumb']    = FALSE;
						 $configSize1['maintain_ratio']  = TRUE;
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
						 $configSize2['maintain_ratio']  = TRUE;
						 $configSize2['width']           = 250;
						 $configSize2['height']          = 136;
						 $configSize2['remove_spaces']   = TRUE;
						 $configSize2['encrypt_name']  	 = TRUE;
						 $configSize2['new_image']   = '500x325_'.$data['file_name'];

						 $this->image_lib->initialize($configSize2);
						 $this->image_lib->resize();
						 $this->image_lib->clear();

						// /* Delete original file to save space */
						unlink($source);
						
						/* Insert data Content with image into table */
						if ($this->faq_m->create($this->input->post(NULL, TRUE), $data['file_name']))
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
								'price' => form_error('price'),
								'stock' => form_error('stock'),
								'catcontent' => form_error('catcontent'),
								'userfile' => form_error('userfile'),
								'description' => form_error('description'),
								'userfile' => $this->upload->display_errors(),
							)
						);
					}
				}
				else
				{
					
					if ($this->faq_m->create($this->input->post(NULL, TRUE)))
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
								'price' => form_error('price'),
								'stock' => form_error('stock'),
								'catcontent' => form_error('catcontent'),
								'userfile' => form_error('userfile'),
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

	function editproduct($id = false)
	{
		
		if ( ! $this->data['dataslide'] = $this->faq_m->get_one($id)) show_404();
		$this->data['listcategory'] = $this->faq_m->categoryid($id);
		$this->template->build('edit', $this->data);
	}

	function editdata($id = false)
	{
		if (is_ajax)
		{
			$this->data['image'] = $this->faq_m->get_image($id);
			// title
			$this->form_validation->set_rules('title', 'Title','trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			// price
			$this->form_validation->set_rules('price', 'Price','trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			// stock
			$this->form_validation->set_rules('stock', 'Stock','trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			//category content
			$this->form_validation->set_rules('catcontent', 'Category', 'trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			//content
			$this->form_validation->set_rules('description', 'Indonesian Description', 'trim|required|xss_clean|addslashes|htmlspecialchars|strip_tags');
			
			$this->form_validation->set_rules('userfile', 'Image','trim|xss_clean');


			// config upload images
			$config['upload_path']		= "../assets/product/";
			$config['allowed_types']	= 'gif|jpg|png|jpeg|x-png';
			$config['max_size']     	= '10249';
			$config['max_width']  		= '6000';
			$config['max_height']  		= '6000';
			$config['min_width']		= '500';
			$config['min_height']		= '325';
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

							@unlink("../assets/product/original_".$this->data['image']['img']);
							@unlink("../assets/product/500x325_".$this->data['image']['img']);
						}
						else
						{
							$image = $this->data['image']['img'];
						}
						
						/* PATH */
						$source             = "../assets/product/" . $data['file_name'];
						$new_destination	= "../assets/product/";
						
						$this->load->library('image_lib');

						 /* 1 size */
						 $configSize1['image_library']   = 'gd2';
						 $configSize1['source_image']    = $source;
						 $configSize1['create_thumb']    = FALSE;
						 $configSize1['maintain_ratio']  = TRUE;
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
						 $configSize2['maintain_ratio']  = TRUE;
						 $configSize2['width']           = 250;
						 $configSize2['height']          = 136;
						 $configSize2['remove_spaces']   = TRUE;
						 $configSize2['encrypt_name']  	 = TRUE;
						 $configSize2['new_image']   = '500x325_'.$data['file_name'];

						 $this->image_lib->initialize($configSize2);
						 $this->image_lib->resize();
						 $this->image_lib->clear();

						 

						/* Delete original file to save space */
						unlink($source);
						
						/* Update data news with image into table */
						if ($this->faq_m->update($id, $this->input->post(NULL, TRUE), $data['file_name']))
						{
							
							$this->session->set_flashdata('update_success', 'Data has been update successful.');
							$response = array(
								'status'=>'success',
								'message'=> 'Data has been updated successful.', 
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
								'price' => form_error('price'),
								'stock' => form_error('stock'),
								'catcontent' => form_error('catcontent'),
								'userfile' => form_error('userfile'),
								'description' => form_error('description'),
								'userfile' => $this->upload->display_errors(),
							)
						);
					}
				}
				else
				{
					/* Update data news without image into table */
					if ($this->faq_m->update($id, $this->input->post(NULL, TRUE), $this->data['image']['img']))
					{

							if (isset($_POST['tagnews']))
							{
								$this->faq_m->inserttag($this->input->post(), $id);
							}

						$old_ori = "../assets/news/original_". $this->data['image']['img'] ."";
						$old_500 = "../assets/news/500x325_". $this->data['image']['img'] ."";
							
						$new_ori = "../assets/news/original_".$this->data['image']['img'] ."";
						$new_500 = "../assets/news/500x325_".$this->data['image']['img'] ."";
						
						
						@rename($old_ori, $new_ori);
						@rename($old_500, $new_500);
						
						$this->session->set_flashdata('update_success', 'Data has been update successful.');
						
						$response = array(
							'status'=>'success',
							'message'=> 'Data has been updated successful.', 
							'image' => $this->data['image']['img'],
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
								'price' => form_error('price'),
								'stock' => form_error('stock'),
								'catcontent' => form_error('catcontent'),
								'userfile' => form_error('userfile'),
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
			$this->data['content'] = $this->faq_m->get_one($id);
			if ($this->faq_m->delnewsevent($id))
			{

				@unlink("../assets/news/original_".$this->data['content']['img']);
				@unlink("../assets/news/500x325_".$this->data['content']['img']);

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

	function listcategory()
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

				$activity = "Delete Category";
				$message = "Delete Category id ".$id;
				$this->faq_m->createlog($activity,$message);
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
			$this->form_validation->set_rules('catname', 'Indonesian Category','trim|required|xss_clean');
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
			$this->form_validation->set_rules('catname', 'Indonesian Category','trim|required|xss_clean');
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

/* End of file newsevent.php */
/* Location: ./application/modules/newsevent/controllers/newsevent.php */