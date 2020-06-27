<?php
class Ajaxsearch_model extends CI_Model
//contoh
{
    function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori=barang.id_kategori');
        if ($query != '') {
            $this->db->like('id_barang', $query);
            $this->db->or_like('nama_barang', $query);
            $this->db->or_like('harga_barang', $query);
            $this->db->or_like('stok', $query);
            $this->db->or_like('nama_kategori', $query);
        }
        $this->db->order_by('id_barang', 'DESC');
        return $this->db->get();
    }
}
