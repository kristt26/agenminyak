<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model');
    }
    
    public function select($id = null)
    {
        $db2 = $this->load->database('db2', TRUE);
        $outbox = $db2->get('outbox')->result();
        $sentitems = $db2->get('sentitems')->result();
        $pesan =[];
        $pelanggan = $this->Pelanggan_model->select(null);
        foreach ($pelanggan as $key => $itemPelanggan) {
            foreach ($outbox as $key => $valueOutbox) {
                if($itemPelanggan->id == $valueOutbox->CreatorID){
                    $itemPesan  = [
                        "pelanggan"=> $itemPelanggan->nama,
                        "kontak"=> $valueOutbox->DestinationNumber,
                        "pesan"=> $valueOutbox->TextDecoded,
                        "tanggalkirim"=> $valueOutbox->SendingDateTime,
                        "status" => "Tidak terkirim"
                    ];
                    array_push($pesan, $itemPesan);
                }
            }
            foreach ($sentitems as $key => $valueSentItem) {
                if($itemPelanggan->id == $valueSentItem->CreatorID){
                    $itemPesan  = [
                        "pelanggan"=> $itemPelanggan->nama,
                        "kontak"=> $valueSentItem->DestinationNumber,
                        "pesan"=> $valueSentItem->TextDecoded,
                        "tanggalkirim"=> $valueSentItem->SendingDateTime,
                        "status" => "Terkirim"
                    ];
                    array_push($pesan, $itemPesan);
                }
            }
        }
        return $pesan;
    }

    public function selectActive()
    {
        return $this->db->get_where('pelanggan', ['status' => 'Aktif'])->result();
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
            'nama' => $data['nama'],
            'kontak' => $data['kontak'],
            'alamat' => $data['alamat'],
            'status' => $data['status'],
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
