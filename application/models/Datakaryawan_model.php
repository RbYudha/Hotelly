<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Datakaryawan_model extends CI_Model
{
    public function getdatakaryawan()
    {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->join('role', 'employee.id_role=role.id_role');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertkaryawan($data)
    {
        return $this->db->insert('employee', $data);
    }

    public function datakaryawan_edit($id)
    {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('id_employee', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahkaryawan($data, $id)
    {
        $this->db->where('id_employee', $id);
        return $this->db->update('employee', $data);
    }

    public function hapusdatakaryawan($id)
    {
        $this->db->where('id_employee', $id);
        return $this->db->delete('employee');
    }
}
