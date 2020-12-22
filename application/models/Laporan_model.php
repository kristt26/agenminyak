<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    public function ambilLaporan($data)
    {
        $awal = $data['awal'];
        $akhir = $data['akhir'];
        $result = $this->db->query("SELECT
            `permintaan`.`noregister`,
            `permintaan`.`tanggal`,
            `permintaan`.`namapemohon`,
            `permintaan`.`status`,
            `permintaan`.`pelangganid`,
            `permintaan`.`tanggalproses`,
            `permintaan`.`karyawanid`,
            `permintaan`.`jenispengajuan`,
            `permintaan`.`message`,
            `pelanggan`.`kodepelanggan`,
            `karyawan`.`nama`
        FROM
            `permintaan`
            LEFT JOIN `pelanggan` ON `permintaan`.`pelangganid` = `pelanggan`.`id`
            LEFT JOIN `karyawan` ON `permintaan`.`karyawanid` = `karyawan`.`id` WHERE permintaan.tanggal > '$awal' AND permintaan.tanggal < '$akhir'")->result();
        return $result;
    }    

}

/* End of file Laporan_model.php */
