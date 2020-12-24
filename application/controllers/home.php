<?php

defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        
    }
    
    public function index()
    {
        $result = $this->Home_model->select();
        $content['content'] = $this->load->view('home/index', $result, true);
        $this->load->view('_shared/layout', $content);
    }
    public function get()
    {
        echo json_encode($result);
    }
}

/* End of file home.php */
