<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faq extends Public_Controller {

    function __construct()
    {
        parent::__construct();
        // template
        $this->template->set_layout('default');

    }

    function index()
    {
        $this->template->build('main');

    }

}
