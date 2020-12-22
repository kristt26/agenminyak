<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{

    public function select($id = null)
    {
        if ($id == null) {
            return $this->db->get('pelanggan')->result();
        } else {
            return $this->db->get_where('pelanggan', ['id' => $id])->row_array();
        }
    }
    public function insert($data)
    {
        $result = $this->db->insert('pelanggan', $data);
        $data['id'] = $this->db->insert_id();
        if ($result) {
            return $data;
        } else {
            return false;
        }

    }
    public function update($data)
    {
        $item = [
            'kodepelanggan' => $data['kodepelanggan'],
            'nama' => $data['nama'],
            'kontak' => $data['kontak'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
        ];
        $this->db->where('id', $data['id']);
        $this->db->update('pelanggan', $item);
        return $item;
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('pelanggan');
    }

}

/* End of file pelanggan_model.php */
