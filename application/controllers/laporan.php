<?php

defined('BASEPATH') or exit('No direct script access allowed');

class laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');

    }

    public function index()
    {
        $data['content'] = $this->load->view('laporan/index', '', true);
        $this->load->view('_shared/layout', $data);
    }

    public function get($id = null)
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Laporan_model->ambilLaporan($data);
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Laporan_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Laporan_model->update($data);
        echo json_encode($result);
    }

    public function delete($id)
    {
        $result = $this->Laporan_model->delete($id);
        echo json_encode($result);
    }
}

/* End of file Staff.php */
