<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function select()
    {
        $result = $this->db->query("SELECT
        (SELECT COUNT(permintaan.id)) AS totalpelanggan,
        (SELECT COUNT(permintaan.id) FROM permintaan) AS totalpermintaan,
        (SELECT COUNT(permintaan.id) FROM permintaan WHERE status='Proses') AS proses,
        (SELECT COUNT(permintaan.id) FROM permintaan WHERE status='Success') AS success
    FROM
        `permintaan`")->row_array();
        return $result;
    }
}

/* End of file Home_model.php */
