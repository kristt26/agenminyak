<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penilaian_model');
        $this->load->model('Periode_model');
    }

    public function index()
    {
        $data['content'] = $this->load->view('penilaian/index', '', true);
        $this->load->view('_shared/layout', $data);
    }

    public function get($id = null)
    {
        $periode = $this->Periode_model->selectActive();
        if($periode != null){
            $result = $this->Penilaian_model->selectByKaryawan($periode->id);
            echo json_encode($result);
        }else{
            echo json_encode(null);
        }
    }

    public function getbyperiode($id = null)
    {
        $result = $this->Penilaian_model->selectLaporan($id);
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Penilaian_model->insert($data);
        echo json_encode($result);
    }

    public function addsub()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Penilaian_model->insertsub($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Penilaian_model->update($data);
        echo json_encode($result);
    }

    public function delete($id)
    {
        $result = $this->Penilaian_model->delete($id);
        echo json_encode($result);
    }
}

/* End of file Staff.php */
