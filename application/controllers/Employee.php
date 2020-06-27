<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
    public function index()
    {
        //kirimm data ke view
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();
        //echo 'haallllloooooooo ' . $data['employee']['name_employee'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/employee', $data);
        $this->load->view('templates/footer');
    }

    public function stok_barang()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        //$data1['kategori'] = $this->db->get_where('kategori', ['id_kategori'])->row_array();
        $data1['datakategori'] = $this->Dropdown->tampil_data_kategori();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('probis/stok_barang', $data1);
    }

    public function stok_barang1()
    {
        $post1 = [
            'id_barang' => $this->input->post('idbarang'),
            'id_kategori' => $this->input->post('kategori'),
            'nama_barang' => $this->input->post('namabarang'),
            'harga_barang' => $this->input->post('hargabarang'),
            'stok_total' => $this->input->post('stokbarang'),
        ];
        $this->db->insert('barang', $post1);

        $post2 = [
            'id_barang' => $this->input->post('idbarang'),
            'stok_barang' => $this->input->post('stokbarang'),
            'id_employee' => $this->input->post('idemployee'),
            'date_stoking' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('stokingbarang', $post2);

        redirect('employee');
    }

    public function tambah_barang()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $data1['databarang'] = $this->Dropdown->tampil_data_barang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('probis/tambah_barang', $data1);
    }

    public function tambah_barang1()
    {
        $post1 = [
            'id_barang' => $this->input->post('barang'),
            'stok_barang' => $this->input->post('stokbarang'),
            'id_employee' => $this->input->post('idemployee'),
            'date_stoking' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('stokingbarang', $post1);
        redirect('employee');
    }


    public function ambil_barang()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $data1['databarang'] = $this->Dropdown->tampil_data_barang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('probis/ambil_barang', $data1);
    }

    public function ambil_barang1()
    {
        $post1 = [
            'id_barang' => $this->input->post('barang'),
            'jumlah_ambil' => $this->input->post('stokbarang'),
            'id_employee' => $this->input->post('idemployee'),
            'date_ambil' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('ambilbarang', $post1);
        redirect('employee');
    }

    public function lapor_barang()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('probis/lapor_barang', $data);
    }
}
