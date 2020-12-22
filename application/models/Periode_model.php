<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Periode_model extends CI_Model
{
    public function select($id = null)
    {
        if ($id == null) {
            $data = $this->db->get("periode")->result();
            foreach ($data as $key => $value) {
                $value->setstatus = $value->status == 'Aktif' ? true : false;
            }
            return $data;
        } else {
            $data = $this->db->get_where("periode", array('id' => $id))->row_array();
            $data['setstatus'] = $data['status'] == 'Aktif' ? true : false;
            return $data;
        }
    }
    public function selectActive()
    {
        $data = $this->db->get_where("periode", array('status' => 'Aktif'))->row_object();
        return $data;
    }
    public function insert($data)
    {
        $this->db->trans_begin();
        $periode = [
            'periode' => $data['periode'],
            'keterangan' => $data['keterangan'],
            'status' => $data['status'],
        ];
        $this->db->update('periode', ['status' => 'Tidak Aktif'], ['id' => $data['id']]);
        $this->db->insert('periode', $periode);
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
        $periode = [
            'periode' => $data['periode'],
            'keterangan' => $data['keterangan'],
            'status' => $data['status'],
        ];
        $this->db->where('id', $data['id']);
        $this->db->update('periode', $periode);
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
        return $this->db->delete('periode');
    }
}

/* End of file ModelName.php */
