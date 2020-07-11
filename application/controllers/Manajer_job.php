<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajer_job extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('datatables'); //load library ignited-dataTable
        $this->load->model('data_tabel');
        $this->load->library('form_validation');
    }

    public function datakaryawan()
    {
        $datakaryawan = $this->datakaryawan_model->getdatakaryawan();
        $no = 1;
        foreach ($datakaryawan as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['id_employee'];
            $tbody[] = $value['name_employee'];
            $tbody[] = $value['email_employee'];
            $tbody[] = $value['name_role'];
            $tbody[] = $value['date_created'];
            $aksi = "<button class='btn btn-success ubah-karyawan' id='id_employee' data-toggle='modal' data-id=" . $value['id_employee'] . ">Edit</button>"
                . ' ' . "<button class='btn btn-danger hapus-karyawan' id='id_emploee' data-toggle='modal' data-id=" . $value['id_employee'] . ">Delete</button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datakaryawan) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahkaryawan()
    {

        $nama = $this->input->post('nama_karyawan');
        $email = $this->input->post('alamat_email');
        //$password = $this->input->post('pass_karyawan');
        $role = $this->input->post('role_karyawan');

        $tambahkaryawan = array(
            'name_employee' => $nama,
            'email_employee'  => $email,
            'image' => 'default.jpg',
            'password' => password_hash(
                $this->input->post('pass_karyawan'),
                PASSWORD_DEFAULT
            ),
            //'password' => $password,
            'id_role' => $role,
            'is_active'  => 1,
            'date_created' => date('Y-m-d H:i:s')
        );

        $data = $this->datakaryawan_model->insertkaryawan($tambahkaryawan);

        echo json_encode($data);
    }

    public function formedit_karyawan()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');
        $data['datakategori'] = $this->Dropdown->tampil_data_role();
        $data['dataperkaryawan'] = $this->datakaryawan_model->datakaryawan_edit($id);
        $this->load->view('manajer_probis/formeditkaryawan', $data);
    }

    public function ubahkaryawan()
    {
        $objdata = array(
            'name_employee' => $this->input->post('editnama'),
            'email_employee' => $this->input->post('editemail')
        );

        $id = $this->input->post('id');
        $data = $this->datakaryawan_model->ubahkaryawan($objdata, $id);

        echo json_encode($data);
    }

    public function hapuskaryawan()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->datakaryawan_model->hapusdatakaryawan($id);
        echo json_encode($data);
    }

    public function index()
    {
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();
        $this->load->view('templates/header', $data);

        $data1['datakategori'] = $this->Dropdown->tampil_data_role();

        $this->load->view('manajer_probis/list_karyawan');
        $this->load->view('manajer_probis/ajaxcrud_karyawan', $data1);
    }

    public function datakategori()
    {
        $datakategori = $this->datakategori_model->getdatakategori();
        foreach ($datakategori as  $value) {
            $tbody = array();
            $tbody[] = $value['id_kategori'];
            $tbody[] = $value['name_kategori'];
            $aksi = "<button class='btn btn-success ubah-kategori' data-toggle='modal' data-id=" . $value['id_kategori'] . ">Ubah</button>" . ' ' . "<button class='btn btn-danger hapus-kategori' id='id' data-toggle='modal' data-id=" . $value['id_kategori'] . ">Hapus</button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datakategori) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahkategori()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}
        $nama = $this->input->post('nama');

        $tambahkategori = array(
            'name_kategori' => $nama
        );

        $data = $this->datakategori_model->insertkategori($tambahkategori);

        echo json_encode($data);
    }

    public function formedit_kategori()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');
        $data['dataperkategori'] = $this->datakategori_model->datakategori_edit($id);
        $this->load->view('manajer_probis/formeditkategori', $data);
    }

    public function ubahkategori()
    {
        $objdata = array(
            'id_kategori' => $this->input->post('editid'),
            'name_kategori' => $this->input->post('editnama')
        );

        $id = $this->input->post('id');
        $data = $this->datakategori_model->ubahkategori($objdata, $id);

        echo json_encode($data);
    }

    public function hapuskategori()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->datakategori_model->hapusdatakategori($id);
        echo json_encode($data);
    }

    public function lihat_list_kategori()
    {
        //kirimm data ke view
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();
        $this->load->view('templates/header', $data);

        $this->load->view('manajer_probis/list_kategori');
        $this->load->view('manajer_probis/ajaxcrud_kategori');
    }

    public function datakamar()
    {
        $datakamar = $this->datakamar_model->getdatakamar();
        foreach ($datakamar as  $value) {
            $tbody = array();
            $tbody[] = $value['no_kamar'];
            $tbody[] = $value['nama_kategori_kmr'];
            $aksi = "<button class='btn btn-success ubah-kamar' data-toggle='modal' data-id=" . $value['no_kamar'] . ">Ubah</button>" . ' ' .
                "<button class='btn btn-danger hapus-kamar' id='id' data-toggle='modal' data-id=" . $value['no_kamar'] . ">Hapus</button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datakamar) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahkamar()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}
        $nomor = $this->input->post('nomor');
        $kategorikamar = $this->input->post('kategorikamar');

        $tambahkamar = array(
            'no_kamar' => $nomor,
            'id_kategori_kmr'  => $kategorikamar
        );

        $data = $this->datakamar_model->insertkamar($tambahkamar);

        echo json_encode($data);
    }

    public function formedit_kamar()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data['datakategori'] = $this->Dropdown->tampil_data_kategori_kamar();

        $data['dataperkamar'] = $this->datakamar_model->datakamar_edit($id);
        $this->load->view('manajer_probis/formeditkamar', $data);
    }

    public function ubahkamar()
    {
        $objdata = array(
            'no_kamar' => $this->input->post('editno'),
            'id_kategori_kmr' => $this->input->post('editkategori')
        );

        $id = $this->input->post('id');
        $data = $this->datakamar_model->ubahkamar($objdata, $id);

        echo json_encode($data);
    }

    public function hapuskamar()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->datakamar_model->hapusdatakamar($id);
        echo json_encode($data);
    }

    public function lihat_list_kamar()
    {
        //kirimm data ke view
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $data1['datakategori'] = $this->Dropdown->tampil_data_kategori_kamar();

        $this->load->view('templates/header', $data);
        $this->load->view('manajer_probis/list_kamar');
        $this->load->view('manajer_probis/ajaxcrud_kamar', $data1);
    }

    public function datakategori_kamar()
    {

        $datakategori_kamar = $this->datakategori_kamar_model->getdatakategori_kamar();
        foreach ($datakategori_kamar as  $value) {
            $tbody = array();
            $tbody[] = $value['id_kategori_kmr'];
            $tbody[] = $value['nama_kategori_kmr'];
            $aksi = "<button class='btn btn-success ubah-kategori_kamar' data-toggle='modal' data-id=" . $value['id_kategori_kmr'] . ">Ubah</button>" . ' ' . "<button class='btn btn-danger hapus-kategori_kamar' id='id' data-toggle='modal' data-id=" . $value['id_kategori_kmr'] . ">Hapus</button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datakategori_kamar) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahkategori_kamar()
    {
        $id = $this->input->post('idkamar');
        $ktg_kmr = $this->input->post('namakategori');

        $tambahkategori_kamar = array(
            'id_kategori_kmr' => $id,
            'nama_kategori_kmr' => $ktg_kmr
        );

        $data = $this->datakategori_kamar_model->insertkategori_kamar($tambahkategori_kamar);

        echo json_encode($data);
    }

    public function formeditkategori_kamar()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data['dataperkategori_kamar'] = $this->datakategori_kamar_model->datakategori_kamar_edit($id);
        $this->load->view('manajer_probis/formeditkategori_kamar', $data);
    }

    public function ubahkategori_kamar()
    {
        $objdata = array(
            'id_kategori_kmr' => $this->input->post('editid'),
            'nama_kategori_kmr' => $this->input->post('editnama_kategori')
        );

        $id = $this->input->post('id');
        $data = $this->datakategori_kamar_model->ubahkategori_kamar($objdata, $id);

        echo json_encode($data);
    }

    public function hapuskategori_kamar()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->datakategori_kamar_model->hapusdatakategori_kamar($id);
        echo json_encode($data);
    }

    public function lihat_list_kategori_kamar()
    {
        //kirimm data ke view
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('manajer_probis/list_kategori_kamar');
        $this->load->view('manajer_probis/ajaxcrud_kategori_kamar');
    }

    public function dataorderstok()
    {
        $dataorderstok = $this->dataorderstok_model->getdataorder();
        foreach ($dataorderstok as  $value) {
            $tbody = array();
            $tbody[] = $value['id_order'];
            $tbody[] = $value['name_employee'];
            $tbody[] = $value['nama_barang'];
            $tbody[] = $value['jumlah_order'];
            $tbody[] = $value['date_order'];
            $aksi = "<button class='btn btn-success ubah-orderstok' id='id_orderstok' data-toggle='modal' data-id=" . $value['id_order'] . ">Edit</button>"
                . ' ' . "<button class='btn btn-danger hapus-orderstok' id='id_orderstok' data-toggle='modal' data-id=" . $value['id_order'] . ">Delete</button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($dataorderstok) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahorderstok()
    {
        $idpegawai = $this->input->post('idpegawai');
        $idbarang = $this->input->post('idbarang');
        $jumlah = $this->input->post('jumlahorder');
        $date = $this->input->post('date');

        $tambahorder = array(
            'id_employee' => $idpegawai,
            'id_barang'   => $idbarang,
            'jumlah_order' => $jumlah,
            'date_order' => $date
        );

        $data = $this->dataorderstok_model->insertorder($tambahorder);

        echo json_encode($data);
    }

    public function formedit_orderstok()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data['dataperorderstok'] = $this->dataorderstok_model->dataorder_edit($id);
        $data['datakaryawan'] = $this->Dropdown->tampil_data_karyawan();
        $data['databarang'] = $this->Dropdown->tampil_data_barang_hbs();

        $this->load->view('manajer_probis/formeditorderstok', $data);
    }

    public function ubahorderstok()
    {
        $objdata = array(
            'id_employee' => $this->input->post('editid1'),
            'id_barang' => $this->input->post('editid2'),
            'jumlah_order' => $this->input->post('editjumlah'),
            'date_order' => $this->input->post('editdate'),
        );

        $id = $this->input->post('id');
        $data = $this->dataorderstok_model->ubahorder($objdata, $id);

        echo json_encode($data);
    }

    public function hapus_orderstok()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->dataorderstok_model->hapusdataorder($id);
        echo json_encode($data);
    }


    public function order_stok()
    {
        //kirimm data ke view
        $data['employee'] = $this->db->get_where('employee', ['email_employee' =>
        $this->session->userdata('email_employee')])->row_array();

        $data1['datakaryawan'] = $this->Dropdown->tampil_data_karyawan();
        $data1['databarang'] = $this->Dropdown->tampil_data_barang_hbs();

        $this->load->view('templates/header', $data);
        $this->load->view('manajer_probis/list_orderstok', $data1);
        $this->load->view('manajer_probis/ajaxcrud_orderstok', $data1);
    }
}
