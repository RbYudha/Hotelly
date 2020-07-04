<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('datatables'); //load library ignited-dataTable
        $this->load->model('data_tabel');
        $this->load->library('form_validation');
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

    public function index2()
    {
        //kirimm data ke view
        $this->load->view('manajer_probis/tampildata');
        $this->load->view('manajer_probis/ajaxcrud');
    }

    public function databarang()
    {

        $databarang = $this->databarang_model->getdatabarang();
        $no = 1;
        foreach ($databarang as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['id_barang'];
            $tbody[] = $value['nama_barang'];
            $tbody[] = $value['stok'];
            $tbody[] = $value['name_kategori'];
            $aksi = "<button class='btn btn-success ubah-barang' id='id_barang' data-toggle='modal' data-id=" . $value['id_barang'] . ">Edit</button>"
                . ' ' . "<button class='btn btn-danger hapus-barang' id='id_barang' data-toggle='modal' data-id=" . $value['id_barang'] . ">Delete</button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($databarang) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahbarang()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}
        $id = $this->input->post('id');
        $nama_barang = $this->input->post('nama_barang');
        $harga_barang = $this->input->post('harga_barang');
        $stok       = $this->input->post('stok');
        $id_kategori = $this->input->post('id_kategori');

        $tambahbarang = array(
            'id_barang' => $id,
            'nama_barang'  => $nama_barang,
            'harga_barang' => $harga_barang,
            'stok' => $stok,
            'id_kategori' => $id_kategori
        );

        $data = $this->databarang_model->insertbarang($tambahbarang);

        echo json_encode($data);
    }

    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');
        $data['datakategori'] = $this->Dropdown->tampil_data_kategori();
        $data['dataperbarang'] = $this->databarang_model->databarangedit($id);
        $this->load->view('manajer_probis/formeditbarang', $data);
    }

    public function ubahbarang()
    {
        $objdata = array(
            //'id_barang' => $this->input->post('editid'),
            'nama_barang' => $this->input->post('editnama'),
            //'harga_barang' => $this->input->post('editharga'),
            'stok' => $this->input->post('editstok'),
            'id_kategori' => $this->input->post('editidkategori')
        );

        $id = $this->input->post('id');
        $data = $this->databarang_model->ubahbarang($objdata, $id);

        echo json_encode($data);
    }

    public function hapusbarang()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->databarang_model->hapusdatabarang($id);
        echo json_encode($data);
    }


    public function lihat_barang()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        //$data1['hasil'] = $this->data_tabel->tampil_barang();

        $this->load->view('templates/header', $data);
        //$this->load->view('manajer_view/lihat_tabel_barang', $data1);
        $this->load->view('manajer_view/lihat_tabel_barang');
        $this->load->view('manajer_probis/ajaxcrud');

        // $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        // $this->session->userdata('email_employee')])->row_array();
        // $x['kategori'] = $this->data_tabel->get_kategori();
        // $this->load->view('templates/header', $data);
        // $this->load->view('manajer_view/lihat_tabel_barang copy', $x);
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

    public function lihat_barang_hilang()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $data1['hasil'] = $this->data_tabel->tampil_barang_hilang();

        $this->load->view('templates/header', $data);
        $this->load->view('manajer_view/lihat_barang_hilang', $data1);
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
