<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Periode_model');
    }
    
    public function select($periodeid)
    {
        if ($id == null) {
            $data = $this->db->get("penilaian")->result();
            return $data;
        } else {
            $data = $this->db->get_where("penilaian", array('id'=>$id))->row_array();
            return $data;
        }
    }
    public function selectByKaryawan($periodeid)
    {
        $karyawan = $this->db->get_where('karyawan', ['status'=>'Aktif'])->result();
        foreach ($karyawan as $key => $value) {
            $kriteria = $this->db->get('kriteria')->result();
            foreach ($kriteria as $keykriteria => $itemkriteria) {
                $itemkriteria->penilaian = $this->db->query("SELECT
                    `penilaian`.`id`,
                    `penilaian`.`nilai`,
                    `penilaian`.`karyawanid`,
                    `penilaian`.`periodeid`,
                    `penilaian`.`subkriteriaid`,
                    `subkriteria`.`subkriteria`,
                    `subkriteria`.`indikator`,
                    `subkriteria`.`kriteriaid`
                FROM
                    `penilaian`
                    LEFT JOIN `subkriteria` ON `subkriteria`.`id` = `penilaian`.`subkriteriaid` WHERE subkriteria.kriteriaid = '$itemkriteria->id' AND penilaian.periodeid = '$periodeid' AND karyawanid='$value->id'")->row_object();
                $itemkriteria->subkriteria = $this->db->get_where('subkriteria', ['kriteriaid'=>$itemkriteria->id])->result();
                // $itemkriteria->nilai = ['id'=>$itemkriteria->penilaian->subkriteriaid, 'subkriteria'=>$itemkriteria->penilaian->subkriteria, 'nilai'=>$itemkriteria->penilaian->nilai, 'indikator'=>$itemkriteria->penilaian->indikator, 'kriteriaid'=>$itemkriteria->penilaian->kriteriaid];
            }
            $value->kriteria = $kriteria;
        }
        return $karyawan;
    }
    public function selectLaporan($periodeid)
    {
        $karyawan = $this->db->query("SELECT
            `karyawan`.*,
            (SELECT COUNT(penilaian.id) FROM penilaian, periode WHERE penilaian.karyawanid=karyawan.id AND penilaian.periodeid='$periodeid') AS sum
        FROM
            `karyawan`")->result();
        // $karyawan = $this->db->get_where('karyawan', ['status'=>'Aktif'])->result();
        
        foreach ($karyawan as $key => $value) {
            $kriteria = $this->db->get('kriteria')->result();
            foreach ($kriteria as $keykriteria => $itemkriteria) {
                $itemkriteria->penilaian = $this->db->query("SELECT
                    `penilaian`.`id`,
                    `penilaian`.`nilai`,
                    `penilaian`.`karyawanid`,
                    `penilaian`.`periodeid`,
                    `penilaian`.`subkriteriaid`,
                    `subkriteria`.`subkriteria`,
                    `subkriteria`.`indikator`,
                    `subkriteria`.`kriteriaid`
                FROM
                    `penilaian`
                    LEFT JOIN `subkriteria` ON `subkriteria`.`id` = `penilaian`.`subkriteriaid` WHERE subkriteria.kriteriaid = '$itemkriteria->id' AND penilaian.periodeid = '$periodeid' AND karyawanid='$value->id'")->row_object();
                $itemkriteria->subkriteria = $this->db->get_where('subkriteria', ['kriteriaid'=>$itemkriteria->id])->result();
                // $itemkriteria->nilai = ['id'=>$itemkriteria->penilaian->subkriteriaid, 'subkriteria'=>$itemkriteria->penilaian->subkriteria, 'nilai'=>$itemkriteria->penilaian->nilai, 'indikator'=>$itemkriteria->penilaian->indikator, 'kriteriaid'=>$itemkriteria->penilaian->kriteriaid];
            }
            $value->kriteria = $kriteria;
        }
        foreach ($karyawan as $key => $object) {
            if ($object->sum == '0') {
               unset($karyawan[$key]);
            }
         }
        return $karyawan;
    }
    public function insert($data)
    {
        $this->db->trans_begin();
        $periode = $this->Periode_model->selectActive();
        foreach ($data as $key => $value) {
            foreach ($value['kriteria'] as $key => $kriteria) {
                $penilaian = [
                    'nilai' => $kriteria['nilai']['nilai'],
                    'karyawanid' => $value['id'],
                    'periodeid' => $periode->id,
                    'subkriteriaid' => $kriteria['nilai']['id'],
                ];
                if(is_null($kriteria['penilaian'])){
                    $this->db->insert('penilaian', $penilaian);
                    $penilaian['id'] = $this->db->insert_id();
                    $penilaian['subkriteria'] = $kriteria['nilai']['subkriteria'];
                    $penilaian['indikator'] = $kriteria['nilai']['indikator'];
                    $penilaian['kriteriaid'] = $kriteria['nilai']['kriteriaid'];
                    $kriteria['penilaian'] = $penilaian;
                }else{
                    $this->db->update('penilaian', $penilaian, ['id'=>$kriteria['penilaian']['id']]);
                    $penilaian['subkriteria'] = $kriteria['nilai']['subkriteria'];
                    $penilaian['indikator'] = $kriteria['nilai']['indikator'];
                    $penilaian['kriteriaid'] = $kriteria['nilai']['kriteriaid'];
                    $kriteria['penilaian'] = $penilaian;
                }
            }
        }
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
        $penilaian = [
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'jabatan' => $data['jabatan'],
        ];
        $this->db->where('id', $data['id']);
        $this->db->update('penilaian', $penilaian);
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
        return $this->db->delete('penilaian');
    }
}

/* End of file ModelName.php */
