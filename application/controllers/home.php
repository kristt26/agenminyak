<?php

defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->model('Periode_model');
    }
    
    public function index()
    {
        $content['content'] = $this->load->view('home/index', '', true);
        $this->load->view('_shared/layout', $content);
    }
    public function get()
    {
        $result['periode'] = $this->Periode_model->selectActive();
        $result['karyawan'] = $this->Karyawan_model->selectByStatus();
        echo json_encode($result);
    }
}

/* End of file home.php */
