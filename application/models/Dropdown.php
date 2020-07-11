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

    function tampil_data_karyawan()
    {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('id_role !=', 1);
        $query = $this->db->get();
        return $query;
    }

    function tampil_data_barang_hbs()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('id_kategori !=', 1);
        $query = $this->db->get();
        return $query;
    }

    function tampil_data_barang_thbs()
    {
        $barang_thbs = array('1', '3', '4');
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where_in('id_kategori', $barang_thbs);
        $query = $this->db->get();
        return $query;
    }

    function barang1()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('id_barang', 1);
        $query = $this->db->get();
        return $query->row();
    }
}
