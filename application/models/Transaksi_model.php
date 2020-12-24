<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    public function select($id = null)
    {
        if ($id == null) {
            return $this->db->query("SELECT
                `transaksi`.*,
                `pelanggan`.`nama`
            FROM
                `transaksi`
                LEFT JOIN `pelanggan` ON `pelanggan`.`id` = `transaksi`.`pelangganid` ORDER BY id DESC")->result();
        } else {
            return $this->db-query("SELECT
                `transaksi`.*,
                `pelanggan`.`nama`
            FROM
                `transaksi`
                LEFT JOIN `pelanggan` ON `pelanggan`.`id` = `transaksi`.`pelangganid` WHERE id = '$id'")->row_array();
        }
    }

    public function selectLaporan($data)
    {
        $awal = $data['awal'];
        $akhir = $data['akhir'];
        return $this->db->query("SELECT
                `transaksi`.*,
                `pelanggan`.`nama`
            FROM
                `transaksi`
                LEFT JOIN `pelanggan` ON `pelanggan`.`id` = `transaksi`.`pelangganid` WHERE tanggal >= '$awal' AND tanggal <= '$akhir'")->result();
    }


    public function insert($data)
    {
        $item = [
            'pelangganid' => $data['pelanggan']['id'],
            'stokid' => $data['stokid'],
            'tanggal' => $data['tanggal'],
            'jumlah' => $data['jumlah'],
        ];
        $result = $this->db->insert('transaksi', $item);
        $data['id'] = $this->db->insert_id();
        $item['nama'] = $data['pelanggan']['nama'];
        if ($result) {
            return $item;
        } else {
            return false;
        }

    }
    public function update($data)
    {
        $item = [
            'jumlah' => $data['jumlah']
        ];
        $this->db->where('id', $data['id']);
        $this->db->update('transaksi', $item);
        return $item;
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('transaksi');
    }

}

/* End of file transaksi_model.php */
