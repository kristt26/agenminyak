<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function select($data)
    {
        $data['password'] = md5($data['password']);
        return $this->db->get_where('user', $data);
    }
    public function insert($data)
    {
        $result = $this->db->insert('kategori', $data);
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
            'kategori' => $data['kategori'],
        ];
        $this->db->where('id', $data['id']);
        $this->db->update('kategori', $item);
        return $item;
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('kategori');
    }

    public function login($data)
    {
        $user = $data['username'];
        $password = md5($data['password']);
        $datauser = $this->db->query("SELECT
            * 
            FROM user WHERE (username = '$user' OR email = '$user') AND password = '$password'")->row_array();
        return $datauser;
    }

}