<?php

class data_tabel extends CI_Model
{
    function tampil_barang()
    {
        // $this->db->order_by('id_barang', 'ASC');
        // return $this->db->from('barang')
        //     ->join('kategori', 'kategori.id_kategori=barang.id_kategori')
        //     ->get()
        //     ->result();

        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori');
        $query = $this->db->get();
        return $query->result();

        // $this->db->select("*");
        // $this->db->from('barang');
        // $this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori');
        // if ($query != '') {
        //     $this->db->like('id_barang', $query);
        //     $this->db->or_like('nama_barang', $query);
        //     $this->db->or_like('harga_barang', $query);
        //     $this->db->or_like('stok', $query);
        //     $this->db->or_like('name_kategori', $query);
        // }
        // $this->db->order_by('id_barang', 'DESC');
        // return $this->db->get();
    }

    function tampil_barang_masuk()
    {
        $this->db->select('*');
        $this->db->from('stokingbarang');
        $this->db->join('barang', 'stokingbarang.id_barang=barang.id_barang');
        $this->db->join('employee', 'stokingbarang.id_employee=employee.id_employee');

        $query = $this->db->get();
        return $query->result();
    }

    function tampil_barang_keluar()
    {
        $this->db->select('*');
        $this->db->from('ambilbarang');
        $this->db->join('barang', 'ambilbarang.id_barang=barang.id_barang');
        $this->db->join('employee', 'ambilbarang.id_employee=employee.id_employee');

        $query = $this->db->get();
        return $query->result();
    }

    function tampil_barang_hilang()
    {
        $this->db->select('*');
        $this->db->from('baranghilang');
        $this->db->join('kamar', 'baranghilang.no_kamar=kamar.no_kamar');
        $this->db->join('barang', 'baranghilang.id_barang=barang.id_barang');
        $this->db->join('employee', 'baranghilang.id_employee=employee.id_employee');

        $query = $this->db->get();
        return $query->result();
    }
}
