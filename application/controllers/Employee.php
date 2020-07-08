<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('data_tabel');
    }

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

    public function tambah_barang()
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
            'stok' => $this->input->post('stokbarang'),
        ];
        $this->db->insert('barang', $post1);

        $transaksi1 = $this->input->post('stokbarang');
        $transaksi2 = $this->input->post('hargabarang');
        $transaksi = $transaksi1 * $transaksi2;

        $post2 = [
            'id_barang' => $this->input->post('idbarang'),
            'stok_barang' => $this->input->post('stokbarang'),
            'id_employee' => $this->input->post('idemployee'),
            'harga_pcs' => $this->input->post('hargabarang'),
            'transaksi' => $transaksi,
            'date_stoking' => $this->input->post('datepicker')
            //'date_stoking' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('stokingbarang', $post2);
        $this->session->set_flashdata('messageSuc', '<div class="alert alert-success" role="alert">
        Barang berhasil ditambahkan!</div>');
        redirect('employee');
    }

    public function stoking_barang()
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
        $transaksi1 = $this->input->post('stokbarang');
        $transaksi2 = $this->input->post('hargabarang');
        $transaksi = $transaksi1 * $transaksi2;

        $post1 = [
            'id_barang' => $this->input->post('barang'),
            'stok_barang' => $this->input->post('stokbarang'),
            'id_employee' => $this->input->post('idemployee'),
            'harga_pcs' => $this->input->post('hargabarang'),
            'transaksi' => $transaksi,
            'date_stoking' => $this->input->post('datepicker')
        ];
        $this->db->insert('stokingbarang', $post1);
        $this->session->set_flashdata('messageSuc', '<div class="alert alert-success" role="alert">
        Re-stok barang berhasil!</div>');
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
            //'date_ambil' => date('Y-m-d H:i:s')
            'date_ambil' => $this->input->post('datepicker')
        ];
        $this->db->insert('ambilbarang', $post1);
        $this->session->set_flashdata('messageSuc', '<div class="alert alert-success" role="alert">
        Pengambilan Barang berhasil!</div>');
        redirect('employee');
    }

    public function lapor_barang()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $data1['databarang'] = $this->Dropdown->tampil_data_barang();

        $data1['datakamar'] = $this->Dropdown->tampil_data_kamar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('probis/lapor_barang', $data1);
    }

    public function lapor_barang1()
    {
        $post1 = [
            'id_employee' => $this->input->post('idemployee'),
            'id_barang' => $this->input->post('barang'),
            'no_kamar' => $this->input->post('kamar'),
            'jumlah_hilang' => $this->input->post('jumlah_hilang'),
            //'date_hilang' => date('Y-m-d H:i:s')
            'date_hilang' => $this->input->post('datepicker')
        ];
        $this->db->insert('baranghilang', $post1);
        $this->session->set_flashdata('messageSuc', '<div class="alert alert-success" role="alert">
        Barang hilang berhasil dilaporkan!</div>');
        redirect('employee');
    }

    public function lihat_tabel_barang()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $data1['hasil'] = $this->data_tabel->tampil_barang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('probis/tabel_barang', $data1);
    }
}
