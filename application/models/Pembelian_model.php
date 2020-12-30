<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Pelanggan_model');
        
    }
    
    public function select($id = null)
    {
        if ($id == null) {
            return $this->db->query("SELECT
                `stok`.*,
                (SELECT SUM(transaksi.jumlah) from transaksi WHERE transaksi.stokid = stok.id) AS totaltransaksi
            FROM
                `stok`")->result();
        } else {
            return $this->db->query("SELECT
            `stok`.*,
            (SELECT SUM(transaksi.jumlah) from transaksi WHERE transaksi.stokid = stok.id) AS totaltransaksi
          FROM
            `stok` WHERE id = '$id'")->row_object();
        }
    }

    public function selectLaporan($data)
    {
        $awal = $data['awal'];
        $akhir = $data['akhir'];
        return $this->db->query("SELECT
                `stok`.*,
                (SELECT SUM(transaksi.jumlah) from transaksi WHERE transaksi.stokid = stok.id) AS totaltransaksi
            FROM
                `stok` WHERE tanggal >= '$awal' AND tanggal <= '$akhir'")->result();
    }

    public function selectOne($id = null)
    {
        return $this->db->query("SELECT
            `stok`.*,
            (SELECT SUM(transaksi.jumlah) from transaksi WHERE transaksi.stokid = stok.id) AS totaltransaksi
        FROM
            `stok` ORDER BY id DESC LIMIT 1")->row_object();
    }
    
    public function insert($data)
    {
        $db2 = $this->load->database('db2', TRUE);
        $this->db->trans_begin();
        $this->db->insert('stok', $data);
        $data['id'] = $this->db->insert_id();
        if ($this->db->trans_status()) {
            $db2->trans_begin();
            $pelanggan = $this->Pelanggan_model->selectActive();
            foreach ($pelanggan as $key => $itemPelanggan) {
                $pesan = [
                    'TextDecoded'=>"From: ". $this->session->userdata('namaagen')."\nMinyak tanah telah tersedia di Agen Widya, anda dapat melakukan pembelian sekarang \n terima kasih.",
                    'DestinationNumber'=>$itemPelanggan->kontak,
                    'CreatorID'=>$itemPelanggan->id
                ];
                $db2->insert('outbox', $pesan);
            }
            if($db2->trans_status()){
                $db2->trans_commit();
                $this->db->trans_commit();
                return $data;
            }else{
                $this->db->trans_rollback();
                $db2->trans_rollback();
                return false;
            }
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }
    public function update($data)
    {
        $this->db->trans_begin();
        $stok = [
            'tanggal' => $data['tanggal'],
            'stok' => $data['stok'],
            'hargabeli' => $data['hargabeli'],
            'hargajual' => $data['hargajual'],
        ];
        $this->db->update('stok', $stok, ['id'=>$data['id']]);
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
        return $this->db->delete('stok');
    }
}

/* End of file ModelName.php */
