<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Datakategori_model extends CI_Model
{
    public function getdatakategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertkategori($data)
    {
        return $this->db->insert('kategori', $data);
    }

    public function datakategori_edit($id)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahkategori($data, $id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->update('kategori', $data);
    }

    public function hapusdatakategori($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->delete('kategori');
    }
}
