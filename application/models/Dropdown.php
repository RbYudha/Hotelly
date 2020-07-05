<?php

class Dropdown extends CI_Model
{

    function tampil_data_kategori()
    {
        $query = $this->db->get('kategori');
        return $query;
    }

    function tampil_data_barang()
    {
        $query = $this->db->get('barang');
        return $query;
    }

    function tampil_data_kamar()
    {
        $this->db->select('*');
        $this->db->from('kamar');
        $this->db->join('kategori_kamar', 'kategori_kamar.id_kategori_kmr=kamar.id_kategori_kmr');
        $query = $this->db->get();
        return $query;

        // $query = $this->db->get('kamar');
        // return $query;
    }

    function tampil_data_role()
    {
        $query = $this->db->get('role');
        return $query;
    }

    function tampil_data_kategori_kamar()
    {
        $query = $this->db->get('kategori_kamar');
        return $query;
    }
}
