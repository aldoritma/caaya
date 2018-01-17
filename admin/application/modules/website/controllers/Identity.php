<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Identity extends Authorize_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model(array('website_m', 'global_m'));
		$this->data['current_page'] = 'website';
	}
	
	function index()
	{
		$this->make_bread->add('<i class="iconfa-home"></i>', base_url('dashboard'));
		$this->make_bread->add('Website', '#', 0, 1);
		$this->data['breadcrumb'] = $this->make_bread->output();
		
		$this->data['identity'] = $this->website_m->get_identity();
		
		$this->data['page_title'] = array(
			'span'=>'iconfa-info-sign',
			'tag_line_small'=>'Website data such as website name, title, meta description, meta keyword, etc...',
			'tag_line_bold' =>'Identity',
		);
		
		$this->template->set_layout('dashboard');
		$this->template->append_metadata('<script src="'. base_url(). 'website/asset/website.js"></script>');
		$this->template->build('identity', $this->data);
	}
	
	function update()
	{
		if (is_ajax)
		{
			// website name
			$this->form_validation->set_rules('website_name', 'Website Name','trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			// url
			$this->form_validation->set_rules('url', 'Url','trim|required|xss_clean');
			// facebook
			$this->form_validation->set_rules('facebook', 'Facebook','trim|xss_clean');
			// meta description
			$this->form_validation->set_rules('meta_description', 'Meta Description','trim|required|xss_clean|addslashes|htmlentities|htmlspecialchars|strip_tags');
			// meta keyword
			$this->form_validation->set_rules('meta_keyword', 'Meta Keyword','trim|required|xss_clean');
			// email
			$this->form_validation->set_rules('email', 'Email','trim|required|xss_clean|valid_email');
			// telephone
			$this->form_validation->set_rules('telephone', 'Telephone','trim|required|xss_clean|numeric');
			// bank account
			$this->form_validation->set_rules('bank_account', 'Bank Account','trim|xss_clean|numeric');
			
			$config['upload_path']		= "../img/";
			$config['allowed_types']	= 'gif|jpg|png|jpeg|x-png|ico';
			$config['max_size']     	= '4096';
			$config['max_width']  		= '32';
			$config['max_height']  		= '32';
			$config['remove_spaces']  	= TRUE;
			$config['encrypt_name']  	= TRUE;
			
			$this->load->library('upload', $config);
			
			if ($this->form_validation->run($this))
			{
				if (isset($_FILES['userfile']))
				{
					// Update / create website identity with favicon
					if ($this->upload->do_upload('userfile')) 
					{
						$upload_data = $this->upload->data();
							
						if ($this->website_m->update_with_favicon($this->input->post(NULL, TRUE), $upload_data['file_name']))
						{
							$response = array(
								'status' => 'success',
								'message' => 'Website idenity has been update',
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
								'website_name' => form_error('website_name'),
								'url' => form_error('url'),
								'meta_description' => form_error('meta_description'),
								'meta_keyword' => form_error('meta_keyword'),
								'email' => form_error('email'),
								'bank_account' => form_error('bank_account'),
								'telephone' => form_error('telephone'),
								'userfile' => $this->upload->display_errors(),
							)
						);
					}
				}
				else
				{
					// Update / create website identity without favicon
					if ($this->website_m->update_without_favicon($this->input->post(NULL, TRUE)))
					{
						$response = array(
							'status' => 'success',
							'message' => 'Website idenity has been update',
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
					'status'=>'error',
					'message'=> array(
						'website_name' => form_error('website_name'),
						'url' => form_error('url'),
						'meta_description' => form_error('meta_description'),
						'meta_keyword' => form_error('meta_keyword'),
						'email' => form_error('email'),
						'bank_account' => form_error('bank_account'),
						'telephone' => form_error('telephone'),
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

/* End of file user.php */
/* Location: ./application/modules/controllers/user.php */