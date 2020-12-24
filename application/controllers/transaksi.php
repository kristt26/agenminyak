<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->model('Pembelian_model');
        $this->load->model('Pelanggan_model');
        
    }

    public function index()
    {
        $data['content'] = $this->load->view('transaksi/index', '', true);
        $this->load->view('_shared/layout', $data);
    }

    public function get($id = null)
    {
        $result['pembelian'] = $this->Pembelian_model->selectOne();
        $result['transaksi'] = $this->Transaksi_model->select(null);
        $result['pelanggan'] = $this->Pelanggan_model->select(null);
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Transaksi_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Transaksi_model->update($data);
        echo json_encode($result);
    }

    public function delete($id)
    {
        $result = $this->Transaksi_model->delete($id);
        echo json_encode($result);
    }

    public function laporan()
    {
        $data['content'] = $this->load->view('transaksi/laporan', '', true);
        $this->load->view('_shared/layout', $data);
    }

    public function getlaporan()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result['transaksi'] = $this->Transaksi_model->selectLaporan($data);
        $result['pembelian'] = $this->Pembelian_model->selectOne();
        echo json_encode($result);
    }
}

/* End of file Staff.php */
