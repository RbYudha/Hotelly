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
}
