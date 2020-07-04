<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Databarang_model extends CI_Model
{

    // untuk menampilkan datamabarang
    public function getdatabarang()
    {
        // $this->db->select('*');
        // $this->db->from('mahasiswa');
        // $query = $this->db->get();
        // return $query->result_array();

        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori');
        $query = $this->db->get();
        return $query->result_array();
    }

    // untuk insert databarang
    public function insertbarang($data)
    {
        return $this->db->insert('barang', $data);
    }

    public function databarangedit($id)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('id_barang', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahbarang($data, $id)
    {
        $this->db->where('id_barang', $id);
        return $this->db->update('barang', $data);
    }

    public function hapusdatabarang($id)
    {
        $this->db->where('id_barang', $id);
        return $this->db->delete('barang');
    }
}
