<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class About extends Public_Controller {

    function __construct()
    {
        parent::__construct();
        // template
        $this->template->set_layout('default');
        $this->load->model('about_m');

    }

    function index()
    {
        $this->data['listabout'] = $this->about_m->about(); 
        if ($this->data['listabout'])
        {
            foreach ($this->data['listabout'] as $key => $val)
            {
                $this->data['listabout'][$key]['id'] = $this->about_m->listslider($val['id']);
            }
        }

        $this->template->build('main', $this->data);

    }


}
