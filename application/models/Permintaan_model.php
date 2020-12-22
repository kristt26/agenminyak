<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        
    }
    
    public function select($id = null)
    {
        if ($id == null) {
            $data = $this->db->get('permintaan')->result();
            foreach ($data as $key => $value) {
                $value->pelanggan = $this->db->get_where('pelanggan', ['id' => $value->pelangganid])->row_array();
                $value->karyawan = $this->db->get_where('karyawan', ['id' => $value->karyawanid])->row_array();
            }
            return $data;
        } else {
            $data = $this->db->get_where('permintaan', ['id' => $id])->row_array();
            $data['pelanggan'] = $this->db->get_where('pelanggan', ['id' => $data['pelangganid']])->row_array();
            $data['karyawan'] = $this->db->get_where('karyawan', ['id' => $data['karyawanid']])->row_array();
            return $data;
        }
    }
    public function insert($data)
    {
        $this->db->trans_begin();
        $itempermintaan = [
            'noregister' => $data['noregister'],
            'tanggal' => $data['tanggal'] = date("Y-m-d H:i:s"),
            'namapemohon' => $data['namapemohon'],
            'status' => $data['status'] = 'Proses',
            'pelangganid' => $data['pelanggan']['id'],
            'jenispengajuan' => $data['jenispengajuan'],
        ];
        $this->db->insert('permintaan', $itempermintaan);
        $data['id'] = $this->db->insert_id();
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return $data;
        } else {
            $this->db->trans_rollback();
            return false;
        }

    }

    public function proses($data)
    {
        $item = [
            'tanggalproses' => $data['tanggalproses'] = date("Y-m-d H:i:s"),
            'karyawanid' => $data['karyawanid'] = $this->session->userdata('id'),
            'status' => 'Success',
        ];
        $this->db->where('id', $data['id']);
        $result = $this->db->update('permintaan', $item);
        if($result){
            $data['karyawan'] = $this->Karyawan_model->select($data['karyawanid']);
            return $data;
        }else{
            return false;
        }
    }

    public function pending($data)
    {
        $item = [
            'tanggalproses' => $data['tanggalproses'] = date("Y-m-d H:i:s"),
            'karyawanid' => $data['karyawanid'] = $this->session->userdata('id'),
            'status' => 'Pending',
            'message' => $data['message'],
        ];
        $this->db->where('id', $data['id']);
        $result = $this->db->update('permintaan', $item);
        if($result){
            $data['karyawan'] = $this->Karyawan_model->select($data['karyawanid']);
            return $data;
        }else{
            return false;
        }
    }
    public function update($data)
    {
        $this->db->trans_begin();
        $itempermintaan = [
            'noregister' => $data['noregister'],
            'tanggal' => $data['tanggal'] = date("Y-m-d H:i:s"),
            'namapemohon' => $data['namapemohon'],
            'status' => 'Proses',
            'pelangganid' => $data['pelanggan']['id'],
            'jenispengajuan' => $data['jenispengajuan'],
        ];
        $this->db->where('id', $data['id']);
        $this->db->update('permintaan', $itempermintaan);
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return $data;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('permintaan');
    }

}

/* End of file Kategori_model.php */
