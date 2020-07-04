<?php

class Dynamic_chart_model extends CI_Model
{
    // function fetch_total_barang()
    // {
    //     $this->db->select('*');
    //     $this->db->from('barang');
    //     $this->db->group_by('barang.id_kategori');
    //     $this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori');
    //     $this->db->order_by('barang.id_kategori', 'ASC');
    //     return $this->db->get();
    // }

    // function fetch_chart_idkategori($id_kategori)
    // {
    //     $this->db->where('id_kategori', $id_kategori);
    //     $this->db->order_by('id_kategori', 'ASC');
    //     return $this->db->get('barang');
    // }

    function fetch_barang_masuk1()
    {
        $this->db->select('*');
        $this->db->from('stokingbarang');
        $this->db->where('id_barang', '111');
        $this->db->order_by('date_stoking', 'ASC');
        return $this->db->get();
    }
}
