<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('data_tabel');
    }

    public function index()
    {
        //kirimm data ke view
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('user/manajer', $data);
        $this->load->view('templates/footer');
    }

    public function lihat_barang()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $data1['hasil'] = $this->data_tabel->tampil_barang();

        $this->load->view('templates/header', $data);
        $this->load->view('manajer_view/lihat_tabel_barang', $data1);
    }

    public function lihat_barang_masuk()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $data1['hasil'] = $this->data_tabel->tampil_barang_masuk();

        $this->load->view('templates/header', $data);
        $this->load->view('manajer_view/lihat_barang_masuk', $data1);
    }

    public function lihat_barang_keluar()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $data1['hasil'] = $this->data_tabel->tampil_barang_keluar();

        $this->load->view('templates/header', $data);
        $this->load->view('manajer_view/lihat_barang_keluar', $data1);
    }

    function fetch()
    {
        $output = '';
        $query = '';
        $this->load->model('data_tabel');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data1 = $this->data_tabel->tampil_barang($query);
        $output .= '
     <div class="table-responsive">
        <table class="table table-bordered table-striped">
         <tr>
          <th>ID</th>
          <th>Nama barang</th>
          <th>Harga barang</th>
          <th>Stok</th>
          <th>Kategori</th>
         </tr>
     ';
        if ($data1->num_rows() > 0) {
            foreach ($data1->result() as $row) {
                $output .= '
         <tr>
          <td>' . $row->id_barang . '</td>
          <td>' . $row->nama_barang . '</td>
          <td>' . $row->harga_barang . '</td>
          <td>' . $row->stok . '</td>
          <td>' . $row->name_kategori . '</td>
         </tr>
       ';
            }
        } else {
            $output .= '<tr>
          <td colspan="5">No Data Found</td>
         </tr>';
        }
        $output .= '</table>';
        echo $output;
    }
}
