<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Datakamar_model extends CI_Model
{

    // untuk menampilkan datakamar
    public function getdatakamar()
    {
        $this->db->select('*');
        $this->db->from('kamar');
        $this->db->join('kategori_kamar', 'kategori_kamar.id_kategori_kmr=kamar.id_kategori_kmr');
        $query = $this->db->get();
        return $query->result_array();
    }

    // untuk insert datakamar
    public function insertkamar($data)
    {
        return $this->db->insert('kamar', $data);
    }

    public function datakamar_edit($id)
    {
        $this->db->select('*');
        $this->db->from('kamar');
        $this->db->where('no_kamar', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahkamar($data, $id)
    {
        $this->db->where('no_kamar', $id);
        return $this->db->update('kamar', $data);
    }

    public function hapusdatakamar($id)
    {
        $this->db->where('no_kamar', $id);
        return $this->db->delete('kamar');
    }
}
