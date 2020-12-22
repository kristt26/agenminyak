<?php

defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{

    public function index()
    {
        $content['content'] = $this->load->view('home/index', '', true);
        $this->load->view('_shared/layout', $content);
    }

}

/* End of file home.php */
