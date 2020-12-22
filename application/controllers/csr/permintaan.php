<?php

defined('BASEPATH') or exit('No direct script access allowed');

class permintaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Permintaan_model');

    }

    public function index()
    {
        $data['content'] = $this->load->view('permintaan/index', '', true);
        $this->load->view('_shared/layout', $data);
    }

    public function get($id = null)
    {
        $result = $this->Permintaan_model->select($id);
        echo json_encode($result);
    }

    public function content($id = null)
    {
        $data['content'] = $this->load->view('permintaan/addupdate', '', true);
        $this->load->view('_shared/layout', $data);
    }


    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Permintaan_model->insert($data);
        echo json_encode($result);
    }

    public function proses()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Permintaan_model->proses($data);
        echo json_encode($result);
    }

    public function pending()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Permintaan_model->pending($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Permintaan_model->update($data);
        echo json_encode($result);
    }

    public function delete($id)
    {
        $result = $this->Permintaan_model->delete($id);
        echo json_encode($result);
    }
}

/* End of file Staff.php */
