<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends Public_Controller {

    function __construct()
    {
        parent::__construct();
        
        // template
        $this->template->set_layout('default');
        $this->load->model('welcome_m');

    }

    function index()
    {

        $this->data['homeone'] = $this->welcome_m->homeone(); 
        $this->data['hometwo'] = $this->welcome_m->hometwo(); 
        $this->data['homethree'] = $this->welcome_m->homethree(); 
        $this->template->build('main', $this->data);

    }

}
