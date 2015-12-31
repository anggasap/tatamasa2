<?php

if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Sec_koneksiM extends CI_Model
{

    public function cekRowTabelPi_kontrolhariproses()
    {
        $this->db->from('pi_kontrolhariproses');
        $query = $this->db->get();
        $rowcount = $query->num_rows();

        return $rowcount;
    }
    public function insertRowPi_kontrolhariproses($data){
        $query = $this->db->insert('pi_kontrolhariproses', $data);
        if ($query){
            return true;
        }else{
            return false;
        }
    }
    public function cekRowTabelPi_institusi(){
        $this->db->from('pi_institusi');
        $query = $this->db->get();
        $rowcount = $query->num_rows();

        return $rowcount;
    }
    public function insertRowPi_institusi($data){
        $query = $this->db->insert('pi_institusi', $data);
        if ($query){
            return true;
        }else{
            return false;
        }
    }
    public function getNamaInstitusiSN(){
        $this->db->select('NamaInstitusi,SerialNumber');
        $this->db->from('pi_institusi');
        $query = $this->db->get();
        return $query->result ();
    }
}

/* End of file sec_koneksi_user_m.php */
/* Location: ./application/models/sec_koneksi_user.php */