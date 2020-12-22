<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{
    public function select($id = null)
    {
        if ($id == null) {
            $data = $this->db->get("kriteria")->result();
            foreach ($data as $key => $value) {
                $value->subkriteria = $this->db->get_where('subkriteria', ['kriteriaid'=>$value->id])->result();
            }
            return $data;
        } else {
            $data = $this->db->get_where("kriteria", array('id'=>$id))->row_object();
            $data->subkriteria = $this->db->get_where('subkriteria', ['kriteriaid'=>$id])->result();
            return $data;
        }
    }
    public function insert($data)
    {
        $this->db->trans_begin();
        $kriteria = [
            'kriteria' => $data['kriteria'],
            'kategori' => $data['kategori'],
            'bobot' => $data['bobot'],
        ];
        $this->db->insert('kriteria', $kriteria);
        $data['id'] = $this->db->insert_id();
        $data['subkriteria'] = [];
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return $data;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }
    public function insertsub($data)
    {
        $this->db->trans_begin();
        $subkriteria = [
            'subkriteria' => $data['subkriteria'],
            'nilai' => $data['nilai'],
            'indikator' => $data['indikator'],
            'kriteriaid' => $data['kriteriaid'],
        ];
        $this->db->insert('subkriteria', $subkriteria);
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
        $kriteria = [
            'kriteria' => $data['kriteria'],
            'kategori' => $data['kategori'],
            'bobot' => $data['bobot'],
        ];
        $this->db->where('id', $data['id']);
        $this->db->update('kriteria', $kriteria);
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return $data;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }
    public function updatesub($data)
    {
        $this->db->trans_begin();
        $kriteria = [
            'subkriteria' => $data['subkriteria'],
            'nilai' => $data['nilai'],
            'indikator' => $data['indikator'],
        ];
        $this->db->where('id', $data['id']);
        $this->db->update('subkriteria', $kriteria);
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
        return $this->db->delete('kriteria');
    }
}

/* End of file ModelName.php */
