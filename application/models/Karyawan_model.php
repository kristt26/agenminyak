<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
    public function select($id = null)
    {
        if ($id == null) {
            $data = $this->db->get("karyawan")->result();
            return $data;
        } else {
            $data = $this->db->get_where("karyawan", array('id'=>$id))->row_array();
            return $data;
        }
    }

    public function selectByStatus()
    {
        $data = $this->db->get_where("karyawan", array('status' => 'Aktif'))->result();
        return $data;
    }

    public function insert($data)
    {
        $this->db->trans_begin();
        $karyawan = [
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'jabatan' => $data['jabatan'],
            'status' => $data['status'],
        ];
        $this->db->insert('karyawan', $karyawan);
        $data['id'] = $this->db->insert_id();
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return $data;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }
    public function update($data)
    {
        $this->db->trans_begin();
        $karyawan = [
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'jabatan' => $data['jabatan'],
            'status' => $data['status'],
        ];
        $this->db->where('id', $data['id']);
        $this->db->update('karyawan', $karyawan);
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
        return $this->db->delete('karyawan');
    }
}

/* End of file ModelName.php */
