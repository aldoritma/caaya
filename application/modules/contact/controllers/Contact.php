<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends Public_Controller {

    function __construct()
    {
        parent::__construct();
        
        // template
        $this->template->set_layout('default');
        $this->load->model('contact_m');

    }

    function index()
    {
        $this->template->build('main');

    }

     public function savecontact()
    {

        if (is_ajax)
        {
                $this->form_validation->set_rules('name', 'Name', 'trim|xss_clean|required');
                $this->form_validation->set_rules('fname', 'First Name', 'trim|required|ucwords|xss_clean|strip_tags');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|ucwords|xss_clean|addslashes|valid_email|strip_tags');
                $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|ucwords|xss_clean|strip_tags');
                $this->form_validation->set_rules('message', 'Message', 'trim|required|ucwords|xss_clean|addslashes|htmlspecialchars|strip_tags');
                $this->form_validation->set_message('required', 'form %s must be filled');
                $this->form_validation->set_message('valid_email', '%s its Invalid email');
            
    
            if ($this->form_validation->run($this))
            {
                if ($this->contact_m->savecontact($this->input->post(NULL, TRUE)))
                {
                    $this->session->set_flashdata('success', 'Thank you for contacting us');
                    $response = array(
                        'status'=>'success',
                        'message'=>'Thank you for contacting our contact form',
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
                    'name' => form_error('name'),
                    'fname' => form_error('fname'),
                    'email' => form_error('email'),
                    'phone' => form_error('phone'),
                    'message' => form_error('message'),
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
