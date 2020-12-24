<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembelian_model');
    }
    
    public function select()
    {
        $result['totalpelanggan'] = $this->db->query("SELECT COUNT(id) as totalpelanggan FROM pelanggan")->row_object();
        $result['totalpenjualan'] = 0;
        $result['totalpembelian'] = 0;
        $result['totalbeli'] = 0;
        $result['totaljual'] = 0;
        $result['stokakhir'] = 0;
        $pembelian = $this->Pembelian_model->select(null);
        foreach ($pembelian as $key => $value) {
            $result['totalpenjualan'] += ($value->hargajual * $value->totaltransaksi);
            $result['totalpembelian'] += ($value->stok * $value->hargabeli);
            $result['stokakhir'] += $value->stok - $value->totaltransaksi;
            $result['totalbeli'] += $value->stok;
            $result['totaljual'] += $value->totaltransaksi;
        }
        return $result;
    }
}

/* End of file Home_model.php */
