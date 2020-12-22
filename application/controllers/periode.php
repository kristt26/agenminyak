<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Periode extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Periode_model');

    }

    public function index()
    {
        $data['content'] = $this->load->view('periode/index', '', true);
        $this->load->view('_shared/layout', $data);
    }

    public function get($id = null)
    {
        $result = $this->Periode_model->select($id);
        echo json_encode($result);
    }

    public function getactive()
    {
        $result = $this->Periode_model->selectActive();
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Periode_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Periode_model->update($data);
        echo json_encode($result);
    }

    public function delete($id)
    {
        $result = $this->Periode_model->delete($id);
        echo json_encode($result);
    }
}

/* End of file Staff.php */
