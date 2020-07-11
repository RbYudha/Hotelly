<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dataorderstok_model extends CI_Model
{

    // untuk menampilkan datamaorder
    public function getdataorder()
    {
        // $this->db->select('*');
        // $this->db->from('mahasiswa');
        // $query = $this->db->get();
        // return $query->result_array();

        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('employee', 'employee.id_employee=order.id_employee');
        $this->db->join('barang', 'barang.id_barang=order.id_barang');
        $query = $this->db->get();
        return $query->result_array();
    }

    // untuk insert dataorder
    public function insertorder($data)
    {
        return $this->db->insert('order', $data);
    }

    public function dataorder_edit($id)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('employee', 'employee.id_employee=order.id_employee');
        $this->db->join('barang', 'barang.id_barang=order.id_barang');
        $this->db->where('id_order', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahorder($data, $id)
    {
        $this->db->where('id_order', $id);
        return $this->db->update('order', $data);
    }

    public function hapusdataorder($id)
    {
        $this->db->where('id_order', $id);
        return $this->db->delete('order');
    }
}
