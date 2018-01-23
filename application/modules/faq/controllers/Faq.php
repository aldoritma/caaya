<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faq extends Public_Controller {

    function __construct()
    {
        parent::__construct();
        $this->template->set_layout('default');
        $this->load->model('faq_m');

    }


    function index()
    {
        $this->data['listfaq'] = $this->faq_m->listfaq(); 

        $this->data['listfaqdata'] = $this->faq_m->listfaq(); 
        if ($this->data['listfaqdata'])
        {
            foreach ($this->data['listfaqdata'] as $key => $val)
            {
                $this->data['listfaqdata'][$key]['catid'] = $this->faq_m->listfaqdetail($val['id']);
            }
        }

        $this->template->build('main', $this->data);

    }

}
