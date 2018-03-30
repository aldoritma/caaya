<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Activity extends Public_Controller {

    function __construct()
    {
        parent::__construct();
        // template
        $this->template->set_layout('default');
        $this->load->model('activity_m');

    }

    public function index()
    {
        $this->template->build('main');

    }

    public function saveactivity()
    {

       
        if (is_ajax)
        {

            $this->form_validation->set_rules('name', 'Nama', 'trim|xss_clean|required');
            $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|ucwords|xss_clean|strip_tags');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|ucwords|xss_clean|addslashes|valid_email|strip_tags');
            $this->form_validation->set_rules('address', 'Alamat', 'trim|required|ucwords|xss_clean|addslashes|htmlspecialchars|strip_tags');
            $this->form_validation->set_message('required', 'form %s must be filled');
            $this->form_validation->set_message('valid_email', '%s its Invalid email');
            
            if ($this->form_validation->run($this))
            {
                if ($this->activity_m->saveactivity($this->input->post(NULL, TRUE)))
                {
                    $this->session->set_flashdata('success', 'Thank you, your data have been saved');
                    $response = array(
                        'status'=>'success',
                        'message'=>'Thank you, your data have been saved',
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
                        'errorform' => 'All data must be filled',
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
