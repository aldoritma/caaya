<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editor_image_handler extends Admin_Controller {
	private $accepted_origin;

	public function __construct()
	{
		parent::__construct();
		$this->load->config('accepted_origin');
		$this->accepted_origin = $this->config->item('accepted_origin');

		if(isset($_SERVER['HTTP_ORIGIN'])){
			if(in_array($_SERVER['HTTP_ORIGIN'], $this->accepted_origin)){
				header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
			} else {
				header("HTTP/1.0 403 Origin Denied");
		        return;
			}
		}
	}

	public function upload_news_image_content()
	{
		$this->form_validation->set_rules('userfile', 'file','trim');

		if ($this->form_validation->run() == FALSE) {
			$response = array(
				'status' => 'error',
				'message'=> array(
					'userfile' => form_error('userfile'),
				)
			);
		} else {
			$this->load->library('upload');

			$config['upload_path']		= "../assets/news/";
			$config['allowed_types']	= 'gif|jpg|png|jpeg|x-png';
			$config['max_size']     	= '10249';
			$config['max_width']  		= '6000';
			$config['max_height']  		= '6000';
			$config['remove_spaces']  	= TRUE;
			$config['encrypt_name']  	= TRUE;
			
			$this->upload->initialize($config);
			
		 	if (isset($_FILES['userfile']))
			{
				if ($this->upload->do_upload('userfile')) 
				{
					$data = $this->upload->data();
					
					$response = array(
						'status' => 'success',
					);

					if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '13.229.78.30'){
						$response['link'] = 'http://'.$_SERVER['HTTP_HOST'].'/asiangames2018/assets/news/'.$data['raw_name'].$data['file_ext'];
						$response['location'] = 'http://'.$_SERVER['HTTP_HOST'].'/asiangames2018/assets/news/'.$data['raw_name'].$data['file_ext'];
					} else {
						$response['link'] = 'https://'.$_SERVER['HTTP_HOST'].'/assets/news/'.$data['raw_name'].$data['file_ext'];
						$response['location'] = 'https://'.$_SERVER['HTTP_HOST'].'/assets/news/'.$data['raw_name'].$data['file_ext'];
					}
				}
				else
				{
					$response = array(
						'status' => 'error',
						'message'=> array(
							'title' => form_error('title'),										
							'userfile' => $this->upload->display_errors(),
						)
					);
				}
			} else if (isset($_FILES['file'])) {
				if ($this->upload->do_upload('file')) 
				{
					$data = $this->upload->data();
					
					$response = array(
						'status' => 'success',
					);

					if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '13.229.78.30'){
						$response['link'] = 'http://'.$_SERVER['HTTP_HOST'].'/asiangames2018/assets/news/'.$data['raw_name'].$data['file_ext'];
						$response['location'] = 'http://'.$_SERVER['HTTP_HOST'].'/asiangames2018/assets/news/'.$data['raw_name'].$data['file_ext'];
					} else {
						$response['link'] = 'https://'.$_SERVER['HTTP_HOST'].'/assets/news/'.$data['raw_name'].$data['file_ext'];
						$response['location'] = 'https://'.$_SERVER['HTTP_HOST'].'/assets/news/'.$data['raw_name'].$data['file_ext'];
					}
				}
				else
				{
					$response = array(
						'status' => 'error',
						'message'=> array(
							'title' => form_error('title'),										
							'userfile' => $this->upload->display_errors(),
						)
					);
				}
			}
			else
			{
				$response = array(
					'status' => 'error',
					'message'=> array(
						'userfile' => 'Images can not be empty.',
					)
				);	
			}
			
		}
		

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function get_list_image()
	{
		$image_list = array();

		$handle = opendir(realpath('../assets/news/'));
        while($file = readdir($handle)){
            if($file !== '.' && $file !== '..' && $file !== 'index.html' && $file !== 'index.php' ){
            	// echo $file."<br>";

                $image_list[]['url'] = ($_SERVER['HTTP_HOST'] == 'localhost') ? base_url('../assets/news/'.$file) : $_SERVER['HTTP_HOST'].'/assets/news/'.$file;
            }
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($image_list));
	}
}

/* End of file editor_image_handler.php */
/* Location: ./application/controllers/editor_image_handler.php */