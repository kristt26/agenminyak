<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembelian_model');

    }

    public function index()
    {
        $data['content'] = $this->load->view('pembelian/index', '', true);
        $this->load->view('_shared/layout', $data);
    }

    public function get($id = null)
    {
        $result = $this->Pembelian_model->select($id);
        echo json_encode($result);
    }

    public function getactive()
    {
        $result = $this->Pembelian_model->selectActive();
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Pembelian_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Pembelian_model->update($data);
        echo json_encode($result);
    }

    public function delete($id)
    {
        $result = $this->Pembelian_model->delete($id);
        echo json_encode($result);
    }

    public function laporan()
    {
        $data['content'] = $this->load->view('pembelian/laporan', '', true);
        $this->load->view('_shared/layout', $data);
    }

    public function getlaporan()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Pembelian_model->selectLaporan($data);
        echo json_encode($result);
    }
}

/* End of file Staff.php */
