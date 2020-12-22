<?php

defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $data = $this->input->post();
        $result = $this->User_model->login($data);
        if (!is_null($result)) {
            $result['is_login'] = true;
            $this->session->set_userdata($result);
            redirect('home');
        }else{
            $this->session->set_flashdata('pesan', 'Username tidak ditemukan!!!');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

}

/* End of file auth.php */
