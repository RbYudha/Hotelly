<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Datakategori_kamar_model extends CI_Model
{

    // untuk menampilkan datakategori_kamar
    public function getdatakategori_kamar()
    {
        $this->db->select('*');
        $this->db->from('kategori_kamar');
        $query = $this->db->get();
        return $query->result_array();
    }

    // untuk insert datakamar
    public function insertkategori_kamar($data)
    {
        return $this->db->insert('kategori_kamar', $data);
    }

    public function datakategori_kamar_edit($id)
    {
        $this->db->select('*');
        $this->db->from('kategori_kamar');
        $this->db->where('id_kategori_kmr', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahkategori_kamar($data, $id)
    {
        $this->db->where('id_kategori_kmr', $id);
        return $this->db->update('kategori_kamar', $data);
    }

    public function hapusdatakategori_kamar($id)
    {
        $this->db->where('id_kategori_kmr', $id);
        return $this->db->delete('kategori_kamar');
    }
}
